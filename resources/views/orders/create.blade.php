@extends ('layouts.app')

@section ('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Elements</h3>
            </div>
        </div>
        <div class="clearfix"></div>


        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Klientas </h2>
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

                        {!! Form::open(['method' => 'POST', 'route' => ['orders.store'], 'files' => true, 'class'=>'form-horizontal form-label-left input_mask']) !!}
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                {!! Form::label('name', 'Pavadinimas arba vardas*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('name',[], null, ['class' => 'js-select-search js-select-search2 form-control']) !!}
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <a href="{{route('clients.create')}}">
                                        <button type="button" class="btn btn-primary btn-xs" style="margin-top: 5px">
                                            <i class="fa fa-pencil-profile "></i> Sukurti naują klientą </button></a>
                                </div>
                            </div>

                        {!! Form::close() !!}

                        <div id="js--vip"></div>
                        <div id="js--name"></div>
                        <div id="js--comp_id"></div>
                        <div id="js--comp_vat"></div>
                        <div id="js--address"></div>
                        <div id="js--phone"></div>
                        <div id="js--email"></div>
                        <div id="js--note"></div>

                    </div>
                </div>

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Star Rating</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h4>Star Ratings<small> Hover and click on a star</small></h4>
                        <div>
                            <div class="starrr stars"></div>
                            You gave a rating of <span class="stars-count">0</span> star(s)
                        </div>

                        <p>Also you can give a default rating by adding attribute data-rating</p>
                        <div class="starrr stars-existing" data-rating='4'></div>
                        You gave a rating of <span class="stars-count-existing">4</span> star(s)
                    </div>
                </div>


            </div>

            <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Užsakymo duomenys</h2>
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

                        {!! Form::open(['method' => 'POST', 'route' => ['orders.store'], 'files' => true,]) !!}

                        {!! Form::hidden('user_id', 0, ['id' => 'js--userid']) !!}
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('title', 'Pavadinimas*', ['class' => 'control-label']) !!}
                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('products', 'Prekės ar paslaugos*', ['class' => 'control-label']) !!}
                                {!! Form::text('products', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::submit(trans('Sukurti'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>

    </div>

@stop
