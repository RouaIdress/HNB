 <?php
 require("data.php");
class user extends data
{
	public $userName;
	public $password;
	public $mobile;
	public $userType;
	public $userID;
	public $email;


	function addnewUser(){	
        $myFile = "data.json";
        $arr_data = array(); 
        $id = spl_object_hash($this);
        $this->userID = $id;

  try
  {
	   $formdata = array(
	   	  'userName' => $this->userName,
	   	  'password' => $this->password,
	      'mobile'   => $this->mobile,
	      'type'     => $this->userType,
	      'userID'   => $this->userID,
	      'email'    => $this->email
	   );
	   $this->save($myFile,$formdata);

   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   
	}
    }
    function deleteUser() {
	    $jsonData = file_get_contents('data.json');
        $posts = json_decode($jsonData,true);

      
        $posts = array_filter($posts, function($item) {
             return $item['userID'] != $this->userID;
        });
        $save = json_encode(array_values($posts), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('data.json', $save);
    }

        function deleteFromGroups() {
	    $jsonData = file_get_contents('group.json');
        $posts = json_decode($jsonData,true);

      
        $posts = array_filter($posts, function($item) {
             return $item['memberName'] != $this->userID;
        });
        $save = json_encode(array_values($posts), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('group.json', $save);
    }


}
