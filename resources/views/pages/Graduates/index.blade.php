@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('graduates.title_page')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.list_graduates')}}
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
                                <a href="{{route('student.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">   {{trans('graduates.add_student')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('graduates.name')}}</th>
                                            <th>{{trans('graduates.Email')}}</th>
                                            <th>{{trans('graduates.gender')}}</th>
                                            <th>{{trans('graduates.Grade')}}</th>
                                            <th>{{trans('graduates.classes')}}</th>
                                            <th>{{trans('graduates.sections')}}</th>
                                            <th>{{trans('graduates.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Students as $student)
                                            <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->genders->Name}}</td>
                                            <td>{{$student->grades->name}}</td>
                                            <td>{{$student->classrooms->Name_Class}}</td>
                                            <td>{{$student->sections->name_section}}</td>
                                                <td>
                                                    
                                                        <button type="button" class="btn btn-outline-danger"
                                                            data-toggle="modal"
                                                            data-target="#restore_Student{{ $student->id }}"
                                                            title="{{ trans('graduates.restore') }}">{{ trans('graduates.restore') }}</button>

                                                            <button type="button" class="btn btn-outline-success"
                                                            data-toggle="modal"
                                                            data-target="#delete_Student{{ $student->id }}"
                                                            title="{{ trans('graduates.delete') }}">{{ trans('graduates.delete') }}</button>
                                                       
                                                </td>
                                            </tr>
                                        @include('pages.graduates.Delete')
                                        @include('pages.graduates.Restore')
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