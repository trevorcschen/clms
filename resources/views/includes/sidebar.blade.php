<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
@php ($a = 0)
@foreach( Auth::user()->roles as $role)

    @if($role->name == 'HOP')
        @php ($a=2)
    @elseif($role->name =='Admin')
        @php ($a=1)
    @endif
@endforeach
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div
            id="m_ver_menu"
            class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
            m-menu-vertical="1"
            m-menu-scrollable="0" m-menu-dropdown-timeout="500"
    >

            <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item " aria-haspopup="true" >
                <a  href="{{ route('home') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Home
											</span>
										</span>
									</span>
                </a>
            </li>
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">
                    Menu
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            @if($a == 1)
                         <!-- Users -->
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                            <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-icon flaticon-users"></i>
                                <span class="m-menu__link-text">
										Users
									</span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Users
												</span>
											</span>
                                    </li>

                                        <li class="m-menu__item " aria-haspopup="true" >
                                            <a  href="{{route('users.index')}}" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
                                                        User List
                                                    </span>
                                            </a>
                                        </li>

                                        <li class="m-menu__item " aria-haspopup="true" >
                                            <a  href="{{route('users.create')}}" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
                                                        Create User
                                                    </span>
                                            </a>
                                        </li>

                                </ul>
                            </div>
                        </li>
                         <!-- Subject Rows -->
                             <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                                 <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                     <i class="m-menu__link-icon flaticon-notes"></i>
                                     <span class="m-menu__link-text">
										Subjects
									</span>
                                     <i class="m-menu__ver-arrow la la-angle-right"></i>
                                 </a>
                                 <div class="m-menu__submenu ">
                                     <span class="m-menu__arrow"></span>
                                     <ul class="m-menu__subnav">
                                         <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Subjects
												</span>
											</span>
                                         </li>

                                         <li class="m-menu__item " aria-haspopup="true" >
                                             <a  href="{{route('subjects.index')}}" class="m-menu__link ">
                                                 <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                     <span></span>
                                                 </i>
                                                 <span class="m-menu__link-text">
                                                        Subject List
                                                    </span>
                                             </a>
                                         </li>


                                         <li class="m-menu__item " aria-haspopup="true" >
                                             <a  href="{{route('subjects.create')}}" class="m-menu__link ">
                                                 <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                     <span></span>
                                                 </i>
                                                 <span class="m-menu__link-text">
                                                        Create Subject
                                                    </span>
                                             </a>
                                         </li>
                                     </ul>
                                 </div>
                             </li>
                <!-- Programme Rows-->
                             <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                                 <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                     <i class="m-menu__link-icon flaticon-folder-1"></i>
                                     <span class="m-menu__link-text">
										Programmes
									</span>
                                     <i class="m-menu__ver-arrow la la-angle-right"></i>
                                 </a>
                                 <div class="m-menu__submenu ">
                                     <span class="m-menu__arrow"></span>
                                     <ul class="m-menu__subnav">
                                       <!--  <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Programmes
												</span>
											</span>
                                         </li> -->
                                         <li class="m-menu__item " aria-haspopup="true" >
                                             <a  href="{{route('programmes.details')}}" class="m-menu__link ">
                                                 <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                     <span></span>
                                                 </i>
                                                 <span class="m-menu__link-text">
                                                        Programmes Details
                                                    </span>
                                             </a>
                                         </li>

                                         <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                                         <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                                 <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                     <span></span>
                                                 </i>
                                                 <span class="m-menu__link-text">
                                                        Programmes List
                                                    </span>

                                             </a>
                                             <div class="m-menu__submenu ">
                                                 <span class="m-menu__arrow"></span>
                                                 <ul class="m-menu__subnav">
                                                     @foreach(Session::get('programme') as $test)
                                                         <li class="m-menu__item " aria-haspopup="true" >
                                                             <a  href="{{route('programmes.index', $test->id )}}" class="m-menu__link ">
                                                                 <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                                     <span></span>
                                                                 </i>
                                                             <span class="m-menu__link-text">
                                                        {{$test->programme_code}}
                                                    </span>
                                                             </a>
                                                         </li>
                                                     @endforeach
                                                 </ul>
                                             </div>
                                         </li>

                                         <li class="m-menu__item " aria-haspopup="true" >
                                             <a  href="{{route('programmes.create')}}" class="m-menu__link ">
                                                 <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                     <span></span>
                                                 </i>
                                                 <span class="m-menu__link-text">
                                                        Create Programme
                                                    </span>
                                             </a>
                                         </li>
                                     </ul>
                                 </div>
                             </li>
                <!-- Role Rows -->
                             <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                                 <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                     <i class="m-menu__link-icon flaticon-profile-1"></i>
                                     <span class="m-menu__link-text">
										Roles
									</span>
                                     <i class="m-menu__ver-arrow la la-angle-right"></i>
                                 </a>
                                 <div class="m-menu__submenu ">
                                     <span class="m-menu__arrow"></span>
                                     <ul class="m-menu__subnav">
                                         <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Roles
												</span>
											</span>
                                         </li>

                                             <li class="m-menu__item " aria-haspopup="true" >
                                                 <a  href="{{route('roles.index')}}" class="m-menu__link ">
                                                     <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                         <span></span>
                                                     </i>
                                                     <span class="m-menu__link-text">
                                                        Roles List
                                                    </span>
                                                 </a>
                                             </li>

                                             <li class="m-menu__item " aria-haspopup="true" >
                                                 <a  href="{{route('roles.create')}}" class="m-menu__link ">
                                                     <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                         <span></span>
                                                     </i>
                                                     <span class="m-menu__link-text">
                                                        Create Role
                                                    </span>
                                                 </a>
                                             </li>

                                     </ul>
                                 </div>
                             </li>
                             <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                                 <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                     <i class="m-menu__link-icon flaticon-calendar-2"></i>
                                     <span class="m-menu__link-text">
										Sessions
									</span>
                                     <i class="m-menu__ver-arrow la la-angle-right"></i>
                                 </a>
                                 <div class="m-menu__submenu ">
                                     <span class="m-menu__arrow"></span>
                                     <ul class="m-menu__subnav">
                                         <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Sessions
												</span>
											</span>
                                         </li>
                                             <li class="m-menu__item " aria-haspopup="true" >
                                                 <a  href="{{route('sessions.index')}}" class="m-menu__link ">
                                                     <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                         <span></span>
                                                     </i>
                                                     <span class="m-menu__link-text">
                                                        Session List
                                                    </span>
                                                 </a>
                                             </li>

                                             <li class="m-menu__item " aria-haspopup="true" >
                                                 <a  href="{{route('sessions.create')}}" class="m-menu__link ">
                                                     <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                         <span></span>
                                                     </i>
                                                     <span class="m-menu__link-text">
                                                        Create Session
                                                    </span>
                                                 </a>
                                             </li>
                                     </ul>
                                 </div>
                             </li>
                          <!-- Attachments -->
                             <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                                 <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                     <i class="m-menu__link-icon flaticon-profile-1"></i>
                                     <span class="m-menu__link-text">
										Attachments
									</span>
                                     <i class="m-menu__ver-arrow la la-angle-right"></i>
                                 </a>
                                 <div class="m-menu__submenu ">
                                     <span class="m-menu__arrow"></span>
                                     <ul class="m-menu__subnav">
                                         <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Roles
												</span>
											</span>
                                         </li>

                                         <li class="m-menu__item " aria-haspopup="true" >
                                             <a  href="" class="m-menu__link ">
                                                 <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                     <span></span>
                                                 </i>
                                                 <span class="m-menu__link-text">
                                                        Attachments List
                                                    </span>
                                             </a>
                                         </li>


                                     </ul>
                                 </div>
                             </li>

            @endif
            @if($a == 2)

                <!-- Course Listing -->
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                        <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-folder-1"></i>
                            <span class="m-menu__link-text">
										Course Listing
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="m-menu__submenu ">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                <!--  <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                                     <span class="m-menu__link">
                                         <span class="m-menu__link-text">
                                             Programmes
                                         </span>
                                     </span>
                                  </li> -->
                                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                                    <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">
                                                        Course Listing
                                                    </span>

                                    </a>
                                    <div class="m-menu__submenu ">
                                        <span class="m-menu__arrow"></span>
                                        <ul class="m-menu__subnav">
                                            @foreach(Session::get('programmeA') as $test)
                                                <li class="m-menu__item " aria-haspopup="true" >
                                                    <a  href="{{route('programmes.index', $test->id )}}" class="m-menu__link ">
                                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="m-menu__link-text">
                                                        {{$test->programme_code}}
                                                    </span>
                                                    </a>
                                                </li>
                                                {{--<ul class="m-menu__subnav">--}}
                                                    {{--<li class="m-menu__item" >--}}
                                                        {{--<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>--}}
                                                        {{--<span class="m-menu__link-text">--}}
                                                        {{--DS--}}
                                                    {{--</span></li>--}}
                                                {{--</ul>--}}
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true" >
                                    <a  href="{{route('course_listings.index')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">
                                                       Search for specific Course Listing
                                                    </span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true" >
                                    <a  href="{{route('course_listings.create')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">
                                                        Create new Course Listing
                                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <!-- Session -->
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                        <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-calendar-2"></i>
                            <span class="m-menu__link-text">
										Sessions
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="m-menu__submenu ">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Sessions
												</span>
											</span>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true" >
                                    <a  href="{{route('sessions.index')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">
                                                        Session List
                                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                        <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-folder-1"></i>
                            <span class="m-menu__link-text">
										Programmes
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="m-menu__submenu ">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                <!--  <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                                     <span class="m-menu__link">
                                         <span class="m-menu__link-text">
                                             Programmes
                                         </span>
                                     </span>
                                  </li> -->
                                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                                    <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">
                                                        Programmes List
                                                    </span>

                                    </a>
                                    <div class="m-menu__submenu ">
                                        <span class="m-menu__arrow"></span>
                                        <ul class="m-menu__subnav">
                                            @foreach(Session::get('programmeA') as $test)
                                                <li class="m-menu__item " aria-haspopup="true" >
                                                    <a  href="{{route('programmes.index', $test->id )}}" class="m-menu__link ">
                                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="m-menu__link-text">
                                                        {{$test->programme_code}}
                                                    </span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>


                @endif

            @can('session-list')
                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-calendar-2"></i>
                    <span class="m-menu__link-text">
										Sessions
									</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Sessions
												</span>
											</span>
                        </li>
                        @can('session-list')
                            <li class="m-menu__item " aria-haspopup="true" >
                                <a  href="{{route('sessions.index')}}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">
                                                        Session List
                                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('session-create')
                            <li class="m-menu__item " aria-haspopup="true" >
                                <a  href="{{route('sessions.create')}}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">
                                                        Create Session
                                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('session-restore')
                            <li class="m-menu__item " aria-haspopup="true" >
                                <a  href="{{route('sessions.trash')}}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">
                                                        Trash
                                                    </span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcan
            @can('role-list')
                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-profile-1"></i>
                    <span class="m-menu__link-text">
										Roles
									</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Roles
												</span>
											</span>
                        </li>
                        @can('role-list')
                            <li class="m-menu__item " aria-haspopup="true" >
                                <a  href="{{route('roles.index')}}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">
                                                        Roles List
                                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('role-create')
                            <li class="m-menu__item " aria-haspopup="true" >
                                <a  href="{{ route('roles.create') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">
                                                        Create Role
                                                    </span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcan
            @can('permission-list')
                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-user-ok"></i>
                    <span class="m-menu__link-text">
										Permissions
									</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Permissions
												</span>
											</span>
                        </li>
                        @can('permission-list')
                            <li class="m-menu__item " aria-haspopup="true" >
                                <a  href="{{route('permissions.index')}}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">
                                                        Permission List
                                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('permission-create')
                            <li class="m-menu__item " aria-haspopup="true" >
                                <a  href="{{route('permissions.create')}}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">
                                                        Create Permission
                                                    </span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcan
        </ul>

    </div>
    <!-- END: Aside Menu -->
</div>