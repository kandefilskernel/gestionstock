<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <style>
         *{
            font-family:arial;
         }
         body{
            margin:20px;
         }
         a{
            color:#EE6600;
            text-decoration:none;
         }
         a:hover{
            text-decoration:underline;
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
                     <a href="inscription2.php">Créer un compte</a>
              </li>
              <li>
                <a href="etudiants.php">Inserer Etudiant</a>
              </li>
              <li>
                <a href="#">Ajouter paiement</a>
              </li>
              <li>
                <a href="#">Liste de paiement/rapport</a>
              </li>
</ul>
<h2>Formulaire de participation au point γ</h2>
<form action="#">
  <p><i>Complétez le formulaire. Les champs marqué par </i><em>*</em> sont <em>obligatoires</em></p>
  <fieldset>
    <legend>Contact</legend>
      <label for="nom">Nom <em>*</em></label>
      //placeholder: indication grisée 
      //required: il faut renseigner le champs sinon la validation est bloquée
      //autofocus: le curseur est positionné dans cette case au chargement de la page
      <input id="nom" placeholder="Olivier Serre" autofocus="" required=""><br>
      <label for="telephone">Portable</label>
      // type="tel": bascule le clavier sur un smartphone
      // pattern: expression régulière à vérifier pour pouvoir valider
      <input id="telephone" type="tel" placeholder="06xxxxxxxx" pattern="06[0-9]{8}"><br>
      <label for="email">Email <em>*</em></label>
      <input id="email" type="email" placeholder="prenom.nom@polytechnique.edu" required="" pattern="[a-zA-Z]*.[a-zA-Z]*@polytechnique.edu"><br>
  </fieldset>
  <fieldset>
    <legend>Information personnelles</legend>
      <label for="age">Age<em>*</em></label>
      // type="number": bascule le clavier sur un smartphone
      <input id="age" type="number" placeholder="xx" pattern="[0-9]{2}" required=""><br>
      <label for="sexe">Sexe</label>
      <select id="sexe">
        <option value="F" name="sexe">Femme</option>
        <option value="H" name="sexe">Homme</option>
      </select><br>
      <label for="comments">Pourquoi voulez-vous vous impliquer dans l'organisation du point γ?</label>
      <textarea id="comments"></textarea>
  </fieldset>
 
  <fieldset>
    <legend>Departement/option</legend>
    <label for="chatnoir"><input id="chatnoir" type="checkbox" name="binet" value="chat">Informatique</label>
    <label for="oenologie"><input id="oenologie" type="checkbox" name="binet" value="vin">Scofi</label>
    <label for="bobar"><input id="bobar" type="checkbox" name="binet" value="bob">Douane</label>
    <label for="Xpara"><input id="Xpara" type="checkbox" name="binet" value="para">Genie</label>
    <label for="khomiss"><input id="khomiss" type="checkbox" name="binet" value="???">Modelisme</label>
    <label for="politix"><input id="politix" type="checkbox" name="binet" value="politix">TH</label>
    <label for="raid"><input id="raid" type="checkbox" name="binet" value="raid">Hotellerie</label>
    <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="binet" value="fiesta">Tourisme</label>
    <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="binet" value="fiesta">RT</label>
    <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="binet" value="fiesta">IG</label>
    <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="binet" value="fiesta">Construction</label>
    <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="binet" value="fiesta">Electro-mecanique</label>
    <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="binet" value="fiesta">Electricite</label>
    <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="binet" value="fiesta">Conception</label>
    <label for="Xsoirees"><input id="Xsoirees" type="checkbox" name="binet" value="fiesta">Géomine</label>
  </fieldset>
  <p><input type="submit" value="Soummettre"></p>
</form>
</body>
</html>