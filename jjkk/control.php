
<?php
//$dtls=file_get_contents('demo.json');
//$dtlsOK=json_encode($dtls);

$nameError="";
$passError="";
$genderError="";


$DOBError = "";
$emailError ="";
$usernameError="";
$mobileError="";
$myjsondata="";
$hasError=false;


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


if(isset($_REQUEST["submit"]))
{
    if(empty($_REQUEST["name"]))
    {
        $nameError= "Name is Required";
        $hasError=true;
    }

    else 
    {
        $nameError= "Your Name is: ".$_REQUEST["name"];
    $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameError = "Only letters and white space allowed";
        }
    }

    
 

   

    if(empty($_REQUEST["email"]))
    {
        $emailError= "email is Required";
        $hasError=true;
    }
    else 
    {
        $pattern = "^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$^";
        $emailError= "Your email is: ".$_REQUEST["email"];
    $email = test_input($_POST["email"]);
        // check if name only contains letters and whitespace
        if (!preg_match($pattern,$email)) {
            $emailError = "Invalid email format";
          }
    }


    if(empty($_REQUEST["mobile"]))
    {
        $mobileError= "mobile is Required";
        $hasError=true;
    }
    else 
    {
       
        $mobileError= "Your mobile is: ".$_REQUEST["mobile"];
    $mobile = test_input($_POST["mobile"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[0-9]{11}$/",$mobile)) {
            $mobileError = "Invalid mobile format";
          }
    }


  



   



  if(empty($_REQUEST["dob"]))
  {
      $DOBError= "date of birth is Required";
      $hasError=true;
  }
  else 
  {
     
      $DOBError= "Your date of birth is: ".$_REQUEST["dob"];
  $dob = test_input($_POST["dob"]);
     
      
  }

  
    


    if(isset($_REQUEST["gender"]))
    {
        $genderError= "Your  are: ".$_REQUEST["gender"];
       
    }

    else 
    {
        $genderError= "gender is Required";
        $hasError=true;

    }
    

  


  
    
    if(empty($_REQUEST["username"]))
    {
        $usernameError= " Username is Required";
        $hasError=true;

    }

    else 
    {
        $usernameError= "your User name is: ".$_REQUEST["username"];
        $username = test_input($_POST["username"]);
        
        if (!preg_match("/^[a-z' ' ' ]*$/",$username)) {
          $usernameError = "Only letters and white space allowed";
        }
    }
    

    if(strlen($_REQUEST["password"])<8)
    {
        $passError= "Password must have 8 char";
        $hasError=true;

    }
    else
    {
        $passError= "";



    }
    if($hasError==false){

        $existingdata = file_get_contents('data.json');
        $existingdatainphp = json_decode($existingdata);
    
        $myarray=array
        (

            
        "Name"=> $_REQUEST["name"],
        "Gender"=> $_REQUEST["gender"],
        "email"=> $_REQUEST["email"],
        "mobile"=> $_REQUEST["mobile"],
        "dob"=> $_REQUEST["dob"],
        "username"=> $_REQUEST["username"],
       
        
    
    );


    $existingdatainphp[]=$myarray;
        $myjsondata = json_encode( $existingdatainphp, JSON_PRETTY_PRINT);
        file_put_contents("data.json", $myjsondata);
    
    }
}

?>