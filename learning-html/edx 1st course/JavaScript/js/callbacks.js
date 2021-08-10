

function saveToCookie(key, value, onCompletion) {
    var cookieValue = key + ';' + value;
    document.cookie += cookieValue;
    onCompletion(cookieValue);
}

function saveTextValue() {
    var textValue = document.getElementsByName('position')[0].value;
    saveToCookie('Pozitia de ', textValue, showTextSuccess);
}

function showTextSuccess (result) {
    window.alert('ati salvat '+ result +  '  cu succes');
}


function saveRadioValue() {
    var radioValue;
    var radioOptions = document.getElementsByName('department');
    for (var index = 0; index < radioOptions.length; index++) {
        if (radioOptions[index].checked) {
            radioValue = radioOptions[index].value;
            break;
        }
    }
    saveToCookie('Department', radioValue, function (result) {
       window.alert('You did it! You saved [' + result + ']');
    });
}
