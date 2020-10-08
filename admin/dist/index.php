
<?php include('includes/header.php')?>


<?php if(empty($_SESSION['user_id'])){
    header("location: login.php");
    exit();
}

?>

<?php include('includes/content-top.php')?>
<?php include('includes/sidebar.php');?>
<?php include('includes/content.php')?>
<?php include('includes/footer.php')?>