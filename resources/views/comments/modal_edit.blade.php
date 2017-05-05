{!! Form::open(['method' => 'PUT', 'route' => ['comments.update', $comment->id]]) !!}
<div class="row">
    <div class="col-xs-12 form-group">
        {!! Form::textarea('comment', $comment->comment, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-xs-12 form-group">
        {!! Form::submit(trans('Keisti'), ['class' => 'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}