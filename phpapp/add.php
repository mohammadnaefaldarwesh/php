<?php

include('config/db_connect.php');

$email = $title = $information = '';
$errors =array('email'=>'','title'=>'','information'=>'');

if(isset($_POST['submit'])){
  //  echo $_GET['email'];
  //  echo $_GET['title'];
  //  echo $_GET['information'];
  $email = htmlspecialchars($_POST['email']);
  $title = htmlspecialchars($_POST['title']);
  $information = htmlspecialchars($_POST['information']);
  echo $title;
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email']= 'Email must be a valid email address';
  }

  if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
    $errors['title']= 'Title must be letters and spaces only';
  }

  if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$information)){
    $errors['information']= 'Information must be comma separated list';
  }

  if (array_filter($errors)){

  }else{
    $email = mysqli_real_escape_string($connect,$_POST['email']);
    $title = mysqli_real_escape_string($connect,$_POST['title']);
    $information = mysqli_real_escape_string($connect,$_POST['information']);
    
    // create sql
    $sql = "INSERT INTO cards(email,title,information) VALUES('$email','$title', '$information')";

    // save to db and check
    if(mysqli_query($connect,$sql)){
      header('Location: index.php');
    }else{
      echo 'query error: ' . mysqli_error($connect);
    }
   
  }
}


?>



<!DOCTYPE html>
<html lang="en">
  <?php include('templates/header.php');?>

  <section class="container grey-text"> 
    <h4>Add a card</h4>
    <form class="white" action="add.php" method="POST">
      <label>Your Email</label>
      <input type="email" name="email" required value="<?php echo htmlspecialchars($email); ?>" ></input>
      <div class='red-text'><?php echo $errors['email']; ?></div>
      <label>Card Title</label>
      <input type="text" name="title" required value="<?php echo htmlspecialchars($title); ?>" ></input>
      <div class='red-text'><?php echo $errors['title']; ?></div>
      <label>Information (comma separated):</label>
      <input type="text" name="information" required value="<?php echo htmlspecialchars($information); ?>" ></input>
      <div class='red-text'><?php echo $errors['information']; ?></div>
      <div class=center>
      <input type="submit" name="submit" value="submit" class="btn brand z=depth-0">
      </div>
    </form>

  </section>

  <?php include('templates/footer.php');?>
</html>