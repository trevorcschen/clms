<?php

namespace App\Http\Controllers;

use App\Programme;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        //
     //   $post = User::find(1);
    //    foreach ($post->roles as $role)
     //   {
       //     echo $role->name;
       // }
       // echo $post->Role;
        return view('users.index');
        //$users = User::all();
      //  echo $users;
       /* foreach ($users as $user)
        {
            if($user->programmes()->exists())
            {
                //echo $user;
                $programmes = $user->programmes()->get();
                foreach ($programmes as  $programme)
                {
                    echo $programme->name;
                }

            }

        }*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $programmes = Programme::all();
        if($programmes === null)
        {
            $noProgrammes = true;
            return view('users.create',compact('roles', 'noProgrammes'));
        }
        else
        {            $noProgrammes = false;

            return view('users.create',compact('roles', 'programmes', 'noProgrammes'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'bail|required|string|alpha_spaces',
            'email' => 'bail|required|email|unique:users',
            'phone_number' => 'bail|required|numeric|unique:users,phone_number',
            'password' => 'bail|required|min:6|confirmed',
            'programme' => 'bail|nullable|exists:programmes,id',
            'roles' => 'bail|required|exists:roles,id',
            'active' => 'bail|required|boolean',
        ]);
       $roles = $request->input('roles');
        $count = 0;

        foreach ($roles as $role)
        {

            if($role == 1)
            {
               // echo 'admin';
                $count++;
               if ($request->input('programmes'))
               {
                   echo "admin cannot belong to a programme";
               }

            }
            else if($role == 2)
            {
              //  echo 'hop';
                $count++;
            }

        }
        if($count ==2 )
        {
             return redirect()->route('users.index')
            ->with('errors', 'The roles cannot be HOP and Admin at the same time!');
        }
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'password' => Hash::make($request->input('password')),
            'active' => $request->input('active'),
        ]);

        $user->roles()->attach($request->input('roles'));

        if($request->has('programmes'))
        {
            //echo 'something is checked';
            //
            $user->programmes()->attach($request->input('programmes'));
        }

        return redirect()->route('users.index')
            ->withSuccess('User <strong>' .$user->name . '</strong> created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function ajax()
    {
        return datatables()->of(User::all())
            ->addColumn('checkbox', function ($user) {
                return '<label class="m-checkbox m-checkbox--solid m-checkbox--brand">'.
                    '<input type="checkbox" class="sub_chk" data-id="'.$user->id.'"><span></span></label>';
            })
            ->addColumn('programmes', function ($user)
            {
                $result = "";
                $programmes = $user->programmes()->get();

                    if($user->programmes()->exists())
                    {
                        foreach ($programmes as $programme) {
                            $result .= '<span class="m-badge m-badge--focus m-badge--wide">' . $programme->programme_code . '</span>';
                        }
                    }
                    else
                    {

                        $result .= '<span class="m-badge m-badge--focus m-badge--wide">programmelesss</span>';

                }
                return $result;
            })
            ->addColumn('roles', function ($user) {
                $result = "";
                $roles = $user->roles()->get();
                foreach ($roles   as $role) {
                    $result .= '<span class="m-badge m-badge--focus m-badge--wide">'.$role->name.'</span>';
                }
                return $result;
            })
            ->editColumn('active', function ($user) {
                return $user->active ?  '<span class="m-badge m-badge--success m-badge--wide">Active</span>' : '<span class="m-badge m-badge--metal m-badge--wide">Inactive</span>';
            })
            ->addColumn('actions', function ($user) {
                return  '<span class="dropdown">'.
                    '<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">'.
                    '<i class="la la-ellipsis-h"></i></a>'.
                    '<div class="dropdown-menu dropdown-menu-right">'.
                    '<form action="'.route('users.destroy',$user->id).'" method="POST">'.
                    csrf_field().
                    '<input type="hidden" name="_method" value="DELETE">'.
                    '<button type="submit" class="dropdown-item btn-link"><i class="la la-car"></i> Delete</button>'.
                    '<button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete" data-id="'.$user->id.'"><i class="la la-trash"></i> Delete Permanently</button>'.
                    '</div></span>'.
                    '<a href="'.route('users.show', $user->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">'.
                    '<i class="la la-file-text-o"></i></a>'.
                    '<a href="'.route('users.edit', $user->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">'.
                    '<i class="la la-edit"></i></a>';
            })
            ->rawColumns(['checkbox', 'roles', 'active', 'actions', 'programmes'])
            ->toJson();
    }

}
