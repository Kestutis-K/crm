@extends ('layouts.app')

@section ('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Redaguoti kliento duomenis</h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <!-- form profile -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Redaguoti kliento duomenis</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a href="{{route('clients.show',$client->id)}}">
                                    <button type="button" class="btn btn-primary btn-xs">
                                        <i class="fa fa-user"> </i> Eiti į kliento kortelę
                                    </button></a>
                            </li>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if(session()->has('flash_blue'))
                            <p class="bg-success"><strong>{{session()->get('flash_blue')}}</strong></p>
                        @endif
                        @if(session()->has('flash_red'))
                            <p class="bg-success"><strong>{{session()->get('flash_red')}}</strong></p>
                        @endif
                        <br />
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
                        <br />
                        {!! Form::open(['method' => 'PUT', 'action' => ['ClientsController@update', $client->id], 'files' => true, 'class'=>'form-horizontal form-label-left']) !!}

                        <div class="form-group">{!! Form::label('type', 'Kliento tipas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('type',['0' => 'Fizinis asmuo', '1' => 'Įmonė'], $client->type,  ['class'=>'form-control']); !!}
                            </div>
                        </div>

                        <div class="form-group">{!! Form::label('vip', 'Svarbus klientas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('vip', ['0' => 'Ne', '1' => 'Taip'], $client->vip, ['class'=>'form-control']); !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('name', 'Vardas ir pavardė arba įmonės pavadinimas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('name', $client->name, ['class' => 'form-control', 'placeholder'=>'Pvz.: Jonaitis Jonas']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('comp_id', 'Įmonės kodas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('comp_id', $client->comp_id, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('comp_vat', 'Įmonės PVM kodas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('comp_vat', $client->comp_vat, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('bank', 'Kliento bankas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('bank', $client->bank, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('bank_account', 'Kliento banko sąskaita', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('bank_account', $client->bank_account, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone', 'Telefonas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('phone', $client->phone, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'El. paštas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::email('email', $client->email, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('address', 'Adresas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('address', $client->address, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('city', 'Miestas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('city', $client->city, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('country', 'Valstybė', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('country', $client->country, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('postcode', 'Pašto kodas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('postcode', $client->postcode, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('note', 'Komentaras', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::textarea('note', $client->note, ['class' => 'form-control', 'rows' => 4, 'cols' => 40]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('photo', 'Logotipas arba nuotrauka', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="/images/avatars/{{$client->photo}}" alt="">
                                {!! Form::file('photo', ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                {!! Form::submit(trans('Atnaujinti'), ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
            <!-- /form profile -->




        </div>





    </div>

@stop