 <?php
class data
{
	public $myFile;
	public $formdata ;
	

	function save ($myFile , $formdata){
	    $this->myFile = $myFile;
        $this->formdata = $formdata;
            $arr_data = array(); 

	   //Get data from existing json file
	   $jsondata = file_get_contents($this->myFile);

	   // converts json data into array
	   $arr_data = json_decode($jsondata, true);

	   // Push user data to array
	   array_push($arr_data,$this->formdata);

       //Convert updated array to JSON
	   $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
	   
	   //write json data into data.json file
	   if(file_put_contents($this->myFile, $jsondata)) {
	        echo 'Data successfully saved';
	    }
	   else 
	        echo "error";
   }

	function  searchName($myFile,$name,$ind){

		$jsonitem = file_get_contents($myFile);
         $objitems = json_decode($jsonitem);
    $findname = function( $name,$ind ) use ($objitems) {
       foreach ($objitems as $friend) {
        if ($friend->$ind == $name ) return true;
     }
    return false;
    };
    if($findname($name,$ind) == true){
  	    return true;
    }return false;
    }
    function loginCheck($name,$pass){
    	 $jsonitem = file_get_contents("data.json");
         $objitems = json_decode($jsonitem);

    $findname = function( $name , $pass ) use ($objitems) {
    foreach ($objitems as $friend) {
        if ($friend->userName == $name && $friend->password == $pass ) return true;
     }

    return false;
};
  if($findname($name,$pass) === true){
  	    return true;
    }return false;
    }
    	function  checkType($myFile,$name){
    		$jsonitem = file_get_contents($myFile);
         $objitems = json_decode($jsonitem);

$findtype = function($name) use ($objitems){
	foreach ($objitems as $friend ) {
		if($friend->userName == $name){
			if($friend->type == 'admin')
				return true;
		}
		
	}
	return false;
};
  if($findtype($name) === true){
  	    return true;
    }return false;
    }
    function ID($myFile,$name,$ind){
    	  $jsonitem = file_get_contents($myFile);
 $objitems = json_decode($jsonitem);
  $findID = function( $name,$ind ) use ($objitems) {
    foreach ($objitems as $friend) {
        if ($friend->$ind == $name ) {
            
        	return $friend->userID;
        }
     }   
};
     return $findtype($name,$ind); 
    }
    }

	



