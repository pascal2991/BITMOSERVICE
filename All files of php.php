
/* render fashion consulting service search for requests*/

<?php
   include 'database.php';
  

?>

<?php

if(isset($_POST['search'])){

$search = mysqli_real_escape_string($con, $_POST['search']);

$sql = "SELECT * FROM request_female_native_wears WHERE state LIKE '%$search%'
OR  city LIKE '%$search%'  OR  location LIKE '%$search%'";

$res = mysqli_query($con, $sql);
$queryResult = mysqli_num_rows($res);

 if($queryResult > 0){

  echo "<b id='bold'>$queryResult result(s) found for <b>$search</b>!</b><br /><br />"; 
    
   while($row = mysqli_fetch_assoc($res)){

        echo "<span><img height= 140px class = 'photo1' width= 130px src = '".$row['photo']."'></span>"."<br />";
        echo "<div class = 'photo'>";
        echo "<b id='id'>Name: </b>" ."<b id='bold'>".$row['name']."</b>"."<br />";
        echo "<b id='id'>Country: </b>" ."<b id='bold'>".$row['country']."</b>"."<br />";
        echo "<b id='id'>State: </b>" ."<b id='bold'>".$row['state']."</b>"."<br />";
        echo "<b id='id'>Location: </b>" ."<b id='bold'>".$row['location']."</b>"."<br />";
        echo "<b id='id'>Email: </b>" ."<b id='bold'>".$row['email']."</b>"."<br />";
        echo "<b id='id'>Tel: </b>" ."<b id='bold'>".$row['phone']."</b>"."<br />";
        // echo "<b id='id'>Type: </b>" ."<b id='bold'>".$row['type']."</b>"."<br />";
        echo "<b id='id'>Description: </b>" ."<b class='com'>".$row['description']."</b>"."<br />";
        echo " <b id='posted'>Posted: </b>"."<b id='date'>".$row['time']." | ".$row['date']."</b>"."<br />";
        echo "</div>"; 
}

          }else{

                  echo "<b id='bold'>No service providers found. Please try again later!</b>";
                 }


              }else{
                
              }

     ?>


     

     /* render fashion consulting service */

     <?php
session_start();
$_SESSION['message']='';
include 'database.php';
//connect to mysql

if(isset($_POST['deal'])){
 $name=mysqli_real_escape_string($con, $_POST['name']);
 $country=mysqli_real_escape_string($con, $_POST['country']);
 $state=mysqli_real_escape_string($con, $_POST['state']);
 $city=mysqli_real_escape_string($con, $_POST['city']);
 $location=mysqli_real_escape_string($con, $_POST['location']);
 $email=mysqli_real_escape_string($con, $_POST['email']);
 $phone=mysqli_real_escape_string($con, $_POST['phone']);
 $type=mysqli_real_escape_string($con, $_POST['type']);
//  $price=mysqli_real_escape_string($con, $_POST['price']);
 $description=mysqli_real_escape_string($con, $_POST['description']);

 // set time zone
 date_default_timezone_set('Africa/Lagos');
 $time = date('h:ia');
 $date = date('d-M-Y');
 

  $target1= 'images/'.basename($_FILES['photo']['name']);
//   $target2= 'images/'.basename($_FILES['photo2']['name']);
//   $target3= 'images/'.basename($_FILES['photo3']['name']);
//   $target4= 'images/'.basename($_FILES['photo4']['name']);

 //make sure file type is image
 if(preg_match("!image!", $_FILES['photo']['type']) ){
 
  //copy image to images folder
  
  if(move_uploaded_file ($_FILES['photo']['tmp_name'], $target1) ){
   
   $_SESSION['name'] =$name;
   $_SESSION['photo'] =$target1; 
//   $_SESSION['photo2'] =$target2; 
//    $_SESSION['photo3'] =$target3; 
//    $_SESSION['photo4'] =$target4; 
   $_SESSION['country'] =$country;
   $_SESSION['state'] =$state;
   $_SESSION['city'] =$city;
   $_SESSION['location'] =$location;
   $_SESSION['email'] =$email;
   $_SESSION['phone'] =$phone;
   $_SESSION['type'] =$type;
//    $_SESSION['price'] =$price;
   $_SESSION['description'] =$description;
   $_SESSION['time'] =$time;
   $_SESSION['date'] =$date;
   
   $sql="INSERT INTO render_fashion_consulting_service (name, country, state, city, location, email, phone, type, photo, description, time, date, username, password)"
   ."VALUES('$name', '$country', '$state', '$city', '$location',  '$email',  '$phone',  '$type',  '$target1', '$description', '$time', '$date', '{$_SESSION['username']}',  '{$_SESSION['password']}' )";
   
   if(mysqli_query($con, $sql) == true){
      
    ?>
      <script type = 'text/javascript'>
         window.location = " render-fashion-consulting-service-profile1.php";
      </script>
    <?php
    
   }else{
       echo "Sorry you could not be added!";
       exit();

    ?>
      <script type = 'text/javascript'>
         window.location = "render-fashion-consulting-service.php";
      </script>
    <?php
      
   }
   
       
      }else{
         $error  = "File upload failed";
         ?>
      <script type = 'text/javascript'>
         window.location = "render-fashion-consulting-service.php";
      </script>
    <?php
      
      }
      
     }else{
        $error  = "Please only upload jpg, jpeg, gif or png images";
        ?>
      <script type = 'text/javascript'>
         window.location = "render-fashion-consulting-service.php";
      </script>

    <?php
     }
     }


    ?>



    /* render fashion consulting service1  */


    <?php
session_start();
$_SESSION['message']='';
include 'database.php';
//connect to mysql

if(isset($_POST['deal'])){
 $name=mysqli_real_escape_string($con, $_POST['name']);
 $country=mysqli_real_escape_string($con, $_POST['country']);
 $state=mysqli_real_escape_string($con, $_POST['state']);
 $city=mysqli_real_escape_string($con, $_POST['city']);
 $location=mysqli_real_escape_string($con, $_POST['location']);
 $email=mysqli_real_escape_string($con, $_POST['email']);
 $phone=mysqli_real_escape_string($con, $_POST['phone']);
 $type=mysqli_real_escape_string($con, $_POST['type']);
//  $price=mysqli_real_escape_string($con, $_POST['price']);
 $description=mysqli_real_escape_string($con, $_POST['description']);

 // set time zone
 date_default_timezone_set('Africa/Lagos');
 $time = date('h:ia');
 $date = date('d-M-Y');
 

  $target1= 'images/'.basename($_FILES['photo']['name']);
//   $target2= 'images/'.basename($_FILES['photo2']['name']);
//   $target3= 'images/'.basename($_FILES['photo3']['name']);
//   $target4= 'images/'.basename($_FILES['photo4']['name']);

 //make sure file type is image
 if(preg_match("!image!", $_FILES['photo']['type']) ){
 
  //copy image to images folder
  
  if(move_uploaded_file ($_FILES['photo']['tmp_name'], $target1) ){
   
   $_SESSION['name'] =$name;
   $_SESSION['photo'] =$target1; 
//   $_SESSION['photo2'] =$target2; 
//    $_SESSION['photo3'] =$target3; 
//    $_SESSION['photo4'] =$target4; 
   $_SESSION['country'] =$country;
   $_SESSION['state'] =$state;
   $_SESSION['city'] =$city;
   $_SESSION['location'] =$location;
   $_SESSION['email'] =$email;
   $_SESSION['phone'] =$phone;
//    $_SESSION['type'] =$type;
//    $_SESSION['price'] =$price;
   $_SESSION['description'] =$description;
   $_SESSION['time'] =$time;
   $_SESSION['date'] =$date;
   
   $sql="INSERT INTO render_fashion_consulting_service (name, country, state, city, location, email, phone, photo, description, time, date, username, password)"
   ."VALUES('$name', '$country', '$state', '$city', '$location',  '$email',  '$phone', '$target1', '$description', '$time', '$date', '{$_SESSION['username']}',  '{$_SESSION['password']}' )";
   
   if(mysqli_query($con, $sql) == true){
      
    ?>
      <script type = 'text/javascript'>
         window.location = " render-fashion-consulting-service-profile1.php";
      </script>
    <?php
    
   }else{
       echo "Sorry you could not be added!";
       exit();

    ?>
      <script type = 'text/javascript'>
         window.location = "render-fashion-consulting-service1.php";
      </script>
    <?php
      
   }
   
       
      }else{
         $error  = "File upload failed";
         ?>
      <script type = 'text/javascript'>
         window.location = "render-fashion-consulting-service1.php";
      </script>
    <?php
      
      }
      
     }else{
        $error  = "Please only upload jpg, jpeg, gif or png images";
        ?>
      <script type = 'text/javascript'>
         window.location = "render-fashion-consulting-service1.php";
      </script>

    <?php
     }
     }


    ?>


    /* render fashion consulting service login */

    <?php
 session_start();

    $_SESSION['message'] = '';
    include 'database.php';
	
	if(isset ($_POST['submit'])){

        $username = $_POST['username'];
        $pass = md5($_POST['password']);

        $sql = ("SELECT * FROM render_female_native_wears  WHERE username = '{$_SESSION['username']}'  AND password='$pass' ");
        $res=mysqli_query($con, $sql);	 

        if (mysqli_num_rows($res) > 0) {   
            $_SESSION['username'] =  $_POST['username'];
            $_SESSION['password'] = md5($_POST['password']);

            ?>
                <script type="text/javascript">
                    window.location = " render-fashion-consulting-service-search-for-requests.php";
                </script>
         <?php

        }else   {
        
        $username = $_POST['username'];
		 $pass = md5($_POST['password']);

		   $query = ("SELECT * FROM signup WHERE username = '$username' AND password='$pass'");
		
		   $result=mysqli_query($con, $query);
		
		   if (mysqli_num_rows($result) > 0) {
 
				$_SESSION['username'] =  $_POST['username'];
				$_SESSION['password'] = md5($_POST['password']);

                ?>
                        <script type="text/javascript">
                            window.location = " render-fashion-consulting-service.php";
                        </script>
                <?php
             
		      }else{
		       $error = "Your username or password was invalid.";

                ?>
                        <script type="text/javascript">
                            window.location = "render-fashion-consulting-service-login.php";
                        </script>
                <?php
            
            
         }
       }
    }
	

?>




/* render fashion consulting service login1 */


<?php
 session_start();

    $_SESSION['message'] = '';
    include 'database.php';
	
	if(isset ($_POST['submit'])){

        $username = $_POST['username'];
        $pass = md5($_POST['password']);

        $sql = ("SELECT * FROM render_fashion_consulting_service  WHERE username = '{$_SESSION['username']}'  AND password='$pass' ");
        $res=mysqli_query($con, $sql);	 

        if (mysqli_num_rows($res) > 0) {   
            $_SESSION['username'] =  $_POST['username'];
            $_SESSION['password'] = md5($_POST['password']);

            ?>
                <script type="text/javascript">
                    window.location = " render-fashion-consulting-service-search-for-requests.php";
                </script>
         <?php

        }else   {
        
        $username = $_POST['username'];
		 $pass = md5($_POST['password']);

		   $query = ("SELECT * FROM signup WHERE username = '$username' AND password='$pass'");
		
		   $result=mysqli_query($con, $query);
		
		   if (mysqli_num_rows($result) > 0) {
         
				$_SESSION['username'] =  $_POST['username'];
				$_SESSION['password'] = md5($_POST['password']);
           
                ?>
                        <script type="text/javascript">
                            window.location = " render-fashion-consulting-service1.php";
                        </script>
                <?php
             
		      }else{
		       $error = "Your username or password was invalid.";

                ?>
                        <script type="text/javascript">
                            window.location = "render-fashion-consulting-service-login1.php";
                        </script>
                <?php
            
            
         }
       }
    }
	

?>



/* render fashion consulting service profile1 */

<span><img class="photo1" height="163px" width="143px" src='<?=$_SESSION['photo']?>'>
      
        
<div>
        <span><img class="photo1" height="163px" width="143px" src='<?=$_SESSION['photo']?>'>
      
        
      </span><br />
      <div class="photo3">
        <b id="id">Name: </b> <b id="bold"><?=$_SESSION['name'] ?></b><br />
        <b id="id">Country: </b> <b id="bold"><?=$_SESSION['country']?></b><br />
        <b id="id">Present State: </b><b id="bold"><?=$_SESSION['state'] ?></b><br />
        <b id="id">Present City: </b><b id="bold"><?=$_SESSION['city'] ?></b><br />
        <b id="id">Present Address: </b><b id="bold"><?=$_SESSION['location'] ?></b><br />
        <b id="id">Email: </b><b id="bold"><?=$_SESSION['email'] ?></b><br />
        <b id="id">Tel: </b><b id="bold"><?=$_SESSION['phone'] ?></b><br />
       <div class = "text_comment"><b id="id">Description:</b><br /><div class="comment"><?=$_SESSION['description']?></div></div>
        <b id="posted"> Posted: </b> <b id="date"><?=$_SESSION['time']?>  |  <?=$_SESSION['date']?></b><br />
       </div>
     </div>




/* render fashion consulting service signup */

<?php
     session_start();
	$_SESSION['message'] = '';
 
	include 'database.php';
	
	if(mysqli_connect_errno()){
	echo 'Failed to connect to database: '. mysqli_connect_error();
	}


	if(isset($_POST['signup'])){
		 
	 	if(strlen($_POST["password"]) < 6){

      $error = "Your password must have at least 6 characters.";
      ?>
        <script type="text/javascript"> 
             window.location = "render-fashion-consulting-service-signup.php";
        </script>
    <?php
			
			
		}elseif($_POST['password'] == $_POST['confirmpassword']){

	$username = mysqli_real_escape_string($con, $_POST['username']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, md5($_POST['password']));
	

	$email = ($_POST['email']);

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$error = "Please type in a valid email!";
	
	}else{

	$query = ("SELECT username FROM signup WHERE username='$username'");
	$result=mysqli_query($con, $query);

	if(mysqli_num_rows($result) > 0){

    $error = "This username is already taken. Please type in another username"; 

    $_SESSION['username'] = $username;
    ?>
    <script type="text/javascript"> 
         window.location = "render-fashion-consulting-service-login1.php";
    </script>
<?php

    ?>
        <script type="text/javascript"> 
             window.location = "render-fashion-consulting-service-signup.php";
        </script>
    <?php

	}else{


	$query = ("SELECT email FROM signup WHERE email='$email'");
	$result=mysqli_query($con, $query);

	if(mysqli_num_rows($result) > 0){
	$error = "This email address  is already taken! Please type in another email address"; 
	
	}else{

	$sql="INSERT INTO signup (username, email, password)
	VALUES ('$username', '$email', '$password')";

	mysqli_query($con, $sql);

    $_SESSION['username'] = $username;

    ?>
        <script type="text/javascript"> 
             window.location = "render-fashion-consulting-service-login1.php";
        </script>
    <?php
    
	}

	}

	}

	}else{
	$error = "Your passwords do not match!";

	}	

	
	}

	?>



    /* render female clothing supplies  */

    <?php
session_start();
$_SESSION['message']='';
include 'database.php';
//connect to mysql

if(isset($_POST['deal'])){
 $name=mysqli_real_escape_string($con, $_POST['name']);
 $country=mysqli_real_escape_string($con, $_POST['country']);
 $state=mysqli_real_escape_string($con, $_POST['state']);
 $city=mysqli_real_escape_string($con, $_POST['city']);
 $location=mysqli_real_escape_string($con, $_POST['location']);
 $email=mysqli_real_escape_string($con, $_POST['email']);
 $phone=mysqli_real_escape_string($con, $_POST['phone']);
//  $type=mysqli_real_escape_string($con, $_POST['type']);
//  $price=mysqli_real_escape_string($con, $_POST['price']);
 $description=mysqli_real_escape_string($con, $_POST['description']);

 // set time zone
 date_default_timezone_set('Africa/Lagos');
 $time = date('h:ia');
 $date = date('d-M-Y');
 

  $target1= 'images/'.basename($_FILES['photo']['name']);
//   $target2= 'images/'.basename($_FILES['photo2']['name']);
//   $target3= 'images/'.basename($_FILES['photo3']['name']);
//   $target4= 'images/'.basename($_FILES['photo4']['name']);

 //make sure file type is image
 if(preg_match("!image!", $_FILES['photo']['type']) ){
 
  //copy image to images folder
  
  if(move_uploaded_file ($_FILES['photo']['tmp_name'], $target1) ){
   
   $_SESSION['name'] =$name;
   $_SESSION['photo'] =$target1; 
//   $_SESSION['photo2'] =$target2; 
//    $_SESSION['photo3'] =$target3; 
//    $_SESSION['photo4'] =$target4; 
   $_SESSION['country'] =$country;
   $_SESSION['state'] =$state;
   $_SESSION['city'] =$city;
   $_SESSION['location'] =$location;
   $_SESSION['email'] =$email;
   $_SESSION['phone'] =$phone;
  //  $_SESSION['type'] =$type;
//    $_SESSION['price'] =$price;
   $_SESSION['description'] =$description;
   $_SESSION['time'] =$time;
   $_SESSION['date'] =$date;
   
   $sql="INSERT INTO render_female_clothing_supplies (name, country, state, city, location, email, phone,  photo, description, time, date, username, password)"
   ."VALUES('$name', '$country', '$state', '$city', '$location',  '$email',  '$phone',   '$target1', '$description', '$time', '$date', '{$_SESSION['username']}',  '{$_SESSION['password']}' )";
   
   if(mysqli_query($con, $sql) == true){
      
    ?>
      <script type = 'text/javascript'>
         window.location = " render-female-clothing-supplies-profile1.php";
      </script>
    <?php
    
   }else{
       echo "Sorry you could not be added!";
       exit();

    ?>
      <script type = 'text/javascript'>
         window.location = "render-female-clothing-supplies.php";
      </script>
    <?php
      
   }
   
       
      }else{
         $error  = "File upload failed";
         ?>
      <script type = 'text/javascript'>
         window.location = "render-female-clothing-supplies.php";
      </script>
    <?php
      
      }
      
     }else{
        $error  = "Please only upload jpg, jpeg, gif or png images";
        ?>
      <script type = 'text/javascript'>
         window.location = "render-female-clothing-supplies.php";
      </script>

    <?php
     }
     }


    ?>


    /* render female clothing supplyies welcome session  */

    <div class="bod">
      <strong class="name"> Welcome, <?=$_SESSION['username']?>!<br /></strong> <br />
     <p id = 'name'>Please kindly fill the form.</p>
 </div>