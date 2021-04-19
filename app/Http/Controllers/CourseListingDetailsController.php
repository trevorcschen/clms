<?php

namespace App\Http\Controllers;

use App\CourseListingDetails;
use Illuminate\Http\Request;

class CourseListingDetailsController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseListingDetails  $courseListingDetails
     * @return \Illuminate\Http\Response
     */
    public function show(CourseListingDetails $courseListingDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseListingDetails  $courseListingDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseListingDetails $courseListingDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseListingDetails  $courseListingDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseListingDetails $courseListingDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseListingDetails  $courseListingDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseListingDetails $courseListingDetails)
    {
        //
    }
}
