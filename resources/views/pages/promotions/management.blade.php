@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('pro.management_title_page')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{trans('pro.title_page')}}

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

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                    {{trans('pro.delete_all')}}

                                </button>
                                <br><br>


                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>


                                            <th class="alert-info">{{trans('pro.name')}}</th>
                                            <th class="alert-danger">  {{trans('pro.Grade')}}</th>
                                            <th class="alert-danger">  {{trans('pro.classrooms')}}</th>
                                            <th class="alert-danger">  {{trans('pro.section')}}</th>
                                            <th class="alert-success"> {{trans('pro.Grade')}} </th>
                                            <th class="alert-success"> {{trans('pro.classrooms')}} </th>
                                            <th class="alert-success"> {{trans('pro.section')}} </th>
                                            <th class="alert-warning">{{trans('pro.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>


                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->f_grade->name}}</td>
                                                <td>{{$promotion->f_classroom->Name_Class}}</td>
                                                <td>{{$promotion->f_section->name_section}}</td>
                                                <td>{{$promotion->t_grade->name}}</td>
                                                <td>{{$promotion->t_classroom->Name_Class}}</td>
                                                <td>{{$promotion->t_section->name_section}}</td>
                                                <td>
                                                   
                                                    <button type="button" class="btn btn-outline-danger"
                                                            data-toggle="modal"
                                                            data-target="#restore_Student{{ $promotion->id }}"
                                                            title="{{ trans('Grades_trans.restore') }}">{{ trans('Grades_trans.restore') }}</button>

                                                            <button type="button" class="btn btn-outline-success"
                                                            data-toggle="modal"
                                                            data-target="#graduate_Student{{ $promotion->id }}"
                                                            title="{{ trans('Grades_trans.graduates') }}">{{ trans('Grades_trans.graduates') }}</button>


                                                    {{-- <a href="{{route('student.show',$promotion->id)}}"
                                                       class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i
                                                            class="fas fa-eye"></i></a> --}}
                                                </td>
                                            </tr>
                                   @include('pages.promotions.Delete_all')
                                   @include('pages.promotions.Delete_student')
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