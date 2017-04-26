@extends ('layouts.app')

@section ('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Įmonės informacija</h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">


            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Įmonės rekvizitai</h2>
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
                        {!! Form::open(['method' => 'PUT', 'action' => ['CompaniesController@update', $company->id], 'class'=>'form-horizontal form-label-left']) !!}

                        <div class="form-group">
                            {!! Form::label('title', 'Įmonės pavadinimas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('title', $company->title, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('comp_id', 'Įmonės kodas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('comp_id', $company->comp_id, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('comp_vat', 'PVM mokėtojo kodas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('comp_vat', $company->comp_vat, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('address', 'Įmonės adresas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('address', $company->address, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('country', 'Valstybė', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('country', $company->country, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('postcode', 'Pašto kodas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('postcode', $company->postcode, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('register_nr', 'Registracijos numeris', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('register_nr', $company->register_nr, ['class' => 'form-control']) !!}
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
                                {!! Form::submit(trans('Atnaujinti informaciją'), ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Įmonės kontaktiniai duomenys</h2>
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
                        {!! Form::open(['method' => 'PUT', 'action' => ['CompaniesController@update', $company->id], 'class'=>'form-horizontal form-label-left']) !!}
                        <div class="form-group">
                            {!! Form::label('email', 'Įmonės el. paštas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::email('email', $company->email, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone', 'Įmonės telefonas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('phone', $company->phone, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('mob_phone', 'Įmonės mobilusis telefonas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('mob_phone', $company->mob_phone, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('fax', 'Įmonės faksas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('fax', $company->fax, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('website', 'Įmonės interneto puslapis', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {!! Form::text('website', $company->website, ['class' => 'form-control']) !!}
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
                                {!! Form::submit(trans('Atnaujinti duomenis'), ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>




        </div>





    </div>

@stop