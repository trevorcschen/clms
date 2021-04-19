<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
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
        return view('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('roles.create');
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
            'name' => 'bail|required|string|alpha_spaces|unique:roles',
            'active' => 'bail|required|boolean',
        ]);

        $role = Role::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
        ]);
        return redirect()->route('roles.index')
            ->withSuccess('A new role : <strong>' .$role->name . '</strong> has been created successfully.');
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
        return datatables()->of(Role::all())
            ->editColumn('active', function ($role) {
                if($role->active == 1)
                {
                    return 'Active';
                }
                else
                {
                    return 'Not Active';
                }

            })
            ->editColumn('created_at', function ($role) {
                return $role->created_at->timezone('Asia/Kuala_Lumpur');
            })
            ->editColumn('updated_at', function ($role) {
                return $role->updated_at->timezone('Asia/Kuala_Lumpur');
            })
            ->addColumn('actions', function ($role) {
                return  '<span class="dropdown">'.
                    '<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">'.
                    '<i class="la la-ellipsis-h"></i></a>'.
                    '<div class="dropdown-menu dropdown-menu-right">'.
                    '<button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete" data-id="'.$role->id.'"><i class="la la-trash"></i> Delete Permanently</button>'.
                    '</div></span>'.
                    '<a href="'.route('roles.show', $role->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">'.
                    '<i class="la la-file-text-o"></i></a>'.
                    '<a href="'.route('roles.edit', $role->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">'.
                    '<i class="la la-edit"></i></a>';
            })
            ->rawColumns(['actions'])
            ->toJson();
    }
}
