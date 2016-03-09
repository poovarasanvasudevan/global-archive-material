@extends("components.layout")
@section("toolbar")
    <div class="card">
        <div class="toolbar">

        </div>
    </div>
@endsection


@section("contents")



    <center>
        <h1 class="size-big">404</h1>

        <h1>The page you were looking for doesn't exist.</h1>
        <br/>
        <a href="dashboard">
            <lx-button lx-size="l" lx-type="raised" lx-color="blue">
                <i class="mdi mdi-home icon-white"></i>
                Click to Go Home Page
            </lx-button>
        </a>
    </center>
@endsection