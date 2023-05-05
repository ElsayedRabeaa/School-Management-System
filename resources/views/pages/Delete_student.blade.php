<div class="modal fade" id="Delete_Student{{$student->id}}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <form action="{{route('students.destroy','test')}}" method="post">
           @method('delete')
           @csrf
           <div class="modal-content">
               <div class="modal-header">
                   <h5 style="font-family: 'Cairo', sans-serif;"
                       class="modal-title" id="exampleModalLabel"> {{ trans('students.delete_data') }}  </h5>
                   <button type="button" class="close" data-dismiss="modal"
                           aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <p> {{ trans('My_Classes_trans.Warning_Grade') }} <span class="text-danger">{{$student->name}}</span></p>
                   <input type="hidden" name="id" value="{{$student->id}}">
               </div>
               <div class="modal-footer">
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary"
                               data-dismiss="modal">{{ trans('students.Close') }} </button>
                       <button type="submit"
                               class="btn btn-danger">{{ trans('students.submit') }} </button>
                   </div>
               </div>
           </div>
       </form>
   </div>
</div>

