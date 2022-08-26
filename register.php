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
			        <li><a href="index.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "الصفحة الرئيسية";
                    	                    
                    }else
                         echo "Home";
			    ?></a></li>
			        <li><a href="register.php" style="background-color: #565655;"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "إنشاء حساب";
                    	                    
                    }else
                         echo "Register";
			    ?>
			        </a></li>
			        <li><a href="login.php">
			        <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "تسجيل  دخول";
                    	                    
                    }else
                         echo "Login";
			    ?>
			</a></li>
			        <!-- <li><a href="addnote.html">Add note</a></li> -->
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
  
}?></form>
			        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span>
			        <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "الحساب";
                    	                    
                    }else
                         echo "account";
			    ?></a></li>
			       <!--  <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
			      </ul>
			    </div>
			  </div>
			</nav>
<?php
   require_once('pro1.php');
 $jsonitem = file_get_contents("data.json");
 $objitems = json_decode($jsonitem);
 $findname = function($name) use ($objitems){
	foreach ($objitems as $friend ) {
		if($friend->userName == $name)
				return true;
		}
		return false;
	
};

 $findemail = function($name) use ($objitems){
	foreach ($objitems as $friend ) {
		if($friend->email == $name)
				return true;
		}
		return false;
	
};

 if(isset($_POST['admin'])) { 
 	if($_POST['pass']!=null&&$_POST['uname']!=null&&$_POST['email']!=null){
 		if($findname($_POST['uname'])==false){
           if($findemail($_POST['email'])==false){
  if($_POST['pass']=='123456'){
  	    $myuser = new user();
     $myuser->userName = $_POST['uname'];
     $myuser->password = $_POST['pass'];
     $myuser->mobile   = $_POST['pnum'];
     $myuser->email    = $_POST['email'];
    	 	$myuser->userType = 'admin';
 	        $myuser->addnewUser();
   }
    else {echo "<div class='container-fluid' style='color:blue; font-size:28px;'>";
    if($_SESSION["lang"] == 'Arabic'){
                    	echo "عذراً , انت لست مسؤول , حاول مجدداً";
                    	                    
                    }else
                         echo "Sorry |you cannot be ADMIN , try again";
    echo"</div>";
            }}else
            { echo "<div class='container-fluid' style='color:blue; font-size:28px;'>";
             if($_SESSION["lang"] == 'Arabic'){
                    	echo "عذراً ,هذا البريد الالكتروني  ملك لحساب  آخر , قم بتغييره";
                    	                    
                    }else
                         echo "Sorry |this email is on Another account , CHANGE IT";
            
            echo"</div>";
        }}else{ echo "<div class='container-fluid' style='color:blue; font-size:28px;'>";
         if($_SESSION["lang"] == 'Arabic'){
                    	echo "عذراً , اسم المستخدم  ملك لمستخدم آخر , قم بتغييره";
                    	                    
                   }else
                       echo "  Sorry |this userName is belong to anthor user ,change it";
      
        echo"</div>";
   } }else {echo "<div class='container-fluid' style='color:blue; font-size:28px;'>";
     if($_SESSION["lang"] == 'Arabic'){
                    	echo "عذراً , جميع الحقول مطلوبة (باستثناء رقم الهاتف)";
                    	                    
                   }else
                         echo "Sorry |All fields (except mobile phone) are required ";
    
    echo"</div>";
}}
 elseif(isset($_POST['user'])) { 
 	if($_POST['pass']!=null&&$_POST['uname']!=null&&$_POST['email']!=null){
 		if($findname($_POST['uname'])==false){
 			if($findemail($_POST['email'])==false){
 	  	    $myuser = new user();
     $myuser->userName = $_POST['uname'];
     $myuser->password = $_POST['pass'];
     $myuser->mobile   = $_POST['pnum'];
     $myuser->email    = $_POST['email'];
    	 	$myuser->userType = 'user';
 	        $myuser->addnewUser();
 	         }else{ echo "<div class='container-fluid' style='color:blue; font-size:28px;'>";
 	          if($_SESSION["lang"] == 'Arabic'){
                    	echo "عذراً ,هذا البريد الالكتروني  ملك لحساب  آخر , قم بتغييره";
                    	                    
                    }else
                         echo "Sorry |this email is on Another account , CHANGE IT";
            
 	         
 	         echo"</div>";
 	    }}
 	    else {echo "<div class='container-fluid' style='color:blue; font-size:28px;'>";
 	    if($_SESSION["lang"] == 'Arabic'){
                    	echo "عذراً , اسم المستخدم  ملك لمستخدم آخر , قم بتغييره";
                    	                    
                    }else
                         echo "  Sorry |this userName is belong to anthor user ,change it";
 	    echo"</div>";
 	}}else {echo "<div class='container-fluid' style='color:blue; font-size:28px;'>";
 	  if($_SESSION["lang"] == 'Arabic'){
                    	echo "عذراً , جميع الحقول مطلوبة (باستثناء رقم الهاتف)";
                    	                    
                    }else
                         echo "Sorry |All fields (except mobile phone) are required ";
 	echo"</div>";
}}
?>


			<!-- Register -->
			<div class="row center-block register"<?php if($_SESSION['mode']=='night')echo "style='background-color:#2F00D7;border-color:#2F00D7;'"; ?>>
				<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<img src="images/133726170-text-sign-showing-join-today-business-photo-showcasing-to-become-a-new-group-member-or-sign-up-for-o-min.jpg "class="img-responsive">
				</div>
				<form  class="col-lg-6 col-md-6 col-sm-6 col-xs-6 personalinfo" name="form1" method="post">
				<!-- name -->
				<div class="control-label text-center" <?php if($_SESSION['mode']=='night')echo "style='color:white;'"; ?>>
				<?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "اسم المستخدم";
                    	                    
                    }else
                         echo "User name";
			    ?></div>
				<div class="center-block">

				<input type="text" id="uname" name="uname" class="form-control text-center" <?php if($_SESSION['mode']=='night')echo "style='background-color:#DCD6F2;'"; ?>
				<?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo " placeholder='اسم المستخدم الخاص بك'";
                    	                    
                    }else
                         echo "placeholder='Type your Username'";
			    ?> >
			    </div>
				 <!-- Phone number -->
				    <div class="control-label text-center" <?php if($_SESSION['mode']=='night')echo "style='color:white;'"; ?>>
				    <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "رق م الهاتف النقال";
                    	                    
                    }else
                         echo "mobile phone";
			    ?></div>
				    <div class="center-block">
				       <input type="number" id="pnum" name="pnum" class="form-control text-center" <?php if($_SESSION['mode']=='night')echo "style='background-color:#DCD6F2;'"; ?>
				       <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "placeholder='/رقم هاتفك   /ليس ضروري'";
                    	                    
                    }else
                         echo "placeholder='Type your Phone number(not necessary)'";
			    ?>>
				    </div>
				 <!-- Email -->
				    <div class="control-label text-center"<?php if($_SESSION['mode']=='night')echo "style='color:white;'"; ?>>
				    <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "البريد الالكتروني";
                    	                    
                    }else
                         echo "Email";
			    ?></div>
				    <div class="center-block">
				    
				     <input type="text" id="email" name="email" class="form-control text-center" <?php if($_SESSION['mode']=='night')echo "style='background-color:#DCD6F2;'"; ?>
				     <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "placeholder='بريدك الالكتروني'";
                    	                    
                    }else
                         echo "placeholder='Type your email'";
			    ?>>
				    </div>
				  <!-- password -->
				    <div class="control-label text-center"<?php if($_SESSION['mode']=='night')echo "style='color:white;'"; ?>>
				    <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "كلمة المرور";
                    	                    
                    }else
                         echo "Password";
			    ?></div>
				    <div class="center-block">
				      <input type="password" id="pass" name="pass" class="form-control text-center" <?php if($_SESSION['mode']=='night')echo "style='background-color:#DCD6F2;'"; ?>
				      <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "placeholder='كلمة المرور خاصتك'";
                    	                    
                    }else
                         echo "placeholder='Type your  password'";
			    ?>>
				      
				    </div>
				  <!-- Gender -->
				    <div class="control-label text-center"<?php if($_SESSION['mode']=='night')echo "style='color:white;'"; ?>>
				    <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "الجنس";
                    	                    
                    }else
                         echo "Gender";
			    ?></div>
				    <div class="col-sm-12 box">
				      <select class="form-control" <?php if($_SESSION['mode']=='night')echo "style='background-color:#DCD6F2;'"; ?>>
				      	<option>
				      	<?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "ذكر";
                    	                    
                    }else
                         echo "Male";
			    ?></option>
				      	<option><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "أنثى";
                    	                    
                    }else
                         echo "Female";
			    ?></option>
				      </select><br>
				    </div>
				  <!-- sign up -->
				    <div class="col-sm-offset-2 col-sm-8 alert1">
				      		     <p style="text-align: center;">
              <input name="admin" type="submit" id="submit" 
              <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "value='إنشاءء كمسؤول'";
                    	                    
                    }else
                         echo "value='sign up admin'";
			    ?>>
				    </div>
				    <div class="col-sm-offset-2 col-sm-8 alert1">
				      		     <p style="text-align: center;">
              <input name="user" type="submit" id="submit" 
              <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "value='إنشاء كمستخدم'";
                    	                    
                    }else
                         echo "value='sign up user'";
			    ?>>
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