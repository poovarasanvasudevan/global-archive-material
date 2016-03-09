@extends("components.layout")

@section("toolbar")
    @include("components.toolbar")
@stop

@section("content")
    <div class="col-md-4 col-md-offset-4" ng-controller="logincontroller">
        <md-card style="padding: 25px;">
            <md-card-content>
                <form name="signInForm" ng-submit="processForm()" class="layout-margin">

                    <md-input-container md-no-float class="md-block">
                        <md-icon class="zmdi zmdi-account zmdi-icon-size"></md-icon>
                        <input type="text" ng-model="username"  placeholder="Abyasi Id" required>
                    </md-input-container>

                    <md-input-container md-no-float class="md-block">
                        <md-icon class="zmdi zmdi-eye zmdi-icon-size"></md-icon>
                        <input  ng-model="password" type="password" placeholder="Password" required>
                    </md-input-container>
                    <div class="row" style="margin: 5px;">
                        <div class="pull-left marginT10 marginL10">
                            <md-checkbox ng-model="rememberme">Remember me</md-checkbox>
                        </div>
                        <div class="pull-right">
                             <md-button type="submit" class="md-raised md-primary">Login</md-button>
                        </div>
                    </div>

                    <center>
                        <h4 class="errorMessage error" ng-hide="AlertMessage">[[message]]</h4>
                    </center>
                </form>
            </md-card-content>

        </md-card>
    </div>
@stop