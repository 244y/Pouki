<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page2.css">
    <title>Document</title>
     <!--HEADER PARTIE I--> 
     <nav>
        <div class="attaquant">
         <img src="POUKI (1).png" height="200px" width="200px">
        </div>
    </header>
</head>
<body>
<main>
<!--ELEMENT CONTENUE PARTIE 2-->
<div class="milieu">
 <form  method="post" class="formulaire1"action="traitement.php" >
           <br>
           <h2>INSCRIPTION</h2>
           </br>
           <h3>Adresse e-mail</h3>
           <br>
           <div class="group">
                     <label for="mail" class="label"></label>
                     <input type="email"  id="mail" name="mail" class="input1 <?php if(isset($mailMsgErreur) && !empty($mailMsgErreur)) echo 'is-invalid'; ?>" aria-describedby="mailFeedback"  >
                     <?php if(isset($mailMsgErreur)){      ?>
                     <div class="invalid-feedback" id="mailFeedback"> 
                       <?php echo  $mailMsgErreur; ?>
                     </div>
                     <?php } ?>
                   </div>
                   <h3>Mot de passe</h3>
           <br>
                   <div class="group">
                     <label for="pass1" class="label"></label>
                     <input type="password" id="pass1" name="pass"  class="input1 <?php if(isset($passMsgErreur) && !empty($passMsgErreur)) echo 'is-invalid'; ?>" aria-describedby="passFeedback" >
                     <?php if(isset($passMsgErreur)){                  ?>
                     <div class="invalid-feedback" id="passFeedback">
                       <?php echo  $passMsgErreur; ?>
                     </div>
                     <?php } ?>
                   </div>
                   <h3>Confirmez le mot de passe</h3>
            <br>
                   <div class="group">
                     <label for="pass2" class="label"></label>
                     <input type="password" class="input1" id="pass2" pattern="[A-Za-z0-9_$]{8,}">
                   </div>
                   
                   <div class="group">
                     <input type="submit" class="button" value="Inscription"  id="register">
                   </div>
                 
        </br>
                    <!--FOOTER PARTIE 3-->
 <div class="defenseur">
        <section id="kounde">
            <h2>Vous avez déjà un compte ? </h2>
           <!-- <button class="monboutonfooter"><span><a href="accueil.html">CONNEXION</a></span></button>-->
            <button class="monboutonfooter">Clique ici !</button>
        </section>  
</div>          
                   </div>
                 </div>
               </div>
         </section>
         
         </form>        
</main>
</body>
</html>