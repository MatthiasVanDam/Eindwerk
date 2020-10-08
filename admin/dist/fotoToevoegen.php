<?php include('includes/header.php')?>


<?php 

if(empty($_SESSION['user_id'])){
    header("location: ../dist/login.php");
    exit();
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Foto Toevoegen</h3></div>
                  

                    <div class="card-body">


                        <form action="includes/upload-photo.inc.php" method="post"  enctype="multipart/form-data">
                        <!-- <p class="text-danger text-center"><?php echo $msg; ?></p> -->
                        <div class="form-group">            
                                <input class="form-control py-4" type="text" name="photoName" placeholder="Foto Naam" />
                            </div>
                            <div class="form-group">            
                                <input class="form-control py-4" type="text" name="realisatieId" placeholder="Realisatie" />
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