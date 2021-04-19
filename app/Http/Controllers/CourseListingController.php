<?php

namespace App\Http\Controllers;

use App\CourseListing;
use App\Programme;
use App\Session;
use App\Subject;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;



class CourseListingController extends Controller
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
        $courselisting = CourseListing::find(3);
        return view('course_listings.index');
    }
    public function search()
    {
        echo"dsa";
//        return view('course_listings.search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $programmes = Programme::where('hop_id', auth()->user()->id)->get();
        $sessions = Session::all();
        return view('course_listings.create', compact('programmes', 'sessions'));
    }

    public function createDetails($id)
    {
        // have to retreive data from previous page to get the selected programme id for the next page
        $programmes = Programme::where('hop_id', auth()->user()->id)->get();
        $sessions = Session::all();
        $sql = 'SELECT b.* FROM programmes as a, subjects as b, programme_subject as c where a.programme_code = ? and c.programme_id = a.id and c.subject_id = b.id';
        $sql2 = 'SELECT c.* FROM `programme_user` as a, `programmes` as b, `users` as c, `roles` as d, `role_user` as e where b.id = ? and a.programme_id = b.id and a.user_id = c.id and  e.user_id = c.id and e.role_id = d.id and d.name = ?';
        $programmeUser = DB::select($sql2, ['1', 'Lecturer']);
        $subjects = DB::select($sql, ['DITN']); // DITN programme
        $mpu = DB::select($sql, ['LC']);
//        $e = count($users);
//        $i = 0;
//        foreach ($users as $row)
//           { echo $users[$i]->title;
//            $i++;}
        return view('course_listings.createDetails', compact('programmes', 'sessions', 'id', 'subjects', 'programmeUser', 'mpu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dates//
        $dates = explode(' - ', $request->input('date'));
        $dates[0]= Carbon::createFromFormat('d/m/Y', $dates[0]);
        $dates[1] = Carbon::createFromFormat('d/m/Y', $dates[1]);
        //active
        $active = $request->input('active');
        //session id
        $session_id = $request->input('session_id');
        $session_title = Session::where('id', $session_id)->pluck('title')->first();
        //active, programmes[], session_id, date
        $programmes = $request->input('programmes');


        for($i = 0; $i< count($programmes);$i++)
        {
            $programmeList = Programme::where('id', $programmes[$i])->value('programme_code');
            $course_listing_res = new CourseListing();
            $course_listing_res->session_id = $session_id;
            //$course_listing_res->programme_id = $programmes[$i];
            $course_listing_res->active = $active;
            $course_listing_res->start_date = $dates[0];
            $course_listing_res->end_date = $dates[1];
            $course_listing_res->title = $programmeList. ' ' . $session_title;
            $course_listing_res->save();

        }

    }

    public function storeDetails(Request $request)
    {
        // dates//
       dd( $request->all());

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

    public function listingFields(Request $request)
    {
        // if code retrieved is mpu subject, do a data retrieval
        $getFields = Subject::where('code', $request->get('code'))->first();

        $ewq = $request->get('code');
        $test = preg_replace('/[^a-zA-Z]/', '', $ewq);
        $sql= 'SELECT a.* FROM programmes as a, subjects as b, programme_subject as c where a.id = c.programme_id and b.id = c.subject_id and b.code LIKE  :code';
        $mpu = DB::select($sql, ['code' => $test.'%']);

        if($mpu[0]->programme_code === 'LC')
        {
            $sql2 = 'SELECT a.* FROM users as a, programmes as b, programme_user as c where a.id = c.user_id and c.programme_id = b.id and b.programme_code = ?';
            $mpu2 = DB::select($sql2, [$mpu[0]->programme_code]);
            $sql3= 'SELECT b.* FROM programmes as a, subjects as b, programme_subject as c where a.id = c.programme_id and b.id = c.subject_id and b.code LIKE  :code';
            $mpu3 = DB::select($sql3, ['code' => $test.'%']);
            return response()->json(['message' => 'abc', 'subjectDetails' => $mpu3[0], 'lecturerMPU' => $mpu2]);

        }
        else
        {
            $sql2 = 'SELECT a.* FROM users as a, programmes as b, programme_user as c where a.id = c.user_id and c.programme_id = b.id and b.programme_code = ?';
            $mpu2 = DB::select($sql2, [$mpu[0]->programme_code]);
            return response()->json(['message' => 'abc', 'subjectDetails' => $getFields, 'lecturerCore' => $mpu2]);

        }

//        $data = ['message' => 'abc', $getFields];



    }

    public function validateListing(Request $request)
    {


        $validator = \Validator::make($request->all(), [
            'subject_code' => 'required', 'no_students' => 'required', 'lecturerInfo' => 'required'
        ],['no_students.required' => 'The Number of students field is required!']);


        if ($validator->passes()) {

            if($request->subject_code === 'ICT1101') // programme id, courselisting id, intake, semester
            {
                return response()->json(['test123'=>'its existed']);

            }
            else
            {
                return response()->json(['success'=>'Added new records. no existed ']);

            }


        }


        return response()->json(['error'=>$validator->errors()->all()]);
    }




}
