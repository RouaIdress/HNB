 <?php
require("group.php");
class request extends data
{
	public $groupName;
	public $admin;
	public $requestID ;
	public $userName;
  

	function newRequest (){
	    $myFile = "request.json";
        $arr_data = array(); 
        $id = spl_object_hash($this);

	
		$this->requestID   = $id;
      
    try
   {
	   $formdata = array(
	   	  'requestID' => $this->requestID,
	   	  'groupName' => $this->groupName,
	      'admin'     => $this->admin,
        'userName'  => $this->userName
	   );

       $this->save($myFile,$formdata);
   }
    catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   
	}
	}

 
    function deleteRequest() {
	    $jsonData = file_get_contents('request.json');
        $posts = json_decode($jsonData,true);

      
        $posts = array_filter($posts, function($item) {
             return $item['requestID'] != $this->requestID;
        });
        $save = json_encode(array_values($posts), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('request.json', $save);
    }

        function acceptRequest() {

          $jsonitem = file_get_contents("data.json");
          $objitems = json_decode($jsonitem);
          $findID = function( $name ) use ($objitems) {
              foreach ($objitems as $friend) {
                if ($friend->userName == $name ) {
            
                  return $friend->userID;
                }
              }   
            }; 
          $jsonit = file_get_contents("groupName.json");
          $objits = json_decode($jsonit);
        $findgID = function( $name ) use ($objits) {
          foreach ($objits as $friend) {
            if ($friend->groupName == $name ) {
            
            return $friend->groupID;
            }
          }   
        }; 
        $g = new group();
        $g->groupName = $this->groupName;
        $g->groupID = $findgID($this->groupName);
        $g->addnewMember($this->userName,$findID($this->userName));
         
         $this->deleteRequest();
    }



}
