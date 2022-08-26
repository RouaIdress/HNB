 <?php
require("data.php");
class group extends data
{
	public $groupName;
	public $groupAdmin;
	public $groupID ;
	public $member;
  public $privacy;

	function newGroup (){
	    $myFile = "groupName.json";
        $arr_data = array(); 
        $id = spl_object_hash($this);

	
		$this->groupID   = $id;
      
    try
   {
	   $formdata = array(
	   	  'groupID'    => $this->groupID,
	   	  'groupName'  => $this->groupName,
	      'groupAdmin'  => $this->groupAdmin,
        'privacy'  => $this->privacy
	   );

       $this->save($myFile,$formdata);
   }
    catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   
	}
	}

	function addnewMember($memberName , $id){	
        $myFile = "group.json";
        $arr_data = array(); // create empty array
  try
  {
	   $formdata = array(
	   	  'groupID'    => $this->groupID,
	   	  'groupName'  =>$this->groupName,
	      'memberName' => $memberName,
	      'memberID'   => $id
	   );
	  $this->save($myFile,$formdata);
   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   
	}
    }
    function searchMember($name){
     $this->searchName("group.json",$name,'memberName');
    }

    function deleteGroup() {
	    $jsonData = file_get_contents('groupName.json');
        $posts = json_decode($jsonData,true);

      
        $posts = array_filter($posts, function($item) {
             return $item['groupName'] != $this->groupName;
        });
        $save = json_encode(array_values($posts), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('groupName.json', $save);

              $jsonDat = file_get_contents('group.json');
        $post = json_decode($jsonDat,true);

      
        $post = array_filter($post, function($item) {
             return $item['groupName'] != $this->groupName;
        });
        $save = json_encode(array_values($post), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('group.json', $save);

           $jsonDa = file_get_contents('request.json');
        $pos = json_decode($jsonDa,true);

      
        $pos = array_filter($pos, function($item) {
             return $item['groupName'] != $this->groupName;
        });
        $save = json_encode(array_values($pos), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('request.json', $save);
    }
 function deleteReq() {
      $jsonData = file_get_contents('request.json');
        $posts = json_decode($jsonData,true);

      
        $posts = array_filter($posts, function($item) {
             return $item['user'] != $this->groupName;
        });
        $save = json_encode(array_values($posts), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('groupName.json', $save);
    }
    function delete_member($id) {
	    $jsonData = file_get_contents('group.json');
        $posts = json_decode($jsonData,true);

      
        $posts = array_filter($posts, function($item) use ($id) {
            return $item['memberID'] != $id;
        });
        $save = json_encode(array_values($posts), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('group.json', $save);
    }

}
