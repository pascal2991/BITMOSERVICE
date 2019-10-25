
<!DOCTYPE html>
   
   <html> 
       <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Request for male native wears from close by</title>
        <meta charset = "UTF-8" /> 
      <link rel ="stylesheet" href ="css/style.css" type ="text/css" />
      <link rel ="stylesheet" media ="(max-width: 768px)" href ="css/style2.css" type ="text/css" />
		  
			</head>
			
<body>

	 <div id="contain">


   
<div class="bod">
<strong class="name"> Welcome, <?=$_SESSION['username']?>!<br /></strong> <br />
<p id = 'name'>Please kindly fill the form.</p></div>

      <div class= "contain1">  

     <center><h1>Place order for male native wears </h1></center><br /><br />
      
     <div class="long">
         <form action="request-male-native-wears.php" method="post" enctype="multipart/form-data" autocomplete="off" class="">
            
<div class ="longer"> 
<div class ="div2">  
               <input type="text" class="input1" name="name" value="" placeholder="Full name*" required/> <br />
               <select name="country" class="nigeria" value=""  required><option>Nigeria</option></select>   
         </div>
         <!-- <select name="request_african_meal_service" class="nigeria" value=""  required><option>request_african_meal_service</option></select>    -->
      <div class="div2">
          <input name="state" placeholder="Present State*" class="input1" required /><br />
          <input name="city" class="input1" value="" placeholder="Present City*" required/><br />
      </div>
      
      <div class =  "div2">
         <input type="text" class="input1" name="location" value="" placeholder="Specific Address*" required/> <br />
         <input type="text" class="input1" name="email" value="" placeholder="Email*" maxlength= 290 required/> <br />
      </div>
      
      <div class="div2">
        <input type="text" class="input1" name="phone" value="" placeholder="Phone Number*" required/><br />
        <input type="text" class="input1" name="bill" value="" placeholder="Date Required*" required/><br />
    </div>


                        <textarea type ="text" class="textareax" maxlength="200" name="description" value="" placeholder="Description*" required></textarea>
                        
                        <div id="h33">Upload a profile photo</div><div><input type="file" name="photo" class="choose_file" multiple="multiple" required></div><br />
                        <div class="post">
                                Please confirm your details before you submit
                            </div>
                        <input type="submit" class="input3" name="deal" value="Submit"/>
              </div>
                    </form> 
      </div>
        
       </form> 
    </div>

</div>

  <div class="footer">
  <div class="copy">&#169;Copyright bitmoService. 2019.</div>
  </div>
 
     </body>
         
    </html>