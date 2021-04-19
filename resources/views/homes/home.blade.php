@extends('layouts.default')

@section('title', 'Home')

@section('subheader', 'Home')
@section('subheader-link', route('home'))


@section('content')
    <div class="m-content">
        @if (session('status'))
            <div class="m-alert m-alert--icon m-alert--air alert alert-success alert-dismissible fade show"
                 role="alert">
                <div class="m-alert__icon">
                    <i class="la la-warning"></i>
                </div>
                <div class="m-alert__text">
                    <strong>
                        Well done!
                    </strong>
                    {{ session('status') }}
                </div>
                <div class="m-alert__close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @role('RO')
            <!--begin:: Widgets/Stats-->
            <div class="m-portlet ">
                    <div class="m-portlet__body  m-portlet__body--no-padding">
                        <div class="row m-row--no-padding m-row--col-separator-xl">
                            <div class="col-md-12 col-lg-6 col-xl-3">
                                <!--begin::Total Profit-->
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">
                                            Total Leaves
                                        </h4>
                                        <br>
                                        <span class="m-widget24__desc">
                                                            Leave Count
                                                        </span>
                                        <span class="m-widget24__stats m--font-brand">
                                                            {{ $widget['leaveCount'] }}
                                                        </span>
                                        <div class="m--space-10"></div>
                                        <div class="progress m-progress--sm">
                                            <div class="progress-bar m--bg-brand" role="progressbar"
                                                 style="width: {{ $widget['leavePercent'] }}%;" aria-valuenow="50"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="m-widget24__change">
                                                            Leave Pending Approval
                                                        </span>
                                        <span class="m-widget24__number">
                                                            {{ $widget['leavePercent'] }}%
                                                        </span>
                                    </div>
                                </div>
                                <!--end::Total Profit-->
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-3">
                                <!--begin::New Feedbacks-->
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">
                                            Total Subjects
                                        </h4>
                                        <br>
                                        <span class="m-widget24__desc">
                                                            Subject Active
                                                        </span>
                                        <span class="m-widget24__stats m--font-info">
                                                            {{ $widget['activeSubjectCount'] }}
                                                        </span>
                                        <div class="m--space-10"></div>
                                        <div class="progress m-progress--sm">
                                            <div class="progress-bar m--bg-info" role="progressbar"
                                                 style="width: {{ $widget['subjectPercent'] }}%;" aria-valuenow="50"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="m-widget24__change">
                                                            Active
                                                        </span>
                                        <span class="m-widget24__number">
                                                            {{ $widget['subjectPercent'] }}%
                                                        </span>
                                    </div>
                                </div>
                                <!--end::New Feedbacks-->
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-3">
                                <!--begin::New Orders-->
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">
                                            Total Users
                                        </h4>
                                        <br>
                                        <span class="m-widget24__desc">
                                                            User Active
                                                        </span>
                                        <span class="m-widget24__stats m--font-danger">
                                                            {{ $widget['activeUserCount'] }}
                                                        </span>
                                        <div class="m--space-10"></div>
                                        <div class="progress m-progress--sm">
                                            <div class="progress-bar m--bg-danger" role="progressbar"
                                                 style="width: {{ $widget['userPercent'] }}%;" aria-valuenow="50"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="m-widget24__change">
                                                            Active
                                                        </span>
                                        <span class="m-widget24__number">
                                                            {{ $widget['userPercent'] }}%
                                                        </span>
                                    </div>
                                </div>
                                <!--end::New Orders-->
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-3">
                                <!--begin::New Users-->
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">
                                            Total Programmes
                                        </h4>
                                        <br>
                                        <span class="m-widget24__desc">
                                                        Programme Active
                                                        </span>
                                        <span class="m-widget24__stats m--font-success">
                                                            {{ $widget['activeProgrammeCount'] }}
                                                        </span>
                                        <div class="m--space-10"></div>
                                        <div class="progress m-progress--sm">
                                            <div class="progress-bar m--bg-success" role="progressbar"
                                                 style="width: {{ $widget['programmePercent'] }}%;" aria-valuenow="50"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="m-widget24__change">
                                                            Active
                                                        </span>
                                        <span class="m-widget24__number">
                                                            {{ $widget['programmePercent'] }}%
                                                        </span>
                                    </div>
                                </div>
                                <!--end::New Users-->
                            </div>
                        </div>
                    </div>
                </div>
            <!--end:: Widgets/Stats-->
            <!--begin:: Widgets/Last Updates-->
            <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Latest Leave Updates
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <!--begin::widget 12-->
                        <div class="m-widget4">
                            @foreach($leaves as $leave)
                                <div class="m-widget4__item m-widget4__item-border">
                                    <div class="m-widget4__ext">
                                                                <span class="m-widget4__icon m--font-brand">
                                                                    <i class="flaticon-user"></i>
                                                                </span>
                                    </div>
                                    <div class="m-widget4__info">
                                                                <span class="m-widget4__title">
                                                                    {{ $leave->user->inti_id }}
                                                                </span><br>
                                        <span class="m-widget4__sub">
                                                                    {{ $leave->user->name }}
                                                                </span>
                                    </div>
                                    <div class="m-widget47__ext">
                                        @if($leave->approved)
                                            <span class="m-badge m-badge--success m-badge--wide">Approved</span>
                                        @elseif(!isset($leave->approved))
                                            <span class="m-badge m-badge--warning m-badge--wide">Pending</span>
                                        @else
                                            <span class="m-badge m-badge--danger m-badge--wide">Rejected</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--end::Widget 12-->
                    </div>
                </div>
            <!--end:: Widgets/Last Updates-->
        @else
            <!--begin:: Widgets/Stats-->
            <div class="m-portlet ">
                    <div class="m-portlet__body  m-portlet__body--no-padding">
                        <div class="row m-row--no-padding m-row--col-separator-xl">
                            <div class="col-md-12 col-lg-6 col-xl-3">
                                <!--begin::Total Profit-->
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">
                                            Total Leaves
                                        </h4>
                                        <br>
                                        <span class="m-widget24__desc">
                                                            Leave Count
                                                        </span>
                                        <span class="m-widget24__stats m--font-brand">
                                                            {{ $widget['leaveCount'] }}
                                                        </span>
                                        <div class="m--space-10"></div>
                                    </div>
                                </div>
                                <!--end::Total Profit-->
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-3">
                                <!--begin::New Feedbacks-->
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">
                                            Pending Leaves
                                        </h4>
                                        <br>
                                        <span class="m-widget24__desc">
                                                            Total
                                                        </span>
                                        <span class="m-widget24__stats m--font-info">
                                                            {{ $widget['pendingLeaveCount'] }}
                                                        </span>
                                        <div class="m--space-10"></div>
                                        <div class="progress m-progress--sm">
                                            <div class="progress-bar m--bg-info" role="progressbar"
                                                 style="width: {{ $widget['pendingLeavePercent'] }}%;" aria-valuenow="50"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="m-widget24__change">
                                                            Percent
                                                        </span>
                                        <span class="m-widget24__number">
                                                            {{ $widget['pendingLeavePercent'] }}%
                                                        </span>
                                    </div>
                                </div>
                                <!--end::New Feedbacks-->
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-3">
                                <!--begin::New Orders-->
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">
                                            Approved Leaves
                                        </h4>
                                        <br>
                                        <span class="m-widget24__desc">
                                                            Total
                                                        </span>
                                        <span class="m-widget24__stats m--font-danger">
                                                            {{ $widget['approvedLeaveCount'] }}
                                                        </span>
                                        <div class="m--space-10"></div>
                                        <div class="progress m-progress--sm">
                                            <div class="progress-bar m--bg-danger" role="progressbar"
                                                 style="width: {{ $widget['approvedLeavePercent'] }}%;" aria-valuenow="50"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="m-widget24__change">
                                                            Percent
                                                        </span>
                                        <span class="m-widget24__number">
                                                            {{ $widget['approvedLeavePercent'] }}%
                                                        </span>
                                    </div>
                                </div>
                                <!--end::New Orders-->
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-3">
                                <!--begin::New Users-->
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">
                                            Rejected Leaves
                                        </h4>
                                        <br>
                                        <span class="m-widget24__desc">
                                                        Total
                                                        </span>
                                        <span class="m-widget24__stats m--font-success">
                                                            {{ $widget['rejectedLeaveCount'] }}
                                                        </span>
                                        <div class="m--space-10"></div>
                                        <div class="progress m-progress--sm">
                                            <div class="progress-bar m--bg-success" role="progressbar"
                                                 style="width: {{ $widget['rejectedLeavePercent'] }}%;" aria-valuenow="50"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="m-widget24__change">
                                                            Percent
                                                        </span>
                                        <span class="m-widget24__number">
                                                            {{ $widget['rejectedLeavePercent'] }}%
                                                        </span>
                                    </div>
                                </div>
                                <!--end::New Users-->
                            </div>
                        </div>
                    </div>
                </div>
            <!--end:: Widgets/Stats-->
            <!--begin:: Widgets/Last Updates-->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Latest Leave Updates
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin::widget 12-->
                    <div class="m-widget4">
                        @foreach($leaves as $leave)
                            <div class="m-widget4__item m-widget4__item-border">
                                <div class="m-widget4__ext">
                                                            <span class="m-widget4__icon m--font-brand">
                                                                <i class="flaticon-user"></i>
                                                            </span>
                                </div>
                                <div class="m-widget4__info">
                                                            <span class="m-widget4__title">
                                                                {{ $leave->user->inti_id }}
                                                            </span><br>
                                    <span class="m-widget4__sub">
                                                                {{ $leave->user->name }}
                                                            </span>
                                </div>
                                <div class="m-widget47__ext">
                                    @if($leave->approved)
                                        <span class="m-badge m-badge--success m-badge--wide">Approved</span>
                                    @elseif(!isset($leave->approved))
                                        <span class="m-badge m-badge--warning m-badge--wide">Pending</span>
                                    @else
                                        <span class="m-badge m-badge--danger m-badge--wide">Rejected</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--end::Widget 12-->
                </div>
            </div>
            <!--end:: Widgets/Last Updates-->
        @endrole


    </div>
@endsection

