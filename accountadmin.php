<?php session_start();
if(isset($_POST['mode'])){
        
         
         $_SESSION["mode"] = 'night';
     
    }

if(isset($_POST['mod'])){
        
         
         $_SESSION["mode"] = 'day';
     
    }
     
 
?>
<!DOCTYPE html>
<html
<?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "dir ='rtl'";

                    }else
                         echo "dir ='ltr'";
?>
	>
<head>
			<?php 
                    if($_SESSION['lang'] == 'Arabic'){
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
			        <li><a href="accountadmin.php" style="background-color: #565655;max-width: 75px;height:  60px;"><?php 
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
echo "       <li> <button class='btn btn-info btn-lg' type='submit' name='mod'   style='background-color: #160FDE ;'><img src='images/sun.png' class='center-block img-responsive' style='max-width: 20px; max-height: 20px;'>"; 
                    if($_SESSION["lang"] == 'Arabic'){
                        echo 'وضع نهاري';

                    }else
                         echo 'day mode';
                echo " 
                    
             
               </button>  </li>";
  
}?>
			        <li><a href="accountadmin.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["name"]; ?></a></li>
			      </ul>
			    </div>
			  </div>
			</nav><br>
<?php

require_once('group.php');
require_once('data.php');

$d = new data();  
  if(isset($_POST['Add'])) { 
     
   if($d->searchName('groupName.json',$_POST['gro'],'groupName')===false){
   	 if($_POST['gro']!=null){
  	   $mygroup = new group();
     $mygroup->groupName = $_POST['gro'];
     $mygroup->groupAdmin = $_SESSION["name"];
       if(isset($_POST['Choise'])){
          if($_POST['Choise'] == "general"){
     	 $mygroup->privacy = 'general';
     }
     else if($_POST['Choise'] == "private"){
     	$mygroup->privacy = "private";
     }
    }
 	        $mygroup->newGroup();
 	    }else echo '<div class="container-fluid" style="color:blue;margin-right:215px;font-size:28px;">Sorry | you must write the name of the group</div>';
		 }else echo '<div class="container-fluid" style="color:blue;margin-right:215px;font-size:28px;">Sorry | this group is already exist</div>';
}
if(isset($_POST['newMember'])){
	  header("Location:accountadmin2.php");
        exit;
}
if(isset($_POST['newAd'])){
	  header("Location:accountadmin1.php");
        exit;
}
 
?>


				<!-- account -->
				<div class="row center-block "  >

				<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
				<div><img src="images/photo_4.jpg" style="margin: 30px; height: 650px; max-width: 650px; width: 100%  "></div>
				</div>

				<div class="container-fluid" >
              <div  class="col-lg-5 col-md-5 col-sm-5 col-xs-5 ">
                  <?php  if($_SESSION['mode']=='night')echo "<div class='deta accountblack' style=' width: 100%; margin-top:130px; margin-right: 25px; '>";
                     else 
                        echo "<div class='deta accountwhite' style=' width: 100%; margin-top:130px; margin-right: 25px; '>";
                ?>  >

			    <div class="marg" style= "padding-right: 100px; padding-left: 100px; height: 400px; margin-top: 30px;">
		    	 <form class="container-fluid center-block"name="form2" method="post"  >

				  <div  class="row" style="width: 100%; margin-top: 20px; <?php if($_SESSION['mode']=='night')echo "'background-color:blue;'";?>">

			     	  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
			          <div ><img src="images/photo_8.jpg" style="height: 70px; width: 110px; margin-bottom: 20px "></div>
			      </div>
			      		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			     	<button type="submit" class="center-block" name="newAd" 
			     	style="background-color:#5bc0de;border-color:  #5bc0de;  margin-top: 12px;  font-size: 25px;"><a style="color: black;text-decoration: unset;" herf="accountadmin2.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "اضافة اعلان جديد";
                    	                    
                    }else
                         echo "Add new ad";
			    ?></button>
			     	  </div>
				</div>

			     <div  class="row" style="width: 100%">

			     	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
			          <div ><img src="images/photo_6.jpg" style="margin-top: 10px; height: 80px; width: 100px; margin-bottom: 10px "></div>
			      </div>
			      		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			     	<input type="submit" class="center-block" name="newMember" id="newMember" <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "value='اضافة عضو جديد'";
                    	                    
                    }else
                         echo "value ='Add new member'";
			    ?>
			     	style="height: 60px; background-color:#5bc0de;border-color:  #5bc0de;  margin-top: 18px; font-size: 25px; ">
                        
			     	  </div>
				</div>

					

				  <div  class="row" style="width: 100%; margin-top: 30px;">

			   	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" >
			          <div ><img src="images/photo_7.jpg" style="margin-top: 10px; height: 80px; width: 100px; margin-bottom: 10px "></div>
			      </div>
			      	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
	<!-- 		     	<button type="submit" id="create" class="center-block" 
			     	style="margin-right: 50px; margin-top: 12px; color: #ff6666; font-size: 25px; ">Create new group </button> -->

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg " id="create" data-toggle="modal" data-target="#myModal" 
style="height: 60px; background-color:#5bc0de; color :black; margin-top: 15px; font-size: 25px; "><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "اضافة مجموعة جديدة";
                    	                    
                    }else
                         echo "Create new group";
			    ?></button>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="margin-top: 600px; margin-right: 150px;">

    <!-- Modal content-->
    <div class="modal-content " <?php if($_SESSION['mode']=='night')echo " style='background-color: #2F00D7 ;'";?>>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      	    <div class="" style=" color: #ff6666"> <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "اسم المجموعة  :";
                    	                    
                    }else
                         echo "Group Name :";
			    ?></div>
				     <input type="text" name = "gro" id="gro" class="form-control text-center" <?php if($_SESSION['mode']=='night')echo " style='background-color: #667DE8; color:#C8D0F5  ;'";?> <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "placeholder='ادخل اسم المجموعة'";
                    	                    
                    }else
                         echo "placeholder='enter group name'";
			    ?>>

			     <div class="" style="color: #ff6666; " > <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "اختر  :";
                    	                    
                    }else
                         echo "Chioce :";
			    ?><br></div>
				      <select id="Choiseselector" class="form-control" name="Choise"  <?php if($_SESSION['mode']=='night')echo " style='background-color: #667DE8; color:#C8D0F5  ;'";?>>
				       <option value="general"> <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "عام";
                    	                    
                    }else
                         echo "general";
			    ?></option>   
		                <option  value="private"> <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "خاص";
                    	                    
                    }else
                         echo "private";
			    ?></option>       		    
				      </select><br>
			  <br>
			    </div>
      </div>

      <div class="modal-footer" style="background-color: #1F2B61">
      	<p style="text-align: center;">
       
         <input name="Add" type="submit" id="submit" class="btn btn-primary" <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "value='أضافة'";
                    	                    
                    }else
                         echo "value ='Add'";
			    ?>>
      </div>
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

