
<?php include('includes/header.php')?>

<?php if(empty($_SESSION['user_id'])){
    header("location: ../dist/login.php");
    exit();
}

?>
<?php include('includes/content-top.php')?>
<?php include('includes/sidebar.php');?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Foto's</h2>
            <a href="fotoToevoegen.php" class="btn btn-primary rounded-0"><i class="fas fa-plus"></i> Foto toevoegen</a>
           
            <table class=" table table-header">
                <thead>
                    <tr>
                        
                        <th>Id</th>
                        <th>Realisatie</th>
                        <th>Foto</th>
                        <th>Type</th>
                        <th>Size</th>
                        <th>Bewerken</th>
                        <th>Delete</th>
                    </tr>
                </thead>
<?php

include_once "includes/db.inc.php";

$sql = "SELECT * FROM photos";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
    echo "sql statement failed";
}
else{

    mysqli_stmt_execute($stmt); 
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)){
                    
        echo '
        <tr>

            

            <td>'.$row["id"].'</td>
            <td>'.$row["realisatie_id"].'</td>
            <td>  <img class="img-fluid" src="img/fotos/'.$row["image"].'" height="50" width="50" alt=""></td>
            <td>'.$row["type"].'</td>
            <td>'.$row["size"].' KB</td>

           
            <td><a href="fotoAanpassen.php?id='.$row["id"].'" class="btn btn-danger rounded-0"><i class="fas fa-edit"></i></a></td>
            <td><a href="includes/delete-photo.inc.php?id='.$row["id"].'" class="btn btn-danger rounded-0"><i class="fas fa-trash-alt"></i></a></td>

        </tr>
        
        ';
    }

}
?>
              
                
            </table>
        </div>
    </div>
</div>


<?php include('includes/footer.php')?>