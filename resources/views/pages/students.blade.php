@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('students.title_page')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.list_students')}}
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
                                <a href="{{route('students.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">   {{trans('students.add_student')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('students.name')}}</th>
                                            <th>{{trans('students.Email')}}</th>
                                            <th>{{trans('students.gender')}}</th>
                                            <th>{{trans('students.Grade')}}</th>
                                            <th>{{trans('students.classes')}}</th>
                                            <th>{{trans('students.sections')}}</th>
                                            <th>{{trans('students.Processes')}}</th>
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
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{trans('students.Processes')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" >
                                                            <a class="dropdown-item" href="{{route('students.edit',$student->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;   {{trans('students.edit_data')}}</a>
                                                            <a class="dropdown-item" href="{{route('receipt_students.show',$student->id)}}"><i class="fa fa-money" aria-hidden="true"></i>&nbsp;   {{trans('students.add_reciept_student')}}</a>
                                                            <a class="dropdown-item" href="{{route('Fees_Invoices.show',$student->id)}}"><i style="color: #0000cc" class="fa fa-edit"></i>&nbsp;  {{trans('students.add_new_fee')}}&nbsp;</a>
                                                            <a class="dropdown-item" href="{{route('ProcessFees.show',$student->id)}}"><i style="color: #0000cc" class="fa fa-edit"></i>&nbsp;  {{trans('students.cancel')}}&nbsp;</a>
                                                            <a class="dropdown-item" href="{{route('Payment.show',$student->id)}}"><i style="color: #0000cc" class="fa fa-edit"></i>&nbsp;  {{trans('students.add_sarf')}}&nbsp;</a>
                                                        </div>
                                                        <a class="btn btn-danger btn-sm" data-target="#Delete_Student{{ $student->id }}" data-toggle="modal" href="##Delete_Student{{ $student->id }}">{{trans('students.delete_data')}}&nbsp;<i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @include('pages.Delete_student')
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