/**
 * ng-inline-edit v0.7.0 (http://tamerayd.in/ng-inline-edit)
 * Copyright 2015 Tamer Aydin (http://tamerayd.in)
 * Licensed under MIT
 */
!function (n, i, e) {
    "use strict";
    i.module("angularInlineEdit.providers", []).value("InlineEditConfig", {
        btnEdit: "Edit",
        btnSave: "",
        btnCancel: "",
        editOnClick: !1,
        onBlur: null
    }).constant("InlineEditConstants", {CANCEL: "cancel", SAVE: "save"})
}(window, window.angular), function (n, i, e) {
    "use strict";
    i.module("angularInlineEdit.controllers", []).controller("InlineEditController", ["$scope", "$document", "$timeout", function (n, i, e) {
        n.placeholder = "", n.validationError = !1, n.validating = !1, n.isOnBlurBehaviorValid = !1, n.cancelOnBlur = !1, n.editMode = !1, n.inputValue = "", n.editText = function (t) {
            n.editMode = !0, n.inputValue = "string" == typeof t ? t : n.model, e(function () {
                n.editInput[0].focus(), n.isOnBlurBehaviorValid && i.bind("click", n.onDocumentClick)
            }, 0)
        }, n.applyText = function (t, l) {
            function a() {
                n.model = r, n.callback({newValue: r}), n.editMode = !1
            }

            function d() {
                n.validationError = !0, e(function () {
                    n.editText(r)
                }, 0)
            }

            function o(i) {
                n.validating = !1, i && l && n.$apply()
            }

            var r = n.inputValue;
            if (n.validationError = !1, t || n.model === r)n.editMode = !1, l && n.$apply(); else {
                n.validating = !0, l && n.$apply();
                var c = n.validate({newValue: n.inputValue});
                c && c.then ? c.then(a)["catch"](d)["finally"](o) : c || "undefined" == typeof c ? (a(), o(!0)) : (d(), o(!0))
            }
            n.isOnBlurBehaviorValid && i.unbind("click", n.onDocumentClick)
        }, n.onInputKeyup = function (i) {
            if (!n.validating)switch (i.keyCode) {
                case 13:
                    if (n.isInputTextarea)return;
                    n.applyText(!1, !1);
                    break;
                case 27:
                    n.applyText(!0, !1)
            }
        }, n.onDocumentClick = function (i) {
            n.validating || i.target !== n.editInput[0] && n.applyText(n.cancelOnBlur, !0)
        }
    }])
}(window, window.angular), function (n, i, e) {
    "use strict";
    i.module("angularInlineEdit.directives", ["angularInlineEdit.providers", "angularInlineEdit.controllers"]).directive("inlineEdit", ["$compile", "InlineEditConfig", "InlineEditConstants", function (n, e, t) {
        return {
            restrict: "A",
            controller: "InlineEditController",
            scope: {model: "=inlineEdit", callback: "&inlineEditCallback", validate: "&inlineEditValidation"},
            link: function (l, a, d) {
                l.model = l.$parent.$eval(d.inlineEdit), l.isInputTextarea = d.hasOwnProperty("inlineEditTextarea");
                var o = d.hasOwnProperty("inlineEditOnBlur") ? d.inlineEditOnBlur : e.onBlur;
                (o === t.CANCEL || o === t.SAVE) && (l.isOnBlurBehaviorValid = !0, l.cancelOnBlur = o === t.CANCEL);
                var r = i.element("<div class=\"ng-inline-edit\" ng-class=\"{'ng-inline-edit--validating': validating, 'ng-inline-edit--error': validationError}\">"), c = i.element((l.isInputTextarea ? "<textarea " : '<input type="text" ') + 'class="ng-inline-edit__input" ng-disabled="validating" ng-show="editMode" ng-keyup="onInputKeyup($event)" ng-model="inputValue" placeholder="{{placeholder}}" />'), u = i.element('<div class="ng-inline-edit__inner-container"></div>');
                u.append(i.element('<span class="ng-inline-edit__text" ng-class="{\'ng-inline-edit__text--placeholder\': !model}" ' + (d.hasOwnProperty("inlineEditOnClick") || e.editOnClick ? 'ng-click="editText()" ' : "") + 'ng-if="!editMode">{{(model || placeholder)' + (d.hasOwnProperty("inlineEditFilter") ? " | " + d.inlineEditFilter : "") + "}}</span>"));
                var p = d.hasOwnProperty("inlineEditBtnEdit") ? d.inlineEditBtnEdit : e.btnEdit;
                p && u.append(i.element('<a class="ng-inline-edit__button ng-inline-edit__button--edit" ng-if="!editMode" ng-click="editText()">' + p + "</a>"));
                var s = d.hasOwnProperty("inlineEditBtnSave") ? d.inlineEditBtnSave : e.btnSave;
                s && u.append(i.element('<a class="ng-inline-edit__button ng-inline-edit__button--save" ng-if="editMode && !validating" ng-click="applyText(false, false)">' + s + "</a>"));
                var g = d.hasOwnProperty("inlineEditBtnCancel") ? d.inlineEditBtnCancel : e.btnCancel;
                g && u.append(i.element('<a class="ng-inline-edit__button ng-inline-edit__button--cancel" ng-if="editMode && !validating" ng-click="applyText(true, false)">' + g + "</a>")), r.append(c).append(u), a.append(r), l.editInput = c, d.$observe("inlineEdit", function (i) {
                    l.model = l.$parent.$eval(i), n(a.contents())(l)
                }), d.$observe("inlineEditPlaceholder", function (n) {
                    l.placeholder = n
                }), l.$watch("model", function (n) {
                    !isNaN(parseFloat(n)) && isFinite(n) && 0 === n && (l.model = "0")
                })
            }
        }
    }])
}(window, window.angular), function (n, i, e) {
    "use strict";
    i.module("angularInlineEdit", ["angularInlineEdit.providers", "angularInlineEdit.controllers", "angularInlineEdit.directives"])
}(window, window.angular);