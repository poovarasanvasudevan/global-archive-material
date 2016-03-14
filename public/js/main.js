/**
 * Created by poovarasanv on 29-01-2016.
 */
var app = angular.module('global', ['ngMaterial', 'lumx', 'angularInlineEdit'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});
app.config(function ($mdThemingProvider) {
    $mdThemingProvider.theme('default')
        .primaryPalette('teal')
        .accentPalette('blue');
});

var BASEURL = "http://localhost/global-laravel/public";
var TIMEOUTTIME = 5000;
var LOGINURL = BASEURL + '/validate/';
var DASHBOARDURL = BASEURL + '/dashboard';
var MENUURL = BASEURL + '/menus';
var ARTEFACTTYPEURL = BASEURL + '/artefacts';
var GETALLUSERURL = BASEURL + '/getallusers';
var EDITUSERURL = BASEURL + '/user/';
var RESETPASSWORDURL = BASEURL + '/resetpassword/';
var ASSIGNPERMISSIONURL = BASEURL + '/assignpermission/';

app.controller('toolbar', function ($scope) {

});

app.controller('globalcontroller', function ($scope, $timeout, $http) {

    $scope.AlertMessage = true;

    $timeout(function () {
        $scope.AlertMessage = true;
    }, 3000);


    $http.get(MENUURL).success(function (data) {
        $scope.menus = data.result;
    });


    $scope.logout = function () {

    };

    $scope.my = function () {

    };
});

app.controller('maintoolbar', function ($scope) {

});

app.controller('usereditcontroller', function ($scope, $http, $mdToast, $mdSticky) {

    //$mdSticky($scope, angular.element(document.querySelector("#card")));
    $scope.resetpassword = function (id) {

        $http
            .get(RESETPASSWORDURL + id)
            .success(function (data) {
                if (data.result == true)
                    $mdToast.show({
                        hideDelay: 10000,
                        position: 'bottom right',
                        template: '<md-toast><i class="zmdi zmdi-check zmdi-hc-2x"></i>&nbsp;&nbsp;&nbsp;Password Reset Succesfully</md-toast>'
                    });
                else

                    $mdToast.show({
                        hideDelay: 10000,
                        position: 'bottom right',
                        template: '<md-toast><i class="zmdi zmdi-close zmdi-hc-2x"></i>&nbsp;&nbsp;&nbsp;Failed to reset Password</md-toast>'
                    });

            })
            .error(function () {
                $scope.error = "Some Server Error.."
            })

    }


    $scope.assignPermission = function (per,userid, key, name) {

        if (hasClass(document.getElementById(per), "md-checked")) {

            alert("Un checked");
        } else {
            $http
                .get(ASSIGNPERMISSIONURL + userid + "/" + key + "/" + name)
                .success(function (data) {
                    if (data.result == true) {
                        $mdToast.show({
                            hideDelay: 10000,
                            position: 'bottom right',
                            template: '<md-toast><i class="zmdi zmdi-check zmdi-hc-2x"></i>&nbsp;&nbsp;&nbsp;Permission Assigned Succesfully</md-toast>'
                        });
                    } else {
                        $mdToast.show({
                            hideDelay: 10000,
                            position: 'bottom right',
                            template: '<md-toast><i class="zmdi zmdi-close zmdi-hc-2x"></i>&nbsp;&nbsp;&nbsp;Failed to Assign Permission</md-toast>'
                        });
                    }

                })
                .error(function (data) {

                });
        }

        //alert();


        //alert(obj.checked);

    }

    function hasClass(element, classNameToTestFor) {
        var classNames = element.className.split(' ');
        for (var i = 0; i < classNames.length; i++) {
            if (classNames[i].toLowerCase() == classNameToTestFor.toLowerCase()) {
                return true;
            }
        }
        return false;
    }
});

app.controller('usercontroller', function ($scope, $http, $mdDialog, $window) {

    $http.get(GETALLUSERURL)
        .success(function (data) {
            $scope.users = data;

        })
        .error(function (data) {
            $scope.error = "Error in processing";

        })

    $scope.doUserDeActive = function (id, ev) {
        var confirm = $mdDialog.confirm()
            .title('Are you sure?')
            .textContent('Are you sure you want to make de-active this user.')
            .ariaLabel('Lucky day')
            .targetEvent(ev)
            .ok('Yes de-active him.')
            .cancel("No dont't do it");
        $mdDialog.show(confirm).then(function () {
            $scope.status = 'You decided to get rid of your debt.';
        }, function () {
            $scope.status = 'You decided to keep your debt.';
        });
    }

    $scope.doUserActive = function (id, ev) {
        var confirm = $mdDialog.confirm()
            .title('Are you sure?')
            .textContent('Are you sure you want to make active this user.')
            .ariaLabel('Lucky day')
            .targetEvent(ev)
            .ok('Please do it!')
            .cancel("No dont't do it");
        $mdDialog.show(confirm).then(function () {
            $scope.status = 'You decided to get rid of your debt.';
        }, function () {
            $scope.status = 'You decided to keep your debt.';
        });
    }


    $scope.editUser = function (id) {
        $window.location.href = EDITUSERURL + id;
    }


});
app.controller('logincontroller', function ($scope, $http, $timeout, $window) {
    $scope.processForm = function () {
        //var loginData = {'username': $scope.username, 'password': $scope.password};

        $http
            .get(LOGINURL + $scope.username + "/" + $scope.password)
            .success(function (data) {
                if (data.result == true) {
                    $window.location.href = DASHBOARDURL;
                } else {
                    $scope.AlertMessage = false;
                    $scope.message = "Invalid Username or password..";
                    $timeout(function () {
                        $scope.AlertMessage = true;
                    }, TIMEOUTTIME);
                }
            });
    }
});

app.controller('sidebarcontroller', function ($scope) {

    /**
     * | Sidebar Controller for managing sidebar events
     * |
     * |  This event will responsible for every clickAble item from sidebar
     * |
     * */


});

app.controller('dashboardcontroller', function ($scope, $http) {

    $http.get(ARTEFACTTYPEURL).success(function (data) {
        $scope.artefacttypes = data;
    });

});


$(document).ready(function () {
    var stickyNavTop = $('.fixed-nav-bar').offset().top;

    var stickyNav = function () {
        var scrollTop = $(window).scrollTop();

        if (scrollTop > stickyNavTop) {
            $('.fixed-nav-bar').addClass('sticky');
        } else {
            $('.fixed-nav-bar').removeClass('sticky');
        }
    };

    stickyNav();

    $(window).scroll(function () {
        stickyNav();
    });


});


//function assignPermission(obj,userid,permission) {
//    if($(obj).checked) {
//        alert("true");
//    } else {
//        alert("false");
//    }
//}
