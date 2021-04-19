<?php

namespace App\Http\Controllers;

use App\CourseListingDetails;
use App\Programme;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class SubjectController extends Controller
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
        return view('subjects.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $programmes = Programme::all();
        $subjects = Subject::all();
        return view('subjects.create', compact('programmes', 'subjects'));
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
            'code' => 'required|unique:subjects',
            'title' => 'required',
            'lec_hrs' => 'required_with:lec_sess|max:1',
            'lec_sess' => 'required_with:lec_hrs|max:1',
            'tutorial_hrs' => 'required_with:tutorial_sess|max:1',
            'tutorial_sess' => 'required_with:tutorial_hrs|max:1',
            'pract_hrs' => 'required_with:pract_sess|max:1',
            'pract_sess' => 'required_with:pract_hrs|max:1',
            'on9_hrs' => 'required_with:on9_sess|max:1',
            'on9_sess' => 'required_with:on9_hrs|max:1',
            'credit_hrs' => 'required|max:1',
            'programmes' => 'required',
            'active' => 'required',
        ]);
        if (!empty($request->input('lec_hrs')))
        {
            $lecture = $request->input('lec_hrs').'x'.$request->input('lec_sess');
        }
        else
            $lecture = null;
        if (!empty($request->input('tutorial_hrs')))
        { $tutorial = $request->input('tutorial_hrs').'x'.$request->input('tutorial_sess');}
        else
            $tutorial = null;
        if (!empty($request->input('pract_hrs'))){
            $practical = $request->input('pract_hrs').'x'.$request->input('pract_sess');
        }
        else
            $practical=null;
        if (!empty($request->input('on9_hrs')))
        {
            $blended = $request->input('on9_hrs').'x'.$request->input('on9_sess');
        }
        else
            $blended = null;
        if (!empty($request->input('pre-requisites')))
        {

            $temp = $request->input('pre-requisites');
            $pre_requisite ='';
            for($i = 0; $i< count($temp);$i++)
            {
                $pre_requisite = $pre_requisite . $temp[$i] . ' ';
            }
        }
        else
            $pre_requisite = null;

        $subject = Subject::create([
            'code' => $request->input('code'),
            'title' => $request->input('title'),
            'lec_hrs' => $lecture,
            'tut_hrs' => $tutorial,
            'pract_hrs' => $practical,
            'on_hrs' => $blended,
            'cred_hrs' => $request->input('credit_hrs'),
            'pre-requisite' => $pre_requisite,
            'active' => $request->input('active'),
        ]);
        $subject->programmes()->attach($request->input('programmes'));

        return redirect()->route('subjects.index')
            ->withSuccess('A new Subject <strong>' .$subject->title . '</strong> created successfully.');

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
        return datatables()->of(Subject::all())
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

    public function populatedFields(Request $request)
    {
        $getFields = Subject::where('code', $request->get('code'))->first();

        return response()->json($getFields, 200);


    }
}
