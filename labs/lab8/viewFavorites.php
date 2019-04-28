<?php
    



?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script>
    $.ajax({
        type: "GET",
        url: "api/favoritesAPI.php",
        dataType: "json",
        data: {
            'action': "keyword"
        },
        success: function(data, status) {
            for(var i in data){
                $(".keywords").append("<a href=\"#\">"+ data[i]["keyword"] + "</a><br />");
            }
        }
    });
    $(document).ready(function(){
        $(".keywords").click(function(){
            $.ajax({
        type: "GET",
        url: "api/favoritesAPI.php",
        dataType: "json",
        data: {
            'action': "favorites",
            'keyword': $(event.target).text()
        },
        success: function(data, status) {
            $("#pictures").html("");
            for(var i in data){
                $("#pictures").append("<img src = \"" + data[i]["imageURL"] + "\" alt=\"\"></br>")
            }
        }
    });
        })
    })
</script>


<html>
    <head>
        <title> </title>
    </head>
    <body>

        <h1> Favorite Images </h1>
        <div class="keywords" class="searchTerms">
        </div>
        <div id = "pictures"></div>
    </body>
</html>