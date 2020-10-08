<?php  

if(isset($_POST['login-submit'])){

    require 'db.inc.php';

    $mail_username = $_POST['mail-username'];
    $pwd = $_POST['pwd'];

    if(empty($mail_username) || empty($pwd)){

        header("location: ../login.php?error=emptyfields");
        exit();

    }
    else{
        $sql = "SELECT * FROM  gebruikers WHERE username=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){

            header("location: ../login.php?error=sqlerror");
            exit();

        }
        else{
            mysqli_stmt_bind_param($stmt,"ss",$mail_username, $mail_username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){

                $pwdCheck = password_verify($pwd, $row['password']);

                if($pwdCheck == false){

                    header("location: ../login.php?error=wrong_password");
                    exit();

                }
                else if ($pwdCheck == true){

                    session_start();
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_username'] = $row['username'];

                    header("location: ../index.php?login=succes");
                    exit();

                }
                else{
                    header("location: ../login.php?error=wrong_password");
                    exit();
                }


            }
            else{
                header("location: ../login.php?error=no_user");
                exit();
            }
        }

    }


}
else{
    header("location: ../login.php");
    exit();
}

?>