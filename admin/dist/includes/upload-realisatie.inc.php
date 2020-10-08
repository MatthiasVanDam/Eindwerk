<?php include('header.php')?>


<?php 

if(empty($_SESSION['user_id'])){
    header("location: ../login.php");
    exit();
}


if(isset($_POST['realisatie-submit'])){
    $realisatieTitle = $_POST['realisatieTitle'];
    
    $newRealisatiePhotoName = $_POST['realisatiePhotoName'];
    if(empty($_POST['realisatieTitle'])){
        echo "Geef een Realisatie title";
    }
    else{
        $newRealisatiePhotoName = strtolower(str_replace(" ","-",$newRealisatiePhotoName));
    }

    $realisatieSub = $_POST['realisatieSub'];
    $realisatieDesc = $_POST['realisatieDesc'];

    $file= $_FILES['realisatieImg'];

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
            //if fileSize is bigger then  xxx MB
            if($fileSize < 5000000){
                //if name already exists,give it a unique name
                $imageFullName = $newRealisatiePhotoName.".".uniqid("",true).".".$fileActualExt;
                $fileDest = "../img/realisaties/".$imageFullName;
                
                include_once "db.inc.php";

                if(empty($_POST['realisatieSub']) || empty($_POST['realisatieDesc']) || empty($_POST['realisatieTitle'])){
                    header("location: ../realisatieToevoegen.php?=empty");
                    exit();
                }
                else{
                    $sql = "SELECT * FROM realisaties";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "Sql statement failed";
                    }
                    else{
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        $sql= "INSERT INTO realisaties (title,description,image,subject) VALUES (?,?,?,?)";
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo "Sql statement failed";
                        }
                        else{
                            mysqli_stmt_bind_param($stmt, "ssss", $realisatieTitle, $realisatieDesc,$imageFullName, $realisatieSub);
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($fileTempName,$fileDest);
                            header("location: ../realisaties.php");
                            
                        }
                    } 
                }
            }
            else{
                echo "Bestand is te groot!";
                exit();
            }   
        
        }
    }
    else{
        Echo "Upload een juist bestandstype!";
        exit();
    }



}

?>