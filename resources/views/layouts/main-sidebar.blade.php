<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">

            @if(auth('web')->check())
              @include('layouts.sidebar.Admin-main-sidebar')
              
               @endif

               @if(auth('student')->check())
                @include('layouts.sidebar.Student-main-sidebar')
               
               @endif

                  @if(auth('teacher')->check())
                    @include('layouts.sidebar.Teacher-main-sidebar')
                    
                    @endif

              @if(auth('parent')->check())
                @include('layouts.sidebar.Parent-main-sidebar')
                

        @endif




        </div>

        <!-- Left Sidebar End-->

        <!--=================================
