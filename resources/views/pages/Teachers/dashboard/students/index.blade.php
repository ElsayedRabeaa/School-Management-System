@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{ trans('students.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('students.title_page') }}</h4>
        </div>

    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <h6 style="font-family: Cairo; color:red;"> {{ trans('studentofteacher.today_date') }} {{ date('Y-m-d') }}
            </h6>
            <form action="{{ route('attendence') }}" method="post">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>{{ trans('students.name') }}</th>
                            <th>{{ trans('students.Email') }}</th>
                            <th>{{ trans('students.gender') }}</th>
                            <th>{{ trans('students.Grade') }}</th>
                            <th>{{ trans('students.classes') }}</th>
                            <th>{{ trans('students.sections') }}</th>
                            <th>{{ trans('students.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td scope="row">{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->grades->name }}</td>
                                <td>{{ $student->genders->Name }}</td>
                                <td>{{ $student->classrooms->Name_Class }}</td>
                                <td>{{ $student->sections->name_section }}</td>


                                <td>
                                    @if (isset(
                                            $student->attendence()->where('date', date('Y-m-d'))->first()->student_id))
                                        <label class="block text-gray-500 font-semibold sm-border-r sm-pr-4">
                                            <input type="radio" name="attendences[{{ $student->id }}]" disabled
                                                {{ $student->attendence()->first()->attendence_status == 1 ? 'checked' : '' }}
                                                value="presence" class="leading-tight" required>
                                            <span>{{ trans('students.present') }}</span>

                                        </label>
                                        <label class="block text-gray-500 font-semibold sm-border-r sm-pr-4">
                                            <input type="radio" name="attendences[{{ $student->id }}]" disabled
                                                {{ $student->attendence()->first()->attendence_status == 0 ? 'checked' : '' }}
                                                value="presence" class="leading-tight" required>
                                            <span>{{ trans('students.absent') }}</span>

                                        </label>
                                        <button data-target="#edit{{ $student->id }}" data-toggle="modal">
                                            {{ trans('students.edit') }}<i class="fa fa-edit"></i></button>
                                        @include('pages.Teachers.dashboard.students.edit')
                                    @else
                                        <label class="block text-gray-500 font-semibold sm-border-r sm-pr-4">
                                            <input type="radio" name="attendences[{{ $student->id }}]"
                                                value="presence" class="leading-tight" required>
                                            <span>{{ trans('students.present') }}</span>

                                        </label>
                                        <label class="block text-gray-500 font-semibold sm-border-r sm-pr-4">
                                            <input type="radio" name="attendences[{{ $student->id }}]"
                                                value="presence" class="leading-tight" required>
                                            <span>{{ trans('students.absent') }}</span>
                                            \
                                    @endif

                                </td>
                            </tr>
                            <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                            <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                            <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                            <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                        @endforeach
                    </tbody>
                </table>
                <input type="submit" value="{{ trans('students.submit') }}" class="btn btn-warning btn-lg">

            </form>
        </div>
    </div>

</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toaster_render
@endsection
