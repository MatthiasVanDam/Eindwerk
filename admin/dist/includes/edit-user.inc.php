<?php include('header.php')?>


<?php 

if(empty($_SESSION['user_id'])){
    header("location: ../login.php");
    exit();
}


if(isset($_POST['addUser-submit'])){
   
    require 'db.inc.php';
    $id =$_GET['id'];
    $username = $_POST['username'];
    $email = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwd-repeat'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
       echo "Ongeldige naam en email!";
       
        
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       echo "Ongeldige naam en email!";      
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
       echo "Ongeldige gebruikersnaam";      
    }
    else if($pwd !== $pwdRepeat){
       echo "Fout bij herhaling passwoord";      
    }

    else{
      
        $sql = "SELECT username FROM gebruikers WHERE id=$id";
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt,$sql)){

            echo "Sql statement failed";
    

        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            
            $id =$_GET['id'];
            $sql = "UPDATE  gebruikers SET username= ?, email= ? , password= ? WHERE id=$id";
            $stmt = mysqli_stmt_init($conn); 
            
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "Sql statement failed";
                
            }
            else{
                
                $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt,"sss",$username,$email, $hashedPwd);
                mysqli_stmt_execute($stmt);
                
                header("location: ../gebruikers.php?edit=succes");
                
            }
            
        }
    }


}
else{
    header("location: ../gebruikerToevoegen.php");
    
}

?>