
<?php include('includes/header.php')?>

<?php if(empty($_SESSION['user_id'])){
    header("location: ../login.php");
    exit();
}

?>
<?php include('includes/content-top.php')?>
<?php include('includes/sidebar.php');?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Gebruikers</h2>
            <a href="gebruikerToevoegen.php" class="btn btn-primary rounded-0"><i class="fas fa-plus"></i> Gebruiker toevoegen</a>
           
            <table class=" table table-header">
                <thead>
                    <tr> 
                        <th>Id</th>
                        <th>Naam</th>
                        <th>Email</th>
                        <th>Bewerken</th>
                        <th>Delete</th>
                    </tr>
                </thead>

<?php  

include_once "includes/db.inc.php";

$sql = "SELECT * FROM gebruikers";
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
            <td>'.$row["username"].'</td>
            <td>'.$row["email"].'</td>
            <td><a href="gebruikerAanpassen.php?id='.$row["id"].'" class="btn btn-danger rounded-0"><i class="fas fa-edit"></i></a></td>
            <td><a href="includes/delete-user.inc.php?id='.$row["id"].'" class="btn btn-danger rounded-0"><i class="fas fa-trash-alt"></i></a></td>
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