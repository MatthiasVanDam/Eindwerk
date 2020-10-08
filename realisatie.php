<?php include('includes/header.php')?>
<?php include('includes/content-top.php')?>
<?php include('admin/dist/includes/db.inc.php')?>

<?php 

if(empty($_GET['id'])){
    header ('location: realisaties.php');
  }
  $photoId = $_GET['id'];
  $msg="";
  $sql = "SELECT realisaties.id, realisaties.title, realisaties.description, realisaties.image, photos.image as photos_image FROM realisaties left outer join photos on realisaties.title = photos.realisatie_id where realisaties.id=$photoId";       
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt,$sql)){
      echo "sql statement failed";
  }
  else{
 
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $realisatieId = $row['title'];

    }
  }

?>

        <!--Realisatie content-->
        <section class="page-section mt-5" id="">
        <div class="container sectionContent">
            <div class="row">
                
                <div class="col-xs-12 col-lg-6 mb-sm-5">
                    <div data-aos="fade-right" data-aos-duration="1500"  class="faderight">
                        <h3 class="section-heading text-uppercase  text-center "><?php echo $row['title'] ?></h3>
                        <hr class="bg-success mb-5 text-justify">
                        <p class="px-3 text-justify"><?php echo $row['description']?></p>
                    </div>
                </div>
    
                <div class="col-xs-12 col-lg-6 text-center">
    
                    <div data-aos="fade-left" data-aos-duration="1500"  class="fadeleft">
                        <img class="img-fluid" src="admin/dist/img/realisaties/<?php echo $row["image"] ?>">
                    </div>
    
                </div>
    
            
            </div>
        </div>
    </section>
<!--Foto's realisatie-->
<section class="page-section" id="">
    <div class="container sectionContent">
        <div data-aos="zoom-in" data-aos-duration="1500"  class="row">
       
        <!-- <div class="photo-thumbnail" >
            <img class="thumb-img" src="admin/dist/img/fotos/'.$row["photos_image"].'" ></image>
            </div> -->
        <?php 
      
        mysqli_data_seek($result,0);
        if(!empty($row['photos_image'])){
        while($row = mysqli_fetch_assoc($result)){
            
            

            echo '

            <div class="col-xs-12 col-md-6 col-lg-3 text-center mb-5" >
                
                <div class="realisatie-thumbnail" id="realisatie-foto">
                   
                    <img class="photo-thumbnail img-fluid" src="admin/dist/img/fotos/'.$row["photos_image"].'"/>
                </div>
            </div>
            
            ';}
        
        }
        else{
            $msg="Geen foto's beschikbaar!";
        }
    
    
        
        ?>
            
         
            <p class="mx-auto text-center"><?php echo $msg ?></p>

            <div class="col-12 mt-5 text-center">
                    <a href="realisaties.php " class="btn btn-lg btn-success ">Terug naar realisaties</a>
                </div>

          
        </div>

    </div>
</section>

<?php include('includes/footer.php')?>