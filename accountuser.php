<?php session_start();
require('pro1.php');
if(isset($_POST['mode'])){
        
         
         $_SESSION["mode"] = 'night';
     
    }

if(isset($_POST['mod'])){
        
         
         $_SESSION["mode"] = 'day';
     
    }


 $jsonitem = file_get_contents("data.json");
 $objitems = json_decode($jsonitem);
  
   
            
        	if(isset($_POST['userd'])){
        		 foreach ($objitems as $friend) {
        if ($friend->userName == $_SESSION['name'] ) {
        	$a = new user();
        	$a->userID = $friend->userID;
        	$a->deleteUser();
        	header("Location:register.php");
          exit;

        	}
        }
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
			        <li><a href="accountuser.php" style="background-color: #565655;"><?php 
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
			    ?></a></li>

			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			      				      	<?php 
    echo "       <li> <button class='btn btn-info btn-lg' type='submit' name='userd'   style='background-color: #160FDE ;'>"; 
                    if($_SESSION["lang"] == 'Arabic'){
                        echo 'حذف الحساب';

                    }else
                         echo 'delete account';
                echo " 
                    
             
               </button>  </li>";
?>
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
			        <li><a href="accountuser.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["name"]; ?></a></li>
			      </ul>
			    </div>
			  </div>
			</nav><br>
<?php


if(isset($_POST['newMember'])){
	  header("Location:requestgroup.php");
        exit;
}
if(isset($_POST['newAd'])){
	  header("Location:accountuser2.php");
        exit;
}
?>


				<!-- account -->
				<div class="row center-block " >

				<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
				<div><img src="images/photo_4.jpg" style="margin: 30px; height: 650px; max-width: 650px; width: 100%  "></div>
				</div>

				<div class="container-fluid">
               <div  class="col-lg-5 col-md-5 col-sm-5 col-xs-5 ">
                  <?php  if($_SESSION['mode']=='night')echo "<div class='deta accountblack' style=' width: 100%; margin-top:130px; margin-right: 25px; '>";
                     else 
                        echo "<div class='deta accountwhite' style=' width: 100%; margin-top:130px; margin-right: 25px; '>";
                ?>  >


			    <div class="marg" style= "padding-right: 100px; padding-left: 100px; height: 400px; margin-top: 30px;">
		    	 <form class="container-fluid center-block"name="form2" method="post">
<br><br><br>
				  <div  class="row" style="width: 100%; margin-top: 20px; <?php if($_SESSION['mode']=='night')echo "'background-color:blue;'";?>">

			     	  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
			          <div ><img src="images/photo_8.jpg" style="height: 70px; width: 110px; margin-bottom: 20px "></div>
			      </div>
			      		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			     	<button type="submit" class="center-block" name="newAd" 
			     	style="background-color:#5bc0de;  margin-top: 12px;  font-size: 25px;"><a style="color: black;text-decoration: unset;" herf="accountuser2.php"> <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "إضافة إعلان جديد";
                    	                    
                    }else
                         echo "Add new ad ";
			    ?></button>
			     	  </div>
				</div>

			     <div  class="row" style="width: 100%">

			     	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
			          <div ><img src="images/photo_6.jpg" style="margin-top: 10px; height: 80px; width: 100px; margin-bottom: 10px "></div>
			      </div>
			      		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			     	<input type="submit" class="center-block" name="newMember" id="newMember"<?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "value='انضمام إلى مجموعة'";
                    	                    
                    }else
                         echo "value='group request' ";
			    ?> 
			     	style="height: 60px; background-color:#5bc0de;  margin-top: 18px; font-size: 25px; ">
                        


































			     	  </div>
				</div>

			
</div>

	     	  </div>
				</div>

				</form>
					</div>

			    </div>

                </div>
                </div>
</div>



</center>
</body>
</html>

