@extends ('layouts.app')

@section ('content')


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Klientai</h3>
            </div>

            @include ('includes.search')
        </div>

        <div class="clearfix"></div>


        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                <ul class="pagination pagination-split">
                                    @foreach($letters as $letter)
                                    <li><a href="{{route('sbyl', $letter )}}">{{$letter}}</a></li>
                                        @endforeach
                                </ul>
                            </div>

                            <div class="clearfix"></div>

                            @foreach($clients as $client)
                            <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                                <div class="well profile_view">
                                    <div class="col-sm-12">
                                        <h4 class="brief"><i>
                                                    @if ($client->type == 0)
                                                        Fizinis asmuo
                                                    @else
                                                        Įmonė
                                                    @endif
                                            </i></h4>
                                        <div class="left col-xs-7">
                                            <h2>{{$client->name}}</h2>
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-building"></i> <strong>Adresas: </strong>{{$client->address}} <br>{{$client->city}}, {{$client->country}} </li>
                                                <li><i class="fa fa-phone"></i> Telefonas: {{$client->phone}}</li>
                                                <li><i class="fa fa-envelope"></i> El. paštas: {{$client->email}}</li>
                                                <li><i class="fa fa-male"></i> Atsakingas: {{$client->profile->firstname}}</li>
                                            </ul>
                                        </div>
                                        <div class="right col-xs-5 text-center">
                                            <img src="/images/avatars/{{$client->photo}}" alt="" class="img-circle img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 bottom text-center">
                                        <div class="col-xs-12 col-sm-6 emphasis">
                                            <p class="ratings">
                                                <span>
                                                    @if ($client->vip == 1)
                                                        <img src="images/resources/star.png" alt="Svarbus klientas">
                                                    @else
                                                        <img src="images/resources/nostar.png" alt="Svarbus klientas">
                                                    @endif</span>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 emphasis">
                                            <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                                </i> <i class="fa fa-comments-o"></i> </button>
                                            <button type="button" class="btn btn-primary btn-xs">
                                                <i class="fa fa-user"> </i> View Profile
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop