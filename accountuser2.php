	<?php
session_start();
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

<Script> 
		 $(function() {    
			    $('#Choiseselector').change(function(){
		        $('.choi').hide();
		        $('#' + $(this).val()).show();
			    });
			});
</Script>
</head>
<body class="page" <?php  if($_SESSION['mode']=='night')echo "style='background-color:#1F2B61;'";?>>
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
			        <li><a href="accountadmin1.php" style="background-color: #565655;"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "إضافة إعلان";
                    	                    
                    }else
                         echo "Add Ads";
			    ?></a></li>
			        <li><a href="generalads.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "الاعلانات العامة";
                    	                    
                    }else
                         echo "General Ads";
			    ?></a></li>
			        <li><a href="generalgroups.php"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "المجموعات  العامة";
                    	                    
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
			        <li><a href="accountuser.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["name"]; ?></a></li>

			        
			      </ul>
			    </div>
			  </div>
			</nav><br><br>
	<?php

 require_once('noticeClass.php');

 $myads = new notice();

  

 if(isset($_FILES['file'])) { 
    if ($_POST['title'] != null){
  	  if ($_POST['text'] != null ){
     $myads->noticeTitle = $_POST['title'];
     $myads->text        = $_POST['text'];
     $myads->userName    = $_SESSION["name"];
    if(isset($_POST['Choise'])){
          if($_POST['Choise'] == "adinpublic"){
     	 $myads->group = 'general';
     }
     else if($_POST['Choise'] == "adingroup"){
     	$myads->group = $_POST['group'];
     }
    }
     
     
     

     $year = date("Y-m-d ");
     $day = date("l ");
      date_default_timezone_set ("Asia/Damascus");
     $time = date("h:i a");
      $myads->date = $year . $day . $time;
 	        
    $m="files/".$_FILES['file']['name'];
    $myads->file = $m;
   move_uploaded_file($_FILES['file']['tmp_name'],$m);
$myads->addnewNotice();

}else echo '<div class="container-fluid" style="color:blue;margin-right:215px;font-size:28px;">Sorry |you must put  a details</div>';
}else echo '<div class="container-fluid" style="color:blue;margin-right:215px;font-size:28px;">Sorry |you must put a title  </div>';
}

?>

			<!-- account -->
				<div class="row center-block " >

				<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
				    <?php
                    if($_SESSION['mode']=='night'){
                     echo "<div><img src='images/b-1.jpg' style='margin-left: 200px; height: 660px; max-width: 500px; width: 100%'></div>
                </div> ";
                    }else
                      echo "<div><img src='images/photo.jpg' style='margin-left: 200px; height: 660px; max-width: 500px; width: 100%'></div>
                </div>";
                    ?>
                

              <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                
                <?php  if($_SESSION['mode']=='night')echo  "<div class='deta accountblack' style=' width: 100%; max-width: 500px; height: 660px; margin-right: 25px; '>";
                     else 
                        echo "<div class='deta accountwhite' style=' width: 100%; max-width: 500px; height: 660px; margin-right: 25px; '>";
                ?>
		
	     	<div class="container-fluid" style=" width: 250px;">

	     	<form name="form1" method="post" enctype="multipart/form-data"> 
	        	<!-- ads -->
				<div class="control-label text-center" style=" margin-right: 150px;"><h4 style="margin-top: 30px; color: #ff6666;"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo ": العنوان";
                    	                    
                    }else
                         echo "Ads title: ";
			    ?> </h4></div>
				    <div class="center-block"  >
                    <input type="text" name="title" id="title" class="form-control text-center" <?php  if($_SESSION['mode']=='night')echo "style='background-color:#1F2B61; color:#00FFF9'";
                    if($_SESSION["lang"] == 'Arabic'){
                        echo "placeholder='عنوان إعلانك'";

                    }else
                         echo "placeholder='Titel of your ads'";
                ?>> 
                </div><br>
                <!-- date -->
                <div class="control-label text-center" style=" margin-right: 150px;"><h4 style=" color: #ff6666;">
                <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                        echo ": التفاصيل";
                                            
                    }else
                         echo "Details :";
                ?> </h4></div>
                <div class="center-block" >
                <input type="text" name="text" id="text" class="form-control text-center" <?php  if($_SESSION['mode']=='night')echo "style='background-color:#1F2B61; color:#00FFF9'"; 
                    if($_SESSION["lang"] == 'Arabic'){
                        echo "placeholder='تفاصيل إعلانك '";

                    }else
                         echo "placeholder='Details of your ads'";
                ?> >
                </div><br>

                 <div class="" style="color: #ff6666; margin-right: 150px; font-size: 19px;" > <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                        echo ": النشر";
                                            
                    }else
                         echo "Chioce :";
			    ?><br></div>
				    <select id="Choiseselector" class="form-control" name="Choise" <?php  if($_SESSION['mode']=='night')echo "style='background-color:#1F2B61; color:#00FFF9; margin-right: 100px;' ";?> >
                       <option value="adinpublic"><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                        echo "في الإعلانات العامة ";
                                            
                    }else
                         echo "Ad in public";
			    ?></option>   
		                <option  value="adingroup"> <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "في المجموعات ";
                    	                    
                    }else
                         echo "Ad in group";
			    ?> </option>       		    
				      </select><br>
				    

			  <div class="choi" id="adingroup" style="display: none;" ><br>
                      <select class="form-control" name="group" <?php  if($_SESSION['mode']=='night')echo "style='background-color:#1F2B61; color:#00FFF9; margin-right: 100px;' ";?>>
				      <?php 
                           $jsonite = file_get_contents("group.json");
                           $objites = json_decode($jsonite);
                        $findm = function( $name ,$group) use ($objites) {
                            foreach ($objites as $frien) {
                              if ($frien->memberName == $name&&$frien->groupName == $group ) {
            
        	                    return true;
                              }
                            }
                             return false;   
                        }; 


				              $jsonitem = file_get_contents("groupName.json");
                               $objitems = json_decode($jsonitem);
                               foreach ($objitems as $friend ) {
                               	 if($findm($_SESSION["name"],$friend->groupName) ==true || $friend->privacy == 'general')
		                          echo "<option>".$friend->groupName."</option>";   
                               }
		                       
		                    ?>
				      </select><br>
				   </div>

				<!-- Modal -->
			   <div  id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog" style="width: 230px;height: 40px; margin-top: 310px; margin-right: 250px;">

			    </div>

			  </div>
			  <br>

        		<div style="margin-top: 50px; margin-right: 130px; color: #ff6666 ;font-size:18px; margin-bottom:20px; ">
 
                <?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo ": اختيار ملف  ";
                    	                    
                    }else
                         echo "Chosefile : ";
			    ?> <br> </div>

               <input type="file" name="file" value="">

              

			    <div class="marg"  style= "margin-top: 45px;"> 
			     <div  class="row" style="width: 100% ">

			     	  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
			          <div ><img src="images/photo_9.jpg" style=" height: 60px; width: 60px; margin-bottom: 10px "></div>
			          </div>
			    	
			         
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <p style="text-align: center;">
              <input type="submit" name="submit"<?php  if($_SESSION['mode']=='night')echo "style='background-color:#1F2B61; border-color:#1F2B61; font-size:20px; color:#00FFF9; width:150px; height:50px ; ' "; 
                    if($_SESSION["lang"] == 'Arabic'){
                        echo "value='تحميل الأن'";
                                            
                    }else
                         echo "value='Upload-now'";
                ?> id="submit"  style=" font-size:25px; margin-right: 50px; margin-top: 12px; color: #ff6666;">
			     	  </div>
			          </form >
				</div>
				</div>

                </div>
				</div>

</div>

</center>
</body>
</html>









