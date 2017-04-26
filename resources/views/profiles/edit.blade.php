@extends ('layouts.app')

@section ('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Atnaujinti profilį ir slaptažodį</h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <!-- form profile -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Profilis</h2>
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
                        @if(session()->has('flash_blue'))
                            <p class="bg-success"><strong>{{session()->get('flash_blue')}}</strong></p>
                        @endif
                        <br />
                        {!! Form::open(['method' => 'PUT', 'action' => ['ProfilesController@update', $profile->id], 'class'=>'form-horizontal form-label-left']) !!}

                        <div class="form-group">
                            {!! Form::label('firstname', 'Vardas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('firstname', $profile->firstname, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('lastname', 'Pavardė', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('lastname', $profile->lastname, ['class' => 'form-control', 'value' => '']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('position', 'Pareigos', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('position', $profile->position, ['class' => 'form-control', 'value' => '']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'El. paštas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::email('email', $profile->email, ['class' => 'form-control', 'value' => '']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone', 'Telefonas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('phone', $profile->phone, ['class' => 'form-control', 'value' => '']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('birthday', 'Gimimo data', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::date('birthday', $profile->birthday, ['class' => 'form-control', 'value' => '', 'placeholder'=>'Pavyzdys: 1979-08-19']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    {!! Form::submit(trans('Keisti'), ['class' => 'btn btn-success']) !!}
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                {{------- Change photo -------}}
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Nuotrauka</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">
                            <img src="/images/avatars/{{$profile->photo}}" alt="{{$profile->firstname}}">
                        </div>
                        {!! Form::open(['method' => 'PUT', 'action' => ['ProfilesController@update', $profile->id], 'files' => true,]) !!}
                        <div style="margin: 10px 0">
                            {!! Form::file('photo') !!}
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::submit(trans('Pakeisti'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>


                        {!! Form::close() !!}
                    </div>
                </div>
                {{------- /Change photo -------}}
            </div>
            <!-- /form profile -->

            <!-- form cpasswords -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Pakeisti slaptažodį</h2>
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
                        @if(session()->has('flash_green'))
                            <p class="bg-success"><strong>{{session()->get('flash_green')}}</strong></p>
                        @endif

                        @if(session()->has('flash_red'))
                            <p class="bg-danger"><strong>{{session()->get('flash_red')}}</strong></p>
                        @endif
                        <br />

                        {!! Form::open(['method' => 'POST', 'action' => ['UsersController@changePassword', $profile->user_id], 'class'=>'form-horizontal form-label-left']) !!}

                        <div class="form-group">
                            {!! Form::label('old_password', 'Dabartinis slaptažodis', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::password('old_password', ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Naujas slaptažodis', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Pakartoti naują slaptažodį', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
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
            <!-- /form passwords-->



        </div>





    </div>

    @stop