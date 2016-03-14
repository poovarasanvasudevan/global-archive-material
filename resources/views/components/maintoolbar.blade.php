<div class="card fixed-nav-bar">
    <div class="toolbar bgc-teal-500 white">

        <div class="toolbar__left mr+++">
            <button class="btn btn--l btn--black btn--icon" lx-ripple>
                <i class="mdi mdi-menu icon-white"></i>
            </button>
        </div>

        <span class="toolbar__label fs-title"><a href="{{URL::to("dashboard")}}"
                                                 class="icon-white">{{env("APP_NAME")}}</a><sub>
                &nbsp;&nbsp;v2</sub></span>


        <div class="toolbar__right">


            @permission("view.user")
            <a class="md-button md-ink-ripple" href="{{URL::to("users")}}">Users</a>
            <a class="md-button md-ink-ripple" href="{{URL::to("users")}}">Roles</a>
            @endpermission
            <lx-dropdown position="right" from-top>
                <button class="btn div-left  btn--black" lx-ripple lx-dropdown-toggle>
                    {{Auth::user()->firstname}}
                    &nbsp;&nbsp;
                    <md-icon>
                        <img src="{{URL::to(Auth::user()->image)}}">
                    </md-icon>
                </button>

                <lx-dropdown-menu style="margin-top: 20px !important;">
                    <ul>
                        <li><a class="dropdown-link  dropdown-link--is-large"><i class="zmdi zmdi-share"></i><span>Shortcuts</span></a>
                        </li>
                        <li><a class="dropdown-link  dropdown-link--is-large"><i class="zmdi zmdi-settings"></i><span>System Settings</span></a>
                        </li>
                        <li><a class="dropdown-link  dropdown-link--is-large"><i
                                        class="zmdi zmdi-account-o"></i><span>Accounts Setting</span></a></li>

                        <li><a class="dropdown-link  dropdown-link--is-large"><i class="zmdi mdi-eye-off"></i><span>Admin System Setting</span></a>
                        </li>

                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-link  dropdown-link--is-large" href="feedback"><i
                                        class="zmdi zmdi-file"></i><span>Feedback</span></a></li>

                        <li><a class="dropdown-link  dropdown-link--is-large"><i
                                        class="zmdi zmdi-network-locked"></i><span>Problem</span></a></li>

                        <li><a class="dropdown-link  dropdown-link--is-large"><i
                                        class="zmdi zmdi-help"></i><span>Help</span></a></li>
                        <li class="dropdown-divider"></li>


                        <li>
                            <a class="dropdown-link  dropdown-link--is-large"
                               href="{{URL::to("logout")}}">
                                <i class="zmdi zmdi-close"></i><span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </lx-dropdown-menu>
            </lx-dropdown>
        </div>
    </div>
</div>