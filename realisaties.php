<?php include('includes/header.php')?>
<?php include('includes/content-top.php')?>

<!--INTRO-->
<div class="page-header">
    <div class="realisaties-bg">
        <div class="realisaties-bg-overlay">
            <div class="container page-section">
        
                    <div class="col-xs-12 col-md-6 text-center">
                    <h3 class="section-heading text-uppercase ">onze realisaties</h3>
                    <hr class="bg-success mb-5">
                    <p class="">Of we nu bezig zijn met aanplanting, grondwerken, afsluitingen, tuinhuizen, terrassen, opritten of eenvoudige onderhoudswerken. Wij doen dit met passie en kwaliteit</p>
                    </div>
        
            </div>
        </div>
    
    </div>
</div>


<section class="page-section">
    <div class="container">

    <div data-aos="fade-up" data-aos-duration="1500"class="row" id="realisaties">
        

            <?php
            include_once "admin/dist/includes/db.inc.php";

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
                    
                    <div class="col-xs-12 col-md-6 col-lg-3 text-center">
                        <a href="realisatie.php?id='.$row["id"].'">
                            <div class="realisatie-thumbnail">                               
                                <img class="img-fluid" src="admin/dist/img/realisaties/'.$row["image"].'"/>
                                <span class="text-light text-uppercase">'.$row['subject'].'</span>
                            </div>
                        </a>
                    </div>
                    
                    ';
                }
            }
            

           
            ?>

           

  

            

        
    </div>
</section>


<?php include('includes/footer.php')?>