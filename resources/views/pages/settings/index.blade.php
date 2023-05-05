@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('settings.favicon_settings') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    الاعدادات
@stop
<!-- breadcrumb -->
@endsection
@section('content')


    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form enctype="multipart/form-data" method="post" action="{{url('settings_update','test')}}">
                    @csrf 
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 border-right-2 border-right-blue-400">
                            <div class="form-group row">
                                <label for="current_session" class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings.current_year') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select data-placeholder="Choose..." required name="current_session" id="current_session" class="select-search form-control">
                                        <option value=""></option>
                                        @for($y=date('Y', strtotime('- 3 years')); $y<=date('Y', strtotime('+ 1 years')); $y++)
                                            <option {{ ($settings['current-year'] == (($y-=1).'-'.($y+=1))) ? 'selected' : '' }} readonly>{{ ($y-=1).'-'.($y+=1) }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings.School_name') }}</label>
                                <div class="col-lg-9">
                                    <input name="school_title" value="{{ $settings['title'] }}" type="text" class="form-control" placeholder="School Acronym"  readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings.Phone') }}</label>
                                <div class="col-lg-9">
                                    <input name="phone" value="{{ $settings['phone'] }}" type="text" class="form-control" placeholder="Phone" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold"> {{ trans('settings.Address') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input required name="address" value="{{ $settings['address'] }}" type="text" class="form-control" placeholder="School Address" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">  {{ trans('settings.end_of_first_term') }} </label>
                                <div class="col-lg-9">
                                    <input name="end_first_term" value="{{ $settings['end-first-year'] }}" type="text" class="form-control date-pick" placeholder="Date Term Ends" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">  {{ trans('settings.end_of_second_term') }}</label>
                                <div class="col-lg-9">
                                    <input name="end_second_term" value="{{ $settings['end-second-year'] }}" type="text" class="form-control date-pick" placeholder="Date Term Ends" readonly>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('settings.update') }}</button>
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
@endsection