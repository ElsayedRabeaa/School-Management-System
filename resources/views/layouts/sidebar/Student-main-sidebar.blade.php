<div class="scrollbar side-menu-bg">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{url('dashboard')}}" >
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{ trans('main-sidebar_trans.Dashboard') }}</span>
                </div>
                <div class="clearfix"></div>
            </a>
            
        </li>

        
      
         <li>
            
            <a href="{{route('profile.index')}}"> <div class="pull-left"><i class="ti-user"></i><span class="right-nav-text"> 
                 {{ trans('main-header.profile') }}</span></div></a>
               
        </li>
      
       


        <!-- menu item Attendence-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
                <div class="pull-left"><i class="fa fa-book" aria-hidden="true"></i><span class="right-nav-text"> {{ trans('subject.subject_favicon') }}
                        </span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="students-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{ route('sbjs') }}"> {{ trans('main-sidebar_trans.Subjects_list') }}</a> </li>
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
                <li> <a href="{{ route('Exams_students.index') }}">{{ trans('main-sidebar_trans.exams') }} </a> </li>
            </ul>
        </li>
       

    



    </ul>
</div>