@extends("components.layout")

@section("toolbar")
    @include("components.maintoolbar")
@stop

@section("content")
    <div class="col-md-12">

        @if($user != null)

            <div class="col-md-3">

                <md-card>
                    <md-card-title>
                        <md-card-title-text>
                            <span class="md-headline">{{$user->firstname}}</span>
                            <span class="md-subhead">{{$user->lastname}}</span>
                            <span class="md-subhead">{{$user->email}}</span>
                        </md-card-title-text>
                        <md-card-title-media>
                            <div class="md-media-md card-media">
                                <img src="{{URL::to($user->image)}}">
                            </div>
                        </md-card-title-media>
                    </md-card-title>
                    <md-card-actions layout="row" layout-align="end center">
                        <md-button>Action 1</md-button>
                        <md-button>Action 2</md-button>
                    </md-card-actions>
                </md-card>

            </div>

            <div class="col-md-9 md-padding">
                <md-tabs class="md-primary" md-dynamic-height md-border-bottom>
                    <md-tab label="Personal Details">
                        <md-content class="md-padding">

                            <table class="table table-responsive">
                                <tr>
                                    <td>
                                        <label class="md-padding">First Name</label>
                                    </td>
                                    <td style="width: 86%;">
                                        {{$user->firstname}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="md-padding">Last Name</label>
                                    </td>
                                    <td>
                                        {{$user->lastname}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="md-padding">Email </label>
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="md-padding">Abhyasi Id</label>
                                    </td>
                                    <td>
                                        {{$user->abhyasiid}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="md-padding">Quotes</label>
                                    </td>
                                    <td>
                                       <p>{{$user->quotes}}</p>
                                    </td>
                                </tr>
                            </table>
                        </md-content>
                    </md-tab>
                    <md-tab label="Roles and Permission">
                        <md-content class="md-padding">
                            <h1 class="md-display-2">Tab One</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis ante augue.
                                Phasellus volutpat neque ac dui mattis vulputate. Etiam consequat aliquam cursus. In
                                sodales
                                pretium ultrices. Maecenas lectus est, sollicitudin consectetur felis nec, feugiat
                                ultricies
                                mi.</p>
                        </md-content>
                    </md-tab>
                    <md-tab label="Recent Activity">
                        <md-content class="md-padding">
                            <h1 class="md-display-2">Tab One</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis ante augue.
                                Phasellus volutpat neque ac dui mattis vulputate. Etiam consequat aliquam cursus. In
                                sodales
                                pretium ultrices. Maecenas lectus est, sollicitudin consectetur felis nec, feugiat
                                ultricies
                                mi.</p>
                        </md-content>
                    </md-tab>
                    <md-tab label="Account Settings">
                        <md-content class="md-padding">
                            <h1 class="md-display-2">Tab One</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis ante augue.
                                Phasellus volutpat neque ac dui mattis vulputate. Etiam consequat aliquam cursus. In
                                sodales
                                pretium ultrices. Maecenas lectus est, sollicitudin consectetur felis nec, feugiat
                                ultricies
                                mi.</p>
                        </md-content>
                    </md-tab>
                </md-tabs>
            </div>

        @else
            <label>Invalid User...</label>
        @endif

    </div>
@endsection