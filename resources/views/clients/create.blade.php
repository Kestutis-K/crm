@extends ('layouts.app')

@section ('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Sukurti naują klientą</h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <!-- form profile -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sukurti naują klientą</h2>
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
                        {!! Form::open(['method' => 'POST', 'action' => ['ClientsController@store'], 'files' => true, 'class'=>'form-horizontal form-label-left']) !!}

                        <div class="form-group">{!! Form::label('type', 'Kliento tipas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('type', ['0' => 'Fizinis asmuo', '1' => 'Įmonė'], null, ['class'=>'form-control', 'placeholder' => 'Pasirinkite...']); !!}
                            </div>
                        </div>

                        <div class="form-group">{!! Form::label('vip', 'Svarbus klientas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('vip', ['0' => 'Ne', '1' => 'Taip'], null, ['class'=>'form-control', 'placeholder' => 'Pasirinkite...']); !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('name', 'Vardas ir pavardė arba įmonės pavadinimas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Pvz.: Jonaitis Jonas']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('comp_id', 'Įmonės kodas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('comp_id', null, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('comp_vat', 'Įmonės PVM kodas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('comp_vat', null, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('bank', 'Kliento bankas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('bank', null, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('bank_account', 'Kliento banko sąskaita', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('bank_account', null, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone', 'Telefonas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'El. paštas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('address', 'Adresas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('address', null, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('city', 'Miestas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('city', null, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('country', 'Valstybė', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('country', null, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('postcode', 'Pašto kodas', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('postcode', null, ['class' => 'form-control']) !!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('comment', 'Komentaras', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 4, 'cols' => 40]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('photo', 'Logotipas arba nuotrauka', ['class' => 'control-label col-md-3 col-sm-3 col-xs-3']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::file('photo', ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                {!! Form::submit(trans('Sukurti'), ['class' => 'btn btn-success']) !!}
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