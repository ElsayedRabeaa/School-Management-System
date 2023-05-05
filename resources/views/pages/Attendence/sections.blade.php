@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('attendence.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Sections_trans.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    {{-- <a class="button x-small" href="      " data-toggle="modal" data-target="#exampleModal">
                        {{ trans('Sections_trans.add_section') }}</a> --}}
                </div>

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            @foreach ($Grades as $Grade)

                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{$Grade->name}}</a>
                                    <div class="acd-des">

                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('attendence.Name_Section') }}
                                                                    </th>
                                                                    <th>{{ trans('attendence.Name_Class') }}</th>
                                                                    <th>{{ trans('attendence.Processes') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach ($Grade->Sections as $list_Sections)
                                                                    <tr>
                                                                        <?php $i++; ?>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $list_Sections->name_section }}</td>
                                                                        <td>{{ $list_Sections->classroom->Name_Class }}
                                                                        </td>
                                                                     
                                                                        <td>
                                                                        <a href="{{route('Attendence.show',$list_Sections->id)}}" class="btn btn-warning"> {{ trans('attendence.list') }}</a>
                                                                        </td>
                                                                    </tr>

                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                        </div>
                    </div>

             
                </div>
            </div>
        </div>
        <!-- row closed -->
        @endsection
@section('js')
           
@endsection