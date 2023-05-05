<!-- Deleted inFormation Student -->
<div class="modal fade" id="restore_Student{{ $promotion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">تراجع الكل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('promotion.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')
                      <input type="hidden" name="id" value="{{ $promotion->id }}">
                    <h5 style="font-family: 'Cairo', sans-serif;">{{trans('pro.are_sure?')}}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('pro.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('pro.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>