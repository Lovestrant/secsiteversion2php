
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


<!--Css link-->
<link rel="stylesheet" type="text/css" href="searchpage.css">

<!-- google icons link-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

   

    <div class="page-header" style="background-color: rgba(44, 40, 40, 0.911);">
    <a href="general.php"><button class="btnback"  style="color: red;height:40px;background-color:grey;"><i class="material-icons">GENERAL</i></button></a> 
 
    <div class="searchheader">
   
    <form action="searchloadpage.php" method="POST" name="sec-search3">
   
    <input type="text" placeholder="Search SecSitee... "class="searchinput" name="searchinput">
    <button class="btnsearch" name="searchbtn"><i class="material-icons">search</i></button>
   

    </form>
   
   
    </div>
    </div>
    <div class= "container">
<div>
<div class="displayposts">
<?php
  		include('db.php');
          $sql="SELECT * FROM secsite ORDER BY ID DESC LIMIT 10";
      
          $result= mysqli_query($con,$sql);
          $queryResults= mysqli_num_rows($result);
           

        	
		if($queryResults >0) {
			while($row = mysqli_fetch_assoc($result)) {
				if($row['videoname']){
                    echo "
                    <div style='height:auto;margin-top: 20%;width:100%; text-align: centre;margin-left:0px;'>
                    <div  style='height: auto;width: 100%;background-color: grey; 
                     border-radius: 0px;text-align: left; margin-left:0%;
                      padding:10px;  color:white; margin-top: -10%; '>".$row['caption']."</div>
            
                    <video style='width: 100%; height: auto; margin-top:0%;' controls >
                    <source src='Files/".$row['videoname']."' type= 'video/mp4'>
                    
                
                    
                    </div>
                
                
                
                    ";
    
                    echo"
                
                    <p style='margin-top: 6%; margin-bottom: 10%;text-align: centre;justify-content: centre;border-bottom: 2px solid indigo; '>
                 
                    
                        <a  href='comments.php?u_id=".$row['id']."'>
                       
                        <button class='btn btn-success' style='margin-left: 10px;margin-left: 20%;margin-top: 0%;' title='Click here to comment or view comments'>
                        <label>COMMENT</label>
                        <i class='material-icons'>comment</i>
                        </button></a>
                        <br>
                        <label style='color: green; '>Click button to comment or view comments</label>
                        
                    </p>	
                    
                    ";
                }elseif($row['picturename']){
                    echo "
			<div >
                    <div  style='height: auto; width:100%;padding: 10px;background-color: grey; 
                    color:white; border-radius-top: 0px; margin-top: 5%;'>
                    <p>".$row['caption']."</p>
                    </div>
                    
                
                     <div  style='height: 100%; width:100%;padding: 0px; border-radius: 0px; margin-top: 0%;'>
                    <img src='Files/".$row['picturename']."' style = 'width: 100%; height:auto;'>
    
                </div>
                    
                    
    
    
                  " ;
                    echo"
                
                    <p style='margin-top: 6%; margin-bottom: 10%;text-align: centre;border-bottom: 2px solid indigo;'>
                    
                    
                        <a  href='comments.php?u_id=".$row['id']."'>
                        <button class='btn btn-success' style='margin-left: 10px;margin-left: 20%;' title='Click here to comment or view comments'>
                        <label>COMMENT</label>
                        <i class='material-icons'>comment</i>
                       
                        </button></a>
           
                          
                        <br>
                        <label style='color: green; '>Click button to comment or view comments</label>
      
                        
                    </p>	
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
                echo"
                
                <p style='margin-top: 1%; margin-bottom: 10%;text-align: centre;border-bottom: 2px solid indigo;'>
                
                
                    <a  href='comments.php?u_id=".$row['id']."'>
                    <button class='btn btn-success' style='margin-left: 10px;margin-left: 20%;' title='Click here to comment or view comments'>
                    <label>COMMENT</label>
                    <i class='material-icons'>comment</i>
                    </button></a>

                    <br>
                    <label style='color: green; '>Click button to comment or view comments</label>
                    
                </p>	
                
                ";
                }
                 else{
                    echo "
                    
                    
                    <div style='height: auto; width:100%;padding: 50px;background-color: grey; border-radius: 10px; 
                    color:white; border-radius: 10px; margin-left: 0%;'>".$row['caption']."</div>
                  
            
                    ";
        
                    echo"
                <p style='border-bottom: 2px solid indigo; margin-top: 2%; margin-bottom: 10%;text-align: centre;background-color: transparent;'>
                    
                    
                    <a  href='comments.php?u_id=".$row['id']."'>
                    <button class='btn btn-success' style='margin-left: 20%;'
                    title='Click here to comment or view comments'>
                    <label>COMMENT</label>
                    <i class='material-icons'>comment</i>
                    </button></a>

                    <br>
                    <label style='color: green; '>Click button to comment or view comments</label>
                </p>
                    
                    ";
                }

			}
		}
        
            ?>


</div>
</div>
    </div>

</body>
</html>
