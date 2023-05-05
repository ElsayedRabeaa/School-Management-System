<div class="scrollbar side-menu-bg">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{ trans('main-sidebar_trans.Dashboard') }}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                <div class="pull-left"><i class="ti-palette"></i><span
                        class="right-nav-text">{{ trans('main-sidebar_trans.grades') }}

                    </span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="elements" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{ route('grade_list.index') }}">{{ trans('main-sidebar_trans.grade_list') }}</a>
                </li>

            </ul>
        </li>
        <!-- menu item calendar-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#section-menu">
                <div class="pull-left"><i class="ti-calendar"></i><span
                        class="right-nav-text">{{ trans('main-sidebar_trans.classes') }}

                    </span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="section-menu" class="collapse" >
                <li> <a href="{{ route('classroom.index') }}">
                        {{ trans('main-sidebar_trans.classes_list') }}</a></li>
                {{-- <li> <a href="calendar-list.html">List Calendar</a> </li> --}}
            </ul>
        </li>
        <!-- menu item todo-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                <div class="pull-left"><i class="fa fa-repeat mr-1" aria-hidden="true"></i> <span
                        class="right-nav-text">{{ trans('main-sidebar_trans.sections') }}

                    </span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>

            <ul id="calendar-menu" class="collapse" >
                <li> <a href="{{ route('section.index') }}">
                        {{ trans('main-sidebar_trans.sections_list') }}</a> </li>
            </ul>
        </li>
        <!-- menu item students-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
                <div class="pull-left"><i class="fa fa-users" aria-hidden="true"></i><span
                        class="right-nav-text">{{ trans('main-sidebar_trans.students') }}
                    </span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="students-menu" class="collapse" data-parent="#sidebarnav">
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#students">
                        <div class="pull-left"><i class="fa fa-users" aria-hidden="true"></i><span
                                class="right-nav-text">{{ trans('main-sidebar_trans.students') }}
                            </span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="students" class="collapse" >
                        <li> <a href="{{ route('students.index') }}"> {{ trans('main-sidebar_trans.students') }}</a>
                        </li>
                        <li> <a href="{{ route('students.create') }}">
                                {{ trans('main-sidebar_trans.create_student') }}</a> </li>
                       
                    </ul>
                </li>


                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#promotions">
                        <div class="pull-left"><i class="fa fa-users" aria-hidden="true"></i><span
                                class="right-nav-text">{{ trans('main-sidebar_trans.promotions') }}
                            </span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="promotions" class="collapse" >

                        <li> <a href="{{ route('promotion.index') }}">
                                {{ trans('main-sidebar_trans.promotions') }}</a> </li>
                        <li> <a href="{{ route('promotion.create') }}">
                                {{ trans('main-sidebar_trans.manage_pro') }}</a> </li>
                    </ul>

                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#graduates">
                        <div class="pull-left"><i class="fa fa-graduation-cap" aria-hidden="true" ></i><span
                                class="right-nav-text">{{ trans('main-sidebar_trans.graduates') }}
                            </span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="graduates" class="collapse" >
                        <li> <a href="{{ route('Graduates.index') }}">
                                {{ trans('main-sidebar_trans.graduates') }}</a>
                        </li>
                        <li> <a href="{{ route('Graduates.create') }}">
                                {{ trans('main-sidebar_trans.add_grads') }}</a>
                        </li>
                    </ul>

                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#fees">
                        <div class="pull-left"><i class="fa fa-money" aria-hidden="true"></i><span
                                class="right-nav-text">{{ trans('main-sidebar_trans.fees') }}
                            </span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="fees" class="collapse" >

                        <li> <a href="{{ route('Fees.index') }}"> {{ trans('main-sidebar_trans.fees') }}</a> </li>
                        <li> <a href="{{ route('Fees_Invoices.index') }}">
                                {{ trans('main-sidebar_trans.add_fees') }}</a> </li>
                        <li> <a href="{{ route('receipt_students.index') }}">
                                {{ trans('main-sidebar_trans.add_recipt_students') }}</a> </li>
                                 <li> <a href="{{ route('ProcessFees.index') }}">
                                {{ trans('main-sidebar_trans.restore') }}</a> </li>
                    </ul>
                </li>
            </ul>
        </li>

        <!-- menu item mailbox-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#teachers-menu">
                <div class="pull-left"><i class="fa fa-users" aria-hidden="true"></i><span
                        class="right-nav-text">{{ trans('main-sidebar_trans.teachers') }}

                    </span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="teachers-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{ route('Teacher.index') }}">{{ trans('main-sidebar_trans.teachers') }} </a> </li>
            </ul>
        </li>
        <!-- menu item Attendence-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendence-menu">
                <div class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i> <span
                        class="right-nav-text">

                        {{ trans('main-sidebar_trans.attendence') }}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Attendence-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{ route('Attendence.index') }}">{{ trans('main-sidebar_trans.attendence_list') }}</a>
                </li>
            </ul>
        </li>
        <!-- menu item Form-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#quizes">
                <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">
                        {{ trans('main-sidebar_trans.test') }}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="quizes" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{ route('Quizs.index') }}">{{ trans('main-sidebar_trans.Quizs') }}</a> </li>
                <li> <a href="{{ route('Questions.index') }}">{{ trans('main-sidebar_trans.Questions') }}</a> </li>
            </ul>
        </li>
        <!-- menu item Charts-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                <div class="pull-left"><i class="fa fa-child" aria-hidden="true"></i><span
                        class="right-nav-text">{{ trans('main-sidebar_trans.parents') }}

                    </span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="chart" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{ url('add_parent') }}">{{ trans('main-sidebar_trans.Add_Parent') }}</a>
                </li>
            </ul>
        </li>


        <!-- menu item Attendence-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#subjects-menu">
                <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">
                        {{ trans('main-sidebar_trans.Subjects') }} </span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="subjects-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{ route('Subjects.index') }}"> {{ trans('main-sidebar_trans.Subjects_list') }} </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams-menu">
                <div class="pull-left"><i class="ti-calendar"></i><span
                        class="right-nav-text">{{ trans('main-sidebar_trans.exams') }}

                    </span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="exams-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{ route('Exams.index') }}">{{ trans('main-sidebar_trans.exams') }} </a> </li>
            </ul>
        </li>
        <!-- menu item Form-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                <div class="pull-left"><i class="fa fa-book" aria-hidden="true"></i><span class="right-nav-text">
                        {{ trans('main-sidebar_trans.library') }}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Form" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{ route('Library.index') }}">{{ trans('main-sidebar_trans.books') }}</a> </li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#online_classes">
                <div class="pull-left"><i class="fa fa-microphone" aria-hidden="true"></i><span
                        class="right-nav-text">
                        {{ trans('main-sidebar_trans.online_meeetings') }}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="online_classes" class="collapse" data-parent="#sidebarnav">
                <li> <a href="https://meet.google.com"> Google meet</a> </li>
            </ul>
        </li>
        {{-- settings --}}
        <li>

            <a href="{{ url('settings') }}">
                <div class="pull-left"><i class="fa fa-cogs" aria-hidden="true"></i><span
                        class="right-nav-text">{{ trans('main-sidebar_trans.settings') }}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>





    </ul>
</div>
