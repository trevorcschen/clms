@extends('layouts.default')

@section('title', 'Subjects')

@section('subheader', 'Subjects')
@section('subheader-link', route('subjects.index'))

@section('subheader-action', 'Create')

@section('content')

    <div class="m-content">
        <div class="row">
            <div class="col-xl-9">
                <!--begin::Portlet-->
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
                <div class="m-portlet m-portlet--tab">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                                <h3 class="m-portlet__head-text">
                                    Create New Subject
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right" action="{{ route('subjects.store') }}" method="POST">
                        @csrf
                        <div class="m-portlet__body">

                                <div class="form-group m-form__group">
                                    <label for="name">
                                        Subject Code
                                    </label>
                                    <input type="text" value="{{old('code')}}" class="form-control m-input " name="code" id="code" aria-describedby="emailHelp" placeholder="Enter subject code">

                                </div>
                            <div class="form-group m-form__group">
                                <label for="name">
                                    Subject Title
                                </label>
                                <input type="text" class="form-control m-input" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter subject title" value="{{old('title')}}" >
                            </div>
            <div class ="row">
                            <div class="form-group m-form__group" style="margin-left: 20px">
                                <label for="name">
                                    Lecture Hours
                                </label>
                                <input type="text" class="form-control m-input" name="lec_hrs" id="lec_hrs" value="{{old('lec_hrs')}}"  aria-describedby="emailHelp" placeholder="Enter lecture hours"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                            </div>
                            <div class="form-group m-form__group" style="margin-top: -15px">
                                <label for="name">
                                    Lecture Sessions
                                </label>
                                <input type="text" class="form-control m-input" name="lec_sess" id="lec_sess" value="{{old('lec_sess')}}"  aria-describedby="emailHelp" placeholder="Enter lecture sessions"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                            </div>
            </div>
                            <div class ="row">
                                <div class="form-group m-form__group" style="margin-left: 20px">
                                    <label for="name">
                                        Tutorial Hours
                                    </label>
                                    <input type="text" class="form-control m-input" name="tutorial_hrs" id="tutorial_hrs " value="{{old('tutorial_hrs')}}"  aria-describedby="emailHelp" placeholder="Enter tutorial hours"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                                </div>
                                <div class="form-group m-form__group" style="margin-top: -15px">
                                    <label for="name">
                                        Tutorial Sessions
                                    </label>
                                    <input type="text" class="form-control m-input" name="tutorial_sess" id="tutorial_sess"  value="{{old('tutorial_sess')}}" aria-describedby="emailHelp" placeholder="Enter tutorial sessions"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                                </div>
                            </div>
                            <div class="row" >
                                <div class="form-group m-form__group" style="margin-left: 20px">
                                    <label for="name">
                                        Practical Hours
                                    </label>
                                    <input type="text" class="form-control m-input" name="pract_hrs" id="pract_hrs" value="{{old('pract_hrs')}}"  aria-describedby="emailHelp" placeholder="Enter practical hours"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                                </div>
                                <div class="form-group m-form__group" style="margin-top: -15px">
                                    <label for="name">
                                        Practical Sessions
                                    </label>
                                    <input type="text" class="form-control m-input" name="pract_sess" id="pract_sess" value="{{old('pract_sess')}}"  aria-describedby="emailHelp" placeholder="Enter practical sessions"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group m-form__group" style="margin-left: 20px">
                                    <label for="name">
                                        Online Learning Hours
                                    </label>
                                    <input type="text" class="form-control m-input" name="on9_hrs" id="on9_hrs" value="{{old('on9_hrs')}}"  aria-describedby="emailHelp" placeholder="Enter online learning hours"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                                </div>
                                <div class="form-group m-form__group " style="margin-top: -15px">
                                    <label for="name">
                                        Online Learning Sessions
                                    </label>
                                    <input type="text" class="form-control m-input" name="on9_sess" id="on9_sess" value="{{old('on9_sess')}}"  aria-describedby="emailHelp" placeholder="Enter online learning sessions"  oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                                </div>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="name">
                                    Credit Hours
                                </label>
                                <input type="text" class="form-control m-input" name="credit_hrs" id="credit_hrs"  value="{{old('credit_hrs')}}"  aria-describedby="emailHelp" placeholder="Enter credit hours" oninput=" this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/g, '').replace(/(?<!^)-/g, '');">
                            </div>
                            <div class="form-group m-form__group">
                                <label for="name">Pre Requisite </label>
                                <select class="form-control m-input" name="pre-requisites[]" id="pre-requisite"  multiple="multiple">
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->code }}">{{ $subject->code}}</option>
                                    @endforeach
                                </select>
                                <input type="text" id="hidden1" value="sa">
                                <input type="text" id="hidden2" value="sa">
                                <input type="text" id="hidden3" value="sa">
                            </div>
                            <div class="form-group m-form__group">
                                <div class="m-checkbox-list">
                                    <label>Programmes</label>
                                    @foreach($programmes as $programme)
                                        <label class="m-checkbox m-checkbox--air m-checkbox--solid m-checkbox--state-brand">
                                            <input type="checkbox" name="programmes[]" class="programmes"  value="{{ $programme->id }}" data-text="{{ $programme->programme_code }}"> {{ $programme->programme_code }}
                                            <span></span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group m-form__group">
                                <label for="example_input_full_name">
                                    Subject Active:
                                </label>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="m-option">
                                                                    <span class="m-option__control">
                                                                        <span class="m-radio m-radio--brand m-radio--check-bold">
                                                                            <input type="radio" name="active" value="1" @if(Input::old('active')) checked @endif>
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
                                                                            <input type="radio" name="active" value="0" @if(!Input::old('active')) checked @endif>
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
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <button type="submit" class="btn btn-primary">
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
                                    Enter a new programme name and its details.
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            @if($errors->has('code'))
            $("input[name='code']").focus();
            @elseif($errors->first('title'))
            $("input[name='title']").focus();
            @elseif($errors->first('lec_hrs'))
            $("input[name='lec_hrs']").focus();
            @elseif($errors->first('lec_sess'))
            $("input[name='lec_sess']").focus();
            @elseif($errors->first('tutorial_hrs'))
            $("input[name='tutorial_hrs']").focus();
            @elseif($errors->first('tutorial_sess'))
            $("input[name='tutorial_sess']").focus();
            @elseif($errors->first('pract_hrs'))
            $("input[name='pract_hrs']").focus();
            @elseif($errors->first('pract_sess'))
            $("input[name='pract_sess']").focus();
            @elseif($errors->first('on9_hrs'))
            $("input[name='on9_hrs']").focus();
            @elseif($errors->first('on9_sess'))
            $("input[name='on9_sess']").focus();
            @elseif($errors->first('credit_hrs'))
            $("input[name='credit_hrs']").focus();


            @endif


            $("#pre-requisite").select2(
                {
                    placeholder : "Select Subject",
                    minimumInputLength : 3,
                    allowClear : true,
                    tags: true,
                }
            );


            $("#pre-requisite").change(function() {
                // $("#pre-requisite").val()).length > 8 ||
                // console.log($(this).val().toString().length);

                    var code = $(this).val();
                    $.ajax({
                        url: "{{route('api.populatedData')}}",
                        type: 'POST',
                        data: {'code' : code},
                        dataType: 'json',
                        success: function(data) {
                            $("#hidden1").val(data.code);
                            $("#hidden2").val(data['pre-requisite']);
                            $("#hidden3").val(data.title);
                            console.log($('#pre-requisite').val());
                        },
                        error: function(jqXHR, textStatus, errorThrown) {}
                    });
            });

        });
    </script>
    @endsection
