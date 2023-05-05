        <!--=================================
 header start-->
        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row" >
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper" id="logo">
                <a class="navbar-brand brand-logo" href="#" ><i class="fa fa-graduation-cap" aria-hidden="true" style="color: green"></i></a>  
         
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                {{-- <li class="nav-item">
                   <img src="{{ URL::asset('assets/images/logo.png') }}" alt="" >
                        <i class="zmdi zmdi-menu ti-align-right">
                </li> --}}

                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>
               
            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">

                <div class="btn-group mb-1">
                    <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      @if (App::getLocale() == 'ar')
                      {{ LaravelLocalization::getCurrentLocaleName() }}
                     <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
                      @else
                      {{ LaravelLocalization::getCurrentLocaleName() }}
                      <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
                      @endif
                      </button>
                    <div class="dropdown-menu">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                        @endforeach
                    </div>
                </div>
        
               <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>
                 {{-- <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="ti-bell"></i>
                        <span class="badge badge-danger notification-status"> </span>
                    </a>
                     <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                        <div class="dropdown-header notifications">
                            <strong>{{trans('main-header.notifications')}}</strong>
                       <span class="badge badge-pill badge-warning">عدد الاشعارات{{auth()->user()->unreadNotifications->get()}}</span> 
                        </div>
                    @foreach(auth()->user()->unreadNotifications as $notification)
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">{{$notification->data['title']}}<small
                                class="float-right text-muted time">{{trans('main-header.now')}}</small> </a>
                       
                    </div>
                    @endforeach 
                </li> --}}
               
                <li class="nav-item dropdown mr-30">
                     <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ URL::asset('assets/images/avatar.jpg')}}" alt="avatar">
                    </a> 
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    {{-- <h5 class="mt-0 mb-0">{{ Auth::user()->Name }}</h5> --}}

                                  {{-- <span>{{auth()->user()->email}}  </span>  --}}
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        {{-- الرسائل اللي هتيجي علي ايميل المدرسة او الجامعة اللي انا حطيته ف ملف الاعدادات --}}
                        
                        <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>{{trans('main-header.messages')}}</a>
                        @if(auth('teacher')->check())
                        <a class="dropdown-item" href="{{route('teacher_profile')}}"><i class="text-warning ti-user"></i>{{trans('main-header.profile')}}</a>
                        @endif
                        @if(auth('web')->check())
                        <a class="dropdown-item" href="{{route('admin_profile')}}"><i class="text-warning ti-user"></i>{{trans('main-header.profile')}}</a>
                        @endif
                        @if(auth('student')->check())
                        <a class="dropdown-item" href="{{route('student_profile')}}"><i class="text-warning ti-user"></i>{{trans('main-header.profile')}}</a>
                        @endif
                        @if(auth('parent')->check())
                        <a class="dropdown-item" href="{{route('parent_profile')}}"><i class="text-warning ti-user"></i>{{trans('main-header.profile')}}</a>
                        @endif
                       
                        <div class="dropdown-divider"></div>
                        {{-- admin --}}
                        @if(auth('web')->check())
                        <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           
                            <i class="fa fa-sign-out" aria-hidden="true" style="color: red"></i>
                            
                            {{trans('main-header.logout')}}
                        
                        </a>
                        @endif

                        <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>


                        {{-- teacher --}}
                        @if(auth('teacher')->check())
                        <a class="dropdown-item" href="{{ url('logout_teacher') }}" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">
                           
                            <i class="fa fa-sign-out" aria-hidden="true" style="color: red"></i>
                            
                            {{trans('main-header.logout')}}
                        
                        </a>
                        @endif

                        <form id="logout-form2" action="{{ url('logout_teacher') }}" method="POST" class="d-none">
                            @csrf
                        </form>


                        {{-- student --}}
                        @if(auth('student')->check())
                         <a class="dropdown-item" href="{{ url('logout_student') }}" onclick="event.preventDefault(); document.getElementById('logout-form3').submit();">
                           
                            <i class="fa fa-sign-out" aria-hidden="true" style="color: red"></i>
                            
                            {{trans('main-header.logout')}}
                        </a>
                        @endif

                        <form id="logout-form3" action="{{ url('logout_student') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        {{-- parent --}}
                        @if(auth('parent')->check())
                        <a class="dropdown-item" href="{{ url('logout_parent') }}" onclick="event.preventDefault(); document.getElementById('logout-form4').submit();">
                           
                            <i class="fa fa-sign-out" aria-hidden="true" style="color: red"></i>
                            
                            {{trans('main-header.logout')}}
                        
                        </a>
                        @endif

                        
                        <form id="logout-form4" action="{{ url('logout_parent') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <!--=================================
 header End-->
