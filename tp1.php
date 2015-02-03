                                 <!-- Nom:mahamadou Traore
                             **code permanent:TRAM14038709
                                 cree le:19-octobre-2010
                            ce fichier contien le nom des ville
                           et envoie ver la temperature des ville
                                          choicit-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type"/>
  <link href="css.css" rel="stylesheet" type="text/css"/>
  <title>Travail pratique #1</title>
 
</head>
<body>
  <?php
  /*affichage de la date heure et information meterologique*/
  require_once "entete.inc";
  ?>
    
        <?php
/*
 * affichage du contenu du fichier qui contient imformation meteorologique
 */
$erreur=" ";
$line = @file("http://www.iro.umontreal.ca/~dift1147/tp1/villes.txt");
if(!$line)
{
echo "<p class='erreur'>erreur de lecture du fichier</p>";
}
else{
 echo"<form method='get' action='http://www-desi.iro.umontreal.ca/~traormah/IFT1147/tp1/beny1987/ville.php'>";
 echo" <table width='100%'>";
 echo"<tr>";
 echo" <td>";
 echo"Choix de la ville:";
 echo" <select size='3' name='choix'>";


    for($i=0,$count=sizeof($line);$i<$count;$i++)
{
    if(strlen($line[$i])>1){
    $tableau=explode(",",$line[$i]);
 
    /*echo"<option value='$line[$i]'>";*/
 
    echo"<option value='$line[$i]'>";
    echo $tableau[0] ;
    echo"</option>";
    }
}

                /* le reste du balise formulaire*/

 echo"</select></td></tr>";
 echo"  <tr>";
 echo" <td>";
 echo"<input type='submit' value='affiche meteo'/></td></tr>";
 echo"  </table>";
 echo" </form>";
}
?>
    
  
  <?php
  /*affichage de la date heure et information meterologique*/
  require_once "pied.inc";
  ?>


</body>
</html>
