function saveToCookie (text,val,display) {
    var coockieValue = text + ":" + val;
    document.cookie = coockieValue;
    display(coockieValue);
} 

  var saveTextValue =   () => {
    var valoare = document.getElementsByName('myInput')[0].value;
    saveToCookie('Salut ',valoare,afisare);
}

var afisare = result => {
alert(" " + result);
}

var saveRadioValue = function () {
    var valRadio, nrRadio;
    nrRadio = document.getElementsByName('department');
    for( var i = 0; i < nrRadio.length ; i++ ){
        if(nrRadio[i].checked) {
            valRadio = nrRadio[i].value;
            break;
        }
    }
    saveToCookie("Departamentul ", valRadio, (result) => {alert(result);});
}