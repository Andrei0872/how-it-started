$(document).ready(function() {
    //cand dam click pe tbn
    $(".btn").click(function() {
        // de fiecare data cand am click pe btn, input ul fie apare, fie dispare
        $(".input").toggleClass("active"); //in cls "active" se va modifica width
        //vrem ca lupa sa se roteasca
        $(this).toggleClass("animate");
    });
});
