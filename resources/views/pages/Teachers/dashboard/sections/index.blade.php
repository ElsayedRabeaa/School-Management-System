@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{-- {{ trans('Sections_trans.title_page') }} --}}
    Sections
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
                    <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('Sections_trans.add_section') }}</a>
                </div>

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            {{-- @foreach ($Grades as $Grade) --}}
#
                                <div class="acd-group">
                                    <a href="#" class="acd-heading">#2</a>
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
                                                                    <th>اسم المرحلة
                                                                    </th>
                                                                    <th>اسم الاقسام</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                           
                                                                @foreach ($sections_list as $item)
                                                                    <tr>
                                                                      
                                                                        <td>{{ $item->id }}</td>
                                                                        <td>{{ $item->GRADES->name }}
                                                                        <td>{{ $item->name_section }}</td>
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
                      
                                </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- row closed -->
        @endsection
@section('js')
 

<script>



</script>
           
@endsection