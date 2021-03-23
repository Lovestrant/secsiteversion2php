
    


<?php
if(isset($_GET['offset']) && isset($_GET['limit'])){
    $limit = $_GET['limit'];
    $offset = $_GET['offset'];

  
    include('db.php');
    $sql="SELECT * FROM secsite ORDER BY ID DESC LIMIT {$limit} OFFSET {$offset}";

    $data= mysqli_query($con,$sql);
    $queryResults= mysqli_num_rows($data);
    
    
    
    
    if($queryResults >0) {
        while($row = mysqli_fetch_assoc($data)) {
            if($row['videoname']){
                
                echo "
                
                <div style='height:auto;margin-top:20%;width:100%; text-align: centre;margin-left:0px;'>
                <div  style='height: auto;width: 100%;background-color: grey; 
                 border-radius: 0px;text-align: left; margin-left:0%;
                  padding:10px; color:white;  margin-top: -15%; '>".$row['caption']."</div>
        
                <video style='width: 100%; height: auto; margin-top:0%;' controls >
                <source src='Files/".$row['videoname']."' type= 'video/mp4'>
                
                
                </div>
            
            
            
                ";


                echo"
               
                <p style='margin-top: 5%; display:flex;margin-bottom: 1%;text-align: centre;justify-content: centre;border-bottom: 2px solid indigo; '>
             
                
                    <a  href='comments.php?u_id=".$row['id']."'>
                   
                    <button class='btn btn-success' style='margin-left: 0px;margin-left: 0%;margin-top: 0%;' title='Click here to comment or view comments'>
                    <label>COMMENT/VIEW COMMENTS</label>
                    <i class='material-icons'>comment</i>
                    </button></a>

                    
            

               
                  
                    
                </p>	
                

             
                ";


            }elseif($row['picturename']){
              
                echo "
               
        <div >
                <div  style='height: auto; color:white;  width:100%;padding: 10px;background-color: grey; border-radius-top: 0px; margin-top: 5%;'>
                <p>".$row['caption']."</p>
                </div>
                
            
                 <div  style='height: 100%; width:100%;padding: 0px; border-radius: 0px; margin-top: 0%;'>
                <img src='Files/".$row['picturename']."' style = 'width: 100%; height:auto;'>

            </div>
                
                


              " ;
              echo"
            
              <p style='margin-top: 5%; display:flex;margin-bottom: 1%;text-align: centre;justify-content: centre;border-bottom: 2px solid indigo; '>
           
              
                  <a  href='comments.php?u_id=".$row['id']."'>
                 
                  <button class='btn btn-success' style='margin-left: 0px;margin-left: 0%;margin-top: 0%;' title='Click here to comment or view comments'>
                  <label>COMMENT/VIEW COMMENTS</label>
                  <i class='material-icons'>comment</i>
                  </button></a>

                  


             
                
                  
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
            
                <p style='margin-top: 5%; display:flex;margin-bottom: 1%;text-align: centre;justify-content: centre;border-bottom: 2px solid indigo; '>
             
                
                    <a  href='comments.php?u_id=".$row['id']."'>
                   
                    <button class='btn btn-success' style='margin-left: 0px;margin-left: 0%;margin-top: 0%;' title='Click here to comment or view comments'>
                    <label>COMMENT/VIEW COMMENTS</label>
                    <i class='material-icons'>comment</i>
                    </button></a>


               
                  
                    
                </p>	
                

             
                ";

            }
             else{
                echo "
                
                
                <div style='height: auto; width:100%;padding: 50px;background-color: grey; 
                color:white; border-radius: 10px; border-radius: 10px; margin-left: 0%;'>".$row['caption']."</div>
              
        
                ";
    
                echo"
            
                <p style='margin-top: 5%; display:flex;margin-bottom: 1%;text-align: centre;justify-content: centre;border-bottom: 2px solid indigo; '>
             
                
                    <a  href='comments.php?u_id=".$row['id']."'>
                   
                    <button class='btn btn-success' style='margin-left: 0px;margin-left: 0%;margin-top: 0%;' title='Click here to comment or view comments'>
                    <label>COMMENT/VIEW COMMENTS</label>
                    <i class='material-icons'>comment</i>
                    </button></a>

                   


               
                  
                    
                </p>	
                

             
                ";

            }

        }
    }
}


?>

	
		