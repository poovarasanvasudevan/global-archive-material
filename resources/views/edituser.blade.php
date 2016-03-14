@extends("components.layout")

@section("toolbar")
    @include("components.maintoolbar")
@stop

@section("content")
    <div class="col-md-12" ng-controller="usereditcontroller">
        <center>
            <label class="bg-success">[[message]]</label>
            <label class="bg-danger">[[error]]</label>
        </center>

        @if($user != null)

            {{--{{dd($my)}}--}}

            <div class="col-md-3">

                <md-card id="card">
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
                        <md-button class="md-primary" ng-click="resetpassword({{$user->id}})">Reset Password</md-button>
                        <md-button class="md-accent">De-Active</md-button>
                    </md-card-actions>
                </md-card>

            </div>

            <div class="col-md-9 md-padding">
                <md-tabs class="md-primary" md-dynamic-height md-border-bottom>
                    <md-tab class="tab-height" label="Personal Details">
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
                                        <label class="md-padding">Middle Name</label>
                                    </td>
                                    <td>
                                        {{$user->middlename}}
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
                                        <label class="md-padding">Address</label>
                                    </td>
                                    <td>
                                        {{$user->address}}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="md-padding">Location</label>
                                    </td>
                                    <td>
                                        {{$location->description}}
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label class="md-padding">Mobile Number</label>
                                    </td>
                                    <td>
                                        {{$user->mobile}}
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

                    @permission("view.role")
                    <md-tab class="tab-height" label="Roles and Permission">
                        <md-content class="md-padding">
                            <table>

                                @foreach($allpermission as $permission)
                                    <div class="col-md-4">

                                        <md-card>
                                            <md-card-header>
                                                <md-card-avatar>
                                                    <i class="zmdi zmdi-account-box zmdi-hc-3x"></i>
                                                </md-card-avatar>
                                                <md-card-header-text>
                                                    <span class="md-title">{{$permission->name}}</span>
                                                    <span class="md-subhead">{{$permission->description}}</span>
                                                </md-card-header-text>
                                            </md-card-header>
                                            <md-divider></md-divider>
                                            <md-card-content>
                                                @foreach ($permission->slug as $key => $value)
                                                    <md-checkbox
                                                            class="{{$user->can($key.'.'.$permission->name)? 'md-checked' : ''}}"
                                                            id="{{$key.'.'.$permission->name}}"
                                                            ng-click="assignPermission('{{$key.'.'.$permission->name}}','{{$user->id}}','{{$key}}','{{$permission->name}}')">
                                                        {{$key}}
                                                    </md-checkbox>
                                                    <br/>
                                                @endforeach
                                            </md-card-content>
                                        </md-card>
                                    </div>

                                @endforeach
                            </table>
                        </md-content>
                    </md-tab>
                    @endpermission
                    <md-tab class="tab-height" label="Recent Activity">
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