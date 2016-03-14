@extends("components.layout")

@section("toolbar")
    @include("components.maintoolbar")
@stop

@section("content")
    <div ng-controller="dashboardcontroller">

        <div ng-repeat="at in artefacttypes">
            <div class="col-md-2">
                <md-card>
                    <md-card-title>
                        <md-card-title-text>
                            <span class="md-headline">[[at.artefacttypedescription]]</span>
                            <span class="md-subhead">[[at.artefacttypecode]]</span>
                        </md-card-title-text>
                        <md-card-title-media>
                            <div class="md-media-sm card-media"></div>
                        </md-card-title-media>
                    </md-card-title>
                    <md-card-actions layout="row" layout-align="end center">
                        <md-button><i class="zmdi zmdi-eye"></i>&nbsp;&nbsp;View</md-button>
                        <md-button><i class="zmdi zmdi-edit"></i>&nbsp;&nbsp;Edit</md-button>
                    </md-card-actions>
                </md-card>
            </div>
        </div>

        <div>
            <hr/>
        </div>
    </div>
@endsection