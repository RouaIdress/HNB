<?php session_start(); 
require_once('noticeClass.php');
require_once('comment.php');
	 $jsonite = file_get_contents("notice.json");
      $objites = json_decode($jsonite);
      foreach ($objites as $friend ) {
      	 
      	  $d = 'edit'.$friend->noticeID;
          $p = '/'.$friend->noticeID;
          $v = 'his'.$friend->editID;

       if(isset($_POST[$d])){
       	 $a = new notice();
       	 $b = new notice();
       	 $b->noticeID    = $friend->noticeID;
       	 $b->userName    = $friend->userName;
       	 $b->group       = $friend->group;
       	 $b->text        = $friend->text;
       	 $b->file        = $friend->file;
       	 $b->date        = $friend->date;
       	 $b->noticeTitle = $friend->noticeTitle;
       	 $b->edit        = $friend->edit;
       	 $b->editID      = $friend->editID;

       	 $a->edit        = $friend->edit+1;
       	 $a->noticeID    = $friend->noticeID;
       	 $a->noticeTitle = $_POST['newtitle'];
       	 $a->text        = $_POST['newtext'];
       	 $a->group       = $friend->group;
       	 $a->userName    = $friend->userName;
       	    $year = date("Y-m-d ");
            $day  = date("l ");
            date_default_timezone_set ("Asia/Damascus");
            $time = date("h:i a");
         $a->date        = $year . $day . $time;
       	 $a->file        = $friend->file;
         $a->updateNotice();
         $b->moveNotice();
       }
     
  
       if(isset($_POST[$p])){
     
        header("Content-type: application/pdf");
  
           @readfile($friend->file);
       }
          if(isset($_POST['txt'.$friend->noticeID])){
        $_SESSION['myfile']= $friend->file;
        header("Location:readtxt.php");
  
           exit;
       }

        if(isset($_POST[$v])){
           $_SESSION['history'] = $friend->noticeID;
        header("Location:history.php");
  
           exit;
       }
       
   }
     if(isset($_POST['point'])){
       if($_POST['com'] != null){
         $myComment = new comments();
       
         $myComment->user = $_SESSION['name'];
    
            $y = date("Y-m-d ");
            $da  = date("l ");
            date_default_timezone_set ("Asia/Damascus");
            $ti = date("h:i a");
         $myComment->commentDate  = $y . $da . $ti;
         $myComment->noticeID     = $_SESSION['postID'];
         $myComment->text         = $_POST['com'];
         $myComment->newComment();
       }
       }
 $jsonite = file_get_contents("comment.json");
      $objites = json_decode($jsonite);
      foreach ($objites as $friend ) {
        $del = 'd'.$friend->commentID;
        if(isset($_POST[$del])){
          $a = new comments();
          $a->commentID = $friend->commentID;
          $a->deleteComment();
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
	<body  <?php  if($_SESSION['mode']=='night')echo "class='npage'";else echo "class='page'";?>>
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
              <?php 
              if($_SESSION['login']=='admin'){
                echo "
			      	<li><a href='accountadmin.php'>";
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "الصفحة الرئيسية";
                    	                    
                    }else
                         echo "Home";
			    echo "</a></li>
			      	 <li><a href='myads.php' >"; 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "الاعلانات";
                    	                    
                    }else
                         echo "All Ads";
			    echo "</a></li>
			    	 
			        <li><a href='mygroups.php' >"; 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "المجموعات";
                    	                    
                    }else
                         echo "All Groups";
			    echo "</a></li>

          <li><a href='postcomment.php' style='background-color: #565655;'>"; 
                    if($_SESSION["lang"] == 'Arabic'){
                      echo "التعليقات";
                                          
                    }else
                         echo "Comments";
          echo "</a></li>
			        <li><a href='login.php'>"; 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "تسجيل الخروج";
                    	                    
                    }else
                         echo "Logout";
			    echo "</a></li>";
        }
        
                        if($_SESSION['login']=='user')
                        {
                          echo "
                          <li><a href='accountuser.php'>";
                           if($_SESSION['lang'] == 'Arabic'){
                                  echo "الصفحة الرئيسية";
                             }else
                                   echo "Home";
                             echo "</a></li>";
                      
                      echo "<li><a href='generalads.php'>";
                      if($_SESSION['lang'] == 'Arabic'){
                                  echo "الإعلانات العامة";
                             }else
                                   echo "General Ads";
                             echo "</a></li>";
                      echo"<li><a href='generalgroups.php'>";
                      if($_SESSION['lang'] == 'Arabic'){
                                  echo "المجموعات العامة";
                             }else
                                   echo "General Groups";
                             echo "</a></li>";
                      echo"<li><a href='usergroups.php'>";
                      if($_SESSION['lang'] == 'Arabic'){
                                  echo "مجموعاتي";
                             }else
                                   echo "My Groups";
                             echo "</a></li>
                        <li><a href='postcomment.php' style='background-color: #565655;'>"; 
                    if($_SESSION["lang"] == 'Arabic'){
                      echo "التعليقات";
                                          
                    }else
                         echo "Comments";
          echo "</a></li>";
                      echo"<li><a href='login.php'>";
                       if($_SESSION['lang'] == 'Arabic'){
                                  echo "تسجيل الخروج";
                             }else
                                   echo "Logout";
                             echo "</a></li>";
                         
                        }
        ?>
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
			        <li><a href=""><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["name"];?></a></li>
			      </ul>
			    </div>
			  </div>
			</nav><br>

			<!-- categories -->
			<div class="title text-center"<?php if($_SESSION['mode']=='night')echo "style=' font-size: 50px; color:white;'";else echo "style=' font-size: 50px;'";
?> ><?php 
                    if($_SESSION["lang"] == 'Arabic'){
                    	echo "التعليقات";
                    	                    
                    }else
                         echo "Comments";
			    ?></div><br>

			<?php 

					 $jsonitem = file_get_contents("notice.json");
                               $objitems = json_decode($jsonitem);
                              foreach ($objitems as $friend ) {
                                if($friend->noticeID == $_SESSION['postID']){
 
			echo " <form method = 'post'> 
			<div class='col-lg-4 col-md-6 col-sm-6 col-xs-12'>

					<div class='container' 
					style='	
					    width: 800px;
					
						margin: 10px;
						margin-left: 500px;
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

            echo ">$friend->date</p> <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 '> 
                <p style='text-align: center;'>
                        <input type='submit'";
                        if($_SESSION["lang"] == 'Arabic'){
                      echo "value= 'سجل'";

                    }else
                         echo "value= 'history'";  echo"name='his$friend->editID' style=' margin-left:300px; width: 50px; height: 20px; background-color:#FFE4C4;'>
                        </div>
				    	<hr ";
            if($_SESSION['mode'] == 'night'){
              echo "style='border-top-color: white;'>";
            }
            else {echo "
            style='border-top-color: black;'>";}
				    	   $imageFileType = strtolower(pathinfo($friend->file,PATHINFO_EXTENSION));

                  if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"|| $imageFileType == "gif" ||  $imageFileType == "bmp" ) {

					echo"	<img src= '$friend->file' style='margin: 5px; margin-left: 35px; height: 230px; max-width: 300px; width: 100%;' >"; }
				else if ($imageFileType == "pdf"){
					
					echo "<input type='submit' value= '$friend->file' name='/$friend->noticeID'>";
					 }	
                  else if ($imageFileType == "txt"){
          echo "<input type='submit' value= '$friend->file' name='txt$friend->noticeID'>";
         
           }
					 else if ($imageFileType == "mp4")	{
					 	echo "<video src='$friend->file'style='margin: 5px; margin-left: 35px; height: 230px; max-width: 300px; width: 100%;' controls>
                             <code>video</code>
                               </video>";
					 }	
					 else if ($imageFileType == "mp3"){
		                   echo "<audio src='$friend->file' controls>
	                                  </audio>"; 
					 }	
                      echo "
						<hr ";
            if($_SESSION['mode'] == 'night'){
              echo "style='border-top-color: white;'>";
            }
            else {echo "
            style='border-top-color: black;'>";}
            if($_SESSION['login'] == 'admin' ){
            echo "
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 '> 
	    				  <p style='text-align: center;'>
                        <input type='button' id='create' data-toggle='modal' data-target='#my$friend->noticeID'"; 
                           if($_SESSION["lang"] == 'Arabic'){
                      echo "value= 'تعديل'";
                                          
                    }else
                         echo "value='edit' "; 
                            echo"style=' margin-left:30px; width: 100px; height: 40px; background-color:#FFE4C4;'>
                         </div>
              

                          <div id='my$friend->noticeID' class='modal fade' role='dialog'>
                          <div class='modal-dialog' style='margin-top: 600px; margin-right: 150px;'>
       
                        
                         <div class='modal-content'"; if($_SESSION['mode']=='night')echo " style='background-color:  #4419D5 ;'";
                          echo ">
                          <div class='modal-header'>
                       <button type='button' class='close' data-dismiss='modal'>&times;</button>

                          <div class='control-label col-lg-6 col-md-10 col-sm-2' "; if($_SESSION['mode']=='night')echo " style='color:white ;'";
                          echo "> ";
                           if($_SESSION["lang"] == 'Arabic'){
                      echo "لعنوان";
                                          
                    }else
                         echo "Title: "; echo"</div>
              <input type='text' name = 'newtitle' class='form-control text-center' 
                     value='$friend->noticeTitle'";
                      if($_SESSION["lang"] == 'Arabic'){
                      echo "placeholder='العنوان' ";
                                          
                    }else
                         echo "placeholder='title'  ";
                         echo">
          
                     <div class='control-label col-lg-6 col-md-10 col-sm-2'"; if($_SESSION['mode']=='night')echo " style='color:white ;'";
                          echo ">";if($_SESSION["lang"] == 'Arabic'){
                      echo "التفاصيل";
                                          
                    }else
                         echo "Details: ";echo"</div>
               <input type='text' name = 'newtext' class='form-control text-center' value='$friend->text' ";
               if($_SESSION["lang"] == 'Arabic'){
                      echo "placeholder='التفاصيل'";
                                          
                    }else
                         echo "placeholder='Details'' "; echo">
          </div>

      </div>
     
      <div class='modal-footer'>
        <p style='text-align: center;'>
       
         <input name='edit$friend->noticeID' type='submit' class='btn btn-primary' style='background-color:#2F00D7;'"; if($_SESSION["lang"] == 'Arabic'){
                      echo "value= 'تعديل'";
                                          
                    }else
                         echo "value='Edit'' ";echo">
      </div>
			    </div>
			   </div>";
       } 
          if($friend->userName == $_SESSION['name']&& $_SESSION['login']== 'user'){
            echo "
                          <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 '> 
                <p style='text-align: center;'>
                        <input type='button' id='create' data-toggle='modal' data-target='#my$friend->noticeID'"; 
                           if($_SESSION["lang"] == 'Arabic'){
                      echo "value= 'تعديل'";
                                          
                    }else
                         echo "value='edit' "; 
                            echo"style=' margin-left:30px; width: 100px; height: 40px; background-color:#FFE4C4;'>
                         </div>
              

                          <div id='my$friend->noticeID' class='modal fade' role='dialog'>
                          <div class='modal-dialog' style='margin-top: 600px; margin-right: 150px;'>
       
                        
                         <div class='modal-content'"; if($_SESSION['mode']=='night')echo " style='background-color:  #4419D5 ;'";
                          echo ">
                          <div class='modal-header'>
                       <button type='button' class='close' data-dismiss='modal'>&times;</button>

                          <div class='control-label col-lg-6 col-md-10 col-sm-2' "; if($_SESSION['mode']=='night')echo " style='color:white ;'";
                          echo "> ";
                           if($_SESSION["lang"] == 'Arabic'){
                      echo "لعنوان";
                                          
                    }else
                         echo "Title: "; echo"</div>
              <input type='text' name = 'newtitle' class='form-control text-center' 
                     value='$friend->noticeTitle'";
                      if($_SESSION["lang"] == 'Arabic'){
                      echo "placeholder='العنوان' ";
                                          
                    }else
                         echo "placeholder='title'  ";
                         echo">
          
                     <div class='control-label col-lg-6 col-md-10 col-sm-2'"; if($_SESSION['mode']=='night')echo " style='color:white ;'";
                          echo ">";if($_SESSION["lang"] == 'Arabic'){
                      echo "التفاصيل";
                                          
                    }else
                         echo "Details: ";echo"</div>
               <input type='text' name = 'newtext' class='form-control text-center' value='$friend->text' ";
               if($_SESSION["lang"] == 'Arabic'){
                      echo "placeholder='التفاصيل'";
                                          
                    }else
                         echo "placeholder='Details'' "; echo">
          </div>

      </div>
     
      <div class='modal-footer'>
        <p style='text-align: center;'>
       
         <input name='edit$friend->noticeID' type='submit' class='btn btn-primary' style='background-color:#2F00D7;'"; if($_SESSION["lang"] == 'Arabic'){
                      echo "value= 'تعديل'";
                                          
                    }else
                         echo "value='Edit'' ";echo">
      </div>
          </div>
         </div>";
       }
     
       echo "

		          	</div>

      


          </div>
			 </div>
			 </form>";
			}
    }
         $jsonitem = file_get_contents("comment.json");
                               $objitems = json_decode($jsonitem);
                              
      echo " <form method = 'post'> 
      <div class='col-lg-12 col-md-6 col-sm-6 col-xs-12'>

          <div class='container' 
          style=' 
            width: 700px;
           
            margin-right : 600px;
            ";
            if($_SESSION['mode'] == 'night'){
              echo "
              background-color: #4419D5;  
              border:1px solid #4419D5;";
            }
            else 
            {
            echo "
            background-color: #ffffb3;
            border:1px solid black;";
            }echo "
            border-radius: 20px 20px;'>";
            foreach ($objitems as $friend ) {
                if($friend->noticeID == $_SESSION['postID']){
              echo "
      
            <h1";   
            if($_SESSION['mode'] == 'night'){
              echo " style='margin-right:600px; font-size: 30px;color:white;'";
            } else
              echo " style='margin-right:600px; font-size: 30px;color:black;'";

            echo "> $friend->userName</h1>
            <h4";   if($_SESSION['mode'] == 'night'){
              echo " style='margin-right:400px;color:white;'";
            } else
              echo "style='margin-right:400px;color:black;'";

            echo ">$friend->text</h4>
                  <p ";   if($_SESSION['mode'] == 'night'){
              echo " style='margin-left: 400px;color:white;'";
            } else
             echo "style='margin-left: 400px;color:black;'";

            echo ">$friend->commentDate</p>
            <hr ";
            if($_SESSION['mode'] == 'night'){
              echo "style='border-top-color: white;'>";
            }
            else {echo "
            style='border-top-color: black;'>";}
          
    if($friend->userName == $_SESSION['name']){
    echo "
           <p style='text-align: center;'>
                        <input type='submit'";
                        if($_SESSION["lang"] == 'Arabic'){
                      echo "value= 'حذف'";

                    }else
                         echo "value= 'delete'";  echo"name='d$friend->commentID' style=' margin-left:300px; width: 50px; height: 20px; background-color:#FFE4C4;'>
                         <hr ";
            if($_SESSION['mode'] == 'night'){
              echo "style='border-top-color: white;'>";
            }
            else {echo "
            style='border-top-color: black;'>";}}        }
    }
                         echo "
          </div> <br>

                <div class='center-block' >
        <input type='text' name='com' id='text'  class='form-control text-center' ";if($_SESSION['mode']=='night')echo "style='width: 400px; height : 50px ;margin-left : 30px; background-color:#BCB0E3; color:black;'";else echo "style='width: 400px; height : 50px ;margin-left : 30px;'";

                    if($_SESSION["lang"] == 'Arabic'){
                      echo "placeholder='اكتب تعليقا ...'";

                    }else
                      echo "placeholder='write a comment ...'";

          echo " ><br>
                <p style='text-align: center;'>
                        <input type='submit'";
                        if($_SESSION["lang"] == 'Arabic'){
                      echo "value= 'تعليق'";

                    }else
                         echo "value= 'Add'";  echo"name='point' style=' margin-left:300px; width: 50px; height: 20px; background-color:#FFE4C4;'>
                        </div>
       </div>
       </form>";

			?>


			<!-- footer -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 end">
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