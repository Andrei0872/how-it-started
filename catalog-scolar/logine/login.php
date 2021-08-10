<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$_SESSION['nume'] = '';
$_SESSION['prenume'] ='';
$_SESSION['userelev'] ='';
$crud = new mysqli('localhost','linndows_user', 'g0@U1d78', 'linndows_learn');
if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['submit'])) {
        $username =$crud->escape_string($_POST['username']);
        $password =$crud->escape_string($_POST['password']);
        $sql = "SELECT * FROM elevi where userelev = '$username' ";
        $result = $crud->query($sql);            
        if($result->num_rows == 0) {
            echo "ceva n a mers bine";
        }
        else {
            $user = $result->fetch_assoc();               
            if($user['parolaelev'] == $password) {
                $_SESSION['nume'] = $user['nume'];
                $_SESSION['prenume'] = $user['prenume'];
                $_SESSION['username'] = $username;
                header('location: note.php');
            }
            else echo "parole incorecte NUUUU";                
        }
    }       
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            .pd{
                margin-top:10px;
            }
            .icon{
                width:50%;
                height: auto;
            }
            
            @media only screen and (min-width: 1000px) {
                .icon{
                    width:35%;
                    height: auto;
                }
                .w3-container{
                    width:40%;
                }
            }
            @media only screen and (max-width: 1000px) {
                .w3-container{
                    width:70%;
                    font-size: 20px;
                }
            }
        </style>
    </head>
    <body background="http://bgfons.com/uploads/wood/wood%20_texture3173.jpg" style="background-size: cover;">
        <a class="w3-display-topright w3-button w3-red" href="../index.html" style="margin: 10px 10px;">Pagina Anterioara</a>
        <div class="w3-container w3-display-middle" style="background: #f0f0f0; box-shadow:3px 3px #cacaca;">
            <div class="w3-row">
                <div style="text-align:center;"><img style="margin:10px auto;" class="icon" src="student.png" alt="Elev"></div>
                
                <form style="width:100%" action="login.php" method="post">
                    <label>Username</label>
                    <input class="w3-input pd" style="width:100%" type="text" name="username">
                    <label>Parola</label>
                    <input class="w3-input pd" style="width:100%" type="password" name="password">
                    <div style="text-align:center"><input type="submit" name="submit" class="w3-button w3-blue pd" style="width:30%;margin:10px auto 10px auto;" value="Login"/></div>  
                </form>
            </div>
        </div>
    </body>
</html>