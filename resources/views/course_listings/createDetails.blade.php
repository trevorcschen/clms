@extends('layouts.default')

@section('title', 'Course Listings')

@section('subheader', 'Course Listings')
@section('subheader-link', route('course_listings.index'))

@section('subheader-action', 'Create')
@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-xl-9">
                <!--begin::Portlet-->


                <div class="m-alert m-alert--icon m-alert--air alert alert-danger alert-dismissible fade show" role="alert" style="display: none">
                    <div class="m-alert__icon">
                        <i class="la la-warning"></i>
                    </div>
                    <div class="m-alert__text">
                        <strong>
                            Whoops!
                        </strong>
                        There were some problems with your input. <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="m-alert__close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="m-alert m-alert--icon m-alert--air alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="m-alert__icon">
                            <i class="la la-warning"></i>
                        </div>
                        <div class="m-alert__text">
                            <strong>
                                Whoops!
                            </strong>
                            There were some problems with your input. <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="m-alert__close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                @php
                    $i = 1
                @endphp
                <button> add listing</button>

                <div class="m-portlet m-portlet--tab ">
                    <div class="m-portlet__head">

                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                                <h3 class="m-portlet__head-text" data-toggle="collapse" data-target=".demo{{$i}}">
                                    Create New Listing
                                </h3>


                            </div>
                        </div>
                        <div class="row" style="margin-left: 15px">

                            <div class="col-lg-6">
                                <select class="form-control m-input" name="session_id" id="changeSemester">
                                    <option value="" selected disabled hidden>Select Semester</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control m-input" name="session_id" id="changeSemesterIntake">
                                    <option value="" selected disabled hidden>Select Intake Semester</option>
                                    @foreach($sessions as $session)
                                        <option value="{{ $session->title }}">{{ $session->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-auto" style="margin-left: 250px"></div>

                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right"  id= "formID" action="{{ route('course_listings.storeDetails') }}" method="POST">
                        @csrf
                        <input type="text" value="" id="hidden_semester_data">
                        <input type="text" value="" id="hidden_intake_data">
                        <div class="row" id ="tester1">
                            <h3 class="m-portlet__head-text  col-3 header12" style="margin-left: 30px">Listing 1</h3>
                            <div class="col-lg-8">
                                <button class="btn btn-brand float-right addbtn"  type="button">Add new subjects</button>
                            </div>
                        </div>
                        <div class="m-portlet__body content12 " id ="demo{{$i}}"style="display: none">

                            <div class="form-group m-form__group">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="code" style="font-weight: bold;font-size: 16px;">Subject Code</label>

                                    </div>
                                    <div class="col-5" style="text-align: center">
                                        <label for="code" style="font-weight: bold;font-size: 16px;">Subject Title</label>

                                    </div>
                                    <div class="col-4" style="text-align: center">
                                        <label for="code" style="font-weight: bold;font-size: 16px;">Lecturer Information</label>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <select class="form-control m-input selectorCode" name="subject_code" >
                                            <option></option>
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->code }}">{{ $subject->code}}</option>
                                            @endforeach
                                            @foreach($mpu as $mp)
                                                <option value="{{ $mp->code }}">{{ $mp->code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" value=""  class="form-control m-input" name="subject_title" id="subject_title" disabled>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control m-input selectorLecturer" name="lecturerInfo" >
                                            <option></option>
                                            @foreach($programmeUser as $lecturer)
                                                <option value="{{ $lecturer->name }}">{{ $lecturer->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>

                            </div>
                            <div class ="row">
                                <div class="form-group m-form__group" style="margin-left: 20px">
                                    <label for="name" style="font-weight: bold;">
                                        Lecture Hours
                                    </label>
                                    <input type="text" class="form-control m-input" disabled name="lec_hrs" id="lec_hrs" value="{{old('lec_hrs')}}"  aria-describedby="emailHelp"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                                </div>
                                <div class="form-group m-form__group" style="margin-top: -15px">
                                    <label for="name" style="font-weight: bold;">
                                        Lecture Sessions
                                    </label>
                                    <input type="text" class="form-control m-input" name="lec_sess" id="lec_sess" value="{{old('lec_sess')}}"  aria-describedby="emailHelp" placeholder="Enter lecture sessions"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                                </div>
                                <div class="form-group m-form__group" style="margin-left: 20px;margin-top: -15px">
                                    <label for="name" style="font-weight: bold;">
                                        Tutorial Hours
                                    </label>
                                    <input type="text" class="form-control m-input" disabled name="tutorial_hrs" id="tutorial_hrs" value="{{old('tutorial_hrs')}}"  aria-describedby="emailHelp"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                                </div>
                                <div class="form-group m-form__group" style="margin-top: -15px">
                                    <label for="name" style="font-weight: bold;">
                                        Tutorial Sessions
                                    </label>
                                    <input type="text" class="form-control m-input" name="tutorial_sess" id="tutorial_sess"  value="{{old('tutorial_sess')}}" aria-describedby="emailHelp" placeholder="Enter tutorial sessions"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                                </div>
                            </div>

                            <div class="row" >
                                <div class="form-group m-form__group" style="margin-left: 20px">
                                    <label for="name" style="font-weight: bold;">
                                        Practical Hours
                                    </label>
                                    <input type="text" class="form-control m-input" disabled name="pract_hrs" id="pract_hrs" value="{{old('pract_hrs')}}"  aria-describedby="emailHelp"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                                </div>
                                <div class="form-group m-form__group" style="margin-top: -15px">
                                    <label for="name" style="font-weight: bold;">
                                        Practical Sessions
                                    </label>
                                    <input type="text" class="form-control m-input" name="pract_sess" id="pract_sess" value="{{old('pract_sess')}}"  aria-describedby="emailHelp" placeholder="Enter practical sessions"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                                </div>

                                <div class="form-group m-form__group" disabled style="margin-left: 20px;margin-top: -15px">
                                    <label for="name" style="font-weight: bold;">
                                        Online Learning Hours
                                    </label>
                                    <input type="text" class="form-control m-input" disabled name="on9_hrs" id="on9_hrs" value="{{old('on9_hrs')}}"  aria-describedby="emailHelp"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                                </div>
                                <div class="form-group m-form__group " style="margin-top: -15px">
                                    <label for="name" style="font-weight: bold;">
                                        Online Learning Sessions
                                    </label>
                                    <input type="text" class="form-control m-input" name="on9_sess" id="on9_sess" value="{{old('on9_sess')}}"  aria-describedby="emailHelp" placeholder="Enter online learning sessions"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                                </div>
                            </div>

                            <div class="row" >
                                <div class="form-group m-form__group" style="margin-left: 20px">
                                    <label for="name" style="font-weight: bold;">
                                        Lecture (Remark/Comment)
                                    </label>
                                    <input type="text" class="form-control m-input"  name="lec_remark" id="lec_remark" value="{{old('pract_hrs')}}"  aria-describedby="emailHelp">
                                </div>
                                <div class="form-group m-form__group" style="margin-top: -15px">
                                    <label for="name" style="font-weight: bold;">
                                        Practical (Remark/Comment)                                    </label>
                                    <input type="text" class="form-control m-input" name="pract_remark" id="pract_remark" value="{{old('pract_sess')}}"  aria-describedby="emailHelp" >
                                </div>

                                <div class="form-group m-form__group"  style="margin-left: 20px;margin-top: -15px">
                                    <label for="name" style="font-weight: bold;">
                                        Tutorial (Remark/Comment)                                    </label>
                                    <input type="text" class="form-control m-input" name="tut_remark" id="tut_remark" value="{{old('on9_hrs')}}"  aria-describedby="emailHelp">
                                </div>
                                <div class="form-group m-form__group " style="margin-top: -15px">
                                    <label for="name" style="font-weight: bold;">
                                        Online (Remark/Comment)
                                    </label>
                                    <input type="text" class="form-control m-input" name="on9_remark" id="on9_remark" value="{{old('on9_sess')}}"  aria-describedby="emailHelp">
                                </div>
                            </div>

                            <div class="row" >
                                <div class="form-group m-form__group col-4" style="margin-left: 20px;text-align: center;">
                                    <label for="name" style="font-weight: bold;">
                                        Similar Subject
                                    </label>
                                    <input type="text" class="form-control m-input"  name="diff_classes" id="diff_classes" value="{{old('pract_hrs')}}"  aria-describedby="emailHelp">
                                </div>
                                <div class="form-group m-form__group col-4" style="margin-top: -15px;text-align: center">
                                    <label for="name" style="font-weight: bold;">
                                        Number of Students                          </label>
                                    <input type="text" class="form-control m-input" name="no_Students" id="no_Students" value="{{old('pract_sess')}}"  aria-describedby="emailHelp" >
                                </div>
                            </div>

                            <div class="form-group m-form__group">
                                <label for="comment">Remark:</label>
                                <textarea class="form-control" rows="5" id="remark" name="remark"></textarea>
                            </div>

                            <div class="form-group m-form__group">
                                <label for="example_input_full_name">
                                    Active:
                                </label>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="m-option">
                                                                    <span class="m-option__control">
                                                                        <span class="m-radio m-radio--brand m-radio--check-bold">
                                                                            <input type="radio" name="active[{{$i}}]" value="1">
                                                                            <span></span>
                                                                        </span>
                                                                    </span>
                                            <span class="m-option__label">
                                                                        <span class="m-option__head">
                                                                            <span class="m-option__title">
                                                                                Active
                                                                            </span>
                                                                        </span>

                                                                    </span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="m-option">
                                                                    <span class="m-option__control">
                                                                        <span class="m-radio m-radio--brand m-radio--check-bold">
                                                                            <input type="radio" name="active[{{$i}}]" value="0">
                                                                            <span></span>
                                                                        </span>
                                                                    </span>
                                            <span class="m-option__label">
                                                                        <span class="m-option__head">
                                                                            <span class="m-option__title">
                                                                                Not active
                                                                            </span>
                                                                        </span>

                                                                    </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="m-form__actions col-sm4" style="margin: auto">

                                    <button type="submit" class="btn btn-primary " style="margin-right: 50px">
                                        Confirm
                                    </button>
                                    <button type="reset" class="btn btn-primary">
                                        Reset
                                    </button>
                                </div>
                            </div>

                        </div>


                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <button type="submit" class="btn btn-primary btn-submit">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </form>


                    <!--end::Form-->
                </div>
            @php
                $i =2
            @endphp
            {{--                <div class="m-portlet m-portlet--tab ">--}}
            {{--                    <div class="m-portlet__head">--}}
            {{--                        <div class="m-portlet__head-caption">--}}
            {{--                            <div class="m-portlet__head-title">--}}
            {{--												<span class="m-portlet__head-icon m--hide">--}}
            {{--													<i class="la la-gear"></i>--}}
            {{--												</span>--}}
            {{--                                <h3 class="m-portlet__head-text" data-toggle="collapse" data-target="#demo{{$i}}">--}}
            {{--                                    Create New Listing--}}
            {{--                                </h3>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}

            {{--                    <!--begin::Form-->--}}
            {{--                    <form class="m-form m-form--fit m-form--label-align-right" action="{{ route('course_listings.store') }}" method="POST">--}}
            {{--                        @csrf--}}

            {{--                        <div class="m-portlet__body content12" id="demo{{$i}}">--}}

            {{--                            <div class="form-group m-form__group">--}}
            {{--                                <label for="session-range">Start Date - End Date</label>--}}
            {{--                                <input type="text" class="form-control" name="date" id="session-range" readonly="" placeholder="Select time">--}}
            {{--                            </div>--}}
            {{--                            <div class="form-group m-form__group">--}}
            {{--                                <label for="hop">Intake Session for the Course Listing</label>--}}
            {{--                                <select class="form-control m-input" name="session_id" id="session_id">--}}
            {{--                                    @foreach($sessions as $session)--}}
            {{--                                        <option value="{{ $session->id }}">{{ $session->title}}</option>--}}
            {{--                                    @endforeach--}}
            {{--                                </select>--}}
            {{--                            </div>--}}

            {{--                            <div class="form-group m-form__group">--}}
            {{--                                <div class="m-checkbox-list">--}}
            {{--                                    <label>Programmes</label>--}}
            {{--                                    @foreach($programmes as $programme)--}}
            {{--                                        <label class="m-checkbox m-checkbox--air m-checkbox--solid m-checkbox--state-brand">--}}
            {{--                                            <input type="checkbox" name="programmes[]" class="programmes" value="{{ $programme->id }}" data-text="{{ $programme->programme_code }}"> {{ $programme->programme_code }}--}}
            {{--                                            <span></span>--}}
            {{--                                        </label>--}}
            {{--                                    @endforeach--}}
            {{--                                </div>--}}
            {{--                            </div>--}}

            {{--                            <div class="form-group m-form__group">--}}
            {{--                                <label for="example_input_full_name">--}}
            {{--                                    Active:--}}
            {{--                                </label>--}}
            {{--                                <div class="row">--}}
            {{--                                    <div class="col-lg-6">--}}
            {{--                                        <label class="m-option">--}}
            {{--                                                                    <span class="m-option__control">--}}
            {{--                                                                        <span class="m-radio m-radio--brand m-radio--check-bold">--}}
            {{--                                                                            <input type="radio" name="active" value="1">--}}
            {{--                                                                            <span></span>--}}
            {{--                                                                        </span>--}}
            {{--                                                                    </span>--}}
            {{--                                            <span class="m-option__label">--}}
            {{--                                                                        <span class="m-option__head">--}}
            {{--                                                                            <span class="m-option__title">--}}
            {{--                                                                                Active--}}
            {{--                                                                            </span>--}}
            {{--                                                                        </span>--}}

            {{--                                                                    </span>--}}
            {{--                                        </label>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="col-lg-6">--}}
            {{--                                        <label class="m-option">--}}
            {{--                                                                    <span class="m-option__control">--}}
            {{--                                                                        <span class="m-radio m-radio--brand m-radio--check-bold">--}}
            {{--                                                                            <input type="radio" name="active" value="0">--}}
            {{--                                                                            <span></span>--}}
            {{--                                                                        </span>--}}
            {{--                                                                    </span>--}}
            {{--                                            <span class="m-option__label">--}}
            {{--                                                                        <span class="m-option__head">--}}
            {{--                                                                            <span class="m-option__title">--}}
            {{--                                                                                Not active--}}
            {{--                                                                            </span>--}}
            {{--                                                                        </span>--}}

            {{--                                                                    </span>--}}
            {{--                                        </label>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}

            {{--                        </div>--}}
            {{--                        <div class="m-portlet__foot m-portlet__foot--fit">--}}
            {{--                            <div class="m-form__actions">--}}
            {{--                                <button type="submit" class="btn btn-primary">--}}
            {{--                                    Submit--}}
            {{--                                </button>--}}
            {{--                                <button type="reset" class="btn btn-secondary">--}}
            {{--                                    Reset--}}
            {{--                                </button>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </form>--}}

            {{--                    <!--end::Form-->--}}
            {{--                </div>--}}



            <!--end::Portlet-->
            </div>

            <div class="col-xl-3">
                <div class="m-portlet">
                    <div class="m-portlet__body">
                        <div class="m-section">
                            <h2 class="m-section__heading">
                                Tips
                            </h2>
                            <div class="m-section__content">
                                <p>
                                    The start and end date are referring to the amendment that can be made before deadline. Once the deadline, any amendment made must give appropriate reason.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">


    $(document).ready(function() {
        $(".btn-submit").click(function(e){
            e.preventDefault();

            $subject_code =  $("select[name='subject_code']").val();
            $students =  $("input[name='no_Students']").val();
            $lecture =  $("select[name='lecturerInfo']").val();


            console.log($subject_code);
            console.log($students);
            console.log($lecture);

            $.ajax({
                url: "{{route('api.validateListing')}}",
                type:'POST',
                data: {subject_code: $subject_code, no_students: $students, lecturerInfo: $lecture},
                success: function(data) {
                    if(data.error)
                    {
                        console.log('error found');
                        displayError(data.error);
                    }
                    else if (data.success)
                    {
                        console.log('no error');
                            $(".alert-danger").find("ul").html('');
                             $(".alert-danger").css('display','none');
                             $("#formID")[0].reset();

                    }
                    else if(data.test123)
                    {
                        console.log('existed');
                    }
                    // if($.isEmptyObject(data.error)){
                    //     alert(data.success);
                    //     $(".alert-danger").find("ul").html('');
                    //     $(".alert-danger").css('display','none');
                    //     console.log(data.test123);
                    //     console.log('dsadas');
                    // }else{
                    //     console.log('ERROR');
                    //     displayError(data.error);
                    // }
                }
            });


        });

        function displayError(msg)
        {
            $(".alert-danger").find("ul").html('');
            $(".alert-danger").css('display','block');
            $.each( msg, function( key, value ) {
                $(".alert-danger").find("ul").append('<li>'+value+'</li>');
            });


        }

    });






</script>
<script>
    $(document).on('click', '.header12', (function () {


        // $header12 = $(this);
        //getting the next element
        $content12 = $(this).parent().next('.content12');

        //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
        $content12.slideToggle(500, function () {

        });

    }));

    $(".selectorCode").select2(
        {
            placeholder : "Select Subject",
            // minimumInputLength : 3,
            allowClear: !0,
            width: '200px',
        }
    );

    $(".selectorLecturer").select2(
        {
            placeholder : "Select Lecturer",
            allowClear: !0,
            width: '200px',
            margin: '2px',
        }
    );

    // $(".selectorCode").val('').trigger('change');
    $(".no_Students").on("change",(function() {
        alert('d');
    }));

    $(".selectorCode").change(function() {
        var code = $(this).val();
        $.ajax({
            url: "{{route('api.listingFields')}}",
            type: 'POST',
            data: {'code' : code},
            dataType: 'json',
            success: function(data) {
                console.log(data.message);
                console.log(data.subjectDetails);

                if(!($.isEmptyObject(data.lecturerMPU)))
                {
                    console.log("mpu t");
                    $('.selectorLecturer').children('option').remove();
                    $('.selectorLecturer').append($("<option></option>"));
                    $.each(data.lecturerMPU, function(key, value) {
                        $('.selectorLecturer')
                            .append($("<option></option>")
                                .attr("value",key.name)
                                .text(value.name));
                    });
                }
                else {
                    console.log("core te");
                    $('.selectorLecturer').children('option').remove();
                    $('.selectorLecturer').append($("<option></option>"));

                    $.each(data.lecturerCore, function(key, value) {
                        $('.selectorLecturer')
                            .append($("<option></option>")
                                .attr("value",key.name)
                                .text(value.name));
                    });


                }
                if( $(".selectorCode").val().length ===0)
                {
                    $('.selectorLecturer').children('option').remove();
                    $("#lec_hrs").val('');
                    $("#lec_sess").val('');
                    $("#on9_hrs").val('');
                    $("#on9_sess").val('');
                    $("#tutorial_hrs").val('');
                    $("#tutorial_sess").val('');
                    $("#pract_hrs").val('');
                    $("#pract_sess").val('');
                }
                else {
                    $("#subject_title").val(data.subjectDetails.title);
                    if((data.subjectDetails.lec_hrs) !== null)
                    {
                        $("#lec_hrs").val(data.subjectDetails.lec_hrs[0]);
                        $("#lec_sess").val(data.subjectDetails.lec_hrs[2]);
                        $("#lec_remark").prop("disabled", false);
                        $("#lec_sess").prop("disabled", false);


                    }
                    else
                    {
                        $("#lec_hrs").val('');
                        $("#lec_sess").val('');
                        $("#lec_remark").prop("disabled", true);
                        $("#lec_sess").prop("disabled", true);


                    }
                    if((data.subjectDetails.tut_hrs) !== null)
                    {
                        $("#tutorial_hrs").val(data.subjectDetails.tut_hrs[0]);
                        $("#tutorial_sess").val(data.subjectDetails.tut_hrs[2]);
                        $("#tut_remark").prop("disabled", false);
                        $("#tutorial_sess").prop("disabled", false);


                    }
                    else
                    {
                        $("#tutorial_hrs").val('');
                        $("#tutorial_sess").val('');
                        $("#tut_remark").prop("disabled", true);
                        $("#tutorial_sess").prop("disabled", true);


                    }
                    if((data.subjectDetails.on_hrs) !== null)

                    {
                        $("#on9_hrs").val(data.subjectDetails.on_hrs[0]);
                        $("#on9_sess").val(data.subjectDetails.on_hrs[2]);
                        $("#on9_remark").prop("disabled", false);
                        $("#on9_sess").prop("disabled", false);


                    }
                    else
                    {

                        $("#on9_hrs").val('');
                        $("#on9_sess").val('');
                        $("#on9_remark").prop("disabled", true);
                        $("#on9_sess").prop("disabled", true);


                    }
                    if((data.subjectDetails.pract_hrs) !== null) {
                        $("#pract_hrs").val(data.subjectDetails.pract_hrs[0]);
                        $("#pract_sess").val(data.subjectDetails.pract_hrs[2]);
                        $("#pract_sess").prop("disabled", false);
                        $("#pract_remark").prop("disabled", false);

                    }
                    else
                    {
                        $("#pract_hrs").val('');
                        $("#pract_sess").val('');
                        $("#pract_sess").prop("disabled", true);
                        $("#pract_remark").prop("disabled", true);

                    }

                }
            },
            error: function(jqXHR, textStatus, errorThrown) {}
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-daterangepicker.js') }}" type="text/javascript"></script>
@endsection
