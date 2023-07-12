
<?php
include("./inc/constants.inc.php");
// verification de jetons de CSRF à evoyer

$mail= isset($_POST['mail']) ? $_POST['mail'] : '';
$pass= isset($_POST['pass']) ? $_POST['pass'] : '';
 session_start();
// initialisation du tableau d'erreur
$erreurs=[];


// verification d'email
if(preg_match("/^[A-Za-zÀ-ú]{1,}@/", $mail)=== 0){
  // ajout de message d'erreur
  $erreurs["mail"]="l'email n'est pas valide";
}
//valider $pass
if(preg_match("/^[A-Za-z0-9_$]{8,}/", $pass)=== 0){
  //ajouter un message d'erreur dans le tableau $erreurs
  $erreurs["pass"] = "la passe n'est pas valide";
}

// mettre en place une protection xss

$mail= htmlspecialchars($mail);
$pass= htmlspecialchars($pass);

// si validation rediriger vers la page de formulaire
if(count($erreurs) > 0){

$_SESSION["compte-données"]["mail"]=$mail;
$_SESSION["compte-données"]["pass"]=$pass;
$_SESSION["compte-données"]=$erreurs;
echo '<h2 class="reponse_mailexiste">vous n avez pas rempli tous les champs  ';
// echo '<a href="compte.php">Retour à l\'accueil</a>';
exit;

}
// parcourir mon tableau
foreach($_POST as $key => $val){
  $params[':' . $key] = (isset($_POST[$key]) && !empty($_POST[$key])) ? htmlspecialchars($_POST[$key]) : null;
}
// criptage de email et pass

// $params[':mail']=md5(md5($params[":mail"]) .strlen($params[':mail']));
$params[':pass']=sha1(md5($params[":pass"]) .md5($params[':pass']));

include("./inc/constants.inc.php");
// connexion avec la base de données
try {
  // Connexion à la BDD
   $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
   // Options
   $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
   // Teste si le mail n'existe pas déjà
   $sql = 'SELECT COUNT(*) AS nb FROM pouki WHERE mail=?'; // paramètre anonyme
   $qry = $cnn->prepare($sql); // prépare la requête
   $qry->execute(array($params[':mail']));
   $row = $qry->fetch();
   //var_dump($row);
   if ($row['nb'] == 1) {
       echo '<h2 class="reponse_mailexiste">Cette adresse mail existe déjà !';
     echo '<a href="compte.php">Retour à l\'accueil</a>';
      //  header("location:compte.php");
   } else {
       $sql = 'INSERT INTO pouki (mail, pass) VALUES(:mail, :pass)';
       $qry = $cnn->prepare($sql);
       $qry->execute($params);
       unset($cnn); // déconnexion
       // header('location:login.php?m=inscription');
           // header('location:textes.php');
         echo '<h2 class="reponse_mailexiste">Vous etes bien inscrit ';
      //  echo '<a href="connexion.php">Retour à de connexion</a>';
      // header('location:page1.php');
       
   }
} catch (PDOException $err) {
   $err->getMessage();
   /* dodif */
       $_SESSION["compte-erreur-sql"] = $err->getMessage();
       $_SESSION["compte-donnees"]["mail"] = $mail;
       $_SESSION["compte-donnees"]["pass"] = $pass;
      //  header("location: compte.php");//redirection avec le code HTTP 302
       exit;
}
?>

