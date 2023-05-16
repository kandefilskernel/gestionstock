<?php
   require_once("cn.php");
   $mc="";
   if(isset($_GET['motCLE'])){
      $mc=$_GET['motCLE'];
      $req="SELECT etudiants.idetudiant, etudiants.nom,etudiants.promotion,etudiants.filiere,paiement.montant$,paiement.libelle,paiement.recu,paiement.carnet,paiement.datepaiement FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant where nom like '%$mc%'";
    }
   $ps=$pdo->prepare($req);
   $ps->execute();
?>
 <div>
          <ul  class="menu">
             <?php 
                 for($i=0; $i<$nbrepage;$i++) {?>
                <li  class="<?php echo(($i==$page)?'active':'')?>">
                    <a href="paiefrais.php?page=<?php echo($i)?>&motCLE=<?php echo($mc)?>">Page<?php echo($i)?></a>
                </a>
             <?php  } ?>
          </ul>

          </div>
   </fieldset>
  
   </form>
   <?php include('fils.php');?>
  </div>
  <form method='post'>
		<input type='text' placeholder='recherche' name="recherche_valeur"/>
		<input type='submit' value="Rechercher"/>
  </form>
  <table>
		<thead>
			<tr><th>Nom</th><th>Prenom</th><th>Email</th><th>Date_naissance</th></tr>
		</thead>
		<tbody>
			<?php
				$sql='select * from etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant';
				$params=[];
				if(isset($_POST['recherche_valeur'])){
					$sql.=' where nom like :nom';
					$params[':nom']="%".addcslashes($_POST['recherche_valeur'],'_')."%";
				}
				$resultats=$connect->prepare($sql);
				$resultats->execute($params);
				if($resultats->rowCount()>0){
					while($d=$resultats->fetch(PDO::FETCH_ASSOC)){
					?>
						<tr><td><?=$d['nom']?></td><td><?=$d['montant$']?></td><td><?=$d['libelle']?></td><td><?=$d['recu']?></td></tr>
					<?php
					}
					$resultats->closeCursor();
				}
				else echo '<tr><td colspan=4>aucun résultat trouvé</td></tr>'.
				$connect=null;
			?>
		</tbody>
	</table>