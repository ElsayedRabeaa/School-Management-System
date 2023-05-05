<div class="scrollbar side-menu-bg">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{url('dashboard')}}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{ trans('main-sidebar_trans.Dashboard') }}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        
 
        
        <li>
           
            <a href="{{route('profile.index')}}" >   <div class="pull-left"><i class="ti-user"></i><span class="right-nav-text"> 
                {{ trans('main-header.profile') }}</span></div></a>
               
        </li>

   
        <li>
             <a href="{{ route('Parents.index') }}"><div class="pull-left"><i class="fa fa-child" aria-hidden="true"></i>
                <span class="right-nav-text">  الابناء  </span></div></a> 
            
            </li>
                <li> <a href="{{route('fee_p.index')}}"> <div class="pull-left"><i class="fa fa-money" aria-hidden="true"></i>  <span class="right-nav-text">  {{ trans('main-sidebar_trans.fees') }}</span></div>   </a> </li>


                <li> <a href="{{ route('Attendence_p.index') }}">  <div class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i>  <span class="right-nav-text">   {{ trans('main-sidebar_trans.attendence_list') }} </span></div>  </a> </li>
          
        
       
      

    



    </ul>
</div>