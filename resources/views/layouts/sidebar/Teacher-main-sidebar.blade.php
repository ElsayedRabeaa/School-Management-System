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
            <a href="{{ route('show_profile') }}">
                <div class="pull-left"><i class="ti-user"></i><span class="right-nav-text">
                        {{ trans('main-header.profile') }}</span></div>


            </a>
        </li>


        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#quizes">
                <div class="pull-left"><i class="fa fa-book" aria-hidden="true"></i><span class="right-nav-text">
                        {{ trans('main-sidebar_trans.test') }}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="quizes" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{ route('Quizs') }}"> {{ trans('main-sidebar_trans.test') }}</a> </li>
               
            </ul>
        </li>
        {{-- php artisan make:controller Students/dashboard/StdsController  --}}

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#reports">
                <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">
                        {{ trans('teacher.reports') }}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="reports" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{ url('/ar/attendence_reports') }}">{{ trans('teacher.attendence_reports') }}</a> </li>
                {{-- <li> <a href="{{ url('/ar/attendence_reports') }}">{{ trans('teacher.exam_reports') }}</a> </li> --}}
                {{-- <li> <a href="{{route('')}}"> العملبات {{ trans('main-sidebar_trans.attendence_list') }}</a> </li> --}}
            </ul>
        </li>



     


      




    </ul>
</div>
