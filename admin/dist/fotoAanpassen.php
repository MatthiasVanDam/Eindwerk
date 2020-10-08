<?php include('includes/header.php')?>
<?php 

if(empty($_SESSION['user_id'])){
    header("location: ../dist/login.php");
    exit();
}
 
if(empty($_GET['id'])){
    header ('location: ../dist/fotos.php');
}else{
    include('includes/db.inc.php');
    $id = $_GET['id'];

    $sql = "SELECT * FROM photos where id=$id";       
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "sql statement failed";
    }else{

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
        }
    } 
}
?>


<?php include('includes/content-top.php')?>
<?php include('includes/sidebar.php');?>

<main>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">

            <div class="container">
                <div class="row justify-content-center">
                <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Foto aanpassen</h3>
                    </div>

                    <div class="card-body">

                        <form action="includes/edit-photo.inc.php?id=<?php echo $row["id"] ?>" method="post"  enctype="multipart/form-data">

                            <div class="form-group">            
                            <img class="img-fluid" src="img/fotos/<?php echo $row["image"] ?>" alt=""></td>
                            </div>

                            <div class="form-group">            
                            <input class="form-control py-4" type="text" name="photoName" placeholder="Foto Naam" />
                            </div>

                            <div class="form-group">
                            <input  type="file" name="photoImg"/>
                            </div>

                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                            <button class="btn btn-primary" type="submit" name="photo-submit" >Toevoegen</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</main>


<?php include('includes/footer.php')?>