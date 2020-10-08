<?php include('includes/header.php')?>


<?php if(empty($_SESSION['user_id'])){
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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Realisatie Toevoegen</h3></div>
                    <div class="card-body">


                        <form action="includes/upload-realisatie.inc.php" method="post" enctype="multipart/form-data">

                            <div class="form-group">            
                                <input class="form-control py-4" type="text" name="realisatieTitle" placeholder="Realisatie Titel" />
                            </div>

                            <div class="form-group">                
                                <input class="form-control py-4" type="text" name="realisatieSub" placeholder="Onderwerp" />
                            </div>

                            <div class="form-group">            
                                <textarea class="form-control py-4" type="text" name="realisatieDesc" placeholder="Beschrijving"></textarea>
                            </div>

                            <div class="form-group">            
                                <input class="form-control py-4" type="text" name="realisatiePhotoName" placeholder="Photo Naam" />
                            </div>


                            <div class="form-group">
                                <input  type="file" name="realisatieImg"/>
                            </div>
                            
                            

                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button class="btn btn-primary" type="submit" name="realisatie-submit" >Toevoegen</button>
                            </div>
                        </form>


                    </div>
                
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('includes/footer.php')?>