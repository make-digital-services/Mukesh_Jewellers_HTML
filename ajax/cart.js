function getCart() {
        $.ajax({
            url: "http://virarcity.com/mjbackend/index.php/API/getCart",
            type: 'GET',
            dataType: "json",
           }).done(function(data) { //on success
            console.log("aaaaaaaaa", data);
             $("#cart-container").html(data.html); 
        });   
}

window.onload = getCart();