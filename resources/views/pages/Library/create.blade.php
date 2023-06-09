@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
 {{ trans('library.page_title') }}
      
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    اضافة كتاب جديد
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('Library.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title"> {{ trans('library.book_title') }}</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>

                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{ trans('library.grade_name') }}: <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="Grade_id" required>
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                @foreach($grades as $grade)
                                                    <option  value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Classroom_id">{{ trans('library.classroom_name') }} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="Classroom_id" required>
                                                @foreach($classes as $classe)
                                                <option  value="{{ $classe->id }}">{{ $classe->Name_Class }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="section_id">{{trans('library.section_name')}} : </label>
                                            <select class="custom-select mr-sm-2" name="section_id" required>
                                                @foreach($sections as $section)
                                                <option  value="{{ $section->id }}">{{ $section->name_section }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div><br>



                                {{-- <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="academic_year">المرفقات : <span class="text-danger">*</span></label>
                                            <input type="file" accept="application/pdf" name="photo" required>
                                        </div>
                                    </div>
                                </div> --}}

                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('library.submit')}} </button>
                            </form>
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