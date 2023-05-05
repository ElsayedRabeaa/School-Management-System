@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
{{ trans('attendence.title_page') }}
     
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('attendence.list') }}</h4>
        </div>

    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form action="#" method="post">
                    @csrf
                    <h6 style="font-family: cursive"> {{ trans('attendence.search_info') }}</h6>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student"></label>
                                <select name="student_id" id="student_id" class="custom-select mr-sm-2" required>
                                    <option value="0">{{ trans('attendence.all') }}</option>
                                    @foreach ($studnets_of_parents as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-body datepicker-form">
                            <div class="input-group" data-date-format="yyyy-mm-dd">
                                <input class="form-control range-from date-picker-default" type="date" name="first"
                                    placeholder="تاريخ البداية" required>
                                <span class="input-group-a"> {{ trans('attendence.to') }}</span>
                                <input class="form-control range-to date-picker-default" type="date" name="end"
                                    placeholder="تاريخ النهاية" required>
                            </div>
                        </div>


                    </div>
                    <button type="submit" class="btn btn-warning">{{ trans('attendence.submit') }}</button>
                </form>

                @isset($Students)
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th class="alert-success">#</th>
                                    <th class="alert-success">{{ trans('Students_trans.name') }}</th>
                                    <th class="alert-success">{{ trans('Students_trans.Grade') }}</th>
                                    <th class="alert-success">{{ trans('Students_trans.section') }}</th>
                                    <th class="alert-success">{{ trans('attendence.date') }}</th>
                                    <th class="alert-warning">{{ trans('attendence.status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Students as $stu)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $stu->students->name }}</td>
                                        <td>{{ $stu->grade->Name }}</td>
                                        <td>{{ $stu->section->Name_Section }}</td>
                                        <td>{{ $stu->attendence_date }}</td>
                                        <td>

                                            @if ($stu->attendence_status == 0)
                                            {{-- غابب --}}
                                                <span class="btn-danger">{{ trans('attendence.absent') }}</span>
                                            @else
                                            {{-- حاضر --}}
                                                <span class="btn-success">{{ trans('attendence.present') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    {{-- @include('pages.Students.Delete') --}}
                                @endforeach
                        </table>
                    </div>
                @endisset




            </div>
        </div>
    </div>
</div>
<!-- row closed -->






@endsection
@section('js')
@toastr_js
@toaster_render
@endsection
