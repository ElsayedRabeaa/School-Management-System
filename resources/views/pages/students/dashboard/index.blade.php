@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('Exam.exam_student') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
   {{ trans('Exam.exam_student') }}
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
                                            <th>{{ trans('Exam.subject') }} </th>
                                            <th> {{ trans('Exam.Quiz') }}</th>
                                            <th>{{ trans('Exam.Join') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($quizes as $quize)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$quize->subject->name}}</td>
                                                <td>{{$quize->name}}</td>
                                                <td>
                                                    @if ($quize->degrees->count() > 0 && $quize->id == $quize->degrees[0]->quiz_id) 
                                                    <h4>{{ trans('Exam.exam_student') }} </h4>

                                                        @else
                                                
                                                    <a href="{{route('Exams_students.show',$quize->id)}}"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-eye"></i></a>
                                                            @endif
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