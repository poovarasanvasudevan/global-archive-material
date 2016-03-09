@include("components.header")

<div layout="column" ng-controller="globalcontroller">
    @yield("toolbar")
    <md-content flex class="my-bg marginT10">
        <div>
            <div class="col-md-12">
                @yield("content")
            </div>
        </div>
    </md-content>
</div>
@include("components.footer")
