var apiUrl="http://localhost/mjbackend/index.php/API/";
// var apiUrl="http://virarcity.com/mjbackend/index.php/API/";

function showToaster(message, type){
    $("#toaster").html(message);
    $("#toaster").addClass(type);
    $("#toaster").css({ "visibility":"visible", "opacity":1});
    setTimeout(function(){ 
        $("#toaster").css({ "visibility":"hidden", "opacity":0});
        $("#toaster").removeClass("success");
     }, 1000);
}

