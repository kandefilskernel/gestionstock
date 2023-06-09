<?php
mysql_connect('hote','utilisateur','mot_de_passe');
mysql_select_db('base_de_donnee');
//On determine l'expression a rechercher
if(isset($_GET['recherche']))
{
        $rec = htmlentities($_GET['recherche']);
}
else
{
        $rec = 'php MYSQL';
}
//On determine le type de recherche
if(isset($_GET['type']))
{
        if($_GET['type']=='un')//Un des mots
        {
                $type = 1;
        }
        elseif($_GET['type']=='tout')//Tout les mots
        {
                $type = 2;
        }
        else//L'expression exacte
        {
                $type = 3;
        }
}
else
{
        $type = 1;//type par defaut: L'expression exacte
}
//On determine si on doit surligner les mots dans les resultats
if(!isset($_GET['surligner']) or $_GET['surligner']!='true')
{
        $surligner = false;
}
else
{
        $surligner = true;
}
//On dertermine les identifiants, les noms et les informations des utilisateur
$req = 'SELECT id, nom, infos FROM utilisateurs WHERE ';
if($type==1)
{//ayant un des mots dans leurs informations
        $mots = explode(' ',$rec);//En separre lexpression en mots cles
        foreach($mots as $mot)
        {
                $req .= ' infos LIKE "%'.$mot.'%" OR';
        }
        $req .= ' 1=0';
}
elseif($type==2)
{//ayant tout des mots dans leurs informations
        $mots = explode(' ',$rec);//En separre lexpression en mots cles
        foreach($mots as $mot)
        {
                $req .= ' infos LIKE "%'.$mot.'%" AND';
        }
        $req .= ' 1=1';
}
else
{//ayant l'expression exacte dans leurs informations
        $req .= 'infos LIKE "%'.$rec.'%"';
}
//Les utilisateur seront ranges par identifiant en ordre croissant
$req .= ' order by id asc';
$requete = mysql_query($req);
//Le formulaire de recherche
?>
<form action="" method="get">
Expression &agrave; rechercher: <input type="text" name="recherche" value="<?php echo $rec; ?>" /><br />
Type de recherche: <input type="radio" name="type" value="un"<?php if($type==1){echo 'checked="checked"';} ?> /> Un des mots <input type="radio" name="type" value="tout"<?php if($type==2){echo 'checked="checked"';} ?> /> Tout les mots <input type="radio" name="type" value="exacte"<?php if($type==3){echo 'checked="checked"';} ?> /> Expression exacte<br />
Mettre en gras les mots recherch&eacute;s: <input type="checkbox" name="surligner" value="true" <?php if($surligner){echo 'checked="checked"';} ?> /><br />
<input type="submit" value="Rechercher" />
</form>
<h2>R&eacute;sultats</h2>
<table>
        <tr>
                <th>Identifiant</th>
                <th>Nom</th>
                <th>Informations</th>
        </tr>
<?php
//On affiche les resultats
while($dnn = mysql_fetch_array($requete))
{
?>
        <tr>
                <td><?php echo $dnn['id']; ?></td>
                <td><?php echo $dnn['nom']; ?></td>
                <td><?php
if($surligner)//Si il faut surligner les mots, on les surligne
{
        if($type==3)
        {
                echo preg_replace('#('.preg_quote($rec).')#i', '<strong>$1</strong>', $dnn['infos']);//On surligne l'expression exacte
        }
        else
        {
                echo preg_replace('#('.str_replace(' ','|',preg_quote($rec)).')#i', '<strong>$1</strong>', $dnn['infos']);//On surligne les mots cles de la recherche
        }
}
else
{
        echo $dnn['infos'];//On ne surligne pas
}
?></td>
        </tr>
<?php
}
?>
</table>