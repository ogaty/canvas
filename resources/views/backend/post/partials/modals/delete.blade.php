<div class="modal fade" id="modal-delete" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Delete this post?</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this post?</p>
            </div>
            <div class="modal-footer">
                @if(Route::is('canvas.admin.post.create'))
                    <form method="POST" action="{{ route('canvas.admin.post.destroy', $id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-link btn-icon-text">
                            <i class="zmdi zmdi-delete"></i> Delete Post
                        </button>
                    </form>
                @else
                    <form method="POST" action="{{ route('canvas.admin.techs.destroy', $id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-link btn-icon-text">
                            <i class="zmdi zmdi-delete"></i> Delete Post
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>