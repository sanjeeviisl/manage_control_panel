/**
 * Created by Gautam on 7/8/2016.
 */

    var dependencies=[
    'ui.router'
]

var step=angular.module("step",dependencies);

step.config(function($stateProvider,$urlRouterProvider){
    $urlRouterProvider.otherwise("/user");

    $stateProvider
        .state("user",{
            url:"/user",
            templateUrl: "views/customer.html",
            controller : "usercon"
        })
        .state("provider",{
            url:"/provider",
            templateUrl: "views/provider.html",
             controller : "provider",
        })
        .state("request",{
            url:"/request",
            templateUrl:"views/request.html",
            controller:"request",
        })



});