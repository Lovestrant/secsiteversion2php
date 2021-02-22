
<!DOCTYPE html>
<html lang="en">
<head>



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecSitee</title>


    <!--bootstrap links-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<!--Jquery links-->
<script
		src="https://code.jquery.com/jquery-3.5.1.min.js"
		integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
		crossorigin="anonymous"></script>
	<script src="js/emojionearea.min.js"></script>

 
<script>
			//Jquery code to load 3 posts at a time

        $(document).ready(function(){
            var flag = 0;
            $.ajax({
                type: "GET",
                url: "loadloveandlifeposts.php",
                data: {
                    'offset': 0,
                    'limit': 3
                },
                success: function(data){
                    $('.postclass').append(data);
                    flag +=3;
                }
            });

            $(window).scroll(function(){
                if ($(window).scrollTop() >= $(document).height() - $(window).height()) {
                        $.ajax({
                        type: "GET",
                        url: "loadloveandlifeposts.php",
                        data: {
                            'offset': flag,
                            'limit': 3
                        },
                        success: function(data){
                            $('.postclass').append(data);
                            flag +=3;
                        }
                    });
                }
                
            });
            
        });

       
            
       
</script>



    <!--Emojis links-->
    <script src="js/emojionearea.min.js"></script>
	<script src="js/emojionearea.js"></script>
    <link rel="stylesheet" type="text/css" href="css/emojionearea.min.css">

   <!--Css link-->
<link rel="stylesheet" type="text/css" href="extensions.css">
<!-- google icons link-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>


<body>


<?php include('topheader.php'); ?>

<div class= "container">

<div class="postclass">

</div>





</div>





</body>


</html>




