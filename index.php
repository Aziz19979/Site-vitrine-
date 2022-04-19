


<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_Insersion.css">
</head>

<body>


<div class="card">
  <div class="card-body">
    <h4 class="card-title"><?php echo $voie['voi_nom'] ?></h4>
    <p class="card-text"> Etat : <?php echo $voie['voi_Etat'] ?></p>
    <p class="card-text">Courant : <?php echo $voie['voi_courant'] ?></p>
    <p class="card-text">protection : <?php echo $voie['voi_protection'] ?></p></p>
  </div>
</div>
 


<div id="videoDiv"> 
<video id="video1" preload="" autoplay="" muted="" playsinline="" loop="">
<source src="Bouraq.mp4" type="video/mp4">
</video> 
<div id="videoMessage" class="styling" style="position: fixed">
<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=innov;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer


// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM tab_formulaire');






// On affiche chaque entrée une à une


  /*//var_dump( $donnees);
  foreach ($donnees as $x => $val) {
    echo $x.' '.$val.'<br>';
  }*/
    /*
  foreach ($voies as $value) {
    echo $donnees['id_voie'];
    echo $value.'<br>';
  }*/
?>

<div class="container-fluid" style="height:100%;width:100%"> 
  <div style="display:flex;height:60%;position: relative;top:20%;width:100%">
        <div style="height: 100%;border: 2px solid #000;background:rgba(50,50,50,0.65);width:50%" class="align-items-center col-6">
          <div  id="slide1">
           

                                        <p class ="card-text">
                                        <strong>Nom</strong> 
                                        <stronge>Etat de la voie</strong> 
                                        <stronge>courant</strong> 
                                        <stronge>Protection</strong> 
                                        <stronge>Coactivité</strong> 
                                        <stronge>Operation</strong> 

                                      </p>
          </div>
        </div>
    </div>
  </div>




<script>
     /*
    ------------------SLIDES--------------------------
    */
    var liste_div = [];
    <?php
        while ($donnees = $reponse->fetch()){
        ?>
        var html = `<?php 
            echo '<h5 class=\"card-title\">1/3</h5><p class =\"card-text\"><strong>Nom</strong> : '.$donnees['id_voie'].'<br />Etat de la voie: '.$donnees['etat_voie'].'<br />courant : '.$donnees['type_courant'].'<br />Protection :'.$donnees['type_protection'].'<br />Coactivité :'.$donnees['coactivite_possible'].'<br />Operation :'.$donnees['operation'].'<br /></p>'?>`;
        liste_div.push(html);
        <?php
        }
        $reponse->closeCursor(); // Termine le traitement de la requête
    ?>
    console.log("test");
    console.log(liste_div);

</script>

<script>
    function showNewSlides(){
        //update state 
        if (state>=liste_div.length){
            state=0;
        }
        slide1.innerHTML = liste_div[state];
        slide2.innerHTML = liste_div[state+1];
        console.log(state)
        state+=2;
        
    }
    /*
    ------------------UPDATE SLIDES--------------------------
    */
    function loadDoc() {
        location.reload();
    }
</script>

<script>
    var len_html_content_slide1 = parseInt(liste_div.length/2); //le nombre de voies à gauche 
    var len_html_content_slide2 = liste_div.length - len_html_content_slide1 ;

    var slide1 = document.getElementById("slide1");
    var slide2 = document.getElementById("slide2");

    state = 0
    T = 2 //20s
    setInterval(showNewSlides, T*1000); //10000 <--> 10000ms <--> 10s
    T2 = 20 //20s
    setInterval(loadDoc, T2*1000);

</script>



 
</div>
</div>
</body>
</html>


