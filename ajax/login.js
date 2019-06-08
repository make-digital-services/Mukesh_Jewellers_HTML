//login
$("#login_form").submit(function(e){ //user clicks form submit button
    // var form_data = $(this).serialize(); //prepare form data for Ajax post
 var form_data={
     username :  $("#email").val(),
     password:$("#pwd").val()
 }
     $.ajax({ 
     url: "http://192.168.0.35/mjbackend/index.php/api/login",
    //  url: "http://virarcity.com/mjbackend/index.php/API/login",
     type: "POST",
 contentType:"application/json; charset=utf-8",
     dataType:"json", 
     data: JSON.stringify(form_data)
 }).done(function(data){ //on success
if(data.value){
     showToaster("Loged in successfully!","success");
    location.href= "index.php";

}else{
    showToaster(data.message,"error");
    
}
    //  localStorage.setItem("userData", JSON.stringify(data.data));
    //  $("#username").html(data.data.name);
 })
 e.preventDefault();
});