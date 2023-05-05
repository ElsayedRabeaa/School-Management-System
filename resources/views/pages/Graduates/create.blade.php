@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('graduates.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('graduates.title_page') }}
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
                            <h3>{{ trans('graduates.personal_info') }} </h3>

                            {{-- personal info --}}

                            <br>
                            <form action="{{route('Graduates.store')}}" method="post" enctype='multipart/form-data'>
                             @csrf

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">{{ trans('graduates.Grade') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="grade_id" required>
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($grades as $Grade)
                                            <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                                        @endforeach
                                    </select>
                                  
                                </div>
                                <div class="form-group col">
                                    <label for="inputCity">{{ trans('graduates.classroom') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="class_id" required>
                                     
                                    </select>
                                  
                                </div>
                                <div class="form-group col">
                                    <label for="inputCity">{{trans('graduates.section')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="section_id" required>
                          
                                    </select>
                                  
                                </div>
                              

                            </div>
                            <br>
                        

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('graduates.submit')}}</button>
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