<?php session_start(); 
      if(isset($_POST['mode'])){
        
         
         $_SESSION["mode"] = 'night';
     
    }

if(isset($_POST['mod'])){
        
         
         $_SESSION["mode"] = 'day';
     
    }
  ?>
<!DOCTYPE html>
<html<?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "dir ='rtl'";

                    }else
                         echo "dir ='ltr'";
			    ?>>
	<head>
		<?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "<title>لوحة اعلانات المشفى</title>";

                    }else
                         echo "<title>Hospital Notice Board</title>";
			    ?>
		<!-- include jQuery -->
		<script src="js/jquery-3.4.1.min.js"></script>
		<!-- include bootstrap -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/bootstrap.min.js"></script>
		<!-- include css -->
		<link rel="stylesheet" type="text/css" href="css/Style.css">
	</head>
	<body <?php  if($_SESSION['mode']=='night')echo "class='npage'";else echo "class='page'";?>>
     <form method = "post">
			<center>
		<div style="text-align: center;">
		<!--start navbar -->
			<nav class="navbar-inverse " id="hnav">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "<p>لوحة اعلانات المشفى</p>";

                    }else
                         echo "<p>Hospital Notice Board</p>";
			      ?>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			      <ul class="nav navbar-nav">
              <?php if($_SESSION['login']=='admin'){?>
                <li><a href="accountadmin.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                      echo "الصفحة الرئيسية";
                                          
                    }else
                         echo "Home";
          ?></a></li>
              <li><a href="myads.php" ><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                      echo "الاعلانات";
                                          
                    }else
                         echo "All Ads";
          ?></a></li>
               <li><a href="history.php" style="background-color: #565655;"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                      echo "السجل";

                    }else
                         echo "History";
            ?></a></li>
               <li><a href="mygroups.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                      echo "المجموعات";
                                          
                    }else
                         echo "All Groups";
          ?></a></li>
              <li><a href="login.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                      echo "تسجيل الخروج";
                                          
                    }else
                         echo "Logout";
         } ?></a></li>
         <?php if ($_SESSION['login'] == 'user') {?>
           <li><a href="accountuser.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                      echo "الصفحة الرئيسية";
                                          
                    }else
                         echo "Home";
          ?></a></li>
              <li><a href="generalads.php" ><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                      echo "الإعلانات العامة";
                                          
                    }else
                         echo "General Ads";
          ?></a></li>
           <li><a href="history.php" style="background-color: #565655;"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                      echo "السجل";

                    }else
                         echo "History";
            ?></a></li>
              <li><a href="generalgroups.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                      echo "المجموعات العامة";
                                          
                    }else
                         echo "General groups";
          ?></a></li>
               <li><a href="usergroups.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                      echo "مجموعاتي";
                                          
                    }else
                         echo "My Groups";
          ?></a></li>
              <li><a href="login.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                      echo "تسجيل الخروج";
                                          
                    }else
                         echo "Logout";
            }?></a></li>

       <?php if ($_SESSION['login'] == 'guest'){?>

			      	 <li><a href="guestgeneralads.php" > <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "الإعلانات العامة";

                    }else
                         echo "General Ads";
			      ?></a></li>
              <li><a href="history.php" style="background-color: #565655;"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                      echo "السجل";

                    }else
                         echo "History";
            ?></a></li>
			      	  <li><a href="generalgroups.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "المجموعات العامة";

                    }else
                         echo "General groups";
			      ?></a></li>
			      	 <li><a href="guestadd.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "إضافة إعلان";

                    }else
                         echo "Add Ads";
			      ?></a></li>
			        <li><a href="login.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "تسجيل الخروج";

                    }else
                         echo "Logout";
			      }?></a></li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
              
               <?php if($_SESSION['mode'] == 'day'){
    echo "       <li> <button class='btn btn-info btn-lg' type='submit' name='mode'   style='background-color: #160FDE ;'><img src='images/moon.png' class='center-block img-responsive' style='max-width: 20px; max-height: 20px;'>"; 
                    if($_SESSION["lang"] == 'Arabic'){
                        echo 'وضع ليلي';

                    }else
                         echo 'night mode';
                echo " 
                    
             
               </button>  </li>";
}else if($_SESSION['mode'] == 'night'){
echo "       <li> <button class='btn btn-info btn-lg' type='submit' name='mod'   style='background-color: #160FDE ;'><img src='images/sun.png' class='center-block img-responsive' style='max-width: 20px; max-height: 20px;'>"; 
                    if($_SESSION["lang"] == 'Arabic'){
                        echo 'وضع نهاري';

                    }else
                         echo 'day mode';
                echo " 
                    
             
               </button>  </li>";
  
}?>
			        <li><a href=""><span class="glyphicon glyphicon-user"></span><?php 
              if($_SESSION['login']=='guest'){
                  
                         echo $_SESSION['nk'];}
              else {
                           echo $_SESSION['name'];
                         }
			      ?></a></li>
			      </ul>
			    </div>
			  </div>
			</nav><br>

			<!-- categories -->
			<div class="title text-center" <?php if($_SESSION['mode']=='night')echo "style=' font-size: 50px; color:white;'";else echo "style=' font-size: 50px;'";
?>><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                      echo "التعديلات";
                                          
                    }else
                         echo "History";
          ?></div><br>


						<?php 
					 $jsonitem = file_get_contents("oldnotice.json");
                               $objitems = json_decode($jsonitem);
                               $jsonite = file_get_contents("notice.json");
                               $objites = json_decode($jsonite);
                               foreach ($objites as $friend ) {
                                  if($friend->noticeID == $_SESSION['history']){
                                      echo "<form method = 'post'> 
      <div class='col-lg-4 col-md-6 col-sm-6 col-xs-12'>

          <div class='container' 
          style=' 
              width: 400px;
            height: 500px;
            margin: 10px;
            margin-left: 40px;
            margin-bottom: 40px;
            ";
            if($_SESSION['mode'] == 'night'){
              echo "background-color: #4419D5;  border:1px solid #4419D5;";
            }
            else {echo "
            background-color: #ffffb3;
            border:1px solid black;";}echo "
            border-radius: 20px 20px;'>
<h1";   if($_SESSION['mode'] == 'night'){
              echo " style='color:white;'";
            } 

            echo "> $friend->noticeTitle</h1>
            <h4";   if($_SESSION['mode'] == 'night'){
              echo " style='color:white;'";
            } 

            echo ">$friend->text</h4>
                  <p ";   if($_SESSION['mode'] == 'night'){
              echo " style='color:white;'";
            } 

            echo ">$friend->date</p>
              <hr ";
            if($_SESSION['mode'] == 'night'){
              echo "style='border-top-color: white;'";
            }
            else {echo "
            style='border-top-color: black;'";}echo " >";
              

                       $imageFileType = strtolower(pathinfo($friend->file,PATHINFO_EXTENSION));

                  if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"|| $imageFileType == "gif" ||  $imageFileType == "bmp" ) {

          echo" <img src= '$friend->file' style='margin: 5px; margin-left: 35px; height: 230px; max-width: 300px; width: 100%;' >"; }
        else if ($imageFileType == "pdf"){
          
          echo "<input type='submit' value= '$friend->file' name='$friend->noticeID'>";}
              
                   else if ($imageFileType == "mp4")  {
            echo "<video src='$friend->file'style='margin: 5px; margin-left: 35px; height: 230px; max-width: 300px; width: 100%;' controls>
                             <code>video</code>
                               </video>";
           } 
                  else if ($imageFileType == "txt"){
          echo "<input type='submit' value= '$friend->file' name='txt$friend->noticeID'>";
         
           } 
           else if ($imageFileType == "mp3"){
                       echo "<audio src='$friend->file' controls>
                                    </audio>"; 
           }      
                     echo"
          <hr ";
            if($_SESSION['mode'] == 'night'){
              echo "style='border-top-color: white;'";
            }
            else {echo "
            style='border-top-color: black;'";}echo " >

                      
                </div>
       </div>
       </form>";
                                  }
                                }
                               
                               foreach ($objitems as $friend ) {
                              
                               	if($friend->noticeID == $_SESSION['history']){
			echo "<form method = 'post'> 
			<div class='col-lg-4 col-md-6 col-sm-6 col-xs-12'>

					<div class='container' 
					style='	
					    width: 400px;
						height: 500px;
						margin: 10px;
						margin-left: 40px;
						margin-bottom: 40px;
						";
            if($_SESSION['mode'] == 'night'){
              echo "background-color: #4419D5;  border:1px solid #4419D5;";
            }
            else {echo "
            background-color: #ffffb3;
            border:1px solid black;";}echo "
            border-radius: 20px 20px;'>
<h1";   if($_SESSION['mode'] == 'night'){
              echo " style='color:white;'";
            } 

            echo "> $friend->noticeTitle</h1>
            <h4";   if($_SESSION['mode'] == 'night'){
              echo " style='color:white;'";
            } 

            echo ">$friend->text</h4>
                  <p ";   if($_SESSION['mode'] == 'night'){
              echo " style='color:white;'";
            } 

            echo ">$friend->date</p>
				    <hr ";
            if($_SESSION['mode'] == 'night'){
              echo "style='border-top-color: white;'";
            }
            else {echo "
            style='border-top-color: black;'";}echo " >";
				    	

										   $imageFileType = strtolower(pathinfo($friend->file,PATHINFO_EXTENSION));

                  if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"|| $imageFileType == "gif" ||  $imageFileType == "bmp" ) {

					echo"	<img src= '$friend->file' style='margin: 5px; margin-left: 35px; height: 230px; max-width: 300px; width: 100%;' >"; }
				else if ($imageFileType == "pdf"){
					
					echo "<input type='submit' value= '$friend->file' name='$friend->noticeID'>";}
					  	
           				 else if ($imageFileType == "mp4")	{
					 	echo "<video src='$friend->file'style='margin: 5px; margin-left: 35px; height: 230px; max-width: 300px; width: 100%;' controls>
                             <code>video</code>
                               </video>";
					 }	
					 else if ($imageFileType == "mp3"){
		                   echo "<audio src='$friend->file' controls>
	                                  </audio>"; 
					 }			
				             echo"
						<hr ";
            if($_SESSION['mode'] == 'night'){
              echo "style='border-top-color: white;'";
            }
            else {echo "
            style='border-top-color: black;'";}echo " >
		          	</div>
			 </div>
			 </form>";
            	}
            }   
			?>



			<!-- footer -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 end" >
				<p class="text-center"><?php 
				   if($_SESSION["lang"] == 'Arabic'){
                    	echo "شكراً لزيارتك";
                    	                    
                    }else
                         echo "Thank you for your visit ";
			    ?></p>
			</div>
				</center>
	</body>
</html>	