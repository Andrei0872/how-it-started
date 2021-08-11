
// acest fisier este folosit pe partea de browser, pt a afisa ce primesc dela server, cand chem fisierul fetch.php
// acest fisier putea fi scris direct in index.php, dar a fost preferata varianta de fisier extern
// acest fisier este apelat din index.php (ca script, inainte de </body>), de unde va fi lansat la rularea aplicatiei

$(document).ready(function() {

// verific daca am inclus bine acest fisier in index 
// alert(1);


//cand se incarca pagina, vrem ca ult 4 evenimente sa fie deja afisate
//nu transmitem niciun parametru cand apelam functia in cazul acesta, pentru ca, daca nu o apelam cu parametru,
//  (asta vom seta noi in fetch.php), se va considera faptul ca pagina este 1

func(); //daca pagina nu e setata => pagina va fi 1. Daca o sterg, la prima acces a app nu va afisa nimic!!!

//avem o functie
//in aceasta functie folosim ajax 
//prin ajax facem apel la un fisier php care ne va furniza tabelul generat

//ajax este un obiect, ceea ce inseamna ca are si proprietati, si metode(functii)

//function fetch_data(pagina) {
   // $.ajax({
        //acum insiruiesc proprietatile acestui obiect, ajax
        
        //catre cine(ce fisier ) facem cerere (cui ii trimitem cererea)
       // url:"fetch.php", //pe care am si creat o, in fetch.php vom genera tabelul 
        //ce metoda folosim pt a trimite datele
     //   method:"POST", //nu apare un url, extragi inf cu $_POST['']
        //ce vrem sa trimitem la acel fisier
        //eu transmit valoarea lui "pagina" prin nr_pagina, nr_pagina este o variabila ce va contine val lui pagina, si o vom folosi in fetch.php
      //  data:{nr_pagina:pagina}, //eu doresc sa transmit nr paginii, al doilea pagina este VALOAREA DIN PARAMETRU< CARE INSEAMNA NR paginii
        
        //daca totul merge bine(are succes), vom primi CEVA DE LA FETCH.php
        //ceea ce primim, transmitem prin parametrul "data"
       // success:function(data) {
            //data - ceea ce am primit 
        //    console.log(data);
       // }
  //  });
//}


//ce urmeaza sa vezi in tutorial
// $(".elementePaginatie").on('click',function(){
//     // $(this) se refera la elementul care este apasat
//     //extragem id ul care va fi de fapt nr paginii
//     var nrPagina = $(this).attr("id");
//     func(nrPagina);
// });


function func(pagina) {
    $.ajax({
        url:"fetch.php", //catre cine fac cerere
        method:"POST", //metoda folosita
        data:{nrPag:pagina}, //ce trimit; variabilei nrPag ii atribui valoarea parametrului PAGINA
        //parametrul PAGINA va avea sens cand va fi apelat in index.php
        success:function(data) { //in caz ca am primit ceva si totul a avut succes
            // alert(data); // de proba; se deschide un mesaj de intampinare, la incarcarea paginii
            // console.log(1);
            //ac fc va returna tabelul cerut, scris sub f de string
            $("#tabel").html(data);
        }
    });
}

//cand dam click pe un buton delete
//retinem ca fiecare btn de delete (cate unul pe fiec row) are cls 'stergere'
$('.stergere').on('click',function(){
    //luam id ul liniei in care se afla btn 
    //asa se ia valoarea unui atribut de genul data-*, unde * reprezinta numele customizat de user
    var idCurent = $(this).data("idd"); 
    // alert(idCurent); //afiseaza prompt-msj cu nr inregistrarii 

    //idCurent - repr NUMARUL id ului

    //vrem sa apara modalul pt linie curenta
    //pt asta, selectam div ul care are id ul de forma : "id" + idCurent
    //clasa w3-modal aplicata unui div face din acesta sa aiba proprietatea CSS display : none
    //in jQuery, ".css" activeaza proprietatile si valorile din css 
    // $("#id"+idCurent) - acesta este EXACT id ul div ului modal
    $("#id"+idCurent).css("display","block");
     console.log($("#id"+idCurent));
});


    // EXTREM DE IMPORTANT  
    /*
 initial, stergerea nu mergea pentru ca in pagina exista un modal STATIC
 prin static, se inteleg ce avea id ul fix asa : "id01"
 asta inseamna ca da, in pagina va fi un modal, dar UNUL SINGUR, ceea ce nu este de dorit cand avem mai multe linii
 pentru a rezolva aceasta problema, va trebui sa generam mai multe modalui, FIECARE CU id diferit
    */




    //cand dam click pe span, inseamna ca vrem sa anulam stergerea
    //doar span urile din modale au clasa nuSterge
    //daca avem n linii, atunci vom avea n span uri de NU si n span uri de YES, si automat n modaluri
    $(".nuSterge").on('click',function() {
        //luam numarul id ului liniei la care se afla modalul, pentru a anula stergerea
        // $(this) - se refera la span ul apsat CHIAR ACUM
        
        
        //verific daca merge butonul sau nu
        // alert(1);
        
        //vrem sa luam numarul id ului. nr id ului il tine atributul data-idstrg
        var idCurent = $(this).data("idstrg");
        // alert(idCurent); //afiseaza prompt-msj cu nr inregistrarii curente 
        console.log($("#id"+idCurent)); //afiseaza in consola
        console.log(idCurent); //afiseaza in consola
        //acum selectam modalul pt care vrem sa anulam stergerea
        $("#id"+idCurent).css("display","none");
    });


    

   
    // ceva de proba 
    // $("#googleMap").html('<h1>Eu sunt mapa</h1>');

});