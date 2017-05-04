@extends ('layouts.app')

@section ('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <div style="float: left;">
                    <img style="height: 100px; width: auto;" src="/images/avatars/{{$client->photo}}" alt="{{$client->name}}">
                </div>
                <div style="float: left; margin-left: 20px;">
                    <h3>{{$client->name}}  <br><small>@if ($client->type = 1) Įmonė @else Fizinis asmuo @endif</small>
                        <br><small>
                        @if ($client->vip == 1)
                                <i class="fa fa-exclamation" aria-hidden="true"></i> Svarbus klientas
                            @endif</small>
                    </h3>
                </div>
            </div>
            <div class="title_right" style="text-align: right; padding-right: 30px;">
                <form action="/clients/{{$client->id}}" method="post">
                    <a href="{{route('clients.show',$client->id)}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" >
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" name="submit" class="btn btn-default" onclick="return confirm('Ar tikrai norite ištrinti šį klientą?');">
                            <i class="fa fa-trash-o"> </i> Trinti
                        </button></a>
                </form>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-info "></i> Kliento duomenys <a href="" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-cog" aria-hidden="true"></i></a></h2>
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Redaguoti kliento duomenis</h4>
                                    </div>
                                    <div class="modal-body">
                                        @include ('clients.modal_edit_client')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav navbar-right panel_toolbox">
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
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Kliento kontaktai</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Istorija</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                    @if ($client->comp_id)
                                        <div class="mail_list listing">
                                            <div class="col-md-4 col-sm-4 col-xs-12"><strong>Įmonės kodas</strong></div>
                                            <div class="col-md-8 col-sm-8 col-xs-12">{{$client->comp_id}}</div>
                                    </div>
                                    @endif
                                    @if ($client->comp_vat)
                                        <div class="mail_list listing">
                                            <div class="col-md-4 col-sm-4 col-xs-12"><strong>PVM kodas</strong></div>
                                            <div class="col-md-8 col-sm-8 col-xs-12">{{$client->comp_vat}}</div>
                                        </div>
                                    @endif
                                        @if ($client->address)
                                            <div class="mail_list listing">
                                                <div class="col-md-4 col-sm-4 col-xs-12"><strong>Adresas</strong></div>
                                                <div class="col-md-8 col-sm-8 col-xs-12">{{$client->address}}</div>
                                            </div>
                                        @endif
                                        @if ($client->city)
                                            <div class="mail_list listing">
                                                <div class="col-md-4 col-sm-4 col-xs-12"><strong>Miestas</strong></div>
                                                <div class="col-md-8 col-sm-8 col-xs-12">{{$client->city}}</div>
                                            </div>
                                        @endif
                                        @if ($client->country)
                                            <div class="mail_list listing">
                                                <div class="col-md-4 col-sm-4 col-xs-12"><strong>Šalis</strong></div>
                                                <div class="col-md-8 col-sm-8 col-xs-12">{{$client->country}}</div>
                                            </div>
                                        @endif
                                        @if ($client->postcode)
                                            <div class="mail_list listing">
                                                <div class="col-md-4 col-sm-4 col-xs-12"><strong>Pašto kodas</strong></div>
                                                <div class="col-md-8 col-sm-8 col-xs-12">{{$client->postcode}}</div>
                                            </div>
                                        @endif
                                        @if ($client->phone)
                                            <div class="mail_list listing">
                                                <div class="col-md-4 col-sm-4 col-xs-12"><strong>Telefonas</strong></div>
                                                <div class="col-md-8 col-sm-8 col-xs-12"><a href="tel:{{$client->phone}}">{{$client->phone}}</a></div>
                                            </div>
                                        @endif
                                        @if ($client->fax)
                                            <div class="mail_list listing">
                                                <div class="col-md-4 col-sm-4 col-xs-12"><strong>Faksas</strong></div>
                                                <div class="col-md-8 col-sm-8 col-xs-12">{{$client->fax}}</div>
                                            </div>
                                        @endif
                                        @if ($client->email)
                                            <div class="mail_list listing">
                                                <div class="col-md-4 col-sm-4 col-xs-12"><strong>El. paštas</strong></div>
                                                <div class="col-md-8 col-sm-8 col-xs-12"><a href="mailto:{{$client->email}}">{{$client->email}}</a></div>
                                            </div>
                                        @endif
                                        @if ($client->bank)
                                            <div class="mail_list listing">
                                                <div class="col-md-4 col-sm-4 col-xs-12"><strong>Bankas</strong></div>
                                                <div class="col-md-8 col-sm-8 col-xs-12">{{$client->bank}}</div>
                                            </div>
                                        @endif
                                        @if ($client->bank_account)
                                            <div class="mail_list listing">
                                                <div class="col-md-4 col-sm-4 col-xs-12"><strong>Banko sąskaita</strong></div>
                                                <div class="col-md-8 col-sm-8 col-xs-12">{{$client->postcodebank_account}}</div>
                                            </div>
                                        @endif
                                        @if ($client->comment)
                                            <div class="mail_list listing">
                                                <div class="col-md-4 col-sm-4 col-xs-12"><strong>Komentarai</strong></div>
                                                <div class="col-md-8 col-sm-8 col-xs-12">{{$client->comment}}</div>
                                            </div>
                                        @endif


                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                    <ul class="to_do">
                                        @foreach($client->revisionHistory as $history )
                                            <li><strong>{{ $history->userResponsible()->name }}</strong> pakeitė {{ $history->fieldName() }} iš {{ $history->oldValue() }} į {{ $history->newValue() }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="">
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-money "></i> Užsakymai</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content4" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Kliento kontaktai</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Profile</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content6" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content4" aria-labelledby="home-tab">
                                        <ul class="list-unstyled timeline">
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Entertainment</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                                        </h2>
                                                        <div class="byline">
                                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                                        </div>
                                                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Entertainment</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                                        </h2>
                                                        <div class="byline">
                                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                                        </div>
                                                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Entertainment</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                                        </h2>
                                                        <div class="byline">
                                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                                        </div>
                                                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                                        <p>{{$client->address}}</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">
                                        <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                            booth letterpress, commodo enim craft beer mlkshk </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

        </div>
        <div class="clearfix"></div>

    </div>

@endsection