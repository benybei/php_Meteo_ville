                             <!-- Nom:mahamadou Traore
                             **code permanent:TRAM14038709
                                 cree le:19-octobre-2010
                             ce fichier contien les information
                              sur la temperature de la ville
                             -->


                             
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

    <hr style="width:50%"/>

     <?php
  /*affichage de la date heure et information meterologique*/
  $ville= @$_REQUEST['choix'];
  if($ville=="")
  {
        echo "<p class='erreur'>erreur vous navez pas choisit de ville</p>";
  }
 else {


      $ville=explode(",",$ville);
      $ville[1]=trim($ville[1]);

       echo '<h3>ville:';
       echo $ville[0];
       echo '</h3>';

  $line = "http://www.iro.umontreal.ca/~dift1147/tp1/";
  $line =@file($line.$ville[1]);

                /*gere lerreur si le fichier est introuvable*/
    if(!$line)
    {
    echo "<p class='erreur'>erreur de lecture du fichier</p>";
    }
    else {
    

    
/*initialisation du valeur du tableau*/
     $info=" ";
     $temp=" ";
     $humi=" ";
     $vent=" ";
     $desc=" ";

/*utilisation du tableau et la creation de limage*/
    for($i=0;$i<sizeof($line);$i++)
   {
       $ligne=$line[$i];
       $ligne=explode(":",$ligne);
       if(strcmp($ligne[0],"info")==0)
                {
           $info=$ligne[1];
           $info=trim($info);
           $img=$info.".gif";
                }
         else if(strcmp($ligne[0],"temp")==0)
                {
            $temp="température:".$ligne[1];
                      }
      else if(strcmp($ligne[0],"humidite")==0)
                {
            $humi="humidité:".$ligne[1];
                      }
       else if(strcmp($ligne[0],"vent")==0){

            $vent="vent:".$ligne[1];
                      }
       else if(strcmp($ligne[0],"description")==0){

           $desc=$ligne[1];
                      }

   }

   echo"<table border='2' width='30%' style='margin-left:35%' >";    
   echo"<tr>";
   echo"<td colspan='3'> <img alt='$info' src='image/$img'/><br/>$info</td>";
   echo"</tr>";
   echo"<tr>";
   echo"<td> $temp</td>";
   echo"<td>$humi</td>";
   echo"<td>$vent</td>";
   echo"</tr>";
   echo"<tr>";
   echo"<td colspan='3'>$desc</td>";
   echo "</tr>";
   echo " </table>";

     
 }
}
  ?>

 <?php
  /*affichage de la date heure et information meterologique*/
  require_once "pied.inc";
  ?>





</body>
</html>
