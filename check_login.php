<?php
$mysqlConnection = new PDO( 
        'mysql:host=localhost;dbname=projet;charset=utf8', 

        'root', 

        '' 
    );

    $requete = $mysqlConnection->prepare('SELECT * FROM user where login=? and pwd=?');
$requete->bindParam(1,$_POST["login"]);
$requete->bindParam(2,$_POST["pwd"]);
$requete->execute();
 //   $requete->execute(['login'=>$_POST["login"],'pwd'=>$_POST["pwd"]]);

    $ligne =  $requete->fetch();
    
if($ligne)
{
    session_start();
    $_SESSION["login"]=$_POST["login"];
    header("http://127.0.0.1/Cloverleaf/accueil.php");
    echo ("vous êtes connecté");
}
else
{
    header("http://127.0.0.1/Cloverleaf/accueil.php");
    echo ("vous devez vous connectez");
}    

        
    ?>