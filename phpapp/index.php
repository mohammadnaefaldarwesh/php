<?php 

 include('config/db_connect.php');

// write query for all cards
$sql = 'SELECT title, information, id FROM cards ORDER BY created_at';

// make query & get result
$result = mysqli_query($connect,$sql);

// fetch the resulting rows as an array 
$cards = mysqli_fetch_all($result,MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

// close the connection
mysqli_close($connect);

// print_r($cards);

?>



<!DOCTYPE html>
<html lang="en">
  <?php include('templates/header.php');?>

  <h4 class="center grey-text">Cards!</h4>
  <div class="container">
    <div class="row">
     <?php foreach($cards as $card): ?>

     <div class="col s6 md3">
       <div class="card z-depth-0">
         <div class="card-content center">
         <img src=img/phplogo.png class="phplogo">
           <h6> <?php echo htmlspecialchars($card["title"]);  ?></h6>
           <ul>
            <?php foreach( explode(",",$card["information"])as $info): ?>
              <li> <?php echo htmlspecialchars($info) ?> </li>
            <?php endforeach; ?>
           </ul>
         </div>
         <div class="card-action right-align"> 
           <a class="brand-text" href="details.php?id=<?php echo $card['id']  ?>"> more info</a>
         </div>
       </div>
     </div>

            <?php endforeach; ?>
    </div>
  </div>

  <?php include('templates/footer.php');?>
</html>