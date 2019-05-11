function getCart() {
        $.ajax({
            url: "http://localhost/mjbackend/index.php/api/getCart",
            type: 'GET',
            dataType: "json",
           }).done(function(data) { //on success
            console.log("aaaaaaaaa", data);
             $("#cart-container").html(data.html); 
        });   
}

window.onload = getCart();