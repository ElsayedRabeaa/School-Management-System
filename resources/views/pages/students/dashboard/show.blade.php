@extends('layouts.master')
@section('css')
    @toastr_css
    @livewireStyles

@section('title')
    قائمة الاسئلة
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة الاسئلة
@stop
<!-- breadcrumb -->
@endsection
@section('content')


@livewire('show-question',['quizze_id'=> $Quiz_id, 'student_id' =>$student_id])
@endsection
@section('js')
    @toastr_js
    @toastr_render
    @livewireScripts

@endsection