<?php
require("data.php");
class comments extends data
{
	public $commentID;
	public $user;
	public $commentDate;
  public $noticeID;
  public $text;

	function newComment (){
	    $myFile = "comment.json";
        $arr_data = array(); 
        $id = spl_object_hash($this);

	
		$this->commentID   = $id;
      
    try
   {
	   $formdata = array(
	   	  'commentID'   => $this->commentID,
	   	  'userName'    => $this->user,
	      'commentDate' => $this->commentDate,
        'noticeID'    => $this->noticeID,
        'text'        => $this->text
	   );

       $this->save($myFile,$formdata);
   }
    catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   
	}
	}

 
    function deleteComment() {
	    $jsonData = file_get_contents('comment.json');
        $posts = json_decode($jsonData,true);

      
        $posts = array_filter($posts, function($item) {
             return $item['commentID'] != $this->commentID;
        });
        $save = json_encode(array_values($posts), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('comment.json', $save);
    }

 



}
