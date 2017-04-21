@extends ('layouts.app')

@section ('content')


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Vartotojai</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                      <a href="{{route('users.create')}}"><button type="button" class="btn btn-primary">  <i class="fa fa-edit"></i> Sukurti vartotoją </button></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">

                            <div class="clearfix"></div>

                            @foreach ($users as $user)
                            <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                                <div class="well profile_view">
                                    <div class="col-sm-12">
                                        <h4 class="brief"><i>{{$user->profile['position']}}</i></h4>
                                        <div class="left col-xs-7">
                                            <h2>{{$user->profile['firstname']}} {{$user->profile['lastname']}}</h2>
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-building"></i> El. paštas: {{$user->profile['email']}} </li>
                                                <li><i class="fa fa-phone"></i> Telefonas: {{$user->profile['phone']}} </li>
                                            </ul>
                                        </div>
                                        <div class="right col-xs-5 text-center">
                                            <img src="images/{{$user->profile['photo']}}" alt="" class="img-circle img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 bottom text-center">
                                        <div class="col-xs-12 col-sm-6 emphasis">

                                        </div>
                                        <div class="col-xs-12 col-sm-6 emphasis">
                                            {!! Form::open(['method' => 'PUT', 'route' => ['users.update', 'id'=>$user->id], 'onsubmit' => 'return confirm("Ar tikrai deaktyvuoti vartotoją?")']) !!}


                                                    @if ($user->is_active == 1)
                                                        {!! Form::hidden('is_active', 0, ['class' => 'form-control', ] ) !!}
                                                        {!! Form::submit(trans('Deaktyvuoti'), ['class' => 'btn btn-danger  btn-xs']) !!}
                                                    @else
                                                        {!! Form::hidden('is_active', 1, ['class' => 'form-control']) !!}
                                                        {!! Form::submit(trans('Aktyvuoti'), ['class' => 'btn btn-primary  btn-xs']) !!}
                                                    @endif

                                            <a href="{{route('profiles.edit', ['id' => $user->profile['id']])}}"><button type="button" class="btn btn-success btn-xs">  <i class="fa fa-edit"></i> Keisti </button></a>
                                            {!! Form::close() !!}


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