//login
$("#login_form").submit(function(e){ //user clicks form submit button
    // var form_data = $(this).serialize(); //prepare form data for Ajax post
 var form_data={
     username :  $("#email").val(),
     password:$("#pwd").val()
 }
 console.log("aaaaaa", form_data, form_data.username)
     $.ajax({ 
     url: "http://virarcity.com/mjbackend/index.php/API/login",
     type: "POST",
 contentType:"application/json; charset=utf-8",
     dataType:"json", 
     data: JSON.stringify(form_data)
 }).done(function(data){ //on success
     console.log("aaaaaaaaa", data);
     localStorage.setItem("userData", JSON.stringify(data.data));
     $("#username").html(data.data.name);
     alert("Loged in successfully");
 location.href= "index.php";
 })
 e.preventDefault();
});