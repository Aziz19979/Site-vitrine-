<?php
function error404(){
	echo '
		<div class="row" style="height:300px; background:#fff; color:#000">
		<div class="col-6" style="text-align:center; padding:10px">
		<br><br><br>
		<h1>404</h1>
		<p>Sorry! De toute évidence, le document que vous recherchiez a été déplacé ou n\'existe plus.</p>
		<a href="index.php" style="color:#1A1452">Retour vers Accueil</a>
		</div>
		<div class="col-6" style="background-image:url(\'images/error404.jpg\'); background-position:center; background-size:cover;">
		</div>
		</div>';
}
//this code is created by Josué - jose.init.dev@gmail.com
function error($text){
	echo '<div class="alert alert-warning"><center><p>'.$text.'</p></center></div>';
}

function success($text){
	echo '<div class="alert alert-success"><center><p>'.$text.'</p></center></div>';
}

function alertSuccess($text){
	?>
	<div id="fermer" style="text-align: center; z-index:1"></div>
	<script type="text/javascript">
		document.getElementById('fermer').innerHTML = '<div class="alert alert-primary" style="color: black; position: fixed; bottom: 15px; left: 0px; opacity: 1"><p><?php echo $text ?></p></div>';
		setTimeout(function(){
			document.getElementById('fermer').innerHTML='';
		},7000);
	</script>
	<?php
}

function displayClients($nom, $email, $adresse, $phone, $pays, $ville, $date, $id){
    include('constants.php');
    ?>
    <div class="col-6 col-md-3" style="padding:20px">
        <div class="row" style="box-shadow:0 2px 4px 0 rgba(0,0,0,0.2); border-bottom-left-radius:5px; border-bottom-right-radius:5px; background:#fff; padding-bottom:20px">
            <div class="col-12" style="padding:15px">
                
                <h5><b>NOM : </b><span style="text-align:right"><?php echo $nom ?></span></h5>
                <h5><b>Email : </b><?php echo $email ?></h5>
                <h5><b>ADRESSE : </b><?php echo $adresse ?></h5>
                <h5><b>TEL : </b><?php echo $phone ?></h5>
                <h5><b>PAYS : </b><?php echo $pays ?></h5>
                <h5><b>VILLE : </b><?php echo $ville ?></h5>
                <h5><b>DATE INSCRIPTION : </b><?php echo substr($date,0,10).' <b>à</b> '.$date ?></h5>
                
                <hr>
            </div>
            <div class="col-12">
                <center>
                    <a href="accueil.php?type=users&edit=true&id=<?php echo $id ?>"><button class="btn btn-primary btn-sm" style="min-width:80%; color:#fff"> Editer</button></a>
                    <br><br>
                    <a href="accueil.php?type=users&delete=true&id=<?php echo $id ?>"><button class="btn btn-dark btn-sm" style="min-width:80%; color:#fff"> Supprimer</button></a>
                </center>
            </div>
        </div>
    </div>
    <?php
}

function displayPme($nom, $email, $desc, $phone, $date, $id, $active){
    include('constants.php');
    ?>
    <div class="col-6 col-md-3" style="padding:20px">
        <div class="row" style="box-shadow:0 2px 4px 0 rgba(0,0,0,0.2); border-bottom-left-radius:5px; border-bottom-right-radius:5px; background:#fff; padding-bottom:20px">
            <div class="col-12" style="padding:15px">
				<?php
				if ($active){
					echo '<span class="badge badge-pill badge-success">PME confirmée</span>';
				}
				else{
					echo '<span class="badge badge-pill badge-danger">Non Confirmée</span>';
				}
				?>
                <h5><b>NOM : </b><span style="text-align:right"><?php echo $nom ?></span></h5>
                <h5><b>Email : </b><?php echo $email ?></h5>
                <h5><b>TEL : </b><?php echo $phone ?></h5>
                <h5><b>DATE INSCRIPTION : </b><?php echo substr($date,0,10).' <b>à</b> '.$date ?></h5>
				<p><?php echo $desc ?></p>
                
                <hr>
            </div>
            <div class="col-12">
                <center>
					<?php
					if (!$active){
						?>
                    	<a href="accueil.php?type=confirmations&setActive=1&pme=<?php echo $id ?>"><button class="btn btn-warning btn-sm" style="min-width:80%; color:#fff">Activer</button></a>
						<?php
					}
					else{
						?>
                    	<a href="accueil.php?type=confirmations&setActive=0&pme=<?php echo $id ?>"><button class="btn btn-success btn-sm" style="min-width:80%; color:#fff">Désactiver</button></a>
						<?php
					}
					?>
					<br><br>
					<a href="<?php echo 'https://'.$domaine.'?q=pme&pme='.$id ?>" target="_blank"><button class="btn btn-primary btn-sm" style="min-width:80%; color:#fff"> Page Officiel</button></a>
                    <br><br>
                    <a href="accueil.php?type=pme&delete=true&id=<?php echo $id ?>"><button class="btn btn-dark btn-sm" style="min-width:80%; color:#fff"> Supprimer</button></a>
                </center>
            </div>
        </div>
    </div>
    
}


function move_article_photo($photo){
	$extension_upload=strtolower(substr(  strrchr($photo['name'], '.')  ,1));
	$name=time();
	$nomphoto=str_replace('','',$name).".".$extension_upload;
	$name="../images/articles/".str_replace('','',$name).".".$extension_upload;
	move_uploaded_file($photo['tmp_name'],$name);
	return $nomphoto;
}

// this is main function of the website


// --this function displays an error--
function error($text){
    echo '<div class="alert alert-warning"><center>'.$text.'</center></div>';
}
// --//this function displays an error--

// --this function displays a success massage--
function success($text){
    echo '<div class="alert alert-success"><center>'.$text.'</center></div>';
}
// --//this function displays a success massage--

// --this function displays a product--
function display_product($id, $title, $photo, $prix){
    include('constants.php');
    $usId = (int) (isset($_SESSION['us_id']))?($_SESSION['us_id']):'0';
    ?>
    <div class="product-display" style="background:#e5e5e5; border-radius:15px; overflow:hidden">
        <a href="?q=produit-details&id=<?php echo $id ?>">
            <div class="photo d-none d-md-block" style="background:url('img/products/<?php echo $photo ?>'); background-size:cover; background-position:center; height:220px; margin-bottom:7px"></div>
            <div class="photo d-md-none" style="background:url('img/products/<?php echo $photo ?>'); background-size:cover; background-position:center; height:150px; margin-bottom:7px"></div>
            
            <div class="infos" style="padding:0px">
                <center>
                    <h5 class="d-none d-md-block"><?php echo $title ?></h5>
                    <h6 class="d-md-none"><?php echo $title ?></h6>
                    <h2 class="d-none d-md-block"><?php echo $prix ?><span style="font-size:16px"><?php echo $devise ?></h2>
                    <h4 class="d-md-none"><?php echo $prix ?><span style="font-size:16px"><?php echo $devise ?></h4>
                </center>
            </div>
        </a>
        <div class="infos" style="padding-bottom:15px">
            <center>
                <button type="button" class="d-none d-md-block btn btn-success myBtn" onclick="addToCart('<?php echo $id ?>', '<?php echo $usId ?>')">+<span class="fa fa-shopping-cart"></span> Ajouter au panier</button>
                <button type="button" class="d-md-none btn btn-success myBtn" onclick="addToCart('<?php echo $id ?>', '<?php echo $usId ?>')">+<span class="fa fa-shopping-cart"></span> panier</button>
            </center>
        </div>
    </div>
    <p></p>
    <?php
}
// --//this function displays a product--


//--------function qui upload une image dans le dossier $dossier du site---------
function move_image($photo, $dossier){
	$extension_upload=strtolower(substr(  strrchr($photo['name'], '.')  ,1));
	$name=time();
	$nomphoto=str_replace('','',$name).".".$extension_upload;
	$name=$dossier."/".str_replace('','',$name).".".$extension_upload;
	move_uploaded_file($photo['tmp_name'],$name);
	return $nomphoto; //retourner le nom de la photo (à sauvegarder dans la base de données)
}
//--------//function qui upload une image dans le dossier $dossier du site---------
?>
