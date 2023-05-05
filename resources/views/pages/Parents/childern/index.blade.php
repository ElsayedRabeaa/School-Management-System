@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
       {{ trans('childern.page_title') }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
       {{ trans('childern.page_title') }}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> {{ trans('childern.student_name') }}</th>
                                            <th> {{ trans('childern.email') }}</th>
                                            <th> {{ trans('childern.stuednt_type') }}</th>
                                            <th> {{ trans('childern.garde') }}</th>
                                            <th> {{ trans('childern.classroom') }}</th>
                                            <th> {{ trans('childern.section') }}</th>
                                            <th>{{ trans('childern.processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($studnets_of_parents as $student)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->genders->Name}}</td>
                                                <td>{{$student->grades->name}}</td>
                                                <td>{{$student->classrooms->Name_Class}}</td>
                                                <td>{{$student->sections->name_section}}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{ trans('childern.processes') }}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route('result_for_parents',$student->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp; {{ trans('childern.show') }} </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection