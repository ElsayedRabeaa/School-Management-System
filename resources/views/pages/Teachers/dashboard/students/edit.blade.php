<!--تعديل قسم جديد -->
<div class="modal fade" id="edit{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                    {{ trans('students.edit') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('edit_attendence', 'test') }}" method="POST">
                    {{-- {{ method_field('patch') }} --}}
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$student->id}}">
                    <label class="block text-gray-500 font-semibold sm-border-r sm-pr-4">
                        <input type="radio" name="attendences[{{ $student->id }}]" disabled
                            {{ $student->attendence()->first()->attendence_status == 1 ? 'checked' : '' }}
                            value="presence" class="leading-tight" required>
                        <span>{{ trans('students.present') }}</span>

                    </label>
                    <label class="block text-gray-500 font-semibold sm-border-r sm-pr-4">
                        <input type="radio" name="attendences[{{ $student->id }}]" disabled
                            {{ $student->attendence()->first()->attendence_status == 0 ? 'checked' : '' }}
                            value="presence" class="leading-tight" required>
                        <span>{{ trans('students.absent') }}</span>

                    </label>
                    <br>


               

                          
                       
                    </div>
                    <br>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                <button type="submit" class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
