
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
            <h2>Realisaties</h2>
            <a href="realisatieToevoegen.php" class="btn btn-primary rounded-0"><i class="fas fa-plus"></i> Realisatie toevoegen</a>
           
            <table class=" table table-header">
                <thead>
                    <tr>
                        
                        <th>Id</th>
                        <th>Realisatie</th>
                        <th>Foto</th>
                        <th>Omschrijving</th>
                        <th>Onderwerp</th>
                        <th>Bewerken</th>
                        <th>Delete</th>
                    </tr>
                </thead>

<?php

include_once "includes/db.inc.php";

$sql = "SELECT * FROM realisaties";
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
            <td>'.$row["title"].'</td>
            <td>  <img class="img-fluid" src="img/realisaties/'.$row["image"].'" height="50" width="50" alt=""></td>
            <td>'.$row["description"].'</td>
            <td>'.$row["subject"].'</td>
            <td><a href="realisatieAanpassen.php?id='.$row["id"].'" class="btn btn-danger rounded-0"><i class="fas fa-edit"></i></a></td>
            <td><a href="includes/delete-realisatie.inc.php?id='.$row["id"].'" class="btn btn-danger rounded-0"><i class="fas fa-trash-alt"></i></a></td>

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