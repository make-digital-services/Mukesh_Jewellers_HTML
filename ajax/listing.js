var filterObj = {
    metal: [],
    purity: [],
    price: []
}
//sort products
function sort() {
    if (categoryId) {
        var filter_data = {
            sortBy: $("#sortby").val(),
            categoryId: categoryId,
            filterObj: filterObj
        }
        $.ajax({
            url: "http://localhost/mjbackend/index.php/api/getAllProduct",
            // url: "http://virarcity.com/mjbackend/index.php/API/getAllProduct",
            // url: "<?php echo $apiUrl ?>getAllProduct",
            type: 'POST',
            dataType: "json",
            data: JSON.stringify(filter_data)
        }).done(function(data) { //on success
            console.log("aaaaaaaaa", data);
            $('#showing').html(data.data.length);
            $("#product-listings").html(data.html); //total items count fetch in cart-info element

        });
    }
}
if (categoryId) {
    //to show default listing product data
    window.onload = sort();
}


function addFilters(event, type) {
    if (type == 'price') {
        filterObj.price[0] = event.srcElement.value.split("-")[0]
        filterObj.price[1] = event.srcElement.value.split("-")[1]
    }
    console.log("in filters", event, type, filterObj, event.srcElement.value);
    if (event.srcElement.checked) {
        if (type == "metal") {
            filterObj.metal.push(event.srcElement.value);
        }
        if (type == "purity") {
            filterObj.purity.push(event.srcElement.value);
        }
    } else {
        if (type == "metal") {
            filterObj.metal.splice(filterObj.metal.indexOf(event.srcElement.value), 1);
        }
        if (type == "purity") {
            filterObj.purity.splice(filterObj.purity.indexOf(event.srcElement.value), 1);
        }
    }
    console.log("filterobj", filterObj);
    sort();
}
//Add Item to Cart

function addToCart(event) {
    var form_data = {
        product_id: event.srcElement.id
    }
    $.ajax({
        url: "<?php echo $apiUrl ?>addToCart",
        type: "POST",
        crossDomain: true,
        xhrFields: {
            withCredentials: true
        },
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        data: JSON.stringify(form_data)
    }).done(function(data) { //on success
          var userData = JSON.parse(localStorage.getItem("userData"));
        $("#username").html(userData.name);
        $("#cart-info").html(data.TotalItemsInCart); //total items count fetch in cart-info element
        alert("Item added to Cart!"); //alert user
        if ($(".shopping-cart-box").css("display") == "block") { //if cart box is still visible
            $(".cart-box").trigger("click"); //trigger click to update the cart box.
        }
    })
    // event.preventDefault();
}


//Show Items in Cart
$(".cart-box").click(function(e) { //when user clicks on cart box
    e.preventDefault();
    $(".shopping-cart-box").fadeIn(); //display cart box
    $("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image

});