<html>
<head>
    <title>Midterm Practice</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            
            
            
            
            // Updates the product drop down list
            $.ajax({
                type: "GET",
                url: "api/getProducts.php",
                dataType: "json",
                success: function(data, status) {
                    data.forEach(function(key) {
                        $("#categories").append("<option value=" + key["productId"] + ">" + key["productName"] + " - $" + key['productPrice'] + "</option>");
                    });
                    var randIdx = Math.floor(Math.random() * Math.floor(data.length));
                    var randTotal = parseInt($("#randQty").val(), 10) * data[randIdx].productPrice;
                    $("#randProduct").html(data[randIdx].productName);
                    $("#randPrice").html(data[randIdx].productPrice);
                    $("#randTotal").html(randTotal.toFixed(2));
                }
            });
            
            
            // Updates if product is chosen from the drop down list.
            $("#categories").change(function() {
                $.ajax({
                    type: "GET",
                    url: "api/getProducts.php",
                    dataType: "json",
                    success: function(data,status) {
                        var prodIdx = parseInt($("[name=category]").val()) - 1;
                        if (prodIdx >= 0) {
                            $("#productPrice").html(data[prodIdx].productPrice);
                        } else {
                            $("#productPrice").html("");
                        }
                    },
                });
            });
            
            
            // Updates the total price of the selected product when the quantity changes.
            $("#productQty").change(function() {
                var qty = parseInt($("#productQty").val());
                var price = parseFloat($("#productPrice").val());
                var total = qty * price;
                if (qty > 0) {
                    $("#productTotal").html(total);
                } else {
                    $("#productTotal").html("");
                }
            });
            
            
            // Gets and displays a random code.
            $.ajax({
                type: "GET",
                url: "api/getCodes.php",
                dataType: "json",
                success: function(data, status){
                    data.forEach(function(key){
                        $("#promoCode").append("<option value =" + key["promoCode"]);

                    });
                    var randCode = Math.floor(Math.random() * Math.floor(data.length));
                    $("#promoCode").html("Discount Code: " + data[randCode].promoCode);
                    $("#promoExpiration").html("This promo code expires on: " + data[randCode].expirationDate);
                }
            });

            
            
            
        });
    </script>
</head>

    <body>
        <h1> Midterm Practice </h1>
    
        <table>
        <tr>
            <th>Product</th>
            <th>Unit Price</th>
            <th>Quantity </th>
            <th>Total</th>
        </tr>
        
        <tr>
            <td id="randProduct"></td>
            <td id="randPrice"></td>
            <td><input id="randQty" type="text" size="5" value="1"></td>
            <td><span id="randTotal"></span></td>
        </tr>
        
        <tr>
            <td id="productList">
                <select name="category" id="categories">
                        <option value=""> Select One </option>
                </select>
            </td>
            <td id="productPrice"></td>
            <td><input id="productQty" type="text" size="5"></td>
            <td id="productTotal"></td>
        </tr>
            
        <tr>
            <td>Subtotal</td>
            <td></td>
            <td></td>
            <td id="subtotal"></td>
        </tr>             
            
        <tr>
            <td>Tax (10%)</td>
            <td></td>
            <td></td>
            <td id="tax"></td>
        </tr>
        
        <tr>
            <td>Total</td>
            <td></td>
            <td></td>
            <td id="total"></td>
        </tr>
           
        </table>
        
        <div id="promoCode">
            <p>Promo Code: <input id="enteredCode" type="text"></p>
        </div>
        <div id = "promoExpiration">
            
        </div>
    
    </body>
</html>