<?php include('includes/header.php')?>

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">


                                    <form action="includes/login.inc.php" method="POST">
                                            <div class="form-group">
                                       
                                                <input class="form-control py-4" type="text" name="mail-username" placeholder="Enter E-mail or Username" />
                                            </div>
                                        
                                            <div class="form-group">
                                
                                                <input class="form-control py-4" type="password" name="pwd" placeholder="Enter password" />
                                            </div>                                                                           
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" name="login-submit" >Login</button>
                                            </div>
                                        </form>


                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

<?php include('includes/footer.php')?>