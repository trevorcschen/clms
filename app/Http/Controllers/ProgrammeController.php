<?php

namespace App\Http\Controllers;

use App\Programme;
use App\Subject;
use App\User;
use App\Role;
use Illuminate\Http\Request;


class ProgrammeController extends Controller
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
    public function index($id)
    {
        //
        $programme= Programme::where('id',$id)->first();
        return view('programmes.index',compact('programme'));


    }
    public function details()
    {
        //
        return view('programmes.details');
        /*$subjects = Subject::whereHas('programmes', function ($query)
        {
            $query->where('programme_id', '1');
        })->get();
        echo $subjects;*/
       /* $programmes = Programme::where('id', '1')->get();
        foreach ($programmes as $programme)
        {
           foreach ($programme->subjects as $subject)
           {
               echo $subject->id;
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


        $users = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'HOP');
        })->get();

        return view('programmes.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'programme_name' => 'bail|required|string|alpha_spaces|unique:programmes',
            'programme_code' => 'bail|required|string|unique:programmes',
            'academic_level' => 'bail|required',
            'hop_id' => 'bail|required',
            'active' => 'bail|required|boolean',
        ]);
        //
//        echo $request->input('academic_level');
        $programme = Programme::create([
            'programme_name' => $request->input('programme_name'),
            'programme_code' => $request->input('programme_code'),
            'academic_level' => $request->input('academic_level'),
            'hop_id' => $request->input('hop_id'),
            'active' => $request->input('active'),
        ]);
        $user = User::find($request->input('hop_id'));
//        $programme = Programme::where('id', 3)->get();
       $user->programmes()->attach($programme);

        return redirect()->route('programmes.index')
            ->withSuccess('A new Programme <strong>' .$programme->name . '</strong> created successfully.');
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

    public function ajax($id)
    {

        $subject = Subject::whereHas('programmes', function ($query) use ($id)
        {
            $query->where('programme_id', $id);
        })->get();
        return datatables()->of($subject)
            ->editColumn('active', function ($subject) {
                return $subject->active ?  '<span class="m-badge m-badge--success m-badge--wide">Active</span>' : '<span class="m-badge m-badge--metal m-badge--wide">Inactive</span>';
            })
            ->addColumn('actions', function ($subject) {
                return  '<span class="dropdown">'.
                    '<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">'.
                    '<i class="la la-ellipsis-h"></i></a>'.
                    '<div class="dropdown-menu dropdown-menu-right">'.
                    '<form action="'.route('users.destroy',$subject->id).'" method="POST">'.
                    csrf_field().
                    '<input type="hidden" name="_method" value="DELETE">'.
                    '<button type="submit" class="dropdown-item btn-link"><i class="la la-car"></i> Delete</button>'.
                    '<button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete" data-id="'.$subject->id.'"><i class="la la-trash"></i> Delete Permanently</button>'.
                    '</div></span>'.
                    '<a href="'.route('users.show', $subject->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">'.
                    '<i class="la la-file-text-o"></i></a>'.
                    '<a href="'.route('users.edit', $subject->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">'.
                    '<i class="la la-edit"></i></a>';
            })
            ->rawColumns([ 'active', 'actions'])
            ->toJson();
    }
    public function ajaxDetails()
    {
        $programme = Programme::all();
        return datatables()->of($programme)
            ->removeColumn('hop_id')
            ->addColumn('checkbox', function ($programme) {
                return '<label class="m-checkbox m-checkbox--solid m-checkbox--brand">'.
                    '<input type="checkbox" class="sub_chk" data-id="'.$programme->id.'"><span></span></label>';
            })
            ->addColumn('programme_leader', function($programme) {
                return $programme->hop()->value('name');
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
            ->rawColumns([ 'active', 'actions'])
            ->toJson();
    }
}
