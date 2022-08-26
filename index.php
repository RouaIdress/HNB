<?php
session_start();
$_SESSION['mode'] = 'day';
$_SESSION["lang"] = 'English';
if(isset($_POST['c'])){
	       if(isset($_POST['Choise'])){
          if($_POST['Choise'] == "ar"){
     	 $_SESSION["lang"] = 'Arabic';
     }
     else if($_POST['Choise'] == "eng"){
     	$_SESSION["lang"] = 'English';
     }
    }
}

     


?>

<!DOCTYPE html>
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
		<!-- include bootstrap -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/bootstrap.min.js"></script>
		<!-- include css -->
		<link rel="stylesheet" type="text/css" href="css/1.css">
	</head>
	<body  <?php  if($_SESSION['mode']=='night')echo "class='npage'";else echo "class='page'";?>>
		<form method = "post">
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
			        <li><a href="index.php" style="background-color: #565655;"><?php 
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
			      </ul>
			      <ul class="nav navbar-nav navbar-right">


		<li> <button type="button" class="btn btn-info btn-lg " id="create" 
			      	style="background-color: #160FDE    ;" data-toggle="modal" data-target="#myModal"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "اللغة";

                    }else
                         echo "Language";
			    ?></button>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      	   

			     <div class="" > <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "اختر لغة :";

                    }else
                         echo "Choice language:";
			    ?><br></div>
				      <select id="Choiseselector" class="form-control" name="Choise" >
				       <option value="ar"> <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "عربية";

                    }else
                         echo "ِArabic";
			    ?></option>   
		                <option  value="en"> <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "انكليزية";

                    }else
                         echo "English";
			    ?> </option>       		    
				      </select><br>
			  <br>
			    </div>
      </div>
           <div class="modal-footer" style="background-color: blue">
      	<p style="text-align: center;">
       
         <input name="c" type="submit" id="submit" class="btn btn-primary"<?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "value='اختر'";

                    }else
                         echo "value='Choice'";
			    ?> >
      </div>
</li> 

			        <li><a href="login.php"><span class="glyphicon glyphicon-user"></span><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "تسجيل الدخول";

                    }else
                         echo "Login";
			    ?></a></li>
			        
			      </ul>
			    </div>
			  </div>
			</nav>
			<!-- start slider -->
			<div id="container"> 
				  <div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner">
		      <div class="item active">
		        <img src="images/photo_1.jpg" >
		      </div>

		      <div class="item">
		        <img src="images/photo_2.jpg">
		      </div>
		    </div>
			    <!-- Left and right controls -->
			    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			      <span class="glyphicon glyphicon-chevron-left"></span>
			      <span class="sr-only">Previous</span>
			    </a>
			    <a class="right carousel-control" href="#myCarousel" data-slide="next">
			      <span class="glyphicon glyphicon-chevron-right"></span>
			      <span class="sr-only">Next</span>
			    </a>
			  </div>
			</div>
			<!--description -->
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 welcome" <?php  if($_SESSION['mode']=='night')echo "style='color:#00CFFF;'";?>><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "اهلا بك الى لوحة الاعلانات الخاصة بالمشفى ";

                    }else
                         echo "welcome to our hospital notice board (HNB)";
			    ?></div>
					<p class="col-lg-8 col-md-8 col-sm-8 col-xs-8 description" <?php  if($_SESSION['mode']=='night')echo "style='color:#DCD6F2;'";?>>
						<?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "هذا المكان يسمح للمستخدمين بترك أي نوع من الإعلانات بين الموظفين في المستشفى (الأطباء والممرضين وغيرهم)
يمكنهم الدخول في مجموعات معينة  فعندما ينشر شخص ما اعلانا للممرضين على سبيل المثال ، يمكنه إرساله فقط للمجموعة الخاصة بالممرضين 
من المفيد جدًا للعاملين في المستشفى الوصول إلى الإعلانات المهمة مثل الاجتماع المفاجئ ..ويمكنهم نشر الإعلانات الخاصة بهم وحفظها";

                    }else
                         echo "	this is a place where users can leave any types of notices like comments , notification ,pictures and files between Employees in the hospital (Doctors ,Nurses and others)
			they can enter in groups so when someone post a notice for nurses for example he can send it just for nurses group
			Its very helpful for empolyees in hospital to access for important notices like Sudden meeting..  post their own notices and save it
			the aim of this free online page notice board is make information dissemination much in a paperiess cummunity  as the world tends to interact with the online notice board.";
			    ?>
		
				</p>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 inimg">
					<?php 
					if($_SESSION['mode']=='day')
					
                    	echo "<img src='images/note-42883_960_720-min.png' class='center-block' >";
					?>
					
				</div>
			<!-- footer -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 end" >
				<p class="text-center"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "شكرا لزيارتك";

                    }else
                         echo "Thank you for your visit";
			    ?></p>
			</div>
	</body>
</html>