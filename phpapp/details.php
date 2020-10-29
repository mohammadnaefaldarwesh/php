<?php

include('config/db_connect.php');

if(isset($_POST['delete'])){

  $id_to_delete= mysqli_real_escape_string($connect,$_POST['id_to_delete']);

  $sql = "DELETE FROM cards WHERE id = $id_to_delete";

  if(mysqli_query($connect,$sql)){

    header('Location: index.php');
  }{
    // failure
    echo 'query error: ' . mysqli_error($connect);
  }
}

// check GET request id param
if(isset($_GET['id'])){

  $id = mysqli_real_escape_string($connect,$_GET['id']);

  // make sql
  $sql = "SELECT * FROM cards WHERE id = $id";

  // get the query result 
  $result = mysqli_query($connect,$sql);

  // fetch the resulting rows as an array
  $card = mysqli_fetch_assoc($result);

  // free the memory
  mysqli_free_result($result);

  mysqli_close($connect);

}


?>

<!DOCTYPE html>
<html lang="en">

  <?php include('templates/header.php');?>

  <div class="center container gray-text">
    <?php if($card): ?>
      <h4> <?php echo htmlspecialchars($card['title']); ?> </h4>
      <p>Created by:  <?php echo htmlspecialchars($card['email']) ?> </p>
      <p>  <?php echo htmlspecialchars($card['created_at']) ?> </p>
      <ul>
            <?php foreach( explode(",",$card["information"])as $info): ?>
              <li> <?php echo htmlspecialchars($info) ?> </li>
            <?php endforeach; ?>
      </ul>

      <!-- delete form --> 
      <form action="details.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $card['id']; ?>">
        <input type="submit" name="delete" value="Delete" class= "btn brand z-depth-0">
      </form>


    <?php else: ?>
         <h5>No such pizza exists! </h5>
    <?php endif; ?>
  </div>

  <?php include('templates/footer.php');?>

</html>