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
                                    Create New Listing
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right" action="{{ route('course_listings.store') }}" method="POST">
                        @csrf
                        <div class="m-portlet__body">

                            <div class="form-group m-form__group">
                                <label for="session-range">Start Date - End Date</label>
                                <input type="text" class="form-control" name="date" id="session-range" readonly="" placeholder="Select time">
                            </div>
                            <div class="form-group m-form__group">
                                <label for="hop">Intake Session for the Course Listing</label>
                                <select class="form-control m-input" name="session_id" id="session_id">
                                    @foreach($sessions as $session)
                                        <option value="{{ $session->id }}">{{ $session->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group m-form__group">
                                <div class="m-checkbox-list">
                                    <label>Programmes</label>
                                    @foreach($programmes as $programme)
                                        <label class="m-checkbox m-checkbox--air m-checkbox--solid m-checkbox--state-brand">
                                            <input type="checkbox" name="programmes[]" class="programmes" value="{{ $programme->id }}" data-text="{{ $programme->programme_code }}"> {{ $programme->programme_code }}
                                            <span></span>
                                        </label>
                                    @endforeach
                                </div>
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
                                                                            <input type="radio" name="active" value="1">
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
                                                                            <input type="radio" name="active" value="0">
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
    <script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-daterangepicker.js') }}" type="text/javascript"></script>
@endsection