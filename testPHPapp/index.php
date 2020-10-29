<?php 
include("include.php");//continue executing if error
require("include.php");// stop executing if error

//echo "hello hi";
$email = "mohammad@hotmail.com";
$number = 67;
// concatenate tow or more string:
//echo $email." ".$number;
//echo $email.$number;

//var inside a string...that work only with this ("")
//echo "hello that is a number $number";

// string length
echo strlen($email);

// replace
str_replace("m","y",$email);

// print an array
$array=["jmj",67,"jhkjhk"];
//add to array
$array[]="haha";
array_push($array,98);
// length of arry
count($array);
// add arrays to others
array_merge($array,[67,78]);
print_r($array);


// associative arrays (keys & value pairs)
$array2= ["me"=>"mohammad","age"=>34];
//echo $array2["me"];
$array2["nickname"]="mike";

// create const
define("NAME","mohammad");


$globalVar="globalVar";
// functions
// mike is the default if we did not pass a var when we call the function.
function sayHello($name ="MIKE" ){
  global $globalVar;
  echo "<br/>"."$globalVar";
  echo "<br/>"."good morning $name";
}
sayHello(NAME);

// pass var inside string with brackets:
echo "<br/>"."{$array2["me"]}";

// class
class User {

  private $email;
  private $name;

  public function __construct($name, $email){
    // $this->name = 'mario';
    // $this->email = 'mario@thenetninja.co.uk';
    $this->name = $name;
    $this->email = $email;
  }

  public function login(){
    // echo 'the user logged in';
    echo $this->name . ' logged in';
  }

  public function getName(){
    return $this->name;
  }

  public function setName($name){
    if(is_string($name) && strlen($name) > 1){
      $this->name = $name;
      return "name updated to $name";
    } else {
      return 'not a valid name';
    }
  }

}

$userTwo = new User('yoshi', 'yoshi@thenetninja.co.uk');

// $userTwo->name = 'mario';
// echo $userTwo->name;

// echo $userTwo->getName();
// echo $userTwo->setName('shaun');
// echo $userTwo->getName();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo "testPHP";?></title>
</head>
<body>
  <h1><?php echo "hello";?></h1>
  <div><?php echo "Email: ";?><?php echo $email;?></div>
  <div><?php echo $number;?></div>
  <div><?php echo NAME;?></div>
  
  <ul>
  <?php 
  // foreach loop
  foreach($array as $item){?>
    <li> <?php echo $item ;?></li>
    <?php }?>
  </ul>
</body>
</html>
