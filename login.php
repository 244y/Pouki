<?php
  session_start();
// Nettoie les données passées dans POST : htmlspecialchars
$mail = (isset($_POST['mail']) && !empty($_POST['mail'])) ? htmlspecialchars($_POST['mail']) : null;
$pass = (isset($_POST['pass']) && !empty($_POST['pass'])) ? htmlspecialchars($_POST['pass']) : null;

// Si mail et mot de passe exploitables 
if ($mail && $pass) {
    // Crypte le mail et le mot de passe pour comparaison vs BDD
    // $mail = md5(md5($mail) . strlen($mail));
    $pass = sha1(md5($pass) . md5($pass));

    // Connexion à BDD
    try {
        // Connexion
         include_once('./inc/constants.inc.php');
        //  include_once('inc/sql_connect.php');
        
        $conn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
        // Gestion des attributs de la connexion : exception et retour du SELECT
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        // Préparation requête : paramétrage pour éviter injections SQL
        $qry = $conn->prepare('SELECT * FROM pouki WHERE mail=? AND pass=? AND active=?');
        $qry->execute(array($mail, $pass, 1));
        // Si une ligne est trouvée
        if ($qry->rowCount() === 1) {
            $row = $qry->fetch();
            $_SESSION['pseudo'] = $row['pseudo'];
            // var_dump($_SESSION['pseudo']);
            //  var_dump($row);//accueil_utilisateur.php?
            // index.php?m=connecter 
             header('location:page4.php');
        } else {
            echo 'Mail ou mot de passe inexploitable!';
        }
    } catch (PDOException $err) {
        echo $err->getMessage();
    }

} else {
    // echo '<h3 class="reponse_mailexiste">inscription succes<h3>';
    // echo '<a href="compte.php">Retour à la page connexion</a>';
} 