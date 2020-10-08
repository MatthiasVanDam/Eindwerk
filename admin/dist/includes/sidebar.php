<div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <!--FOTO'S-->

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePhotos" aria-expanded="false" aria-controls="collapsePhotos">
                            <div class="sb-nav-link-icon"><i class="fas fa-camera"></i></div>
                            Foto's
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePhotos" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="fotos.php">Alle foto's</a>
                                <a class="nav-link" href="fotoToevoegen.php">Foto toevoegen</a>
                            </nav>
                        </div>

                        <!--REALISATIES-->
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRealisaties" aria-expanded="false" aria-controls="collapseRealisaties">
                            <div class="sb-nav-link-icon"><i class="fas fa-bullseye"></i></div>
                            Realisaties
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseRealisaties" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="realisaties.php">Alle realisaties</a>
                                <a class="nav-link" href="realisatieToevoegen.php">Realisaties toevoegen</a>
                            </nav>
                        </div>

                        <!--Users-->
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Gebruikers
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="gebruikers.php">Alle gebruikers</a>
                                <a class="nav-link" href="gebruikerToevoegen.php">Gebruiker toevoegen</a>
                            </nav>
                        </div>

                           <!-- logout-->
                        <div class="navbar-nav mt-5 text-center">
                        
                    
                        <form action="includes/logout.inc.php" method="post">
                            <button class="btn btn-light" type="submit" name="logout-submit">Logout</button>
                        </form>
                
                        </div>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small"> <?php if (isset($_SESSION['user_username'])) echo "Logged in as: ".$_SESSION['user_username'];?></div>
                   
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
        