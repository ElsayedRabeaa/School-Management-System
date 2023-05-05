@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
{{ trans('My_Classes_trans.Classrooms_favicon') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="mb-0"> {{ trans('My_Classes_trans.Classrooms') }}</h4>
        </div>
        
    </div>
</div>
<!-- breadcrumb -->
@section('content')
    <!-- row -->
    <div class="row">


        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <p>{{ trans('My_Classes_trans.class_insert') }}<br><br></p>
                </div>

                <div class="row">
                    <!-- Button trigger modal -->
                    <div class="col">
                        <button type="button" class="btn btn-primary btn-lg " data-toggle="modal"
                            data-target="#exampleModal">
                            {{ trans('grades_trans.insert') }}
                        </button>
                    </div>
                    <div class="col">

                        <button type="button" class="btn btn-danger btn-lg" style="width: 100px" id="btn_delete_all">
                            {{ trans('grades_trans.delete_all') }}
                        </button>
                    </div>

                    {{-- <div class="col"> 
    <form action="{{route('filter_grades')}}" method="POST"> 
        {{method_field('post')}} 
        @csrf 
<select name="grade_id" id="grades" onchange="this.form.submit()" required>
    @foreach ($grades as $grade_item)
    <option value="{{$grade_item->id}}">{{$grade_item->name}}</option>
    @endforeach
</select>
</form>
    </div> --}}
                </div>
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th><input name="select_all" type="checkbox" id="example-select-all"
                                    onclick="Checkall('box_child',this)"></th>
                            <th scope="col">#</th>
                            <th scope="col">{{ trans('grades_trans.name_grade_column') }}</th>
                            <th scope="col">{{ trans('grades_trans.classroom_grade') }}</th>
                            <th scope="col">{{ trans('grades_trans.process') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- 
                    @if (isset($details))
                    <?php
                    // $classrooms=$details;
                    ?>
                    @else{
                        <?php
                        // $classrooms=$myclassrooms;
                        ?>
                    }
                    @endif --}}

                        @foreach ($myclassrooms as $classroom)
                            <tr>
                                <td><input type="checkbox" value="{{ $classroom->id }}" class="box_child"></td>
                                <td scope="row">{{ $classroom->id }}</td>
                                <td>{{ $classroom->grades->name }}</td>
                                <td>{{ $classroom->Name_Class }}</td>
                                <td>
                                    <button data-target="#edit{{ $classroom->id }}" data-toggle="modal"
                                        class="btn btn-info btn-sm">{{ trans('My_Classes_trans.edit') }}</button>
                                    <button data-target="#delete{{ $classroom->id }}" data-toggle="modal"
                                        class="btn btn-danger btn-sm">{{ trans('My_Classes_trans.del') }}</button>
                                </td>
                            </tr>

                            {{-- edit --}}
                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('Grades_trans.edit_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('classroom.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                            class="mr-sm-2">{{ trans('My_Classes_trans.stage_name_ar') }}
                                                            :</label>
                                                        <input id="Name" type="text" name="Name"
                                                            class="form-control"
                                                            value="{{ $classroom->getTranslation('Name_Class', 'ar') }}"
                                                            required>
                                                        <input id="id" type="hidden" name="id"
                                                            class="form-control" value="{{ $classroom->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en"
                                                            class="mr-sm-2">{{ trans('My_Classes_trans.stage_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control" name="Name_en"
                                                            value="{{ $classroom->getTranslation('Name_Class', 'en') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <select name="grade_id" id="">
                                                        <option value="{{ $classroom->grades->id }}">
                                                            {{ $classroom->grades->name }}</option>
                                                        @foreach ($Grades as $Grade)
                                                            <option value="{{ $Grade->id }}">{{ $Grade->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>


                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('My_Classes_trans.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- DELETE --}}

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('Grades_trans.delete_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('classroom.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('My_Classes_trans.Warning_Grade') }}
                                                <input id="id" type="hidden" name="id_del" class="form-control"
                                                    value="{{ $classroom->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('My_Classes_trans.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                    {{-- </div>  --}}

                    <!--=================================
                   wrapper -->


                    <!--=================================
                   {{-- footer --> --}}
                   
                      <footer class="bg-white p-4">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="text-center text-md-left">
                                <p class="mb-0"> &copy; Copyright <span id="copyright"> <script>
                                    document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                                </script></span>. <a href="#"> Webmin </a> All Rights Reserved. </p>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <ul class="text-center text-md-right">
                              <li class="list-inline-item"><a href="#">Terms & Conditions </a> </li>
                              <li class="list-inline-item"><a href="#">API Use Policy </a> </li>
                              <li class="list-inline-item"><a href="#">Privacy Policy </a> </li>
                            </ul>
                          </div>
                        </div>
                      </footer>
                      </div>

                    <!-- end row -->
                </table>
            </div>
        </div>
    </div>
    </div>




    <!-- add_modal_class -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('My_Classes_trans.add_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class=" row mb-30" action="{{ route('classroom.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Classes">
                                    <div data-repeater-item>
                                        <div class="row">

                                            <div class="col">
                                                {{-- <label for="Name"
                                                class="mr-sm-2">{{ trans('My_Classes_trans.Name_class') }}
                                                :</label> --}}
                                                <input class="form-control" type="text" name="Name" required />
                                            </div>


                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('My_Classes_trans.Name_class_en') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="Name_class_en"
                                                    required />
                                            </div>


                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('My_Classes_trans.Name_Grade') }}
                                                    :</label>

                                                <div class="box" style="padding: 20px">
                                                    <select class="fancyselect" name="Grade_id">
                                                        @foreach ($Grades as $Grade)
                                                            <option value="{{ $Grade->id }}">{{ $Grade->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('My_Classes_trans.Processes') }}
                                                    :</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete
                                                    type="button" value="{{ trans('My_Classes_trans.delete_row') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button"
                                            value="{{ trans('My_Classes_trans.add_row') }}" />
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                                    <button type="submit"
                                        class="btn btn-success">{{ trans('My_Classes_trans.submit') }}</button>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>

    </div>
    </div>
    </div>



    <!-- delete_modal_Grade -->
    <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('Grades_trans.delete_Grade') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('delete_all') }}" method="post">
                        {{-- {{ method_field('Delete') }} --}}
                        @csrf
                        {{-- {{ trans('Grades_trans.Warning_Grade') }} --}}
                        <input type="hidden" id="id_all" name="id_all" class="form-control" value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ trans('My_Classes_trans.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toaster_render


    <script>
        $('#btn_delete_all').click(function() {
            var selected = new Array();
            $('#datatable input[type=checkbox]:checked').each(function() {
                selected.push(this.value);
            });
            if (selected.length > 0) {
                $('#delete_all').modal('show');
                $('#id_all').val(selected);



            }









        })
    </script>
@endsection
