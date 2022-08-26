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
	<head><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "<title>لوحة اعلانات المشفى</title>";

                    }else
                         echo "<title>Hospital Notice Board</title>";
			    ?>
		<!-- include jQuery -->
		<script src="js/jquery-3.4.1.min.js"></script>
		<!-- include js -->
		<script src="js/main.js"></script>
		<!-- include bootstrap -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/bootstrap.min.js"></script>
		<!-- include css -->
		<link rel="stylesheet" type="text/css" href="css/1.css">
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
			        <li><a href="accountadmin.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "الصفحة الرئيسية";
                    	                    
                    }else
                         echo "Home";
			    ?></a></li>
			        <li><a href="myads.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "الإعلانات";
                    	                    
                    }else
                         echo "All Ads";
			    ?></a></li>
			        <li><a href=""style="background-color: #565655;"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "إضافة عضو";
                    	                    
                    }else
                         echo "Add Member";
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
echo "       <li> <button class='btn btn-info btn-lg' type='submit' name='mod'   style='background-color: #160FDE ;height:60px;'><img src='images/sun.png' class='center-block img-responsive' style='max-width: 20px; max-height: 20px;'>"; 
                    if($_SESSION["lang"] == 'Arabic'){
                        echo 'وضع نهاري';

                    }else
                         echo 'day mode';
                echo " 
                    
             
               </button>  </li>";
  
}?>
			      	<li><a href="adminreq.php"><span class=""></span><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "طلبات الانضمام ";
                    	                    
                    }else
                         echo "Group request";
			    ?></a></li>

			        <li><a href="accountadmin.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["name"]; ?></a></li>


			      </ul>
			    </div>
			  </div>
			</nav><br>
<?php

require_once('group.php');
  $jsonitem = file_get_contents("data.json");
 $objitems = json_decode($jsonitem);
  $findID = function( $name ) use ($objitems) {
    foreach ($objitems as $friend) {
        if ($friend->userName == $name ) {
            
        	return $friend->userID;
        }
     }   
}; 
  $jsonit = file_get_contents("groupName.json");
 $objits = json_decode($jsonit);
  $findgID = function( $name ) use ($objits) {
    foreach ($objits as $friend) {
        if ($friend->groupName == $name ) {
            
        	return $friend->groupID;
        }
     }   
}; 
 $jsonite = file_get_contents("group.json");
 $objites = json_decode($jsonite);
  $findname = function( $name ,$group) use ($objites) {
    foreach ($objites as $friend) {
        if ($friend->memberName == $name&& $friend->groupName ==$group ){
        	return true;
        } 
     }    return false;
}; 

  if(isset($_POST['Addmem'])) { 
   if($findname($_POST['mem'],$_POST['group'])===false){
   	 if($_POST['mem']!=null){
         $a = new group();
         $a->groupName = $_POST['group'];
         $a->groupID   = $findgID($_POST['group']);
         $a->addnewMember($_POST['mem'],$findID($_POST['mem']));
 	    }else echo "<div class='container-fluid' style='color:blue; font-size:28px;'>Sorry |you must write the name of member u want to add</div>";
		 }else echo "<div class='container-fluid' style='color:blue; font-size:28px;'>Sorry |this member is already exist</div>";
}
?>

			<!-- Register -->
			<div class="row center-block register"<?php if($_SESSION['mode']=='night')echo " style='background-color: #2F00D7;border-color: #2F00D7;'>";?>>
			<form class="personalinfo" method="post">
			<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<img src="images/Photo_6.jpg "class="img-responsive" style="height: 220px; width: 170px; margin-left: 98px; margin-top:75px;">
		

		 <br> <input type="submit" name="Addmem" id="Addmem" class="center-block" 	 <?php 
		 if($_SESSION['mode']=='night')
		 	echo " style='font-size: 22px; height: 60px; color: #ff6666; background-color: #667DE8;'";
		 else 
		 	echo "style='font-size: 22px; height: 60px; color: #ff6666;' ";
		 ?> <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "value='إضافة عضو جديد'";
                    	                    
                    }else
                         echo "value='Add new Member'";
			    ?>>


		  
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
				<!-- Name User -->
				    <div class="control-label col-lg-6 col-md-10 col-sm-2" style="font-size: 22px; margin-top: 50px; color: #ff6666"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo ": اسم المستخدم ";
                    	                    
                    }else
                         echo "User Name :";
			    ?> </div>
				   	   
				    <div class="col-sm-12 box"><br>
				      <select class="form-control" name="mem" <?php if($_SESSION['mode']=='night')echo " style='background-color: #667DE8;color:#C8D0F5  ;'>";?>>
				      <?php  $jsonitem = file_get_contents("data.json");
                               $objitems = json_decode($jsonitem);
                               foreach ($objitems as $friend ) {
		                          echo "<option>".$friend->userName."</option>";   
		                       }
		                    ?>
				      </select><br>
				    </div>

				    <div class="control-label col-lg-6 col-md-10 col-sm-2"style=" font-size: 22px;margin-top:60px;  color: #ff6666"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo ": اختر مجموعة";
                    	                    
                    }else
                         echo "Choise Group :";
			    ?> </div>
				    <div class="col-sm-12 box"><br>
				      <select class="form-control" name="group" <?php if($_SESSION['mode']=='night')echo " style='background-color: #667DE8; color:#C8D0F5  ;'>";?>>
				      <?php  $jsonitem = file_get_contents("groupName.json");
                               $objitems = json_decode($jsonitem);
                               foreach ($objitems as $friend ) {
                               	 if($friend->privacy == 'private')
		                          echo "<option>".$friend->groupName."</option>";   
		                       }
		                    ?>
				      </select><br>
				    </div>
				</div>

				   </form>
			</div>
			<!-- images as link -->
		<!-- 	<p class="text-center title">Or Continue with</p>
			<div class="icon">
			<a href="http://www.facebook.com/"><img src="images/facebook.png"></a>
			<a href="http://www.gmail.com/"><img class="gmail" src="images/gmail.jpg"></a>
			</div> -->
			<!-- footer -->
	<!-- 		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 end">
				<p class="text-center">Thank you for your visit</p>
			</div> -->
			</center>
	</body>
</html>