<?php session_start(); 
if(isset($_POST['mode'])){
        
         
         $_SESSION["mode"] = 'night';
     
    }

if(isset($_POST['mod'])){
        
         
         $_SESSION["mode"] = 'day';
     
    }
     
?>
<!DOCTYPE html >
<html <?php 
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
			<!-- include js -->
		<script src="js/main.js"></script>
		<!-- include bootstrap -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/bootstrap.min.js"></script>
		<!-- include css -->
		<link rel="stylesheet" type="text/css" href="css/1.css">
	</head>
	<body <?php  if($_SESSION['mode']=='night')echo "class='npage'";else echo "class='page'";?>>
   
		<!--start navbar -->
		<center>
		<div style="text-align: center;">
            <form class=" account" name="form2" method="post" style="margin-top: 0px; ">
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
			        <li><a href="index.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "الصفحة الرئيسية";
                    	                    
                    }else
                         echo "Home";
			    ?></a></li>
			        <li><a href="register.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "انشاء حساب";

                    }else
                         echo "Register";
			    ?></a></li>
			        <li><a href="login.php" style="background-color: #565655;"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "تسجيل الدخول";

                    }else
                         echo "Login";
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
			        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "الحساب";

                    }else
                         echo "account";
			    ?></a></li>
			      </ul>
			    </div>
			  </div>
			</nav>

<?php
require("data.php");
$d = new data();
 if(isset($_POST['admin'])) { 
 	$_SESSION["name"] = $_POST['username'];
    if($d->loginCheck($_POST['username'],$_POST['pass']) === true){
      	if($d->checkType("data.json",$_POST['username']) === true){
      		$_SESSION["login"] = 'admin';
        header("Location:accountadmin.php");
        exit;
        }else echo '<div class="container-fluid" style="color:blue; font-size:28px;">Sorry | you are not an admin</div>';
    }else echo '<div class="container-fluid" style="color:blue; font-size:28px;">Sorry | wrong username or password try again</div>';
##########################################################################################
}else if(isset($_POST['user'])){
	$_SESSION["name"] = $_POST['username'];
    if($d->loginCheck($_POST['username'],$_POST['pass']) === true){
    	$_SESSION["login"] ='user';
       header("Location:accountuser.php");
        exit;
    }else echo '<div class="container-fluid" style="color:blue; font-size:28px;">Sorry | wrong username or password try again</div>';
}else if(isset($_POST['Add'])){
	if($_POST['nk'] != null){
		$_SESSION["login"] ='guest';
	$_SESSION["nk"] = $_POST['nk'];
    $_SESSION['name'] = null;
header("Location:guestgeneralads.php");
        exit;
    }else echo '<div class="container-fluid" style="color:blue; font-size:28px;">Sorry you must enter a unique nackname</div>';
}
?>

			<!-- Login -->
			<div class="container login" <?php if($_SESSION['mode']=='night')echo "style='background-color:#2F00D7;border-color:#2F00D7;'"; ?>>
				<img src="images/user-min.png" class="center-block img-responsive" >
			
			
				<!-- Username -->
				<div class="control-label text-center " <?php if($_SESSION['mode']=='night')echo "style='color:white;'"; ?>><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "اسم المستخدم";

                    }else
                         echo "Username";
			    ?></div>
					<div class="center-block" >

					<input type="text" id="username" name="username" class="form-control text-center" <?php if($_SESSION['mode']=='night')echo "style='background-color:#DCD6F2;'"; ?> <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "placeholder='ادخل اسم المستخدم'";

                    }else
                         echo "placeholder='Type your Username'";
			    ?>>
			    </div>
				<!-- password -->
			    <div class="control-label text-center" <?php if($_SESSION['mode']=='night')echo "style='color:white;'"; ?>><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "كلمة السر";

                    }else
                         echo "Password";
			    ?></div>
			    	<div class="center-block">
			     	<input type="password" id="pass" name="pass" class="form-control text-center" <?php if($_SESSION['mode']=='night')echo "style='background-color:#DCD6F2;'"; ?><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "placeholder='ادخل كلمة السر'";

                    }else
                         echo "placeholder='Type your password'";
			    ?>><br>
			    </div>
			  
			 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		      <p style="text-align: center;">
              <input name="admin" type="submit" id="submit" <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo 'value="تسجيل الدخول كمسؤول "';

                    }else
                         echo 'value="Login admin"';
			    ?> >
				
				</div>
			 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">	  
              <p style="text-align: center;">
              <input name="user" type="submit" id="submit" <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo 'value="تسجيل الدخول كمستخدم"';

                    }else
                         echo 'value="Login user"';
			    ?>>
               </div>

           <!-- Trigger the modal with a button -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	  
              <p style="text-align: center;">
<input type="button" id="create" data-toggle="modal" data-target="#myModal" <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo 'value="تسجيل الدخول كضيف"';

                    }else
                         echo 'value="Login guest"';
			    ?>>
  </div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="margin-top: 600px; margin-right: 150px;">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      	    <div class="control-label col-lg-6 col-md-10 col-sm-2" > <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo 'لقبك';

                    }else
                         echo 'your nackname:';
			    ?></div>
				     <input type="text" name = "nk" id="nk" class="form-control text-center" <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "placeholder='ادخل لقبك'";

                    }else
                         echo "placeholder='enter your nackname'";
			    ?> >
			    </div>
      </div>
      <div class="modal-footer">
      	<p style="text-align: center;">
       
         <input name="Add" type="submit" id="submit" class="btn btn-primary" <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "value='اضافة'";

                    }else
                         echo "value='Add'";
			    ?>>
      </div>
			    </div>
			    </div>
			    </div>
			  
			    </form>
			 </div>
		
			<!-- footer -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 end" >
				<?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "شكرا لزيارتك";

                    }else
                         echo "Thank you for your visit";
			    ?>
			</div>
			</center>
	</body>
</html>