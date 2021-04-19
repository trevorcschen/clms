@extends('layouts.default')

@section('title', 'Programmes')

@section('subheader', 'Programmes')
@section('subheader-link', route('home'))

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
                @if($users->isEmpty())
                    <div class="alert alert-danger">
                        Please add more new Head of Programme in order to create a new Programme !!! Please Click <a href="{{route('users.create')}}">This</a> to  be redirected to the creation page of users!!<br>
                        OR Please add create a new role which the role is HOP!!Please Click <a href="{{route('roles.create')}}">This</a> link to be redirected to the creation page of roles!!
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
                                    Create New Programme
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right" action="{{ route('programmes.store') }}" method="POST">
                        @csrf
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group">
                                <label for="name">
                                    Programme Name
                                </label>
                                <input type="text" class="form-control m-input" name="programme_name"  value="{{old('programme_name')}}" id="programme_name" aria-describedby="emailHelp" placeholder="Enter programme name">
                            </div>
                            <div class="form-group m-form__group">
                                <label for="name">
                                    Programme code
                                </label>
                                <input type="text" class="form-control m-input" name="programme_code" id="programme_code"  value="{{old('programme_code')}}" aria-describedby="emailHelp" placeholder="Enter programme name">
                            </div>
                            <div class="form-group m-form__group">
                                <label for="name">
                                    Academic level
                                </label>
                                <select name="academic_level" id="academic_level" class="form-control m-input">
                                    <option selected disabled>Select Academic level</option>
                                    <option value="A-Level">A-Level</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Degree">Degree</option>
                                    <option value="Master">Master</option>
                                </select>
                                {{--<input type="text" class="form-control m-input" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter programme name">--}}
                            </div>

                            <div class="form-group m-form__group">
                                <label for="hop">Head of Programme</label>
                                <select class="form-control m-input" name="hop_id" id="hop">
                                    <option disabled selected >Select HOP</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="example_input_full_name">
                                    Programme Active:
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
                                                                        <span class="m-option__body">
                                                                            Programme will be available for new registration.
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
                                                                        <span class="m-option__body">
                                                                            Programme will not be available for new registration.
                                                                        </span>
                                                                    </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(!$users->isEmpty())
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

                            @endif

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
