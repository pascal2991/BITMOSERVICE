
<!DOCTYPE html>
   
   <html> 
       <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Render male clothing supplies to costumers</title>
        <meta charset = "UTF-8" /> 
      <link rel ="stylesheet" href ="css/style.css" type ="text/css" />
      <link rel ="stylesheet" media ="(max-width: 768px)" href ="css/style2.css" type ="text/css" />
		  
			</head>
			
<body>

	 <div id="contain">


    <header>
                            <div class="logo"><img src = "logo/bitmoservice31.jpg"  id="logo" alt="Img-01" ></div>   
                            
                            

                            <ol>
                              
                          </ol>
                            <nav >
                                   <div>
                                              <ul class="nav-links">
                                        
                                                  <li><a href="http://bitmoservice.com/index.php">Home</a></li> 
                                                  <li><a href="http://bitmoservice.com/about-us.php">About Us</a></li>
                                                  <li><a href="http://bitmoservice.com/contact-us.php">Contact Us</a></li>
                                                   <li><a href="http://bitmoservice.com/newsletter.php">Newsletter</a></li> 
                                                  <!-- <li><a href="http://bitmoservice.com/contact-us.php">Blog</a></li> -->
                                              
                                            </ul>
                                    </div>
                          </nav>

                     
                              <div>
                                        <div class="navbar" >
                                            <span class = "open-slide">
                                               <a href = "#" onclick = "openSlideMenu()" >
                                                  <svg width="25" height="25">
                                                        <path d="M0,3 30,3" stroke="white" stroke-width="3.5"/>
                                                        <path d="M0,10.5 30,10.5" stroke="white" stroke-width="3.5"/>
                                                        <path d="M0,18 30,18" stroke="white" stroke-width="3.5"/>  
                                                  </svg> 
                                              </a>
                                           </span>


                                           <div id = "side-men" class = "side-na"> 
                                                  <a href = "#"  class = "btn-close" onclick = "closeSlideMenu()">&times;</a>
                                                 <ul><li>  <a href="http://bitmoservice.com/index.php">Home<hr></a></li>
                                                 <li> <a href="http://bitmoservice.com/about-us.php">About Us<hr /></a></li>
                                                 <li> <a href="http://bitmoservice.com/contact-us.php">Contact Us<hr></a></li>
                                                  <li><a href="http://bitmoservice.com/newsletter.php">Newsletter<hr></a></li> 
                                                 </ul>
                                              
                                            </div>
                                        </div>

                                        </div>

                                        <script>
                                            function openSlideMenu(){
                                                document.getElementById('side-men').style.width = '250px';
                                            }

                                            function closeSlideMenu(){
                                                document.getElementById('side-men').style.width = '0';
                                            }
                                        </script>
                                        
                    </header>   
                                     
                                        <div class="decor">
                                          <img src = "other_pics/1.jpg"  id="decor" alt="Img-01" >   
                                        </div>
			
<br />

<div class="bod">
      <strong class="name"> Welcome, <?=$_SESSION['username']?>!<br /></strong> <br />
     <p id = 'name'>Please kindly fill the form.</p>
 </div>

      <div class= "contain1">  

     <center><h1>Render male clothing supplies from your location</h1></center><br /><br />
      
     <div class="long">
         <form action="render-male-clothing-supplies1.php" method="post" enctype="multipart/form-data" autocomplete="off" class="">
           
            <div class ="longer"> 
                    <div class ="div2">  
                            <input type="text" class="input1" name="name" value="" placeholder="Name*" required/> <br />
                            <select name="country" class="nigeria" value=""  required><option>Nigeria</option></select>   
                        </div>
                        <!-- <select name="request_african_meal_service" class="nigeria" value=""  required><option>request_african_meal_service</option></select>    -->
                    <div class="div2">
                        <input name="email" placeholder="Email*" class="input1" required /><br />
                        <input name="phone" class="input1" value="" placeholder="Phone Number*" required /><br />
                    </div>
                    
                    <div class =  "div2">
                        <input type="text" class="input1" name="state" value="" placeholder="State*" required/> <br />
                        <input type="text" class="input1" name="city" value="" placeholder="City*" maxlength= 290 required/> <br />
                    </div>
                    
                    <div = class="div2">
                        <!-- <input type="text" class="input1" name="website" value="" placeholder="Website" maxlength= 290 /> <br /> -->
                        <input type="text" class="input1" name="location" value="" placeholder="Location*" required/><br />
                        <!-- <input type="text" class="input1" name="type" value="" placeholder="Type" /><br /> -->
                            
                </div>

        
          
              
  </div>        
                  

                        <textarea type ="text" class="textareax" maxlength="200" name="description" value="" placeholder="Description*" required></textarea>
                        
                        <div id="h33">Upload product photo</div><div><input type="file" name="photo" class="choose_file" multiple required></div><br />
                        <!-- <div id="h33">Upload product photo2</div><div><input type="file" name="photo2" class="choose_file" multiple required></div><br /> -->
                        <!-- <div id="h33">Upload product photo3</div><div><input type="file" name="photo3" class="choose_file" multiple required></div><br />
                        <div id="h33">Upload product photo4</div><div><input type="file" name="photo4" class="choose_file" multiple required></div><br />
                         -->
                        
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