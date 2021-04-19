<?php

namespace App\Http\Controllers;

use App\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SessionController extends Controller
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
        return view('sessions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sessions.create');
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
            'date' => 'required',
            'active' => 'bail|required|boolean',
        ]);

        $dates = explode(' - ', $request->input('date'));
        $dates[0]= Carbon::createFromFormat('d/m/Y', $dates[0]);
        $dates[1] = Carbon::createFromFormat('d/m/Y', $dates[1]);
        $yearM = $dates[0]->format('F') . ' ' . $dates[0]->format('Y');
        $session = Session::create([
            'title' => $yearM,
            'start_date' => $dates[0],
            'end_date' => $dates[1],
            'active' => $request->input('active'),
        ]);
        return redirect()->route('sessions.index')
            ->withSuccess('Session <strong>' .$session->title. '</strong> created successfully.');
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
        return datatables()->of(Session::all())
            ->editColumn('active', function ($session) {
                return $session->active ?  '<span class="m-badge m-badge--success m-badge--wide">Active</span>' : '<span class="m-badge m-badge--metal m-badge--wide">Inactive</span>';
            })
            ->editColumn('created_at', function ($session) {
                return $session->created_at->timezone('Asia/Kuala_Lumpur');
            })
            ->editColumn('updated_at', function ($session) {
                return $session->updated_at->timezone('Asia/Kuala_Lumpur');
            })
            ->addColumn('actions', function ($session) {
                return  '<span class="dropdown">'.
                    '<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">'.
                    '<i class="la la-ellipsis-h"></i></a>'.
                    '<div class="dropdown-menu dropdown-menu-right">'.
                    '<form action="'.route('sessions.destroy',$session->id).'" method="POST">'.
                    csrf_field().
                    '<input type="hidden" name="_method" value="DELETE">'.
                    '<button type="submit" class="dropdown-item btn-link"><i class="la la-car"></i> Delete</button>'.
                    '<button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete" data-id="'.$session->id.'"><i class="la la-trash"></i> Delete Permanently</button>'.
                    '</div></span>'.
                    '<a href="'.route('sessions.show', $session->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">'.
                    '<i class="la la-file-text-o"></i></a>'.
                    '<a href="'.route('sessions.edit', $session->id).'" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">'.
                    '<i class="la la-edit"></i></a>';
            })
            ->rawColumns(['active', 'actions'])
            ->toJson();
    }
}
