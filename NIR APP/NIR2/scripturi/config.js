
//config.js
// despre AngularJs routing : https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwiTs7bDktvbAhUNiKYKHbgAC3EQwqsBCCwwAA&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3Dy7FojM9BTdE&usg=AOvVaw2K9Cxuvh4Tt5GXfl0W8vbX

//punem routing ul in config, pt ca vrem ca totul sa se intample pana sa se incarce totul

app.config(['$routeProvider','$locationProvider',function($routeProvider,$locationProvider) {

    // unde am gasit asta : https://stackoverflow.com/questions/23145194/angularjs-routing-not-working
    // https://stackoverflow.com/questions/41214312/exclamation-mark-after-hash-in-angularjs-app
    //pt a preveni "!" - ceva caracteristic la angular 1.5.6
    $locationProvider.hashPrefix('');

    $routeProvider
        .when('/dashboard', {
            templateUrl: 'views/dashboard.php',
            controller: 'myDashboard'
        })
        .when('/produse', {
            templateUrl : 'views/produse.php',
            controller: 'myCtrl'
        })
        .when('/taxe',{
            templateUrl: 'views/taxe.php',
            controller: 'myCtrl'
        })
        .when('/comenzi',{
            templateUrl: 'views/comenzi.php',
            controller: 'myCtrl'
        })
        .when('/documente', {
            templateUrl: 'views/documente.php',
            controller: 'docCtrl' 
        })
        .when('/pdf/:id?',{
            templateUrl : 'views/pdf.php',
            controller : 'pdfCtrl'
        })
        .when('/update/:nr?', {
            templateUrl : 'views/update.php',
            controller : 'updCtrl'
        })
        .when('/furnizori',{
            templateUrl: 'views/furnizori.php',
            controller: 'myCtrl'
        }).otherwise({
            redirectTo:'/dashboard'
        });


}]);


//* mainCtrl - Implementare de loading screen
app.controller("mainCtrl",['$scope','$location','$timeout','$window',function($scope,$location,$timeout,$window) {


    // todo : functia prin care trimitem informatiile - UPDATE!.
    //*functia prin care se face update
    $scope.updateDc = function() {
        console.log("update!!");
        //schimbam locatia catre documente
        $location.path('/documente');
    }


    //in mainCtrl $on va "prinde" event urile declansate de $emit/$broadcast

    //todo :deci cand primeste un anume event, vrem sa schimbam val lui $scope.loading

    $scope.loading = false;

        // $window.('load',function () {

            if($location.url().slice(1) == 'dashboard') {

                //cand primim event ul "Load", vrem ca  loading screen ul sa fie afisat
                $scope.$on('LOAD',function () {
                        $scope.loading = true;
                });
            
                //cand primim event ul "unload", vrem ca loading screen ul sa dispara
                $scope.$on("UNLOAD",function() {
                    $scope.loading = false;
                });
            
            }

        // });
         

        /**
     * *Lucru la navbar
     */

    //cand dam click pe vreun navbar, dorim ca acesta sa devina activ
    angular.element("li").on('click',function () {
        //daca cel pe care am dat click nu are deja clasa
        if(!angular.element(this).hasClass("active")) {
            //scoatem clasa de la celelalte
            angular.element("li").removeClass("active");
            //o activam pt acesta
            angular.element(this).addClass("active");
        }
    });

    //cand se de refresh avem grija la "li" ul activ
    //pt asta ne folosim de $location
    let url = $location.url().slice(1); //slice(1) - scapam de /
    // console.log(url);

    //intai dezactivam celelalte
    //selectam clasa "active" pt link ul care corespunde cu url ul
    // angular.element("li").removeClass("active");
    // console.info("url",angular.element(`a[href='#/${url}']`));
    angular.element(`a[href='#/${url}']`).parent("li").addClass("active");
    
    /**
     ** END OF NAVBAR
    */

 
   
}]);


//* myDashboard controller 
app.controller("myDashboard",['$scope','$http','$timeout','$location',function($scope,$http,$timeout,$location) {
    /**
     * *LUCRU LA DASHBOARD
     * todo : voi avea o functie fetch_dashboard prin care obtin factura cu cea mai mare pret 
     */

     //avem o functie care ne permite crearea unei cereri ajax
     $scope.fetch_record = function () {
        $http.get('fetch_record.php')
        .then(function(data) {
            console.log("RECORD",data);
            //iau "statisticile" pt a le afisa in dashboard.php
            $scope.nrFrn = data.data[2].nrFurnizori;
            $scope.nrDocs = data.data[3].nrDocumente;
            $scope.nrPrd = data.data[1].nrProduse;
            $scope.factura = data.data[0];
        });
    }
   
    $scope.fetch_record();

    //ne asiguram ca loading screen ul are loc doar dashboard
   //  if($location.url().slice(1) == 'dashboard') {

    //cand se incarca pagna, emitem event ul "LOAD", pentru a afisa loading screen ul
    // if($location.url().slice(1) == 'dashboard') {
    $scope.$emit("LOAD");

    //dupa 3,5 secude, emitem event ul "UNLOAD", pentru a scapa de loagind screen
    $timeout(function () {
        $scope.$emit("UNLOAD");
    },1000);

   // 
    // }
    /**
     * * END OF DASHBOARD
     */
}]);



//*controller pentru pagina de documente
app.controller("docCtrl",['$scope','$http','$location',function($scope,$http,$location){
    
    $scope.fetch_doc = function () {
        
        //obtinem datele folosind ajax
        $http.get("fetch_doc.php")
        .then(function(data) {
        // console.log(data);
        
        //retinem liniile intr o variabila
        $scope.documente = data.data;
        
        });
        
    }

    //!trebuie revazuta chestia cu class active
    // let url = $location.url().slice(1); //slice(1) - scapam de /
    // console.info("url",angular.element(`a[href='#/${url}']`));

    // angular.element(`a[href='#/${url}']`).parent("li").addClass("active");

    //apelam functia doar cand suntem in sectiunea de "documente"
    // console.log($location.url().slice(1));
    if($location.url().slice(1) == 'documente' || $location.url().slice(1) == 'dashboard' ) {
        $scope.fetch_doc();
        console.log($location.url().slice(1));
    }

}]);


//todo : $routeParams pt a lua variabilele care difera; aceste varabile se atasaeza la url (:nume..)  :id? - inseamna ca este optional


//*controller pt pdf
app.controller("pdfCtrl",['$scope','$routeParams','$http','$window','$sce',function($scope,$routeParams,$http,$window,$sce) {
    console.log("from pdf");
    //obtinem id ul dinamic...
    $scope.a = $routeParams.id;

    //?surse : https://stackoverflow.com/questions/21628378/display-blob-pdf-in-an-angular-app
    //? : https://stackoverflow.com/questions/21628378/display-blob-pdf-in-an-angular-app

       //functia prin care obtinem pagina pdf 
       $scope.fetch_pdf = function () {
           $http({
               url : "fetch_pdf.php",
               method : "POST",
               responseType:'blob', //se refera la sub ce format sa primim informatia;sau ArrayBuffer- pt a obtine binary data - https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/ArrayBuffer
               data : {'nrDoc' : $scope.a}
           })
           .then(function(data) {
            //    console.log(data);
               
            //?despre blob : https://developer.mozilla.org/en-US/docs/Web/API/Blob
                        //? : http://qnimate.com/an-introduction-to-javascript-blobs-and-file-interface/

            // blob - o gramada de bytes care tine data despre o fila

            //obtinem un nou Blob object
               var file = new Blob([data.data], {type: 'application/pdf'});
            //    console.log("file",file);
            
               //am creat un url obj stiind data avuta de la fila : https://developer.mozilla.org/en-US/docs/Web/API/URL/createObjectURL
               var fileURL = URL.createObjectURL(file);
                // console.log("fileURL",fileURL);

                //! sau pot face asa -  dar asta inseamna o noua pagina cu blob
                //? sursa : https://stackoverflow.com/questions/30053212/open-a-pdf-in-a-new-window-of-the-browser-with-angularjs
                //    $window.open(fileURL.slice());
               
                
               //? sursa : https://developer.mozilla.org/en-US/docs/Web/API/URL/revokeObjectURL
               //eliberam url ul pentru care am facut cererea 
               URL.revokeObjectURL(file);

               //tinem undeva url ul
               //? $sce : https://docs.angularjs.org/api/ng/service/$sce
               //$sce - strict contextual escaping.
               //ne asiguram ca url ul este ok
               // trustAsResourceUrl() - pt a folosi url ul in src...
            //?sursa : https://stackoverflow.com/questions/21628378/display-blob-pdf-in-an-angular-app
            $scope.content = $sce.trustAsResourceUrl(fileURL);
           });
       }

       //apelam functia
       $scope.fetch_pdf();

}]);




//*controller pt update
app.controller("updCtrl",['$scope','$routeParams','$http','$location','$compile',function($scope,$routeParams,$http,$location,$compile) {
    //setam parametri dinamici
    $scope.b = $routeParams.nr;

    //*functia prin care permite sa modific (dinamic) continutul lui "update.php" in functie de $routeParams
    $scope.aranjare = function () {
        // var output = '';
        // output +='<h1> update' + $scope.b + '</h1>';
        // angular.element("#and").html(output);
    
        //facem cerere ajax si obtinem datele despre documentul pe care dorim sa l modificam
        //*trimitem, de asemenea, numarul documentului despre care este vorba
        $http({
            url : "fetchForUpdate.php",
            method : "POST",
            data : {'nrDoc' : $scope.b}
        })
        .then(function(data) {
            console.log("update : ",data);
            $scope.updateDoc = data.data[1].doc;
            $scope.tvas = data.data[0];


        /**
         * * RATIONAMET : { in prima faza voi avea vectorul $scope.updateDoc  ce va contine liniile dorite
         * * parcurgem acest vector, si vom adauga intr un alt vector tot ce contine $scope.updateDoc(cream practic o copie)
         * * eu voi concepe html ul care va fi pus in $compile folosind un for loop
         * *si la ng model din input uri voi pune ce am din copie.
         * *asta pt a aplica directiva de validare 
         * *}
         */

            //creez copiile
            $scope.cpy = [];
            for(var j=0; j<$scope.updateDoc.length; j++) {
                $scope.cpy.push({
                    denumireProdus : $scope.updateDoc[j].denumireProdus,
                    cantitateProdus : $scope.updateDoc[j].cantitateProdus,
                    adaosProdus : $scope.updateDoc[j].adaosProdus,
                    pretProdus : $scope.updateDoc[j].pretProdus,
                    tipProdus : $scope.updateDoc[j].tipProdus,
                    numeFurn : $scope.updateDoc[j].numeFurnizor,
                    adresaFurn : $scope.updateDoc[j].adresaFurnizor,
                    cuiFurn : $scope.updateDoc[j].cuiFurnizor,
                    totalInainteTVA : $scope.updateDoc[j].totalInainteTVA,
                    valoareTVA : $scope.updateDoc[j].valoareTVA,
                    totalDupaTVA : $scope.updateDoc[j].totalDupaTVA,
                    dataInserare : $scope.updateDoc[j].dataInserare
                });
            }
            console.info("copia!",$scope.cpy);

            //cream textul html ul ce va fi afisat in pagina
            var textFinal = '';
             
            //todo : facem intai partea care nu este dinamica
            // adaugam numarul documentului
            textFinal +=
                '<div class=\'container-fluid\' style=\'margin-top:20px;\'>'+
                    '<div class=\'row\'>'+
                        '<div class=\'col-sm-12 well\'>'+
                            '<h3 class=\'text-info text-left\'>Modificarea documentului Nr.{{b}}</h3><hr>'+
                            //adaug detalii despre furnizor in stanga, si detalii despre tva in dreapta
                            '<form name=\'updForm\'>' +
                            '<div class=\'row\' style=\'margin-bottom:10px;\'>'+
                                //partea cu furnizorii - in stanga
                                '<div class=\'col-sm-6 col-xs-12\' style=\'margin-top:15px;\'>'+
                                    '<p><b class=\'text-info\'>Nume Furnizor : </b><input type=\'text\' litere class=\'numeFrn\' ng-model=\'cpy['+0+'].numeFurn\' required></p>'+
                                    '<p><b class=\'text-info\'>Adresa Furnizor : </b><input type=\'text\' litere class=\'adresaFrn\' ng-model=\'cpy['+0+'].adresaFurn\' required></p>'+
                                    '<p><b class=\'text-info\'>CUI Furnizor : </b><input type=\'text\' digits class=\'cuiFrn\' ng-model=\'cpy['+0+'].cuiFurn\' required></p>'+
                                '</div>'+
                                //partea cu tva urile si data crearii facturii in dreapta
                                '<div class=\'col-sm-6\' style=\'margin-top:15px;line-height:20px;\'>'+
                                    '<p><b class=\'text-info\'>Data crearii facturii : </b>{{cpy['+0+'].dataInserare}}</p>'+
                                    '<p><b class=\'text-info\'>Valore TVA curenta pentru produse alimentare: </b><span style=\'color:#5eba39;\'>{{tvas.alimentar}}%</span></p>'+
                                    '<p><b class=\'text-info\'>Valore TVA curenta pentru produse non-alimentare: </b><span style=\'color:#5eba39;\'>{{tvas.nonalimentar}}%</span></p>'+
                                '</div>'+
                            '</div>'+
                            // adaugam tabelul - partea care nu este dinamica
                            '<div class=\'table-responsive\'>'+ 
                                '<table class=\'table table-hover table-bordered\'>'+
                                    '<thead>'+
                                        '<tr>'+
                                            '<th class=\'text-primary\'>Denumire Produs</th>'+
                                            '<th class=\'text-primary\'>Cantitate Produs</th>'+
                                            '<th class=\'text-primary\'>Pret Produs</th>'+
                                            '<th class=\'text-primary\'>Adaos Produs</th>'+
                                            '<th class=\'text-primary\'>Tip Produs</th>'+
                                        '</tr>'+
                                    '</thead>'+ 
                                    '<tbody>';



            //todo : partea dinamica
            //voi folosi clase pt a le selecta mai usor
            for(var j =0;j<$scope.cpy.length;j++) {
                textFinal +=
                    '<tr>'+
                        //denumire produs
                        '<td><input type=\'text\' class=\'denumire\' name=\'updDenumire'+j+'\' litere ng-model=\'cpy['+j+'].denumireProdus\' required></td>'+
                        //cantitate produs
                        '<td><input type=\'text\' class=\'cantitate\' name=\'updCantitate'+j+'\' ng-model=\'cpy['+j+'].cantitateProdus\' required></td>'+
                        //pret produs
                        '<td><input type=\'text\' class=\'pret\' name=\'updPret'+j+'\' ng-model=\'cpy['+j+'].pretProdus\' cifre required></td>'+
                        //adaos produs
                        '<td><input type=\'text\' class=\'adaos\' name=\'updAdaos'+j+'\' ng-model=\'cpy['+j+'].adaosProdus\' cifre required></td>'+
                        //tip produs
                        '<td><input type=\'text\' class=\'tip\' name=\'updTip'+j+'\' litere ng-model=\'cpy['+j+'].tipProdus\' required></td>'+
                    '</tr>';
            }

            //inchid ce este de inchis
            //aici punem si btn de submit, care, odata apasat, ne va trimite inapoi in pagina cu documentele
            textFinal +='</tbody></table></form></div></div><button ng-disabled=\'updForm.$invalid\' ng-click=\'updateDc()\' style=\'margin-top:15px;margin-bottom:15px;\' class=\'btn btn-success text-left\'>Salveaza Modificarile</button></div><div class=\'col-sm-12\'><div ng-show=\'updForm.$invalid\' class=\'alert alert-danger col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3\'><h4 class=\'alert-heading\'>Ceva nu este in regula</h4><hr></div></div></div>';

            //atasam html la div ul din update.php
            angular.element("#fin2").append($compile(textFinal)($scope));
            //todo : de facut update, de facut stergerea(cu modal) si screen loading
            
            //todo : functia calc() poate fi pusa in main controller

            //todo :  dupa ce user ul da pe "salveaza modificarile" , sa apara un alter ca totul s a efectuat cu succes
        });
    

    }

    $scope.aranjare();

    
    


 


}]);