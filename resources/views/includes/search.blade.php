<div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        {!! Form::open(['method' => 'POST', 'action' => ['SearchController@searchClient']]) !!}
        <div class="input-group">
            {!! Form::text('query', null, ['class' => 'form-control', 'placeholder' => 'Paieška']) !!}
            <span class="input-group-btn">
                      {!! Form::submit(trans('Ieškoti'), ['class' => 'btn btn-default']) !!}
                    </span>
        </div>
        {!! Form::close() !!}
    </div>
</div>

