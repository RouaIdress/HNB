<?php 

class server_host
{
    
    public function check_login_admin($username,$password,$array)
    {
        $is=new server_host();
      return  $is->search_about_value($username,$array,array('$')) and  $is->search_about_value($password,$array,array('$')); 
    } 
    public function search_about_value($search_value, $array, $id_path) 
    { 
  
      // Iterating over main array 
      foreach ($array as $key1 => $val1)
      { 
    
          $temp_path = $id_path; 
            
          // Adding current key to search path 
          array_push($temp_path, $key1); 
    
          // Check if this value is an array 
          // with atleast one element 
          if(is_array($val1) and count($val1)) 
          { 
    
              // Iterating over the nested array 
              foreach ($val1 as $key2 => $val2) 
              { 
                  if($val2 == $search_value) 
                  { 
                      // Adding current key to search path 
                      array_push($temp_path, $key2); 
                            
                      return true;
                  } 
              } 
          } 
            
          elseif($val1 == $search_value) { 
              return true;
          } 
      } 
        
      return false;
    } 
    public function controller()
    {
        $host="127.0.0.1";
        $port=20205;
        $arr_data = array(); // create empty array
        $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Could not create socket\n");
        $result=socket_bind($sock,$host,$port) or die("Could not bind to socket.\n");
        $result=socket_listen($sock,3) or die ("Could not set up socket listener\n");
        echo "Listening for connections";
        do
        {
        $accept=socket_accept($sock) or die ("Could not accept incoming connection");
        $msg=socket_read($accept,1024) or die("Could not read input \n");
        $msgarr = explode(', ', $msg);
        $my=new server_host();
        switch ($msgarr[0]) {
            case "register":
              $my->register($msgarr,$accept);
              break;
            case "login":
              $my->Login($msgarr,$accept);
              break;
            case "accountadmin1":
              $my->addnotice($msgarr,$accept);
            break;
            case "myads":
              $my->viewnotice($accept);
            break;
            default:
              echo "form not page";}
        }
        while(true);
        socket_close($accept,$sock);
    }
        
    
    public function Login($msgarr,$accept)
    {
        $Personal_File = "C:\Users\YouneS\Desktop\data.json";
        try{
            $my=new server_host();
         //Get data from existing json file
        $jsondata = file_get_contents($Personal_File);
        if(empty($jsondata))
        {echo"string is empty";}
        else
        {echo "not empty";}
        $arr_data = json_decode($jsondata, true);
        if(!empty($arr_data))
        {print_r($arr_data);
          print_r($msgarr);
            if( $my->check_login_admin($msgarr[1],$msgarr[2],$arr_data))
            {$reply="true";
            socket_write($accept,$reply,strlen($reply))or die ("Could not write output\n");}
            else
            {$reply="false";
              socket_write($accept,$reply,strlen($reply))or die ("Could not write output\n");}
       }
        else echo "array is empty";
     }
     
     catch (Exception $e) {
              echo 'Caught exception: ',  $e->getMessage(), "\n";
     }
   
        
    }
    public function register($msgarr,$accept)
    {
      $Personal_File = "C:\Users\USER\Desktop\data.json";
      try{
          $my=new server_host();
       //Get data from existing json file
      $jsondata = file_get_contents($Personal_File);
        if(empty($jsondata))
        {echo"string is empty";}
        else
        {echo "not empty";
           echo $jsondata;}
        $arr_data = json_decode($jsondata, true);
        if(!empty($arr_data))
        {
        // Push user data to array
        array_push($arr_data,$msgarr);
        
        //Convert updated array to JSON
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
        
        //write json data into data.json file
        if(file_put_contents($Personal_File, $jsondata)) {
             echo 'Data successfully saved';
             $reply="true";
          socket_write($accept,$reply,strlen($reply))or die ("Could not write output\n");
         }
        else 
            { echo "error";
              $reply="false";
              socket_write($accept,$reply,strlen($reply))or die ("Could not write output\n");
            }
       }
       else echo "array is empty";
       }
     catch (Exception $e) {
              echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
         
    }
    public function addnotice($msgarr,$accept)
    {
      $Personal_File = "C:\Users\Osama Alhmad\Desktop\myads.json";
      try{
          $my=new server_host();
       //Get data from existing json file
      $jsondata = file_get_contents($Personal_File);
        if(empty($jsondata))
        {echo"string is empty";}
        else
        {echo "not empty";
           echo $jsondata;}
        $arr_data = json_decode($jsondata, true);
        if(!empty($arr_data))
        {
        // Push user data to array
        array_push($arr_data,$msgarr);
        
        //Convert updated array to JSON
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
        
        //write json data into data.json file
        if(file_put_contents($Personal_File, $jsondata)) {
             echo 'Data successfully saved';
             $reply="true";
          socket_write($accept,$reply,strlen($reply))or die ("Could not write output\n");
         }
        else 
            { echo "error";
              $reply="false";
              socket_write($accept,$reply,strlen($reply))or die ("Could not write output\n");
            }
       }
       else echo "array is empty";
       }
     catch (Exception $e) {
              echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
    }
    public function viewnotice($accept)
    {
      $Personal_File = "C:\Users\USER\Desktop\myads.json";
      try{
          $my=new server_host();
       //Get data from existing json file
      $jsondata = file_get_contents($Personal_File);
        if(empty($jsondata))
        {echo"string is empty";}
        else
        {echo "not empty";
           echo $jsondata;}
        if(!empty($jsondata))
        {
          $reply=$jsondata;
          socket_write($accept,$reply,strlen($reply))or die ("Could not write output\n");
        }
       else
        {
          $reply="false";
          socket_write($accept,$reply,strlen($reply))or die ("Could not write output\n");
        } 
       }
     catch (Exception $e) {
              echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
    }
    

}
$serv_log=new server_host();
$serv_log->controller();
?>