@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
{{ trans('grades_trans.favicon_grade') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main-sidebar_trans.grades') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('grades_trans.home') }}</a>
                </li>
                <li class="breadcrumb-item active">{{ trans('grades_trans.page_title') }}</li>
            </ol>
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
            <div class="card-body">
                <p>{{ trans('grades_trans.grade_insert') }}<br><br></p>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                {{ trans('grades_trans.insert') }}
            </button>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('grades_trans.name_grade_column') }}</th>
                        <th scope="col">{{ trans('grades_trans.note') }}</th>
                        <th scope="col">{{ trans('grades_trans.process') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grades as $grade)
                        <tr>
                            <td scope="row">{{ $grade->id }}</td>
                            <td>{{ $grade->name }}</td>
                            <td>{{ $grade->notes }}</td>
                            <td>
                                <button data-target="#edit{{ $grade->id }}" data-toggle="modal"
                                    class="btn btn-info btn-sm">{{ trans('grades_trans.edit') }}</button>
                                <button data-target="#delete{{ $grade->id }}" data-toggle="modal"
                                    class="btn btn-danger btn-sm">{{ trans('grades_trans.delete') }}</button>
                            </td>
                        </tr>

                        {{-- edit --}}
                        <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            {{ trans('grades_trans.edit_Grade') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('grade_list.update', 'test') }}" method="post">
                                            {{ method_field('patch') }}
                                            @csrf

                                            <div class="form-group">
                                                <label
                                                    for="exampleInputEmail1">{{ trans('grades_trans.name_grade_ar') }}</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $grade->getTranslation('name', 'ar') }}"
                                                    id="exampleInputname1" name="name_ar" autocomplete="off" required>
                                                <input type="hidden" name="id" value="{{ $grade->id }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="exampleInputEmail1">{{ trans('grades_trans.name_grade_en') }}</label>
                                                <input type="text" class="form-control" id="exampleInputname2"
                                                    value="{{ $grade->getTranslation('name', 'en') }}" name="name_en"
                                                    autocomplete="off" required>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="exampleInputPassword1">{{ trans('grades_trans.note') }}</label>
                                                <input type="text" class="form-control" id="exampleInputnote"
                                                    name="note" value="{{ $grade->note }}" autocomplete="off" required>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('grades_trans.close') }}</button>
                                                <button type="submit" class="btn btn-primary">{{ trans('grades_trans.save') }}</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- DELETE --}}

                        <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            {{ trans('grades_trans.delete_Grade') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('grade_list.destroy', 'test') }}" method="post">
                                            {{ method_field('delete') }}
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $grade->id }}">

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('grades_trans.do_sure_delete') }}</button>
                                                <button type="submit" class="btn btn-primary">{{ trans('grades_trans.save') }}</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- add --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('grades_trans.Add Grade') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('grade_list.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ trans('grades_trans.name_grade_ar') }}</label>
                            <input type="text" class="form-control" id="exampleInputname1" name="name_ar"
                                autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ trans('grades_trans.name_grade_en') }}</label>
                            <input type="text" class="form-control" id="exampleInputname2" name="name_en"
                                autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{ trans('grades_trans.note') }}</label>
                            <input type="text" class="form-control" id="exampleInputnote" name="note"
                                autocomplete="off">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('grades_trans.close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ trans('grades_trans.save') }}</button>
                        </div>
                    </form>

                </div>

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
