<?php
$NUMERO_VOIE='V8';
?>

<SCRIPT LANGUAGE="JavaScript">
 var nombre = 1;
 function addField(){
	nombre++ ;
    var field ="<br>"+ nombre+ "<label><h6>éme Opération</h6> </label><input  type='text' name='champ' value='' size='50' maxlength='15'/><br>" ;
    
	document.getElementById('fields').innerHTML += field;
}
 
</SCRIPT>
<style>
    h6{
        color: grey ;
        font-style: italic;
        font-family:Verdana, sans-serif;
        font-weight: 800;
    }
    #fields{
        color: grey ;
        font-style: italic;
        font-family:Verdana, sans-serif;
        font-weight: 800;
    }
    </style>

    <form method="post" action="?type=<?php echo $NUMERO_VOIE ?>" class='row' enctype="multipart/form-data"><div class="container">
    <div class="row">
        <div class="col-12">
            <div class="textInLines">
                <div class="line"></div>
                <div class="text"> <?php echo $NUMERO_VOIE ?> </div>
                <div class="line"></div>
            </div>
        </div>
        <div class="col-12">
            <h6>Etat de la voie</h6>
            <div><input type="radio" id="scales" name="scales"  value="Occupée">
                <label  for="scales">Occupée</label>
            </div>
            <div><input type="radio" id="horns" name="scales" value="libre">
                <label for="horns">libre</label>
            </div> 
        </div>

        <div class="col-12">
            <h6>Type de protection</h6>
            <div><input type="radio" id="noprotection" name="type1" value="Non protégée">
                <label  for="noprotection" style="padding-left: 20px" >Non protégée </label>
            
                <input type="radio" id="type1" name="type1" value="Type1">
                <label for="type1" style="padding-left: 20px">Type1</label>
             
                <input type="radio" id="type2" name="type1" value="Type2">
                <label for="type2" style="padding-left: 20px">Type2</label>
             
                <input type="radio" id="type3" name="type1" value="Type3">
                <label for="type3" style="padding-left: 20px">Type3</label>
            </div> 
        </div>
        <div class="col-12">
            <h6>Type de courant</h6>
            <div><input type="radio" id="3KV" name="kV3" value="3KV">
                <label  for="3KV" style="padding-left: 20px" >3KV </label>
            
                <input type="radio" id="25KV" name="kV3" value="25KV">
                <label for="25KV" style="padding-left: 20px">25KV</label>
            </div> 
        </div> 
        <div class="col-12">
            <h6>Coactivité possible</h6>
            <div><input type="radio" id="oui" name="oui" value="Oui">
                <label  for="oui" style="padding-left: 20px" >Oui </label>
            
                <input type="radio" id="non" name="oui" value="Non">
                <label for="non" style="padding-left: 20px">Non</label>
            </div> 
        </div> 
             




    
        <div id='fields'>
            <label> <h6>1er Opération </h6></label>
            <input  type='text' name='champ' value='' size='50'/></br>
        </div>
            <input type="button" value="+" onClick="addField();">
            <div class="form-group col-md-12">
                <center><button type="submit" class="btn btn-success btn-lg">Terminer</button></center>
            </div>
    
</div>
</form>
        

<?php


//save data in db
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=innov;port=3306', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}


// define variables and set to empty values
$scales ="";
//Type de protection
$noprotection ="";
//ype de courant
$kV3 ="";
//ype de courant
$oui ="";
//operation
$champ = "";
$type1 = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST["scales"])) {
    echo 'hhhhhhhhhhhh'.'<br>';
    $scales = test_input($_POST["scales"]);
  }
  if (!empty($_POST["type1"])) {
    $type1 = test_input($_POST["type1"]);
  }
  if (!empty($_POST["kV3"])) {
    $kV3 = test_input($_POST["kV3"]);
  }
  if (!empty($_POST["oui"])) {
    $oui = test_input($_POST["oui"]);
  }
  if (!empty($_POST["champ"])) {
    $champ = test_input($_POST["champ"]);
  }

  echo 'deb'.$scales.'<br>'.$noprotection.'<br>'.$type1.'<br>'.$kV3.'<br>'.$oui.'<br>'.$champ.'<br>'.'fin';


/*
  // On récupère tout le contenu de la table jeux_video
  $reponse = $bdd->query(`INSERT INTO 'tab_formulaire' ('id_voie', 'etat_voie', 'type_protection', 'type_courant', 'coactivite_possible', 'operation') VALUES ('V6',`.$scales.`,`.$noprotection.`,`.$type1.`,`.$kV3.`,`.$oui.`)`);

try
{
	// On se connecte à MySQL
	$reponse->closeCursor();
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        echo 'Erreur : '.$e->getMessage();
}*/

//$sql = "INSERT INTO tab_formulaire (id_voie, etat_voie, type_protection,type_courant,coactivite_possible,operation) VALUES  ('V6',".$scales.",".$noprotection.",".$type1.",".$kV3.",".$oui.") ";
$sql = "INSERT INTO tab_formulaire (id_voie, etat_voie, type_protection,type_courant,coactivite_possible,operation) VALUES  ('$NUMERO_VOIE','$scales','$type1','$kV3','$oui','$champ') ";
$bdd->exec($sql);
$bdd = null;


/*
if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}*/



  

  /*
  $sql = "INSERT INTO tab_formulaire (id_voie, etat_voie, type_protection,type_courant,coactivite_possible,operation) VALUES  ('V6',$scales,$noprotection,$type1,$kV3,$oui) ";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
*/


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



// Si tout va bien, on peut continuer





?>

