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
{{trans('students.title_page')}} 
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
                            <form action="{{route('student.update','test')}}" method="post">
                             {{method_field('patch')}}
                             @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('students.Email')}}</label>
                                    <input type="hidden" value="{{$students->id}}" name="id">
                                    <input type="email" name="Email" value="{{$students->Email}}" class="form-control" required>
                                    @error('Email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                              
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('students.Name_ar')}}</label>
                                    <input type="text" name="Name_ar" value="{{ $students->getTranslation('Name', 'ar') }}" class="form-control" required>
                                    @error('Name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('students.Name_en')}}</label>
                                    <input type="text" name="Name_en" value="{{ $students->getTranslation('Name', 'en') }}" class="form-control" required>
                                    @error('Name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            
                            <div class="form-row">
                                
                                <div class="form-group col">
                                    <label for="inputState">{{trans('students.gender')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Gender_id" required>
                                        <option value="{{$students->Gender_id}}">{{$students->genders->Name}}</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->Name}}</option>
                                        @endforeach
                                    </select>
                                    @error('Gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">{{trans('students.Grade')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="grade_id" required>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                        @endforeach
                                    </select>
                                    {{-- @error('Specialization_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">{{trans('students.classes')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="class_id" required>
                                        @foreach($classes as $class)
                                            <option value="{{$class->id}}">{{$class->Name_Class}}</option>
                                        @endforeach
                                    </select>
                                    {{-- @error('blood_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>    

                                <div class="form-group col">
                                    <label for="inputState">{{trans('students.sections')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="section_id" required>
                                        @foreach($sections as $section)
                                            <option value="{{$section->id}}">{{$section->name_section}}</option>
                                        @endforeach
                                    </select>
                                    {{-- @error('blood_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                               
                            </div>
                           
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Parent_trans.Next')}}</button>
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