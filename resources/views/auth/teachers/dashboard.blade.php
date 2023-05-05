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

                <div  style="height: 400px;" class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 style="font-family: 'Cairo', sans-serif" class="card-title"> {{ trans('teacher.last') }}</h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                                   href="#students" role="tab" aria-controls="students"
                                                   aria-selected="true"> {{ trans('teacher.students') }}</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                                   role="tab" aria-controls="parents" aria-selected="false"> {{ trans('teacher.parents') }}
                                                </a>
                                            </li>

                                           

                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">

                                    {{--students Table--}}
                                    <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>#</th>
                                                <th> {{ trans('teacher.student_name') }}</th>
                                                <th> {{ trans('teacher.email') }}</th>
                                                <th>{{ trans('teacher.type') }}</th>
                                                <th> {{ trans('teacher.grade') }}</th>
                                                <th> {{ trans('teacher.classroom') }}</th>
                                                <th>{{ trans('teacher.section') }}</th>
                                                <th>{{ trans('teacher.add_date') }} </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$student->name}}</td>
                                                        <td>{{$student->email}}</td>
                                                        <td>{{$student->genders->Name}}</td>
                                                        <td>{{$student->grades->name}}</td>
                                                        <td>{{$student->classrooms->Name_Class}}</td>
                                                        <td>{{$student->sections->name_ssection}}</td>
                                                        <td class="text-success">{{$student->created_at}}</td>
                                                        @empty
                                                            <td class="alert-danger" colspan="8"> {{ trans('teacher.no_data') }}</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                 
                                    {{--parents Table--}}
                                    <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>#</th>
                                                    <th> {{ trans('teacher.parent_name') }} </th>
                                                <th>{{ trans('teacher.email') }} </th>
                                                <th>{{ trans('teacher.national_id') }} </th>
                                                <th>{{ trans('teacher.number_phone') }} </th>
                                                <th> {{ trans('teacher.add_date') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse(\App\Models\Myparent::latest()->take(5)->get() as $parent)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$parent->Name_Father}}</td>
                                                        <td>{{$parent->email}}</td>
                                                        <td>{{$parent->National_Id_Father}}</td>
                                                        <td>{{$parent->Phone_Father}}</td>
                                                        <td class="text-success">{{$parent->created_at}}</td>
                                                        @empty
                                                            <td class="alert-danger" colspan="8"> {{ trans('teacher.no_data') }}</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                  

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <livewire:calendar /> --}}

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
    @livewireScripts
    @stack('scripts')

</body>

</html>
