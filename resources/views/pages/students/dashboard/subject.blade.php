@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('subject.subject_favicon')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('subject.subject_favicon')}}
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
                                            <th> {{ trans('subject.subject_name')}}</th>
                                            <th>{{ trans('subject.grade_name_subject')}} </th>
                                            <th> {{ trans('subject.subject_class')}}</th>
                                            <th> {{ trans('subject.subject_teacher')}}</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Subjects as $subject)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><a href="#">{{$subject->name}}</a></td>
                                            <td>{{$subject->GRADES->name}}</td>
                                            <td>{{$subject->classroom->Name_Class}}</td>
                                            <td>{{$subject->Teachers->Name}}</td>
                                            </tr>

                                            <div class="modal fade" id="delete_subject{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('Subjects.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">  {{ trans('subject.delete_subject')}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('subject.Warning_Grade') }} {{$subject->name}}</p>
                                                            <input type="hidden" name="id"  value="{{$subject->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('subject.Close') }}</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">{{ trans('subject.submit') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
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