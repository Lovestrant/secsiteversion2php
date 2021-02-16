
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

    <!--Emojis links-->
    <script src="js/emojionearea.min.js"></script>
	<script src="js/emojionearea.js"></script>
    <link rel="stylesheet" type="text/css" href="css/emojionearea.min.css">

   <!--Css link-->
<link rel="stylesheet" type="text/css" href="postpage.css">
<!-- google icons link-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

<div>
<?php include('topheader.php'); ?>
</div>
    <div class= "container">
    
        <div class="postdiv">


     <form method ="POST" action="postpage.php"  enctype="multipart/form-data" id="uploadform">

        <p><textarea placeholder="Share anonymously..." id="textarea" name="textarea" ></textarea></p>
        <p><label style="color:green;">Choose category of your post.(OPTIONAL)</label></p>
				<p class="radiodiv">
			
				<input type="radio" id= "radio" name="category" value="loveandlife">Love&Life<br>
				<input type="radio" id= "radio" name="category" value="Politics" >Politics<br>
                </p>
                

                
                <p class="radiodiv">
                <input type="radio" id= "radio" name="category" value="Entertainment">Entertainment<br>
                <input type="radio" id= "radio" name="category" value="Gamesandsports">Games&sports<br>
				</p>
                <p class="radiodiv">
				<input type="radio" id= "radio" name="category" value="Others">Others<br>
		
				<input type="radio" id= "radio" name="category" value="Business">Business<br>
                </p>
                
			
		
                <label class="Filelabel">Attach a picture:</label>
                <input name="file" type="file" id="file" accept="image/*">

                <label class="Filelabel">Attach audio:</audio>:</label>
                <input name="file2" type="file" id="file" accept=" audio/*">

                <p><br><label class="Filelabel">Attach a video:</label>
                <input name="file3" type="file" id="file" accept="video/*"></p>

               <p> <button name="upload" type="submit" class="btn btn-danger" id="secpostbtn">SecPost</button></p>
    </div>
        </div>
   
    </form>

 

<script>
	
    $(document).ready(function () {
        $('#textarea').emojioneArea({
            pickerPosition: "bottom"
            
        
        })
    })
    
</script>

</body>
</html>

<?php

include('db.php');



if (isset($_POST['upload'])) {
	if(!empty($_FILES['file']['name']) || !empty($_FILES['file2']['name']) || !empty($_FILES['file3']['name'])){
		$name = $_FILES['file']['name'];
		$tmp = $_FILES['file']['tmp_name'];

        $name2 = $_FILES['file2']['name'];
		$tmp2 = $_FILES['file2']['tmp_name'];

        $name3 = $_FILES['file3']['name'];
		$tmp3 = $_FILES['file3']['tmp_name'];

		$caption = $_POST['textarea'];
		$category = $_POST['category'];
		
		
	
		
        move_uploaded_file($tmp,"Files/".$name);
        move_uploaded_file($tmp2,"Files/".$name2);
		move_uploaded_file($tmp3,"Files/".$name3);
	
		
		$sql = "INSERT INTO secsite(caption, category, videoname, picturename, audioname) VALUES ('$caption', '$category','$name3','$name','$name2')";
		$res = mysqli_query($con,$sql);
		
	
		if($res ==1){
			echo "<script>alert('SecPosting success')</script>";
		}
	
	}elseif(empty($_FILES['file']['name']) && empty($_FILES['file2']['name']) && empty($_FILES['file3']['name']) && !empty($_POST['textarea'])){

        $caption = $_POST['textarea'];
		$category = $_POST['category'];
		
		
		
		$sql = "INSERT INTO secsite(caption, category) VALUES ('$caption', '$category')";
		$res = mysqli_query($con,$sql);
		
	
		if($res ==1){
			echo "<script>alert('SecPosting success')</script>";
		}
    }else{
		echo "<script>alert('Type something or choose a file to SecPost')</script>";
		echo "<script>location.replace('postpage.php');</script>";
	}
	
}

?>