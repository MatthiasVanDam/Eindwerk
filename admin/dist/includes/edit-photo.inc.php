
<?php include('header.php')?>

<?php 

if(empty($_SESSION['user_id'])){
    header("location: ../login.php");
    exit();
}

if(isset($_POST['photo-submit'])){
   
    $newPhotoName = $_POST['photoName'];
    if(empty($_POST['photoName'])){
        echo "Geef een naam voor de foto!";
    }
    else{
        $newPhotoName = strtolower(str_replace(" ","-",$newPhotoName));
    }

    $realisatieId= strtolower(str_replace(" ","",$_POST['realisatieId']));

    $file= $_FILES['photoImg'];

    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    //Get filetype name
    $fileExt = explode(".",$fileName);
    $fileActualExt = strtolower(end($fileExt));

    //allowed types
    $allowed = array("jpg","jpeg","png");

    //error handler -allowed types
    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            //if fileSize is bigger then 200MB
            if($fileSize < 5000000){
                //if name already exists,give it a unique name
                $imageFullName = $newPhotoName.".".uniqid("",true).".".$fileActualExt;
                $fileDest = "../img/fotos/".$imageFullName;
                
                include "db.inc.php";
                $id = $_GET['id'];
                
                $sql = "SELECT * FROM photos WHERE id=$id";
                $stmt = mysqli_stmt_init($conn);
                
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    echo "Sql statement failed";
                }
                else{ 
                    
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    $row = mysqli_fetch_assoc($result);
                    unlink("../img/fotos/".$row['image']);

                    $sql= "UPDATE photos SET image=? , type=? , size=? WHERE id=$id";

                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "Sql statement failed";
                    }
                    else{
                        mysqli_stmt_bind_param($stmt, "sss", $imageFullName, $fileType, $fileSize);
                        mysqli_stmt_execute($stmt);

                        move_uploaded_file($fileTempName,$fileDest);
                        header("location: ../fotos.php?edit=succes");
                        
                    }
                } 
                    
                
            }
        }
        else{
            echo "Bestand is te groot!";
            exit();
        }
    }
    else{
        Echo "Upload een juist bestandstype!";
        exit();
    }



}

?>
