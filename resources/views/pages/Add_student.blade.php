@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('students.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('students.add_student') }}
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
                            <h3>{{ trans('students.personal_info') }}</h3>

                            {{-- personal info --}}

                            <br>
                            <form action="{{route('students.store')}}" method="post" enctype='multipart/form-data'>
                             @csrf
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="title">{{trans('students.Name_ar')}}</label>
                                    <input type="text" name="name_ar" class="form-control" required>
                                    {{-- @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('students.Name_en')}}</label>
                                    <input type="text" name="name_en" class="form-control" required>
                                    {{-- @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="title">{{trans('students.Email')}}</label>
                                    <input type="email" name="email" class="form-control" required>
                                    @error('Email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="title">{{trans('students.Password')}}</label>
                                    <input type="password" name="password" class="form-control" autocomplete="off" required>
                                    {{-- @error('Name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">{{trans('students.gender')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="gender_id" required>
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($Genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->Name}}</option>
                                        @endforeach
                                    </select>
                                    {{-- @error('Specialization_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">{{trans('students.Blood')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Blood_id" required>
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($Bloods as $blood)
                                            <option value="{{$blood->id}}">{{$blood->name}}</option>
                                        @endforeach
                                    </select>
                                    {{-- @error('blood_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>    
                            
                                <div class="form-group col">
                                    <label for="title">{{trans('students.Joining_Date')}}</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="text"  id="#" name="Joining_Date" data-date-format="yyyy-mm-dd"  required>
                                    </div>
                                    @error('Joining_Date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <br>
                            {{-- student info --}}
                            <h3>{{ trans('students.student_info') }}</h3>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">{{trans('students.Grade')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="grade_id" required>
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($my_grades as $grade)
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
                                    
                                    </select>
                                    {{-- @error('blood_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>    

                                <div class="form-group col">
                                    <label for="inputState">{{trans('students.sections')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="section_id" required>
                                    
                                    </select>
                                    {{-- @error('blood_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                             
                                <div class="form-group col">
                                    <label for="title">{{trans('students.Date')}}</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="date"  id="date_year" name="date_year"  required></div>
                                    @error('Joining_Date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="inputCity">{{trans('students.Parent')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="parent_id" required>
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($parents as $parent)
                                            <option value="{{$parent->id}}">{{$parent->Name_Father}}</option>
                                        @endforeach
                                    </select>
                                    {{-- @error('Specialization_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                                
                                <div class="form-group col">
                                    <label for="inputCity">{{trans('students.Address')}}</label>
                                    <input type="text" name="address" required>
                                 
                                </div>
                               
                            </div>
                            <br>

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

<script>
    $('select[name="grade_id"]').on('change' ,function(){

        var grade_id=$(this).val();
        
        if(grade_id){
        $.ajax({
        
            url:"{{URL::to('class_student')}}/"+ grade_id,
            type:"GET",
            dataType:'json',
            success:function(data){
                $('select[name="class_id"]').empty();
                $.each(data,function(key, value){
                $('select[name="class_id"]').append('<option value="'+key+'">'+value+'</option>');
        
                });
            },
        
        });
        };
        
        // else{
        //     alert('class not found ');
        // };
        
        
        
        });
        
        
        </script>


<script>
    $('select[name="class_id"]').on('change' ,function(){

        $class_id=$(this).val();
        
        if($class_id){
        $.ajax({
        
            url:"{{URL::to('section_student') }}/"+$class_id,
            type:"GET",
            dataType:'json',
            success:function(data){
                $('select[name="section_id"]').empty();
                $.each(data,function(key, value){
                $('select[name="section_id"]').append('<option value="'+key+'">'+value+'</option>');
        
                });
            },
        
        });
        };
        
        // else{
        //     alert('class not found ');
        // };
        
        
        
        });
        
        
        </script>


@endsection