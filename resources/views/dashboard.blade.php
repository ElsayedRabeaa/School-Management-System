<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @section('title')
        {{ trans('admin.admin_page') }}
    @endsection
    @include('layouts.head')

    @livewireStyles
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->



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
                        <h4 class="mb-0"> {{ trans('admin.admin_page') }} </h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-users highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p- class="card-text text-dark"> {{ trans('admin.students_number') }}</p->
                                    <h2>{{ App\Models\Student::count() }}</h2>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-eye"></i>


                                <a href="{{ 'students' }}"> {{ trans('admin.show_students') }} </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="ti-palette highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark"> {{ trans('admin.teachers_number') }}</p>
                                    <h2>{{ App\Models\Teacher::count() }}</h2>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-eye"></i>

                                <a href="{{ 'Teacher' }}"> {{ trans('admin.show_teachers') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-child highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark"> {{ trans('admin.parents_number') }}</p>
                                    <h2>{{ App\Models\Myparent::count() }}</h2>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-eye"></i>

                                <a href="{{ 'add_parent' }}"> {{ trans('admin.show_parents') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fa fa-binoculars   highlight-icon" aria-hidden="true"></i>

                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark"> {{ trans('admin.classes_number') }}</p>
                                    <h2>{{ App\Models\Classroom::count() }}</h2>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-eye"></i>
                                <a href="{{ 'classroom' }}"> {{ trans('admin.show_classes') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Orders Status widgets-->

            <!-- Orders Status widgets-->


            <div class="row">

                <div style="height: 400px;" class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 style="font-family: 'Cairo', sans-serif" class="card-title">
                                            {{ trans('admin.last') }} </h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                                            

                                            <li class="nav-item">
                                                <a class="nav-link" id="teachers-tab" data-toggle="tab"
                                                    href="#teachers" role="tab" aria-controls="teachers"
                                                    aria-selected="false"> {{ trans('admin.teachers') }}
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="parents-tab" data-toggle="tab"
                                                    href="#parents" role="tab" aria-controls="parents"
                                                    aria-selected="false"> {{ trans('admin.parents') }}
                                                </a>
                                            </li>
                                            
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                                    href="#students" role="tab" aria-controls="students"
                                                    aria-selected="true"> {{ trans('admin.students') }}</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="fee_invoices-tab" data-toggle="tab"
                                                    href="#fee_invoices" role="tab" aria-controls="fee_invoices"
                                                    aria-selected="false"> {{ trans('admin.fee_invoices') }}
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">



                                    {{-- teachers Table --}}
                                    <div class="tab-pane fade" id="teachers" role="tabpanel"
                                        aria-labelledby="teachers-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center"
                                                class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-info text-danger">
                                                        <th>#</th>
                                                        <th> {{ trans('admin.teacher_name') }}</th>
                                                        <th>{{ trans('admin.type') }}</th>
                                                        <th> {{ trans('admin.job_date') }}</th>
                                                        <th>{{ trans('admin.specialization') }}</th>
                                                        <th> {{ trans('admin.add_date') }}</th>
                                                    </tr>
                                                </thead>

                                                @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $teacher->Name }}</td>
                                                            <td>{{ $teacher->genders->Name }}</td>
                                                            <td>{{ $teacher->Joining_Date }}</td>
                                                            <td>{{ $teacher->specializations->Name }}</td>
                                                            <td class="text-success">{{ $teacher->created_at }}</td>
                                                        @empty
                                                            <td class="alert-danger" colspan="8">
                                                                {{ trans('admin.no_data') }}</td>
                                                        </tr>
                                                    </tbody>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>

                                    {{-- parents Table --}}
                                    <div class="tab-pane fade" id="parents" role="tabpanel"
                                        aria-labelledby="parents-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center"
                                                class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-info text-danger">
                                                        <th>#</th>
                                                        <th> {{ trans('admin.parent_name') }} </th>
                                                        <th>{{ trans('admin.email') }} </th>
                                                        <th>{{ trans('admin.national_id') }} </th>
                                                        <th>{{ trans('admin.number_phone') }} </th>
                                                        <th> {{ trans('admin.add_date') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse(\App\Models\Myparent::latest()->take(5)->get() as $parent)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $parent->Name_Father }}</td>
                                                            <td>{{ $parent->email }}</td>
                                                            <td>{{ $parent->National_Id_Father }}</td>
                                                            <td>{{ $parent->Phone_Father }}</td>
                                                            <td class="text-success">{{ $parent->created_at }}</td>
                                                        @empty
                                                            <td class="alert-danger" colspan="8">
                                                                {{ trans('admin.no_data') }}</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- students Table --}}
                                    <div class="tab-pane fade active show" id="students" role="tabpanel"
                                        aria-labelledby="students-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center"
                                                class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-info text-danger">
                                                        <th>#</th>
                                                        <th> {{ trans('admin.student_name') }}</th>
                                                        <th> {{ trans('admin.email') }}</th>
                                                        <th>{{ trans('admin.type') }}</th>
                                                        <th> {{ trans('admin.grade') }}</th>
                                                        <th> {{ trans('admin.classroom') }}</th>
                                                        <th>{{ trans('admin.section') }}</th>
                                                        <th>{{ trans('admin.add_date') }} </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $student->name }}</td>
                                                            <td>{{ $student->email }}</td>
                                                            <td>{{ $student->genders->Name }}</td>
                                                            <td>{{ $student->grades->name }}</td>
                                                            <td>{{ $student->classrooms->Name_Class }}</td>
                                                            <td>{{ $student->sections->name_section }}</td>
                                                            <td class="text-success">{{ $student->created_at }}</td>
                                                        @empty
                                                            <td class="alert-danger" colspan="8">
                                                                {{ trans('admin.no_data') }}</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- fees Table --}}
                                    <div class="tab-pane fade" id="fee_invoices" role="tabpanel"
                                        aria-labelledby="fee_invoices-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center"
                                                class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-info text-danger">
                                                        <th>#</th>
                                                        <th>{{ trans('admin.invoice_date') }} </th>
                                                        <th>{{ trans('admin.student_name') }} </th>
                                                        <th>{{ trans('admin.grade') }} </th>
                                                        <th> {{ trans('admin.classroom') }}</th>
                                                        <th> {{ trans('admin.fee_type') }}</th>
                                                        <th> {{ trans('admin.amount') }}</th>
                                                        <th>{{ trans('admin.add_date') }} </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse(\App\Models\Fee_invoice::latest()->take(10)->get() as $fee_invoice)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $fee_invoice->invoice_date }}</td>
                                                            <td>{{ $fee_invoice->student->name }}</td>
                                                            <td>{{ $fee_invoice->grade->name }}</td>
                                                            <td>{{ $fee_invoice->classroom->Name_Class }}</td>
                                                            <td>{{ $fee_invoice->fees->Fee_Type }}</td>
                                                            <td>{{ $fee_invoice->amount }}</td>
                                                            <td class="text-success">{{ $fee_invoice->created_at }}
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td class="alert-danger" colspan="9">
                                                                {{ trans('admin.no_data') }}</td>
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

            <livewire:calender />



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
