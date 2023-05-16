<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:index.php");
      exit();
   }
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
    
      <style>
      p {
  margin-top: 0px;
}
 
fieldset {
  margin-bottom: 15px;
  padding: 10px;
}
 
legend {
  padding: 0px 3px;
  font-weight: bold;
  font-variant: small-caps;
}
 
label {
  width: 110px;
  display: inline-block;
  vertical-align: top;
  margin: 6px;
}
 
em {
  font-weight: bold;
  font-style: normal;
  color: #f00;
}
 
input:focus {
  background: #eaeaea;
}
 
input, textarea {
  width: 249px;
}
 
textarea {
  height: 100px;
}
 
select {
  width: 254px;
}
 
input[type=checkbox] {
  width: 10px;
}
 
input[type=submit] {
  width: 150px;
  padding: 10px;
}
      </style>
      <link rel="stylesheet"  href="style2.css" />
   </head>
   <body onLoad="document.fo.login.focus()">
   <ul class="menu">
              <li>
               <a href="deconnexion.php">Se déconnecter</a> 
              </li>
              <li>
                <a href="session2.php">Accueil</a>
              </li>
              <li>
                     <a href="inscription2.php">Créer un compte</a>
              </li>
              <li>
                <a href="ajouteretudiant.php">Inserer Etudiant</a>
              </li>
              <li>
                <a href="#">Ajouter paiement</a>
              </li>
              <li>
                <a href="#">Liste de paiement/rapport</a>
              </li>
        </ul>
        <div>
        <h2>Formulaire d'étudiant</h2>

        </div>
  
    
        <form method="post"  action="ajouterETUDIANT23.php">
              <div>
                 <fieldset>
                      <legend>Informations personnelles</legend>
                      
                      <input type="text" name="TT1" placeholder="Nom de l'étudiant" />
                      <input type="text" name="TT4" placeholder="Téléphone"  />
                      <input type="text" name="TT6" placeholder="Année Academique"  />
                      <select id="sexe">
                         <option value="F" name="TT5">Femme</option>
                         <option value="H" name="TT5">Homme</option>
                      </select><br>
                 </fieldset>
                 </div>
                  <div>
                  <fieldset>
                       <legend>Autres informations</legend>
                        
                        <legend>Promotion</legend>
                        <label for="chatnoir"><input id="chatnoir" type="checkbox" name="TT2" value="G1">G1</label>
                        <label for="oenologie"><input id="oenologie" type="checkbox" name="TT2" value="G2">G2</label>
                        <label for="bobar"><input id="bobar" type="checkbox" name="TT2" value="G3">G3</label>
                        <label for="Xpara"><input id="Xpara" type="checkbox" name="TT2" value="L1">L1</label>
                        <label for="khomiss"><input id="khomiss" type="checkbox" name="TT2" value="L2">L2</label>
                   </fieldset>
                   </div>
                    
                   <div>
                  <fieldset>
                   
                    <legend>Choisissez L'option</legend>
                      <label for="chatnoir"><input id="chatnoir" type="checkbox" name="TT3" value="SCOFI">SCOFI</label>
                      <label for="oenologie"><input id="oenologie" type="checkbox" name="TT3" value="INFO">INFO</label>
                      <label for="bobar"><input id="bobar" type="checkbox" name="TT3" value="GENIE">GENIE</label>
                      <label for="Xpara"><input id="Xpara" type="checkbox" name="TT3" value="MODE">MODE</label>
                      <label for="khomiss"><input id="khomiss" type="checkbox" name="TT3" value="TH">TH</label>
                      <label for="politix"><input id="politix" type="checkbox" name="TT3" value="TOURISME">TOURISME</label>
                      <label for="raid"><input id="raid" type="checkbox" name="TT3" value="COMPT">COMPT</label>
                      <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="TT3" value="RT">RT</label>
                      <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="TT3" value="IG">IG</label>
                      <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="TT3" value="ELEM">ELEM</label>
                      <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="TT3" value="ELEC">ELEC</label>
                      <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="TT3" value="MARK">MARK</label>
                      <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="TT3" value="GEOMINE">GEOMINE</label>
                      <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="TT3" value="DOUANE">DOUANE</label>
                      <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="TT3" value="CONCEPTION">CONCEPTION</label>
                   </fieldset>
                   </div>
                   <div>
                   <button type="submit">ENREGISTRER</button>
                   </div>
                   
      </form>
</body>
</html>