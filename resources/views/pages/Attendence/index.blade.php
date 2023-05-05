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
            <h4 class="mb-0">  {{ trans('attendence.list') }}</h4>
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
            <form action="{{ route('Attendence.store') }}" method="post">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"> {{ trans('attendence.Name') }}</th>
                            <th scope="col"> {{ trans('attendence.Email') }}</th>
                            <th scope="col"> {{ trans('attendence.Name_Grade') }}</th>
                            <th scope="col"> {{ trans('attendence.Gender') }}</th>
                            <th scope="col"> {{ trans('attendence.Name_Class') }}</th>
                            <th scope="col"> {{ trans('attendence.Name_Section') }}</th>
                            <th scope="col"> {{ trans('attendence.Processes') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td scope="row">{{ $student->id }}</td>
                                <td>{{ $student->Name }}</td>
                                <td>{{ $student->Email }}</td>
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
                                                value="presence" class="leading-tight"  required>
                                            <span>حضور</span>

                                        </label>
                                        <label class="block text-gray-500 font-semibold sm-border-r sm-pr-4">
                                            <input type="radio" name="attendences[{{ $student->id }}]" disabled
                                                {{ $student->attendence()->first()->attendence_status == 0 ? 'checked' : '' }}
                                                value="presence" class="leading-tight" required>
                                            <span>غياب</span>

                                        </label>
                                    @else
                                        <label class="block text-gray-500 font-semibold sm-border-r sm-pr-4">
                                            <input type="radio" name="attendences[{{ $student->id }}]"
                                                value="presence" class="leading-tight"  required>
                                            <span>حضور</span>

                                        </label>
                                        <label class="block text-gray-500 font-semibold sm-border-r sm-pr-4">
                                            <input type="radio" name="attendences[{{ $student->id }}]"
                                                value="presence" class="leading-tight" required>
                                            <span>غياب</span>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <input type="submit" value="{{ trans('attendence.submit') }}" class="btn btn-warning btn-lg">

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
