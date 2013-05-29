'use strict';

var home = angular.module('home',['ngResource']);

home.controller('HomeController',['$scope','$http',function($scope,$http) {
    
    $scope.terms = Array.create();   
    $scope.showForm = true;
    $scope.showProgress = 'hide';
    
    $scope.submit = function($event) {
        
        //disable event 
        $event.preventDefault();        
        
        //setup form data
        var formdata = jQuery('form').serializeArray();   
        var formurl = jQuery('form').attr('action');        
        
        //manipulate scope
        $scope.query = formdata[0].value;
        $scope.showProgress = 'show';
        
        //hide form
        jQuery('form').hide('slow');
        
        //send ajax request
        $http({
            url: formurl,
            cache: false,
            data: $.param({query: formdata[0].value}),
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(data,status) { 
            
            jQuery('form').show('slow');
            
            $scope.query = '';
            $scope.showProgress = 'hide';
            
            console.log(data);
            
        }).error(function(data,status) {
            alert(data);
        });
        
    }
}]);