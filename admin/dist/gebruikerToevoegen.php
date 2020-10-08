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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Gebruiker Toevoegen</h3></div>
                    <div class="card-body">


                        <form action="includes/add-user.inc.php" method="post">
                        
                            <div class="form-group">
            
                                <input class="form-control py-4" type="text" name="username" placeholder="Enter Username" />
                            </div>

                            <div class="form-group">
                
                                <input class="form-control py-4" type="text" name="mail" placeholder="Enter E-mail" />
                            </div>

                            <div class="form-group">
            
                                <input class="form-control py-4" type="password" name="pwd" placeholder="Enter password" />
                            </div>

                            <div class="form-group">
                    
                                <input class="form-control py-4" type="password" name="pwd-repeat" placeholder="Repeat password" />
                            </div>
                            
                            
                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button class="btn btn-primary" type="submit" name="addUser-submit" >Toevoegen</button>
                            </div>
                        </form>


                    </div>
                
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('includes/footer.php')?>