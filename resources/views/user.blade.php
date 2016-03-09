@extends("components.layout")

@section("toolbar")
    @include("components.maintoolbar")
@stop

@section("content")
    <div class="col-md-12" ng-controller="usercontroller">

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3 pull-right">
                    <div class="col-md-4">
                        <md-button class="md-raised md-primary"><i class="zmdi zmdi-account-add"></i>&nbsp;&nbsp; New
                            User
                        </md-button>
                    </div>

                    <div class="col-md-8">
                        <input type="text" ng-model="search" class="form-control md-margin">
                    </div>

                </div>
            </div>
        </div>
        <md-divider></md-divider>

        <center>
            <label class="error">[[error]]</label>
        </center>


        <div ng-repeat="user in users | filter:search">
            <div class="col-md-3">
                <md-card>
                    <md-card-title>
                        <md-card-title-text>
                            <span class="md-headline">[[user.firstname]]</span>
                            <span class="md-subhead">[[user.email]]</span>
                        </md-card-title-text>
                        <md-card-title-media>
                            <div class="md-media-md card-media">
                                <img src="[[user.image]]">
                            </div>
                        </md-card-title-media>
                    </md-card-title>
                    <md-card-actions layout="row" layout-align="end center">
                        <md-button ng-click="editUser(user.id)"><i class="zmdi zmdi-edit"></i> &nbsp;&nbsp;Edit
                        </md-button>
                        <md-button id="[[user.id]]" ng-click="doUserDeActive(user.id,$event)"><i
                                    class="zmdi zmdi-close"></i>&nbsp;&nbsp;De-Active
                        </md-button>
                    </md-card-actions>
                </md-card>
            </div>
        </div>


    </div>

@endsection