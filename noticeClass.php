 <?php
require("comment.php");
class notice extends data
{
	public $noticeTitle;
	public $text;
	public $file;
	public $date;
	public $userName;
	public $group;
	public $noticeID;
  public $edit;
  public $editID;

	function addnewNotice(){	
        $myFile = "notice.json";
        $arr_data = array(); 
        $id = spl_object_hash($this);
        $this->noticeID = $id;
        $this->edit = 0 ;
        $this->editID = $this->edit ."/".$this->noticeID;
  try
  {
	   $formdata = array(
	   	  'noticeID'    => $this->noticeID,
	   	  'userName'    => $this->userName,
	   	  'group'       => $this->group,
	      'text'        => $this->text,
	      'file'        => $this->file,
	      'date'        => $this->date,
	      'noticeTitle' => $this->noticeTitle,
        'edit'        => $this->edit,
        'editID'      => $this->editID
	      
	   );
	 $this->save($myFile,$formdata);

   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   
	}
    }

    function updateNotice(){  
        $myFile = "notice.json";
        $arr_data = array(); 
      $this->editID = $this->edit ."/".$this->noticeID;

  try
  {
     $formdata = array(
        'noticeID'    => $this->noticeID,
        'userName'    => $this->userName,
        'group'       => $this->group,
        'text'        => $this->text,
        'file'        => $this->file,
        'date'        => $this->date,
        'noticeTitle' => $this->noticeTitle,
        'edit'        => $this->edit,
        'editID'      => $this->editID
        
     );
   $this->save($myFile,$formdata);

   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   
  }
    }


    function deleteNotice() {
	    $jsonData = file_get_contents('notice.json');
        $posts = json_decode($jsonData,true);

      
        $posts = array_filter($posts, function($item) {
             return $item['editID'] != $this->editID;
        });
        $save = json_encode(array_values($posts), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('notice.json', $save);

          $jsonDat = file_get_contents('comment.json');
        $post = json_decode($jsonDat,true);

      
        $post = array_filter($post, function($item) {
             return $item['noticeID'] != $this->noticeID;
        });
        $save = json_encode(array_values($post), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('comment.json', $save);

                  $jsonDa = file_get_contents('oldnotice.json');
        $pos = json_decode($jsonDa,true);

      
        $pos = array_filter($pos, function($item) {
             return $item['noticeID'] != $this->noticeID;
        });
        $save = json_encode(array_values($pos), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('oldnotice.json', $save);
    }

      function moveNotice() {
         $myFile = "oldnotice.json";
        $arr_data = array(); 
         try
  {
     $formdata = array(
        'noticeID'    => $this->noticeID,
        'userName'    => $this->userName,
        'group'       => $this->group,
        'text'        => $this->text,
        'file'        => $this->file,
        'date'        => $this->date,
        'noticeTitle' => $this->noticeTitle,
        'edit'        => $this->edit,
        'editID'      => $this->editID
        
     );
   $this->save($myFile,$formdata);

   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   
  }

      $jsonData = file_get_contents('notice.json');
        $posts = json_decode($jsonData,true);

      
        $posts = array_filter($posts, function($item) {
             return $item['editID'] != $this->editID;
        });
        $save = json_encode(array_values($posts), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('notice.json', $save);
    }
    
}