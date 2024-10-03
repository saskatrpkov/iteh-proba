<?php
require "dbBroker.php";
require "model/user.php";

session_start();

if(isset($_POST["username"]) && isset($_POST["password"])){
    $uname=$_POST["username"];
    $upass=$_POST["password"];

    $korsnik=new User(1,$uname,$upass);
    //$conn=new mysqli();

    // $odgovor=$korsnik->loginUser($korsnik,$conn);

    $odgovor=User::loginUser($korsnik,$conn);
    if($odgovor->num_rows==1){
        echo `
        <script>
        console.log(Uspesno ste se ulogovali);
        </script>
        `;
        $_SESSION["id"]=$korsnik->id;
        header("Location: home.php");
        exit();
    }
    else{
        echo `
        <script>
        console.log(Niste se ulogovali);
        </script>
        `;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>FON: Zakazivanje kolokvijuma</title>

</head>
<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <div class="container">
                    <label class="username">Korisnicko ime</label>
                    <input type="text" name="username" class="form-control"  required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <button type="submit" class="btn btn-primary" name="submit">Prijavi se</button>
                </div>

            </form>
        </div>

        
    </div>
</body>
</html>