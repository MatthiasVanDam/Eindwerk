<?php include('header.php')?>


<?php 

if(empty($_SESSION['user_id'])){
    header("location: ../login.php");
    exit();
}


if(isset($_POST['addUser-submit'])){
   
    require 'db.inc.php';

    $username = $_POST['username'];
    $email = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwd-repeat'];



    if(empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat)){

        header("location: ../gebruikerToevoegen.php?error=emptyfields&username=".$username."&mail=".$email);
        exit();

    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("location: ../gebruikerToevoegen.php?error=invalidmail&username");
        exit();

    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("location: ../gebruikerToevoegen.php?error=invalidmail&username=".$username);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("location: ../gebruikerToevoegen.php?error=invalidmail=".$mail);
        exit();
    }
    else if($pwd !== $pwdRepeat){
        header("location: ../gebruikerToevoegen.php?error=passwordcheck&username=".$username."&mail=".$email);
        exit();
    }

    else{

        $sql = "SELECT username FROM gebruikers where username=?";
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt,$sql)){

            header("location: ../gebruikerToevoegen.php?error=sqlerror");
            exit();

        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck > 0){
                header("location: ../gebruikerToevoegen.php?error=usertakern&mail");
                exit();
            }
            else{
                $sql = "INSERT INTO  gebruikers (username, email , password) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn); 
                if(!mysqli_stmt_prepare($stmt,$sql)){

                    header("location: ../gebruikerToevoegen.php?error=sqlerror");
                    exit();
        
                }
                else{

                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt,"sss",$username,$email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    
                    header("location: ../gebruikerToevoegen.php?signup=succes");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else{
    header("location: ../gebruikerToevoegen.php");
    exit();
}

?>