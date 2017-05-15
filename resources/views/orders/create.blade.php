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
            <div class="col-md-4 col-xs-12">
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

            <div class="col-md-8 col-xs-12">
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

                        {!! Form::open(['method' => 'POST', 'route' => ['orders.store'], 'id'=>'js--products', 'files' => true,]) !!}

                        {!! Form::hidden('user_id', 0, ['id' => 'js--userid']) !!}
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('title', 'Pavadinimas*', ['class' => 'control-label']) !!}
                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>
                        </div>
                        <div class="x_panel">
                            <div class="row">
                                <h2>Produktai ar paslaugos</h2>
                            </div>
                            <div >
                                <script>
                                    var vat = [];
                                    var prices_vat = [] ;
                                    vat.push('{{ $company->vat }}');
                                    prices_vat.push('{{ $company->prices_vat }}');
                                </script>
                                <div class="form-group product-row">
                                    <div class="col-lg-5 col-md-12 col-xs-12 form-group">
                                        <input type="text" name="product[0].product-title" class="form-control js--product-name" placeholder="Produktas ar paslauga">
                                    </div>
                                    <div class="col-lg-2 col-md-12 col-xs-12 form-group">
                                        <input type="text" name="product[0].quantity" class="form-control js--quantity" placeholder="Kiekis">
                                    </div>
                                    @if ($company->prices_vat)
                                    <div class="col-lg-2 col-md-12 col-xs-12 form-group">
                                        <input type="text" name="product[0].price2" class="form-control js--price-calc"  placeholder="Kaina be PVM" readonly>
                                    </div>
                                    <div class="col-lg-2 col-md-12 col-xs-12 form-group">
                                        <input type="text" name="product[0].price" class="form-control js--price"  placeholder="Kaina su PVM"  >
                                    </div>
                                    @else
                                        <div class="col-lg-2 col-md-12 col-xs-12 form-group">
                                            <input type="text" name="product[0].price" class="form-control js--price" placeholder="Kaina be PVM" >
                                        </div>
                                        <div class="col-lg-2 col-md-12 col-xs-12 form-group">
                                            <input type="text" name="product[0].price2" class="form-control js--price-calc" placeholder="Kaina su PVM"  readonly>
                                        </div>
                                    @endif
                                    <div class="col-lg-1 col-md-12 col-xs-1">
                                        <button type="button" class="add__btn"><i class="fa fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>

                            {{--Template--}}
                                <div class="form-group product-row hide" id="productTemplate">
                                    <div class="col-lg-5 col-md-12 col-xs-12 form-group">
                                        <input type="text" name="jsProductTitle" class="form-control js--product-name" placeholder="Produktas ar paslauga">
                                    </div>
                                    <div class="col-lg-2 col-md-12 col-xs-12 form-group">
                                        <input type="text" name="jsQuantity" class="form-control js--quantity" placeholder="Kiekis">
                                    </div>
                                    @if ($company->prices_vat)
                                        <div class="col-lg-2 col-md-12 col-xs-12 form-group">
                                            <input type="text" name="" class="form-control js--price-calc" placeholder="Kaina be PVM" readonly>
                                        </div>
                                        <div class="col-lg-2 col-md-12 col-xs-12 form-group">
                                            <input type="text" name="jsPrice" class="form-control js--price" placeholder="Kaina su PVM"  >
                                        </div>
                                    @else
                                        <div class="col-lg-2 col-md-12 col-xs-12 form-group">
                                            <input type="text" name="jsPrice" class="form-control js--price" placeholder="Kaina be PVM" >
                                        </div>
                                        <div class="col-lg-2 col-md-12 col-xs-12 form-group">
                                            <input type="text" name="" class="form-control js--price-calc" placeholder="Kaina su PVM"  readonly>
                                        </div>
                                    @endif
                                    <div class="col-lg-1 col-md-12 col-xs-1">
                                        <button type="button" class="remove__btn"><i class="fa fa-minus-circle"></i></button>
                                    </div>
                                </div>
                            {{--Template--}}
                        </div>
                        <div class="x_panel">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                    {!! Form::label('advance', 'Avansas', ['class' => 'control-label']) !!}
                                    {!! Form::text('advance', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                    Bendra suma
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="delivery date">Užsakymo įvykdymo data</label>
                                <input name="delivery_date" type="date" class="datepicker">
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
