@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('profile_of_teacher.profile') }}
@stop
@endsection
@section('page-header')

@endsection
@section('content')
<!-- row -->

            <div class="card-body">
                <section>


                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                            <div class="card-body text-center">
                        <img src="{{ URL::asset('assets/images/avatar.jpg')}}" class="rounded.circle img-fluid" style="wi" alt="avatar">
                        <h5 style="font-family:sans-serif" class="my-3">{{$information->Name}}</h5>
                        <p class="text-muted mb-1">{{$information->email}}</p>
                        <p class="text-muted mb-4">{{ trans('profile_of_teacher.teacher') }}
                        </p>

                        <form action="{{route('update_teacher',$information->id)}}" method="post">
                            @csrf
                          {{method_field('PUT')}}

                        <input type="text" value="{{$information->email}}" name="email" ><br><br>
                        <input type="password"   name="password" id="password" >
                        <br><br>
                        <input type="checkbox" name="btn" id="event" onclick="e()" >
                        <label for="">{{ trans('profile_of_teacher.show') }}</label>
                        <br><br>
                        <button type="submit"> {{ trans('profile_of_teacher.update') }}</button>
                        {{-- @foreach ($information as $item)
                        <p>{{$item->Name}}</p>
                        @endforeach --}}
                    </form>


                            </div>
                        </div>
                    </div>



                </div>
                </section>


            </div>

<!-- row closed -->
@endsection
@section('js')
<script>
    function e(){
        var pass=document.getElementById('password');
        if(pass.type === 'password'){
            pass.type='text';
        }
        else{
            pass.type='password';
        }
    }
</script>
@endsection