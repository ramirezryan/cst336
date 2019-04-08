<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    </head>
    <body>
        <h1>Add new product</h1>
        Enter Product Name:<input type="text" id = "productName" size="50">
        <br>
        Enter Product Description: <textarea id="productDescription" cols="40" rows="3"></textarea>
        <br>
        Product Image:<input type = "text" id = "productImage">
        <br/>
        Product Price: <input type="text" id="productPrice">
        <br/>
        Categories Name: <Select id = "catId">
        <Option> Select One </Option>
        </Select>
    </body>
    
    <script>
        $.ajax({
                    type: "GET",
                    url: "../lab6/api/getCategories.php",
                    dataType: "json",
                    success: function(data, status) {
                        data.forEach(function(key) {
                            $("#catId").append("<option value=" + key["catId"] + ">" + key["catName"] + "</option>");
                        });
                    }
                }); 
    </script>
</html>