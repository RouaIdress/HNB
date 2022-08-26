<?php
session_start();
require_once('requestClass.php');
	 $jsonite = file_get_contents("groupName.json");
      $objites = json_decode($jsonite);
      foreach ($objites as $friend ) {
      	  

  $H = $friend->groupName;
                 if(isset($_POST[$H])){
             $a = new request();
             $a->userName =  $_SESSION['name'];
             $a->admin = $friend->groupAdmin;
             $a->groupName = $H;
             $a->newRequest ();

}
}
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

	<body <?php  if($_SESSION['mode']=='night')echo "class='npage'";else echo "class='page'";?> >
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
			    	 <li><a href="accountuser.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "الصفحة الرئيسية";
                    	                    
                    }else
                         echo "Home";
			    ?></a></li>
			        <li><a href="requestgroups.php" style="background-color: #565655;"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "انضمام";
                    	                    
                    }else
                         echo "Join";
			    ?></a></li>
			         <li><a href="generalads.php"><?php 
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
			        <li><a href=""><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["name"]; ?></a></li>
			      </ul>
			    </div>
			  </div>
			</nav><br>
			<!-- title -->
			<div class="title text-center" <?php if($_SESSION['mode']=='night')echo "style=' font-size: 50px; color:white;'";else echo "style=' font-size: 50px;'";?>><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "المجموعات";
                    	                    
                    }else
                         echo "Categories";
			    ?></div>
			
			<?php 
			 $jsonite = file_get_contents("group.json");
             $objites = json_decode($jsonite);
              $findmember = function($group) use ($objites) {
              foreach ($objites as $fri) {
                if ($fri->memberName == $_SESSION["name"]&&$fri->groupName == $group ){
        	         return true;
                 } 
               }    return false;
             };

             			 $jsonit = file_get_contents("request.json");
             $objits = json_decode($jsonit);
              $findreq = function($group) use ($objits) {
              foreach ($objits as $fri) {
                if ($fri->userName == $_SESSION["name"]&&$fri->groupName == $group ){
        	         return true;
                 } 
               }    return false;
             };
					 $jsonitem = file_get_contents("groupName.json");
                               $objitems = json_decode($jsonitem);
                               foreach ($objitems as $friend ) {
                               	if($findmember($friend->groupName) == false &&$findreq($friend->groupName) == false  ){
                                   	if($friend->privacy == 'private'){
		                        
			echo "	<form method = 'post'> 
			<div class='col-lg-2 col-md-3 col-sm-6 col-xs-12'> 
			<h1 class='container-fluid text-center' 
                               	}
		 style=' ";
            if($_SESSION['mode'] == 'night'){
              echo "background-color: #4419D5;  border:1px solid #4419D5;color:white;";
            }
            else {echo "
            background-color: #ffffb3;
            border:1px solid black;";
            }echo "
            border-radius: 20px 20px; 
            height: 200px; 
            padding: 20px;'>".$friend->groupName."
                    <hr ";
            if($_SESSION['mode'] == 'night'){
              echo "style='border-top-color: white;'";
            }
            else {echo "
            style='border-top-color: black;'";}echo ">
     			<div class='row' style='height: 10px; color: #ff6666; font-size: 22px;margin-top: 30px;margin-right: px;'>
				<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'> 
                      <p style='text-align: center;'>
	              <input name='$friend->groupName' type='submit'"; 
	              if($_SESSION["lang"] == 'Arabic'){
                    	echo "value ='انضمام'";
                    	                    
                    }else
                         echo "value ='join'";
	              echo" style='margin-left:50px; width:100px; height: 50px;background-color:#FFE4C4;'>
	          </div>
          
           

              </div>

		</h1> 

			</div>
			</form>";
		}

	           }
	       }

			?>

			
			<!-- footer -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 end" style="background-color: blue">
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