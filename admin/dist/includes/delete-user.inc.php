<?php include('header.php')?>


<?php 

if(empty($_SESSION['user_id'])){
    header("location: ../login.php");
    exit();
}


if (empty($_GET['id'])){
      header("location: ../gebruikers.php");
}
  else{
      include_once "db.inc.php";
      $id = $_GET['id'];
    

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
        
        // sql to delete a record
        $sql = "DELETE FROM gebruikers WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
          header("location: ../gebruikers.php");
          echo "Record deleted successfully";
        } else {
          echo "Error deleting record: " . $conn->error;
        }
        
        $conn->close();
  }
?>

<?php include('includes/footer.php')?>