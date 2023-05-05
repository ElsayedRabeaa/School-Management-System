@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('pro.title_page')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('pro.Students_Promotions')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (Session::has('error_promotions'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_promotions')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                        <h6 style="color: red;font-family: Cairo">  {{trans('pro.old')}}</h6><br>

                    <form method="post" action="{{ route('promotion.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('pro.Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id" required>
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{trans('pro.classrooms')}} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id" required>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{trans('pro.section')}}: </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>

                                </select>
                            </div>
                        </div>
                        <br><h6 style="color: red;font-family: Cairo">{{trans('pro.new')}}  </h6><br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('pro.Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id_new" required>
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{trans('pro.classrooms')}}: <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id_new" required>

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="section_id">:{{trans('pro.section')}} </label>
                                <select class="custom-select mr-sm-2" name="section_id_new" required>

                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{trans('pro.submit')}}</button>
                    </form>

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
    $('select[name="Grade_id"]').on('change' ,function(){

        var grade_id=$(this).val();
        
        if(grade_id){
        $.ajax({
        
            url:"{{URL::to('class_student')}}/"+ grade_id,
            type:"GET",
            dataType:'json',
            success:function(data){
                $('select[name="Classroom_id"]').empty();
                $.each(data,function(key, value){
                $('select[name="Classroom_id"]').append('<option value="'+key+'">'+value+'</option>');
        
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
    $('select[name="Classroom_id"]').on('change' ,function(){

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




{{-- new --}}



<script>
    $('select[name="Grade_id_new"]').on('change' ,function(){

        var grade_id=$(this).val();
        
        if(grade_id){
        $.ajax({
        
            url:"{{URL::to('class_student')}}/"+ grade_id,
            type:"GET",
            dataType:'json',
            success:function(data){
                $('select[name="Classroom_id_new"]').empty();
                $.each(data,function(key, value){
                $('select[name="Classroom_id_new"]').append('<option value="'+key+'">'+value+'</option>');
        
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
    $('select[name="Classroom_id_new"]').on('change' ,function(){

        $class_id=$(this).val();
        
        if($class_id){
        $.ajax({
        
            url:"{{URL::to('section_student') }}/"+$class_id,
            type:"GET",
            dataType:'json',
            success:function(data){
                $('select[name="section_id_new"]').empty();
                $.each(data,function(key, value){
                $('select[name="section_id_new"]').append('<option value="'+key+'">'+value+'</option>');
        
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