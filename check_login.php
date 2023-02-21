<?
$mysqlConnection = new PDO( 
        'mysql:host=localhost;dbname=projet;charset=utf8', 

        'root', 

        '' 
    );

    $requete = $mysqlConnection->prepare('SELECT * FROM user where login=:login and pwd=:pwd');

    $requete->execute(['login'=>$_POST["login"],'pwd'=>$_POST["pwd"]]);

    $ligne =  $requete->fetch();
    
if($ligne)
{
    session_start();
    $_SESSION["login"]=$_POST["login"];
    header("accueil.html");
}
else
{
    header("login.html");
}    
    ?>