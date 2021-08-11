
console.log(1)
const api_key = "91c0f58dd851136505dad9b743438208";

// api.openweathermap.org/data/2.5/weather?q=London 

// Get DOM elements
const searchBtn = document.querySelector("#search-btn");
const searchInput = document.querySelector("#search-text");
const cityName = document.querySelector("#city-name");
const icon = document.querySelector("#icon");
const temperature = document.querySelector("#temp");
const humidity = document.querySelector("#humidity-div");

// When the page starts, we want the input to be empty
searchInput.value = '';

// Add events 
// Click event on search button
searchBtn.addEventListener("click",SearchInfo);
// Keyup event on search input so when the user types Enter, it will execute the search
searchInput.addEventListener("keyup",CheckKey);

function CheckKey(e) {  
    // console.log(e.key);
    // When user types "Enter" we want out application to perfom the search
    if(e.key === "Enter") {
        SearchInfo();
    }
}

function SearchInfo() {

    // Get the city name
    const city = searchInput.value;
    // Make the request
    // const result = fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${api_key}`).then(function(res){console.log(res.json());});
    let searchLink = "https://api.openweathermap.org/data/2.5/weather?q=" + city + "&appid="+api_key;
    makeRequest(searchLink,theResponse);
}   


// Make the request
function makeRequest(url,callback) {

    // Arrow functions are just awesome.
    console.log(url);
    fetch(url,{method : "get"})
    // Convert the response to JSON
    .then(resp =>resp.json())
    .then(res =>{
        // console.log(res);
        // Handle the response
        theResponse(res);
    })
    .catch(error => {
        // console.log(error.message);
        // console.log(error.name);
        console.log(error);
    });

}

function theResponse(response) {
    console.log(response);
    
    // Get the name of the city and update the view
    const city = response.name;
    if(typeof city === "undefined") {
        alert("Your city is not valid");
    }
    cityName.innerHTML = city;
    console.log("cityName",city);

    // Update the image source
    icon.src = `http://openweathermap.org/img/w/${response.weather[0].icon}.png`;

    // Get the temperature
    const temp = (response.main.temp  - 273 ).toFixed(1) + "°";
    temperature.innerHTML = temp;

    // Get the humidity
    const hum = response.main.humidity + "%";
    humidity.innerHTML = hum;
}