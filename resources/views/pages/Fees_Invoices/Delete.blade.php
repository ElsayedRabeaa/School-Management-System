<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_Fee_invoice{{$Fee_invoice->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel"> {{trans('fees_invoices.delete_invoice')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Fees_Invoices.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$Fee_invoice->id}}">
                    <h5 style="font-family: 'Cairo', sans-serif;"> {{trans('fees_invoices.message_warning')}}  <span class="text-danger">{{$Fee_invoice->student->name}}</span></h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('fees_invoices.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('fees_invoices.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>