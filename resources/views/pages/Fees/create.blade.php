@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('fees.page_title') }}

@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    اضافة رسوم جديدة
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('Fees.store') }}" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4"> {{ trans('fees.title_ar') }} </label>
                                <input type="text" value="{{ old('title_ar') }}" name="title_ar" class="form-control" required>
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">  {{ trans('fees.title_en') }}</label>
                                <input type="text" value="{{ old('title_en') }}" name="title_en" class="form-control" required>
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fees.amount') }}</label>
                                <input type="number" value="{{ old('amount') }}" name="amount" class="form-control" required>
                            </div>
                            
                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputState"> {{ trans('fees.Grade') }}</label>
                                <select class="custom-select mr-sm-2" name="Fee_type" required>
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip"> </label>
                                <select class="custom-select mr-sm-2" name="Classroom_id">

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="inputZip">{{ trans('fees.year') }}</label>
                                <select class="custom-select mr-sm-2" name="year" required>
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y")
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">{{ trans('fees.Fee_type') }} </label>
                                <select class="custom-select mr-sm-2" name="Fee_type" required>
                                    <option value="1"> {{ trans('fees.x1') }}</option>
                                    <option value="2"> {{ trans('fees.x2') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{ trans('fees.description') }}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4" required></textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">{{ trans('fees.submit') }}</button>

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
        
        $grade_id=$(this).val();
        
        if($grade_id){
        $.ajax({
        
            url:"{{URL::to('Classroom_fee_id') }}/"+$grade_id,
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
@endsection