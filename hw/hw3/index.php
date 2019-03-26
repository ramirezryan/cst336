<html>
<head>
    <title>HW3 Friends List</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            
            
            
            
            // Updates the product drop down list
            $.ajax({
                type: "GET",
                url: "api/getFriends.php",
                dataType: "json",
                success: function(data, status) {
                    data.forEach(function(key) {
                        $("#senders").append("<option value=" + key["online_id"] + ">" + key["display_name"] + "</option>");
                        $("#friendsList").append(key["display_name"] + "<br/>");
                    });
                }
            });
            
            
            // Updates if product is chosen from the drop down list.
            $("#messagesBtn").on("click", function() {
                $("#messages").html("");
                $.ajax({
                    type: "GET",
                    url: "api/getMessages.php",
                    dataType: "json",
                    data: {
                            "sender" : $("[name=sender]").val()
                    },
                    success: function(data,status) {
                        if (data.length != 0) {
                            data.forEach(function(key) {
                                $("#messages").append(key['m_content'] + "<br>");
                            });
                        } else {
                            $("#messages").append("<i>No messages from this user.</i>");
                        }
                    },
                });
            });
            

            
            
        });
    </script>
</head>

    <body>
        <h1> Friends List </h1>
    
        <h2> Friends </h2>
        <div id="friendsList">
            
        </div>
        
        <h2> Messages </h2>
        <select name="sender" id="senders">
            <option value=""> Select One </option>
        </select>
        <button id="messagesBtn">Show Messages</button>
        <div id="messages">
            
        </div>
    
    </body>
</html>