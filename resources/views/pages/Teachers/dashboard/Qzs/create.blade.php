@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    اضافة اختبار جديد
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    اضافة اختبار جديد
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
                            <form action="{{route('Qzs_store')}}" method="post" >
                                @csrf

                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">   {{trans('Quizes.Name_ar')}}   </label>
                                        <input type="text" name="Name_ar" class="form-control" required>
                                    </div>

                                    <div class="col">
                                        <label for="title">   {{trans('Quizes.Name_en')}}   </label>
                                        <input type="text" name="Name_en" class="form-control" required>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id"> {{trans('Quizes.subject_name')}}  : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="subject_id" required>
                                                @foreach($subjects as $subject)
                                                    <option  value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                   

                                </div>

                                <div class="form-row">



                                    <div class="col">
                                        <div class="form-group">
                                            <label for="grade_id">{{trans('Quizes.Grade')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="grade_id" required>
                                                <option selected disabled>{{trans('grade_trans.Choose')}}...</option>
                                                @foreach($grades as $grade)
                                                    <option  value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="classroom_id">{{trans('Quizes.classroom')}}: <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="classroom_id" required>
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                @foreach($classes as $class)
                                                    <option  value="{{ $class->id }}">{{ $class->Name_Class }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="section_id">{{trans('Quizes.section')}} : </label>
                                            <select class="custom-select mr-sm-2" name="section_id" required>
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                @foreach($sections as $section)
                                                    <option  value="{{ $section->id }}">{{ $section->name_section }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit"> {{trans('Quizes.submit')}} </button>
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
    {{-- <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Class_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script> --}}
@endsection