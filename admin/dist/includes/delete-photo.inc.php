<?php include('header.php')?>

<?php 

if(empty($_SESSION['user_id'])){
    header("location: ../login.php");
    exit();
}

if (empty($_GET['id']))
{
    header("location: ../fotos.php");
}
else{
    include_once "db.inc.php";
    $id = $_GET['id'];
   


    $sql = "SELECT * FROM photos where id=$id";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Sql statement failed";
    }
    else{
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        unlink("../img/fotos/".$row['image']);
      


        $sql= "DELETE FROM photos where id=$id";
        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "Sql statement failed";
        }
        else{
        
            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt);
         
            header("location: ../fotos.php");
            
        }
      }
}

?>