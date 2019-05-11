<?php
session_start(); //start session
require_once "db.php";
require_once "header.php";
$categoryName= $_GET['name'];
//get category id by name
$result = $con->query("select * from category where name='$categoryName'");
$categoryData = mysqli_fetch_array($result);
$categoryId = $categoryData['id'];

//get product listing by category id
$sql = "SELECT p.`id`, p.`name`,pi.image , p.`description`, p.`price`, p.`discount`,  p.`final_price`,  p.`metatitle`, p.`metadesc`, p.`metakeyword`, p.`quantity`, p.`subcategory`, p.`category`, p.`sizechart` FROM `product` p LEFT JOIN product_image pi ON p.id=pi.product_id WHERE p.category=$categoryId GROUP BY p.id";
$listingData = $con->query($sql);

?>


<div class="container-fluid">
    <div class="row">
        <div class="bannerCont">
            <?php 
       echo '<img class="img-fluid" src="'.$categoryData["banner_image"].'" alt="">
       <div class="data">
       <h1 class="title">'.$categoryData["name"].'</h1>
       <p >'.$categoryData["description"].'</p>
       </div>
       ';
        ?>
        </div>

    </div>
</div>

<div class="container-fluid listing-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-4  text-left">
                <div class="sort-by-list">
                    <span class="sort-title">
                        Sort By
                    </span>
                    <select onchange="sort()" name="sortby" id="sortby">
                        <option value="popular">Popular</option>
                        <option value="low">Price : Low - High</option>
                        <option value="high">Price : High - Low</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- <ul class="pagination listing-page-pagination">
                    <li><a href="javascript:;"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                    <li class="active"><a href="javascript:;">1</a></li>
                    <li><a href="javascript:;">2</a></li>
                    <li><a href="javascript:;">3</a></li>
                    <li><a href="javascript:;"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                </ul> -->
            </div>
            <div class="col-lg-4  text-right">
                <div class="design-count">
                    <?php echo  'Showing '.$listingData->num_rows.' of ' .$listingData->num_rows; ?></div>
            </div>

        </div>

        <div class="row mt-20 listing-filter-body">
            <div class="col-lg-3 .listing-filter-right">
                <h3 class="filter-design-title"> <i class="fa fa-filter"></i> Filters</h3>

                <ul class="filters-container-box">
                    <li>Price</li>
                    <ul>
                        <?php
                        $metals = $con->query("SELECT `id`, `name`, `min`, `max`, `status`, `date` FROM `price_range` WHERE status=1");
                        while($row = $metals->fetch_assoc()) {
                        echo '<li> <input type="radio" name="price" value="'.$row["min"].'-'.$row["max"].'"  onclick="addFilters(event,`price`)"> <label > '.$row["name"].'</label></li>';
                        }
                        ?>
                    </ul>
                    <li>Metal</li>
                    <ul>
                        <?php
                        $metals = $con->query("SELECT `id`, `name`, `date`, `status` FROM `metal` WHERE status=1");
                        while($row = $metals->fetch_assoc()) {
                        echo '<li> <input type="checkbox" name="'.$row["name"].'" value="'.$row["name"].'"  onclick="addFilters(event,`metal`)" id="'.$row["name"].'"> <label for="'.$row["name"].'"> '.$row["name"].'</label></li>';
                        }
                        ?>
                    </ul>
                    <li>Purity</li>
                    <ul>
                        <?php
                        $purity = $con->query("SELECT `id`, `name`, `date`, `status` FROM `purity` WHERE status=1");
                        while($row = $purity->fetch_assoc()) {
                        echo '<li> <input type="checkbox" name="'.$row["name"].'"  value="'.$row["name"].'"  onclick="addFilters(event,`purity`)" id="'.$row["name"].'"> <label for="'.$row["name"].'"> '.$row["name"].'</label></li>';
                        }
                        ?>

                    </ul>
                    <li>Gender</li>
                    <ul>
                        <li> <input type="checkbox" name="male" id="male"> <label for="male"> Male</label></li>
                        <li> <input type="checkbox" name="female" id="female"> <label for="female"> Female</label></li>

                    </ul>
                </ul>
            </div>
            <div class="col-lg-9 product-listings-body">
                <div class="product-listings" id="product-listings">
                    <!-- load dynamic data using ajax -->
                </div>
            </div>
        </div>
    </div>
</div>



<script>
var categoryId = <?php echo $categoryId ?>;
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
            url: "<?php echo $apiUrl ?>getAllProduct",
            type: 'POST',
            dataType: "json",
            data: JSON.stringify(filter_data)
        }).done(function(data) { //on success
            console.log("aaaaaaaaa", data);
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
</script>
<?php
    require_once "footer.php";
?>