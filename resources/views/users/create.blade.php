@extends ('layouts.app')

@section ('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Sukurti vartotoją</h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">

            <!-- form color picker -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sukurti vartotoją</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <br />
                        {!! Form::open(['method' => 'POST', 'action' => ['UsersController@store'], 'class'=>'form-horizontal form-label-left']) !!}

                        <div class="form-group">
                            {!! Form::label('email', 'El. paštas (vartotojo vardas)', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Slaptažodis', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('password', old('password'), ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        {!! Form::hidden('is_active', 1, ['class' => 'form-control']) !!}
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Pakartoti naują slaptažodį', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('password_confirmation', old('confirm_password'), ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('role_id', 'Vartotojo teisės', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::select('role_id', ['1' => 'Administratorius', '2' => 'Vadybininkas', '3' => 'Darbuotojas'], null, ['placeholder' => 'Pasirinkite...', 'class' => 'form-control']) !!}
                                <span class="form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                            @if (count($errors) >0)
                            <div class="bg-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                                        @endforeach
                                </ul>
                            </div>
                            @endif

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                {!! Form::submit(trans('Keisti slaptažodį'), ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <!-- /form color picker -->



        </div>





    </div>

@stop