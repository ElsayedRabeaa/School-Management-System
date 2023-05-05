<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
   @section("title")
   {{ trans('teacher.teacher_page') }}
   @stop
    @include('layouts.head')
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        {{-- <div id="pre-loader">
            <img src="assets/images/pre-loader/loader-01.svg" alt="">
        </div> --}}

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0">{{ trans('teacher.teacher_page') }}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        {{-- <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i> 
                                        <i class="fa fa-line-chart  highlight-icon" aria-hidden="true"></i> --}}
                                        <i class="fa fa-users   highlight-icon" aria-hidden="true"></i>

                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">  {{ trans('teacher.count_students') }}</p>
                                    <h4>{{$count_students}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> 
                                <a href="{{route('students_t')}}"> {{ trans('teacher.students_t') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
               
                
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                <i class="fa fa-binoculars   highlight-icon" aria-hidden="true"></i>

                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">  {{ trans('teacher.count_sections') }}</p>
                                    <h4>{{$count_sections}}</h4>

                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-repeat mr-1" aria-hidden="true"></i> 
                              <a href="{{route('sections')}}"> {{ trans('teacher.sections') }} </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Orders Status widgets-->
          
           
            <div class="row">
              
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-500">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 class="card-title" style="color:blue"> {{ trans('teacher.five') }}    </h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="teachers-tab" data-toggle="tab"
                                                    href="#teachers" role="tab" aria-controls="teachers"
                                                    aria-selected="true"> {{ trans('teacher.teachers') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="students-tab" data-toggle="tab" href="#students"
                                                    role="tab" aria-controls="students" aria-selected="false">{{ trans('teacher.students') }}
                                                </a>
                                            </li>

                                             <li class="nav-item">
                                                <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                                    role="tab" aria-controls="parents" aria-selected="false">{{ trans('teacher.parents') }} 
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="classroom-tab" data-toggle="tab" href="#classroom"
                                                    role="tab" aria-controls="classroom" aria-selected="false"> {{ trans('teacher.classes') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    {{-- teachers --}}
                                    <div class="tab-pane fade active show" id="teachers" role="tabpanel"
                                        aria-labelledby="teachers-tab">

                                        <div class="table-responsive mt-15">
                                            <table  class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                                   style="text-align: center">
                                                <thead>
                                                <tr class="table-success">
                                                    <th>#</th>
                                                    <th>{{ trans('teacher.teacher_name') }} </th>
                                                    <th>{{ trans('teacher.type') }}</th>
                                                    <th> {{ trans('teacher.job_date') }}</th>
                                                    <th> {{ trans('teacher.add_date') }}</th>
                                                </tr>
                                                     </thead>
                                                @forelse (\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                                <tbody>
                                                    <tr>
                                                       
                                                        <td>{{ $teacher->id}}</td>
                                                        <td>{{$teacher->Name}}</td>
                                                        <td>{{$teacher->genders->Name}}</td>
                                                        <td>{{$teacher->Joining_Date}}</td>
                                                        <td>{{$teacher->Joining_Date}}</td>
                                                        <td>
                                                            @empty
                                                            <td class="alert-danger" colspan"8">  {{ trans('teacher.no_date') }}</td>
                                                    </tr>
                                                </tbody>
                                                    @endforelse
                                            </table>
                                        </div>

                                    </div>
                                    {{--students--}}
                                    <div class="tab-pane fade active show" id="students" role="tabpanel"
                                    aria-labelledby="students-tab">

                                    <div class="table-responsive mt-15">
                                        <table  class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr class="table-success">
                                                
                                                <th>#</th>
                                                <th>{{ trans('teacher.student_name') }} </th>
                                                <th>{{ trans('teacher.type') }}</th>
                                                <th> {{ trans('teacher.job_date') }}</th>
                                                <th> {{ trans('teacher.add_date') }}</th>
                                            </tr>
                                                 </thead>
                                            @forelse (\App\Models\Student::latest()->take(5)->get() as $Student)
                                            <tbody>
                                                <tr>
                                                   
                                                    <td>{{ $Student->id}}</td>
                                                    <td>{{$Student->Name}}</td>
                                                    <td>{{$Student->genders->Name}}</td>
                                                    <td>{{$Student->Joining_Date}}</td>
                                                    <td>{{$Student->Joining_Date}}</td>
                                                    <td>
                                                        @empty
                                                        <td class="alert-danger" colspan"8">  {{ trans('teacher.no_date') }}</td>

                                                </tr>
                                            </tbody>
                                                @endforelse
                                        </table>
                                    </div>

                                </div>
                                    {{--parents--}}

                                <div class="tab-pane fade active show" id="parents" role="tabpanel"
                                aria-labelledby="parents-tab">

                                <div class="table-responsive mt-15">
                                    <table  class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="table-success">
                                            <th>#</th>
                                            <th>{{ trans('teacher.Myparent_name') }} </th>
                                            <th>{{ trans('teacher.type') }}</th>
                                            <th> {{ trans('teacher.job_date') }}</th>
                                            <th> {{ trans('teacher.add_date') }}</th>
                                        </tr>
                                             </thead>
                                        @forelse (\App\Models\Myparent::latest()->take(5)->get() as $Myparent)
                                        <tbody>
                                            <tr>
                                               
                                                <td>{{ $Myparent->id}}</td>
                                                <td>{{$Myparent->Name}}</td>
                                                {{-- <td>{{$Myparent->genders->Name}}</td> --}}
                                                <td>{{$Myparent->Joining_Date}}</td>
                                                <td>{{$Myparent->Joining_Date}}</td>
                                                <td>
                                                    @empty
                                                    <td class="alert-danger" colspan"8">  {{ trans('teacher.no_date') }}</td>

                                            </tr>
                                        </tbody>
                                            @endforelse
                                    </table>
                                </div>

                            </div>
                                    {{--classroom--}}

                                    <div class="tab-pane fade" id="classroom" role="tabpanel" aria-labelledby="classroom-tab">  
                                        <div class="table-responsive mt-15">
                                            <table  class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                                   style="text-align: center">
                                                <thead>
                                                <tr class="table-success">
                                                    <th>#</th>
                                                    <th>{{ trans('teacher.Classroom_name') }} </th>
                                                    <th>{{ trans('teacher.type') }}</th>
                                                    <th> {{ trans('teacher.job_date') }}</th>
                                                    <th> {{ trans('teacher.add_date') }}</th>
                                                </tr>
                                                     </thead>
                                                @forelse (\App\Models\Classroom::latest()->take(5)->get() as $Classroom)
                                                <tbody>
                                                    <tr>
                                                       
                                                        <td>{{ $Classroom->id}}</td>
                                                        <td>{{$Classroom->Name}}</td>
                                                        {{-- <td>{{$Classroom->genders->Name}}</td> --}}
                                                        <td>{{$Classroom->Joining_Date}}</td>
                                                        <td>{{$Classroom->Joining_Date}}</td>
                                                        <td>
                                                            @empty
                                                            <td class="alert-danger" colspan"8">  {{ trans('teacher.no_date') }}</td>

                                                    </tr>
                                                </tbody>
                                                    @endforelse
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>