
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecSitee</title>


    <!--Jquery links-->
<script
		src="https://code.jquery.com/jquery-3.5.1.min.js"
		integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
		crossorigin="anonymous"></script>
	<script src="js/emojionearea.min.js"></script>

    <!--bootstrap links-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

 <!--Emojis links-->
 <script src="js/emojionearea.min.js"></script>
	<script src="js/emojionearea.js"></script>
    <link rel="stylesheet" type="text/css" href="css/emojionearea.min.css">


<!--Css link-->
<link rel="stylesheet" type="text/css" href="comments.css">

<!-- google icons link-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<?php include('topheader.php') ?>
<div class= "container">
<div>

<?php
		include('db.php');
        $id=$_GET['u_id'];
		$sql="SELECT * FROM secsite where id = $id";
    
		$result= mysqli_query($con,$sql);
		$queryResults= mysqli_num_rows($result);
		
		
        if($queryResults >0) {
			while($row = mysqli_fetch_assoc($result)) {
				if($row['videoname']){
                    echo "
                    <div style='height:auto;margin-top:25%;width:100%; text-align: centre;margin-left:0px;'>
                    <div  style='height: auto;width: 100%;background-color: grey; 
                     border-radius: 0px;text-align: left; margin-left:0%;
                      padding:10px;  color:white; margin-top: -20%; '>".$row['caption']."</div>
            
                    <video style='width: 100%; height: auto; margin-top:0%;' controls >
                    <source src='Files/".$row['videoname']."' type= 'video/mp4'>
                    
                
                    
                    </div>
                
                
                
                    ";
    
                   
                }elseif($row['picturename']){
                    echo "
			<div >
                    <div  style='height: auto; width:100%;padding: 10px;background-color: grey; 
                    border-radius-top: 0px; color:white;  margin-top: 5%;'>
                    <p>".$row['caption']."</p>
                    </div>
                    
                
                     <div  style='height: 100%; width:100%;padding: 0px; border-radius: 0px; margin-top: 0%;'>
                    <img src='Files/".$row['picturename']."' style = 'width: 100%; height:auto;'>
    
                </div>
                    
                    
    
    
                    ";
                   
                }elseif($row['audioname']){
                    echo "
				<div style='height:auto;margin-top:5%;width:100%;margin-left:0%;'>
				<div  style='height: auto;width: 100%; border-radius: 0px;text-align: left; margin-left:0%; 
                color:white; padding:10px; background-color: grey; '>".$row['caption']."</div>
		
				<video style='width: 100%; height: 50px; margin-top:0%;' controls>
				<source src='Files/".$row['audioname']."' type= 'video/mp4'>
				
				</div>
				";
               
                }
                 else{
                    echo "
                    
                    
                    <div style='height: auto; width:100%;padding: 50px;
                    background-color: grey; border-radius: 10px; border-radius: 10px;
                    margin-top: 5%;  color:white; margin-left: 0%;'>".$row['caption']."</div>
                  
            
                    ";
        
                   
                }

			}
		}
		
		?>
</div>
<div  class="commentdiv">
<form id="commentform" action="comments.php" method="POST">
        <p style=" display: flex;">
		<input type="hidden" name= "hiddenid" value=<?php echo $id; ?>>
        <textarea class="form-control" name="commenttextarea" id="commenttextarea" cols="50" rows="2" style="border-radius: 10px;" placeholder="Type comment"></textarea>
		
	    <button type="submit" class="btn btn-success" name="commentbtn"style="margin-bottom: 10%;margin-left: 10px;">comment</button>
      
		</p>
		<h2 id="messagedisplay" style="color: white;"></h2>
     </form>
        
        </div>



        <!--emoji script code-->
        
<script>
	
    $(document).ready(function () {
        $('#commenttextarea').emojioneArea({
            pickerPosition: "bottom",
         
        
        })
    })
    
</script>



      
<div id="commentsdisplay" style="width: 100%; margin-top: 2%; margin-left: 1%;height: auto;">
        <!--This is where the comments will appear  -->
    <?php
		include('db.php');

		$id=$_GET['u_id'];
		$sql="SELECT * FROM secsitecomments WHERE postid='$id' ORDER BY ID DESC";
		$result= mysqli_query($con,$sql);
		$queryResults= mysqli_num_rows($result);
		
		if($queryResults >0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "
				<div style='height: auto; border-radius: 10px;  margin-top: 0%; width: 80%;'>
				
					<div style='height: auto;margin-bottom:20px; 
                     width:100%;padding: 10px;background-color:grey; border-radius: 10px;
                     color:white; margin-left: 0%;text-align: left;'>".$row['comment']."</div>
				</div>
		
                ";
            }
        }
	
	?>
</div>


</div>

</div>

</body>
</html>
<?php



include('db.php');


if (isset($_POST['commentbtn'])){


    if(!empty($_POST['commenttextarea'])){
        $comment = $_POST['commenttextarea'];
                
        $postid = $_POST['hiddenid']; 

    
        $sql = "INSERT INTO secsitecomments(postid, comment) VALUES ('$postid', '$comment')";
        $query = mysqli_query($con,$sql);
      
        if($query) {
			echo "<script>alert('commenting Success')</script>";
			echo "<script>location.replace('comments.php?u_id=$postid');</script>";
           
       
       }
       else{
	
		echo "<script>alert('commenting Failed')</script>";
		echo "<script>location.replace('comments.php?u_id=$postid');</script>";
          
        }
    }else{
		$postid = $_POST['hiddenid']; 
		echo "<script>alert('Type something to comment')</script>";
		echo "<script>location.replace('comments.php?u_id=$postid');</script>";
    }
}

?>