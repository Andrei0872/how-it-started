function saveToCookie (text,val,display) {
var coockieValue = text + ":" + val;
document.cookie = coockieValue;
display(coockieValue);
}

function saveTextValue () {
    var valoare = document.getElementsByName('myInput')[0].value;
  saveToCookie('salut ',valoare,afisare);
}

var afisare = result => alert(" " + result); ///!misto asta


function saveRadioValue () {
    var elemente, val;
    elemente = document.getElementsByName('department');
    //console.dir(elemente);
    for(var i = 0; i < elemente.length ; i++) {
        if(elemente[i].checked) {
            val  = elemente [i].value;
            break;
        }
    }
    saveToCookie('Departamentul ',val,function (result) {
        alert(result);
    });
}