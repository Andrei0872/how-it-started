//    cream app angular 
// $scope - javascript object cu proprietati si metode VALABILE pt control si view 
var app = angular.module("myApp",[]).controller("myCtrl",function($scope){
    $scope.discipline = [
        'Informatica',
        'Matematica',
        'Romana',
        'Fizica',
        'Educatie Fizica',
        'Logica',
        'Educatie Muzicala',
        'Desen',
        'Franceza',
        'Engleza',
        'Religie',
        'Istorie',
        'Geografie',
        'Cultura Civica',
        'Consiliere',
        'Biologie',
        'Educatie Tehnologica',
        'Chimie',
        'TIC',
        'Psihologie',
        'Educatie Antreprenoriala',
        'Economie'
    ];

    $scope.complete = function(string) {
        var output = [];
        angular.forEach($scope.discipline,function(materie){

            if(materie.toLowerCase().indexOf(string.toLowerCase()) >=0) {
                output.push(materie); //am adaugat materia in vector
            }
            $scope.hideThis = false;
        });
        $scope.filterMaterie = output; 
    };
    $scope.fill = function(materie) {
        $scope.mat = materie;
        $scope.hideThis = true;
    };
});