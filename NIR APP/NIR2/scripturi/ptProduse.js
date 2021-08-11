app.controller("myCtrl",['$scope','$document','$http','$location','$routeParams','$timeout',function($scope,$document,$http,$location,$routeParams,$timeout){
    //var i =1; //pt a numara cate fise de adaugare produse sunt inserate
    $scope.i = 1;

    //despre $document : https://docs.angularjs.org/api/ng/service/$document
    //folosim $document pt ca avem de a face cu ELEMENTE CARE INCA NU SUNT IN DOM LA INCARCAREA PAGINII





    //todo : luam documentele din tabel
    $scope.fetch_doc = function () {
        
        //obtinem datele folosind ajax
        $http.get("fetch_doc.php")
        .then(function(data) {
        console.log("DOCUMENTE",data);
        
        //retinem liniile intr o variabila
        $scope.documente = data.data;
        
        });
        
    }
    if($location.url().slice(1) == 'documente' || $location.url().slice(1) == 'dashboard' ) {
        $scope.fetch_doc();
        console.log($location.url().slice(1));
    }



    /**
     * * LUCRU LA COMENZI
     * todo : cand dau click pe nume, sa apara deja o lista (deja) generata din care sa aleg produsul
     * ? va urma...
     */


    //  todo : functie pentru a calcula pretul actual la fiecare "fisa"
    //? urmeaza : sa apara calculat si pretul inainte si dupa adaugarea tva ului
    
    $scope.calculeaza_total = function () {
        //o sa parcurgem cele $scope.i fise
        for(var j = 1; j<=$scope.i ; j++) {

            //pentru fiecare fisa avem pret,cantitate, si pretul total(acesta urmeaza sa fie inserat in input ul cu readonly)
            var pret = 0;
            var cantitate = 0;
            var pretTotal = 0;

            //selectam input ul in functie de nume
            cantitate = angular.element("input[name='myCantitate"+j+"']").val();
            console.info("cantitate",cantitate);

            //*daca avem cantitate, putem verifica pretul
            if(cantitate > 0) {
                //luam pretul 
                pret = angular.element("input[name='myPret"+j+"']").val();
                console.log("pret",pret);

                //calculam pretul total
                pretTotal = parseFloat(cantitate) * parseFloat(pret);
                
                //inseram pretul total in input ul cu readonly; pretul va avea 2 zecimale
                angular.element("input[name='pretActual"+j+"']").val(pretTotal.toFixed(2));
            }
        }
    } 

//de fiecare data cand parasim campul de pret, vom apela
$document.on('blur','input[name*="myPret"]',function() {
    $scope.calculeaza_total();
});



    //todo : cand se apasa pe butonul de submit, inseram in baza de date
   $scope.sendDocument = function () {
       

    // intai luam datele

    var denumiri = []; 
    var cantitati = []; 
    var preturi = []; 
    //// var tvaUri = []; 
    var preturiTotale = [];
   
    var idFurnizor;

    //luam toate denumirile
    angular.element(".denumire").each(function() {
       // console.log("denumiri",angular.element(this).val());
        //adaugam in vector

        //adaugam in vector in obj cu toate inf necesare despre un anume produs
        denumiri.push({
            nume:angular.element(this).val(),
            tip:angular.element(this).data("tip"),
            adaos : angular.element(this).data("adaos")
        });
        // denumiri.push(angular.element(this).val());
    });
    // console.log("despre produse :",denumiri);

    //luam toate cantitatile
    angular.element(".cantitate").each(function () {
      //  console.log("cantitati",angular.element(this).val()); 
        cantitati.push(angular.element(this).val());
    });

    //luam preturile
    angular.element(".pret").each(function () {
        // console.log("preturi",angular.element(this).val()); 
        preturi.push(angular.element(this).val());
    });


    //luam preturile totale
    angular.element("input[name*='pretActual']").each(function() {
        preturiTotale.push(angular.element(this).val());
    });
    // console.log(preturiTotale);

    //luam id-ul furnizorlui - va fi necesar la preluarea informatiilor  
//    console.log(angular.element("select").val());
   idFurnizor = angular.element("select").val();
    // console.log(idFurnizor);




    //*facem cerere ajax
    $http({
        url : "insDoc.php",
        method : "POST",
        data :{
            'denumiri' : denumiri,
            'cantitati' : cantitati,
            'pret' : preturi,
            'idFurn' : idFurnizor,
            'preturiTotale' : preturiTotale
        }
    })
    .then(function(data) {
        //resetam select ul
        angular.element("select").val(angular.element("#default").val());
      
        // resetem si input urile
        $scope.And = {};
        angular.element("input[name='pretActual1']").val('');

        //scapam si de fisele secundare
        for(var j =2; j<=$scope.i;j++) {
            angular.element("#"+j).remove(); //stergem fisele
        }
        //resetam si $scope.i
        $scope.i = 1;

        //ca sa nu apara mesajul erorii required, setam forma $pristine si $untouched
        $scope.myForm.$setPristine();
        $scope.myForm.$setUntouched();

        console.log(data);

    });

   }


    // $scope.andrei = 'andrei';

    //todo :  atunci cand scriem in input, implementam un fel de search


    //definesc intai functia
    //pt a o face "re-usable", am sa "generalizez" parametrii
    
    //? sursa de inspiratie : https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_autocomplete

    //pt cand vom naviga cu sagetile
    var currentFocus;
    $scope.completare = function(input) {

    //todo : functia prin care inchidem lista/listelem in afara de cea transmisa ca parametru
    $scope.closeAll = function (elem) {
        //luam toate div urile care contin liste din document
        // var containers = angular.element(".autocomplete-lista").children();
        // [...containers].map((item)=>{
        //     console.warn("daaa");

        //luam toate listele existente
        var containers = angular.element(".autocomplete-lista");

        //parcurgem listele 
        [...containers].map((item)=>{
            if(item != elem &&  elem != angular.element(input.currentTarget)[0]) {
                // console.log(1);
                // console.log(angular.element(item).parent());
                angular.element(item).remove();
            }
        });

        // });
        // angular.element('.autocomplete-lista').remove();
    }


        // console.log(input);

        //val - valoarea din input
        var produseContainer,div_produs,k, val = angular.element(input.currentTarget).val();
        // console.log(val);

        //todo : inchid lista inainte de orice
        //....
        $scope.closeAll();

       

        //daca valoarea nu exista, returnam false
        if(!val) {
            return false;
        }


        // initial, currentFocus este -1; asta pt ca atunci cand dam pe sageata de jos, acesta sa cresca, si sa fie selectat produsul de pe pozitia 0
        currentFocus = -1;

        //de fiecare data cand scriem in input, vom crea un DIV WRAPPER(ce va fi de fapt lista), ce va contine produsele care au legatura cu ce este scris in input si nu numai\
        produseContainer =  angular.element("<div></div>"); //creez un nou div
        
        //ii setam clasa (ca sa arate ca o lista- VEZI CSS)
        produseContainer.addClass("autocomplete-lista");

        // luam parintele div  si inseram "lista"
        // console.log(angular.element(input.currentTarget).parent().parent());
        angular.element(input.currentTarget).parent().append(produseContainer);
    


        //parcurgem vectorul de produse si filtram elementele in functie de ce scriem
        // console.log($scope.produse.length); //* am verificat intai lungimea acestuia
        if($scope.produse.length != 0 ) {
            //*daca sunt produse

            //parcurgem vectorul de produse
            [...$scope.produse].map((item)=>{
                //filtram produsele din acest vector in functie de ce scriem
                //intai verificam daca ceea ce scriem se regasete si n numele produselor
                if(item.nume.toLowerCase().indexOf(val.toLowerCase()) >= 0) {
                    // console.warn("merge"); //*proba
                    //todo : odata ce am gasit un "match", cream un nou div, ce va fi de fapt un element al "listei"
                    //cream div ul
                    div_produs = angular.element("<div></div>");
                    
                    //cream textul dorit
                    var text_inserat =  "<p><strong class='text-info'>"+item.nume+"</strong></p><span class='badge' style=\'opacity:0.4;\'>"+item.tip+"</span>";
                    
                    //adaugam si un input type hidden pt ca atunci cand click pe acest SPECIFIC DIV, valorea input ului pt produs va fi modificata cu cea care are event ul acesta de "click"
                    text_inserat += "<input type='hidden' data-tip='"+item.tip+"' data-adaos='"+item.valoareAdaos+"' value='"+item.nume+"'>";

                    //adaugam in final textul
                    angular.element(div_produs).html(text_inserat);

                    //cand dam click pe acest div ("div_produs") vrem ca input ul produsului sa fie ocupat
                    //setam event ul pt acest div INAINTE SA L ATASAM LA DIV UL CONTAINER
                    div_produs.on('click',function() {
                        //umplem input ul cu produsul
                        var valoare = angular.element(this).find("input:first").val();
                        console.info("valoarea apasata",valoare);
                        angular.element(input.currentTarget).val(valoare);
                        
                        //*setam si data-attributes pt a avea deja informatiile cand dam submit
                        
                        //setam tipul produsului
                        console.warn("tip",angular.element(this).find("input:first").data("tip"));
                        var type = angular.element(this).find("input:first").data("tip");
                        angular.element(input.currentTarget).data("tip",type);
                        
                        //setam valoarea adaosului
                        console.warn("adaos",angular.element(this).find("input:first").data("adaos"));
                        var add = angular.element(this).find("input:first").data("adaos");
                        angular.element(input.currentTarget).data("adaos",add);

                        // console.log(angular.element(input.currentTarget).data("tip"));
                        
                        
                        //todo : dupa ce se selecteaza, se doreste dispartia listei
                        //...
                        $scope.closeAll();

                       
                                 
                       
                    });
                    //atasam la div ul container
                    angular.element(produseContainer).append(div_produs);

        

                }
            });
        }else {
            //*daca nu exista produse
            //afisam un mesaj
            angular.element(produseContainer).append("<div><span class='text-danger'>Nu exista produse</span></div>");
        }

        //todo : functia care ajuta navigarea prin lista folosind sagetile
        //...

   
    


     // currentTarget, target : https://medium.com/@florenceliang/javascript-event-delegation-and-event-target-vs-event-currenttarget-c9680c3a46d1


     $document.on('click',function(ev) {
        // console.log("event current.target",ev.currentTarget.activeElement);

        //currentTarget - elementul pentru care event ul este atasat
        // console.log("event current.target",ev.currentTarget);

        // target - elementul care a activat event ul
        // console.log("event e.target",ev.target);
        $scope.closeAll(ev.target);


    });

   
}



//! NU MERGE
//  //todo : functia ca aj careia afisam toata lista de produse cand se da focus pe input
//  $scope.showAll = function (input) {

//     //* afisez elementul care a pornit eventul
//     // console.warn("input",angular.element(input.currentTarget)[0]);
    
//     // daca nu exista valoare, atunci cand apelam functia din "$scope.completare",atunci va fi transmis un al doilea parametru care sa ne spuna asta

    

//     //crem container ul ce va contine lista
//     var container = angular.element("<div></div>");
    
//     //ii clasa de lista (asta pt a avea css ul de lista)
//     container.addClass("autocomplete-lista");

//     //luam parinitele div si inseram lista
//     // console.log("parinte",angular.element(input.currentTarget).parent());
//     angular.element(input.currentTarget).parent().append(container);

//     //parcurgem produsele 
//     Array.from($scope.produse).map((item) => {
//         // pentru fiecare produs cream un div, care va fi de fapt un element al listei
//         var list_item = angular.element("<div></div>");

//         //cream textul dorit
//         var text_inserat =  "<strong class='text-info'>"+item.nume+"<span class='badge'>"+item.tip+"</span></strong>";
                    
//         //adaugam si un input type hidden pt ca atunci cand click pe acest SPECIFIC DIV, valorea input ului pt produs va fi modificata cu cea care are event ul acesta de "click"
//         text_inserat += "<input type='hidden' value='"+item.nume+"'>";

//         //adaugam continutul in div
//         angular.element(list_item).html(text_inserat);

//         //adaugam click event
//         list_item.on('click',function() {
//             // luam valoarea
//             var valoare = angular.element(this).find("input:first").val();

//             // modificam valaorea din input
//             angular.element(input.currentTarget).val(valoare);

//             console.warn("inainte",angular.element(input.currentTarget));
//             angular.element(input.currentTarget)[0].prop("required",false);         
//             console.warn("dupa",angular.element(input.currentTarget));

//         });

//         // adaugam elementul in lista
//         angular.element(container).append(list_item);

//         });
   
// }

   

    /**
     * * END OF COMENZI
     */


    /**
     * * LUCRU LA PRODUS
     * todo : 2 functii: 1 prin care inserez in baza de date, iar alta pt a afisa ce am
     */

    //functia prin care inseram produsul
    $scope.inserareProdus = function () {
        
        //determin ce btn radio a fost selectat
        // console.log(angular.element("input[type='radio']:checked").val());
        let btn_selectat= angular.element("input[type='radio']:checked").val();

        //facem cerere ajax si trimitem informatille din input
        $http({
            url : "insProdus.php",
            method : "POST",
            data : {'nume' : $scope.objProd.produs, 'tip':btn_selectat, 'adaos':$scope.objProd.theAdaos}
        })
        .then(function (data) {
            //intai resetam tot
            $scope.objProd = {};
            $scope.myForm.$setPristine();
            $scope.myForm.$setUntouched();

            // console.log(data);

            //apelam functia de fetch dupa ce inseram, caci dorim ca noua linie inserata sa apara imediat
            
            $scope.fetch_produse();
            console.log(data);
        });
    }    

    //functie fetch_produse
    $scope.fetch_produse = function() {
        //facem cerer ajax pt a obtine informatiile 
        $http.get("fetch_produse.php")
        .then(function(data) {
            // console.log(data);
            
            //obtinem liniile
            $scope.produse = data.data;
            
        });
    }

    //apelam functia cand suntem pe pagina de produse
    if($location.url().slice(1) == "produse" || $location.url().slice(1) == "dashboard" || $location.url().slice(1) == "comenzi"  ) {
        $scope.fetch_produse();
    }
     
    /**
     * * END OF PRODUS
     */
    
    //afisez intai cate form uri sunt(ma refer la partea de comenzi) 
    console.info(angular.element("form[name*='myForm']").length);

     /**
     *! DE REVAZUT : 
     *!  // console.log(angular.element("form[name*='myForm']").length);
     *! //console.log(angular.element("form[name*='myForm']").valid()); 
     */

    // /**
    //  * *LUCRU LA DASHBOARD
    //  * todo : voi avea o functie fetch_dashboard prin care obtin factura cu cea mai mare pret 
    //  */

    //  //avem o functie care ne permite crearea unei cereri ajax
    //  $scope.fetch_record = function () {
    //      $http.get('fetch_record.php')
    //      .then(function(data) {
    //          console.log("RECORD",data);
    //      });
    //  }
    
    //  $scope.fetch_record();

    //  //ne asiguram ca loading screen ul are loc doar dashboard
    // //  if($location.url().slice(1) == 'dashboard') {

    //  //cand se incarca pagna, emitem event ul "LOAD", pentru a afisa loading screen ul
    //  $scope.$emit("LOAD");

    //  //dupa 3,5 secude, emitem event ul "UNLOAD", pentru a scapa de loagind screen
    //  $timeout(function () {
    //      $scope.$emit("UNLOAD");
    //  },2000);

    // // 

    //  /**
    //   * * END OF DASHBOARD
    //   */


    /**
     * * LUCRU LA TAXE
     */

    //todo : functia prin care inseram in tabel informatiile scrise in form; 
    $scope.sendTaxe = function () {
        
        //facem cerere ajax
        $http({
            url : "insTaxe.php",
            method : "POST",
            data : {'tva_alimentar' : $scope.taxeObj.alimentar, 'tva_nonAlimentar' : $scope.taxeObj.nonAlimentar}
        })
        .then(function (data) {
            console.log(data);
            $scope.taxeObj = {}; //am golit obiectul ce tine ng modelele la input uri
            //setam form ul sa fie neatins
            $scope.taxeForm.$setPristine();
            $scope.taxeForm.$setUntouched();

            //vrem sa apara imediat rezultatele
            $scope.fetch_taxe();
        });

    }



    //functia fetch_taxe() care ne permite afisarea taxelor recente
    $scope.fetch_taxe = function () {
        //facem cerere ajax pt a obtine informatiile
        $http.get('fetch_taxe.php')
        .then(function (data) {
            // console.log(data);
            // atasam la scope pt a folosi in view
            $scope.taxeArr = data.data;
            // console.log($scope.taxeArr);
        });
    }
    if($location.url().slice(1) == "taxe" ||$location.url().slice(1) == "comenzi" ){
        $scope.fetch_taxe();
    }
    

     /**
      * * END OF TAXE
      */

    //   tooltip pentru cand se da hover pe taxe 
     angular.element("[data-toggle='tooltip']").tooltip();

    /**
     * *Lucru la furnizori
     * *Functia care permite adaugarea furnizorilor in tabel
     */
    $scope.sendInf = function () {
        
        //? O alternativa de a trimite data folosind AJAX
        // var data = new FormData();
        // data.append('nume','andrei');
        // data.append('username', 'Chris');
        // data.append('age',17);

        // $http.post('insFurn.php',data,{
        //     transformRequest:angular.identity,
        //     headers :{'Content-Type':undefined,'Process-data':false}
        // }).then(function(data) {
        //     console.log(data);
        // });

        //*Folosim ajax pt a insera in baza de date informatiile
        $http({
            url:"insFurn.php",
            method : "POST",
            data : {'denumire': $scope.formObj.denumire, 'adresa':$scope.formObj.adresa, 'cui':$scope.formObj.cui}
        }).then(function(data) {
            console.log(data);
            //vrem de asemenea sa resetam formul
            $scope.formObj = {}; //am golit obiectul ce tine ng modelele la input uri
            //setam form ul sa fie neatins
            $scope.myForm.$setPristine();
            $scope.myForm.$setUntouched();
            // o sursa de inspiratie : http://embed.plnkr.co/enu0pg/preview
            
            //dorim sa se actualizeze pagina imediat dupa ce inseram
            $scope.fetch_furnizori();
        });
    }

    
    //functia prin care obtinem furnizorii
    $scope.fetch_furnizori = function () {
        //facem cerere prin care obtinem datele
        //folosim metoda get
        $http.post('fetch_furnizori.php')
        .then(function (data) {
            //memoram liniile intr o variabila pt a le afisa ulterior in view
            $scope.furnizori = data.data;
            // console.log(data.data);
            // console.log($scope.furnizori.length);
        });
    }


    //vrem ca afisarea sa fie in permanenta actualizata si prezenta
    //*doar atunci cand suntem pe pagina cu furnizori,dashboard sau pe pagina de comenzi(selectarea furnizorului)
    if($location.url().slice(1) == "furnizori" || $location.url().slice(1) == "comenzi" || $location.url().slice(1) == "dashboard" ) {
        $scope.fetch_furnizori();
    }

/**
 * *END OF FURNIZORI
 */

    //*STERGERE PRODUS
    //cand dam click sa stergem o fisa pt un produs
    $document.on('click','.special',function() {
        //selectam id ul din care face parte butonul al carei fise a fost apasat
        var id = angular.element(this).data("row");
        
        //scadem nr cu fiecare stergere
        $scope.i--;

        //luam inainte de a sterge fisa
        var el = angular.element("#"+id);
        // console.info("element sters",el.find(".deVerificat"));
        var este_dis = el.find(".deVerificat").is(":disabled");
        console.warn("este disabled",este_dis);

        //main
        var main_dis = angular.element("#uniq").is(":disabled");
        console.warn("main",main_dis);


        //stergem div ul cu acest id
        angular.element("#"+id).remove();

        //la fiecare sterge tre sa parcurg iar fisele sa vad daca e ceva in neregula
        

        //daca lung butoanelor de stergere este 0, atunci i ul va incepe iar de la 1!!
        if(angular.element(".special").length == 0) {
            $scope.i=1;
            //daca se sterg toate fisele secundare, vedem ce facem cu ultima

            //daca a fost disabled, va ramane disabled, daca nu, viceversa
            if(este_dis) {
                angular.element("#uniq").prop("disabled",true);
            }else if(!este_dis && !main_dis) {
                angular.element("#uniq").prop("disabled",false);
            }
        }

    });
    /**
     * * END OF STERGERE PRODUS
     */

}]); //end of controller




/**
 * * DIRECTIVE
 */


// despre return function si link : function() : https://stackoverflow.com/questions/18344252/differences-between-returning-an-object-vs-a-function-in-a-directive-definition


//aceasta directiva este atasata butonului de add
//folosim directiva pt a apela $compile.
app.directive("myAdd",function ($compile,$timeout) {
//se comporta ca un link : ..
return function (scope,elem,attrs) {
    //cand dam click pe acest element
    elem.on('click',function () { //cand dam click pe butonul de add
        //scopul este cel globa
        scope.i++;

        
    //    despre $compile : https://docs.angularjs.org/api/ng/service/$compile
        //compilez noul dom si il atasez la scope
        angular.element("#fise").
            append($compile(
                '<div class=\'container\' id="'+scope.i+'">'+
                    '<div class=\'row\'>'+ 
                        '<div class=\'well text-center col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 \'>' + 
                            '<div class=\'row\'>' + 
                                '<div class=\'col-sm-8 col-md-8 col-xs-7\'>' + 
                                    '<form name="myForm'+scope.i+'">' + 
                                        '<div class=\'form-group\'>' +
                                            '<div class=\'input-group\' style=\'width:100%;\'>' +
                                                '<input style=\'width:100%;\' ng-keyup="completare($event)" type=\'text\' name="myName'+scope.i+'" ng-model="nume'+scope.i+'" class=\'denumire test main form-control\' placeholder=\'Nume\'  required>' +
                                            '</div>'+
                                            '<ul class=\'erori\' ng-messages=\'myForm'+scope.i+'.'+'myName'+scope.i+'.$error\' >' +
                                                '<li ng-show=\'myForm'+scope.i+'.'+'myName'+scope.i+'.$error.required && myForm'+scope.i+'.'+'myName'+scope.i+'.$touched\'>Acest camp trebuie completat!</li>'+
                                            '</ul>'+
                                        '</div>'+
                                        '<div class=\'form-group\'>' +
                                            '<div class=\'input-group\' style=\'width:100%;\'>' +
                                                '<input type=\'text\' name="myCantitate'+scope.i+'"  ng-model="cantitate'+scope.i+'" class=\'main cantitate test form-control\' placeholder=\'Cantitate\'>' +
                                            '</div>'+
                                        '</div>'+
                                        '<div class=\'form-group\'>' +
                                            '<div class=\'input-group\' style=\'width:100%;\'>' +
                                                '<input type=\'text\' name="myPret'+scope.i+'"  ng-model="pret'+scope.i+'" class=\'main pret test form-control\' placeholder=\'Pret\'>' + 
                                            '</div>'+
                                        '</div>'+
                                        '<div class=\'form-group\'>' +
                                            '<div class=\'input-group\' style=\'width:100%;\'>' +
                                            '<input type=\'text\' name="pretActual'+scope.i+'"  ng-model="pretActual'+scope.i+'" class=\'main test tva form-control\' placeholder=\'Pret Actual\' readonly>' + 
                                            '</div>'+
                                        '</div>'+
                                        '<span class=\'pentruValidare\' style=\'display:none;\' data-val="{{myForm'+scope.i+'.$invalid}}"></span>'+
                                    '</form>' +
                                '</div>' + 
                                '<div class=\'col-sm-4 imp col-md-4 col-xs-5 text-center\'>' +
                                    '<h4>Produsul Nr.'+scope.i+'</h4>' +
                                    '<button type=\'button\' style=\'margin-top:15%;\'  data-row="'+scope.i+'" class=\'btn btn-danger btn-lg special \'>Sterge<span class=\'glyphicon glyphicon-trash\'></span></button>'+
                                    '<button type=\'button\' class=\'deVerificat\' style=\'display:none;\'  ng-disabled=\'myForm'+scope.i+'.$invalid\' >nu conteaza'+'</button>'+
                                '</div>'+
                            '</div>' + 
                        '</div>'+
                    '</div>'+
                '</div>' 
            )(scope));
    
            //! TVA
            /*
            '<div class=\'form-group\'>' +
                '<div class=\'input-group\'>' +
                '<input type=\'text\' name="myTVA'+scope.i+'"  ng-model="tva'+scope.i+'" class=\'main tva form-control\' placeholder=\'TVA\'>' + 
                '</div>'+
            '</div>'+
            */



            function suntValide () {
                var nr = 0;
                angular.element('.deVerificat').each(function(){
                    // console.log(angular.element(this));
                    if(!angular.element(this).is(":disabled"))
                        nr++;
                });
                return nr == angular.element('.deVerificat').length ;
            }

            //de fiecare cand dam click, se adauga o noua fisa pt produs
            //vom parcurge fiecare fisa 

               angular.element(".main").on('  keyup',function () {
                   //de fiecare data cand apasam avem un contor
                   var cnt = -0;
                   console.log(suntValide());
                   if(!angular.element("#uniq").is(":disabled")){
                   if(suntValide()) { //daca sunt toate valide
                    cnt++;
                   }
                   if(cnt != 0) {
                       console.info("cnt",cnt);
                        angular.element("#uniq").prop("disabled",false); 
                   }else {
                    angular.element("#uniq").prop("disabled",true); 
                   }
                }
                   //verificam toate celelalte fise sunt valide
                    
               });
                
                // angular.element("input").on('keypress keydown',function() {

                // var length = angular.element(".deVerificat").length;
                //parcurgem fiecare fisa
                    angular.element(".deVerificat").each(function(index) {
                        // console.log(index);
                        //butn din fisa care principala
                        // console.log("buton neschimbat",angular.element("#uniq").is(":disabled"));
                        // vedem daca este sau nu dezactivat
                        var main_disabled = angular.element("#uniq").is(":disabled");
                        // console.log("main",main_disabled);

                        //butonul din iteratia curenta
                        // console.log("buton din fisa",angular.element(this).is(":disabled"));
                        // vedem daca este sau nu dezactivat
                        var temp_disabled; //=angular.element(this).is(":disabled");
                        // console.log(temp_disabled);
                        // sau asa 
                        // console.log("buton din fisa",angular.element(this).prop("disabled"));
                        // angular.element("input").on('keypress keydown',function(){
                        //     if(!main_disabled && temp_disabled) {
                        //         angular.element("#uniq").prop("disabled",true);
                        //     }
                        // });
                        

                        // ===== PROBA =====
                        // angular.element(this).prev().on('click',function() {
                        //     alert(1);
                        // });
                        
                        // console.log(angular.element(this).parent().siblings().find("input"));
                        // if(index == length-1){
                        var current  = angular.element(this); //luam practic fisa curenta (butonul ascuns din fisa curenta)


                        // fiecare fisa va avea un K
                        var k;
                        var main_dis;
                        // cand actionam asupra inputurilor din fisa
                        angular.element(this).parent().siblings().find("input").on(' keyup   ',function (item){

                              main_dis  = angular.element("#uniq").is(":disabled");
                            console.warn("main",main_dis);

                            //*afisez cate form uri am
                            //  console.log("nr forms",angular.element("form[name*='myForm']").length);

                             //*afisez cate form uri sunt corecte
                            //  console.log(angular.element("form[name*='myForm']").valid());         

                             [...angular.element("form[name*='myForm']")].map((item) => {
                                //* OK
                                // console.log("form : ",item);
                                // console.log("the span",angular.element(item).find(".pentruValidare"));

                                console.info("valoare span",angular.element(item).find(".pentruValidare").data("val"));
                      
                                var ok = 0; 

                                if(angular.element(item).find(".pentruValidare").data("val")) {
                                    ok++;
                                }
                                if(ok!=0) {
                                    console.error("nu merge");
                                }
                             });


                            // console.log(angular.element(item));
                           var k =0;
                        //    console.log(k);
                           console.log(suntValide());
                           //va avea rost sa cautam doar daca btn principal este valid
                        //    if(!angular.element("#uniq").is(":disabled")){
                            // console.warn("DA");
                            if(suntValide()) {
                                k++;
                                // console.log(k);
                                // console.warn("valide");

                            }
                            if(k !=0) {
                                console.warn("valide");
                                 angular.element("#uniq").prop("disabled",false);
                            }else {
                                console.warn("invalide")
                                 angular.element("#uniq").prop("disabled",true);
                            }
                            
                            //o ultima verifica
                            console.warn("main",main_dis);

                            // if(main_dis && k==0 || k!=0) {
                            //     console.error('err');
                            //     angular.element("#uniq").prop("disabled",true);
                            // }     

                        });
                       
                    });

                    
                    
                    // angular.element(".main").each(function() {
                    //     // console.log("1");
                    //     angular.element(this).on('keyup',function() {
                    //         // console.log(1);
                    //         // console.log(valid());
                    //         // console.log("simplu",angular.element(".deVerificat"));
                    //         // console.log("array",Array.from(angular.element(".deVerificat")));
                    //         // console.log(Array.from(angular.element(".deVerificat")).filter((item)=>angular.element(item).is(":disabled")).length);
                            
                    //         //daca nr btn existente coincide cu nr butoanelor valide
                    //         console.log("valid",valid());
                    //        console.warn("btn curent",angular.element(this).parent().parent().parent().parent().siblings().find(".deVerificat").is(":disabled"));
                    //        var val = angular.element(this).parent().parent().parent().parent().siblings().find(".deVerificat").is(":disabled");
                    //     //    angular.
                    //         if(valid()) {
                    //             console.info("da");
                    //             angular.element("#uniq").prop("disabled",false);
                    //         }else{
                    //             console.info("nu");
                    //              angular.element("#uniq").prop("disabled",true);
                    //         }

                    //     });
                    // });

                    // function valid() {
                    //     //! PROBE
                    //     // nr cate butone sunt
                    //     // return angular.element(".deVerificat").length;
                    //     // return angular.element(".deVerificat").filter((item)=> {
                    //     //     return item.is(":disabled") == true;
                    //     // // }).length;
                    //     // Array.from(angular.element(".deVerificat")).forEach(function() {
                    //     //     console.log(angular.element(this).is(":disabled"));
                    //     // });

                    //     // numaram cate butoane sunt active(valide)
                    //     let disabled_length = Array.from(angular.element(".deVerificat")).filter((item)=>!angular.element(item).is(":disabled")).length;
                    //     // return disabled_length;
                    //     //numaram cate butoane sunt in total
                    //     let allBtns = angular.element(".deVerificat").length;
                    //     // return allBtns;

                    //     //vedem daca nr btn este egal cu nr butoanelor valide
                    //     return allBtns == disabled_length;
                    // }


        }); //end of "click"
    }
});


//creez directiva pt validare
//aceasta directiva va fi adaugata la email 
//! aceasta este momentan doar de proba
app.directive("validare",function() {
//returnam obj ce descrie directiva
return {
    //izolam scopul - ne trebuie cand vom aplica directiva la mai multe elemente
    scope : {
        title : '=ngModel' //two-way binding; luam ce este in ngmodel
    },
    //pt a folosi controller ul si deci pt a insera in $parsers(pt a ma ajuta la validare)
    require: 'ngModel',
    //ceea ce ne permite sa manipulam DOM
    link : function (scope,elem,attrs,ctrl) {

        // =====Probe====
        // scope.$watch(function(){
        //     return scope.title;
        // }, function(value) {
        //     console.log(value);
        //     // console.log(ctrl);
        // });
        
       

        //functia pe care o vom adauga in $parsers
        function customValidate(theValue) {
            if(theValue.length == 6) {
                ctrl.$setValidity("lungime",true);
            }else {
                ctrl.$setValidity("lungime",false);
            }

            //*ca sa vedem cum functioneaza de fapt $parsers..
            //* alert(theValue);

           
            //este important acest return pt a functia $scope.watch de mai sus..
            return theValue;
        }

        //adaugam in $parsers; acest array este parcurs de fiecare data cand scriem in input ul coresp si analizeaza fiecare prop din array 
        ctrl.$parsers.unshift(customValidate);
    }
}
});

//*DIRECTIVA PENTRU VALIDARE FURNIZORI-cui, si pentru VALIDARE TAXE
app.directive("digits",function() {
    
    return {
        //pt a beneficia de ctr;
        require : 'ngModel',
        link : function (scope,elem,attrs,ctrl) {
            
            //functia prin care cream o validare CUSTOM
            function customValidator(theValue) {
                ///^[0-9]{1,9}$/ - inseamna ca putem pune intre 1 sau 9 cifre
                //*pentru furnizori
                //selectam sa fie exact 9 cifre
                if(/^[0-9]{7,9}$/.test(theValue)){
                    ctrl.$setValidity("nrDigits",true);
                }else {
                    ctrl.$setValidity("nrDigits",false);
                }

                
                // regex sa contina litere
                // if(/^.*[a-zA-Z].*$/.theValue) {
                //     //daca contine litere, setam sa fie fals
                //     ctrl.$setValidity("litere",false);
                // }else {
                //     ctrl.$setValidity("litere",true);
                // }

                //la final returnam theValue - pt a fi vazuta de user
                //theValue == valoarea din input
                return theValue;
            }

            //adaugam in $parsers pt a vi luata in considerare functia de fiecare data cand se scrie ceva in input
            ctrl.$parsers.unshift(customValidator);
        }
    }

});
//*DIRECTIVA PT VALIDARE LA TAXE - doar cifre 
app.directive("cifre",function () {
    return {
        //pt a folosi ctrl
        require : 'ngModel',
        link : function (scope,elem,attrs,ctrl) {


            //functia pt validare custom
            //theValue - valorea din input
            function custom(theValue) {
                //+ - 1 sau mai multe
                // 0 sau mai multe
                //? sursa : https://stackoverflow.com/questions/19715303/regex-that-accepts-only-numbers-0-9-and-no-characters
                //?sursa pt nr cu , : https://stackoverflow.com/questions/12643009/regular-expression-for-floating-point-numbers
                if(/^([0-9]+[.])?[0-9]+$/.test(theValue)) {
                    ctrl.$setValidity("doarCifre",true);
                }else {
                    ctrl.$setValidity("doarCifre",false);
                }             
                return theValue;
            }

            //adaugam in parsers
            ctrl.$parsers.unshift(custom);

        }
    }
});

//directiva pentru a ne asigura ca se insereaza doar cifre
app.directive("litere",function () {
   
    return {
        require : 'ngModel',
        link : function (scope,elem,attr,ctrl) {

            function numai_litere(theValue) {
                if(/^\D+$/.test(theValue)) {
                    ctrl.$setValidity("doarLitere",true);
                }else {
                    ctrl.$setValidity("doarLitere",false);
                }
            
                //returnam la final theValue (care este de fapt valoarea din ng-model)
                return theValue;
            }

            //la final, adaugam in $parsers
            ctrl.$parsers.unshift(numai_litere);

        }
    }
});