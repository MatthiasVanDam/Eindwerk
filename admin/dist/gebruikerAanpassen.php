<?php include('includes/header.php')?>
<?php 

if(empty($_SESSION['user_id'])){
    header("location: ../dist/login.php");
    exit();
}

if(empty($_GET['id'])){
    header ('location: ../dist/gebruikers.php');
}else{
    include('includes/db.inc.php');
    $id = $_GET['id'];
    $msg="";
    $sql = "SELECT * FROM gebruikers where id=$id";       
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

                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Gebruiker aanpassen</h3>
                    </div>
                    
                    <div class="card-body">
                        <form action="includes/edit-user.inc.php?id=<?php echo $row['id'] ?>" method="post">
                        <?php $msg ?>
                            <div class="form-group">
                                
                                <input class="form-control py-4" type="text" name="username" placeholder="Enter Username" value="<?php echo $row['username']?>"/>
                            </div>

                            <div class="form-group">
                
                                <input class="form-control py-4" type="text" name="mail" placeholder="Enter E-mail" value="<?php echo $row['email']?>" />
                            </div>

                            <div class="form-group">
            
                                <input class="form-control py-4" type="password" name="pwd" placeholder="Enter password" value="<?php echo $row['password']?>" />
                            </div>

                            <div class="form-group">
                    
                                <input class="form-control py-4" type="password" name="pwd-repeat" placeholder="Repeat password" value="<?php echo $row['password']?>" />
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