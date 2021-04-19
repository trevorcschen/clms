@extends('layouts.default')

@section('title', 'Roles')

@section('subheader', 'Roles')
@section('subheader-link', route('roles.index'))

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
                                    Create New Role
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right" action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group">
                                <label for="name">
                                    Name
                                </label>
                                <input type="text" class="form-control m-input" name="name" id="name" value="{{ old('name') }}" placeholder="Enter name">
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
                                    Enter a new role details.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
