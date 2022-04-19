<?php
session_start();

include('includes/constants.php');
include('includes/db.php');
?>


<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Admin <?php echo $nom_site ?></title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/icon-logo.png" type="text/css" media="all" />
	<?php
	//-----------permet de reconnaitre le client--------------
	if (isset($_SESSION['ad_nom']) and isset($_SESSION['ad_id'])){
		$ad_nom=$_SESSION['ad_nom'];
		$ad_id=$_SESSION['ad_id'];
	}
	else{
		$ad_nom = $nom_site;
		$ad_id = 0;
	}
	//-----------//permet de reconnaitre le client--------------
	//$ad_id=1;
	if ($ad_id<=0){ //chassez le
		?><script>window.location.href="index.php";</script><?php
	}
	?>
</head>

<body class="sidebar-menu-collapsed">
  <div class="se-pre-con"></div>
<section>
  <!-- sidebar menu start -->
  <div class="sidebar-menu sticky-sidebar-menu">
	  
    <!-- image logo -->
    <div class="logo">
      <a href="index.php">
	  <img src="img/logo-linkpme.jpg" class="logoToMoveOnScroll" alt="LOGO">
      </a>
    </div>
    <!-- //image logo -->

    <div class="logo-icon text-center">
		<span style="color:#fff"><?php echo $acronyme_site ?></span>
    </div>
    <!-- //logo end -->

    <div class="sidebar-menu-inner">

      <!-- sidebar nav start -->
      <ul class="nav nav-pills nav-stacked custom-nav">
        
        
        <li><a href="accueil.php?type=Voies"><i class="fa fa-road"></i> <span>Voies</span></a></li>
        <li><a href="accueil.php?type=admins"><i class="fa fa-user-circle icon"></i> <span title="Profiles des administrateurs">Admins</span></a></li>
      </ul>
      <!-- //sidebar nav end -->
      <!-- toggle button start -->
      <a class="toggle-btn">
        <i class="fa fa-angle-double-left menu-collapsed__left"><span>Réduire</span></i>
        <i class="fa fa-angle-double-right menu-collapsed__right"></i>
      </a>
      <!-- //toggle button end -->
    </div>
  </div>
  <!-- //sidebar menu end -->
  <!-- header-starts -->
  <div class="header sticky-header">

    <!-- notification menu start -->
    <div class="menu-right">
      <div class="navbar user-panel-top">
        <div class="search-box">
          <h5>Bienvenue sur la page administrateur de  <?php echo $nom_site ?></h5>
        </div>
        <div class="user-dropdown-details d-flex">
          <div class="profile_details_left">
            
        
              
            </ul>
          </div>
          <div class="profile_details">
            <ul>
              <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3" aria-haspopup="true" aria-expanded="false">
                  <div class="profile_img">
                    <span class="fa fa-user" style="font-size:30px"></span>
                    <div class="user-active">
                      <span></span>
                    </div>
                  </div>
                </a>
                <ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">
					<?php
					$query=$db->prepare('SELECT * FROM admins ORDER BY ad_id DESC');
					$query->execute();
					while ($data=$query->fetch()){
						?>
						  <li class="user-info">
							  <a href="accueil.php?type=admins">
								<h5 class="user-name"><?php echo $data['ad_nom'] ?></h5>
								<?php
								if ($data['ad_co']){ ?>
									<span class="status ml-2 fa fa-dot-circle-o" style="color:lime"></span>
									<?php
								}else{ ?>
									<span class="status ml-2 fa fa-dot-circle-o" style="color:red"></span>
									<?php

								} ?>
							  </a>
							  <?php
							if ($data['ad_id']==$ad_id){
								?>
							    <div style="background:#fff; padding:7px">
							  	<a href="accueil.php?type=admins"><i class="lnr lnr-user"></i>Mon Profile</a><br>
							  	<a href="accueil.php?type=admins"><i class="lnr lnr-cog"></i>Paramètres</a><br>
								<span href="deco.php" class="logout"> <a href="deco.php"><i class="fa fa-power-off"></i> Deconnexion</a></span>
								</div>
							  	<?php
							}
							?>
						  </li>
						<?php
					}
					?>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--notification menu end -->
  </div>
  <!-- //header-ends -->
  <!-- main content start -->
<div class="main-content">

  <!-- content -->
  <div class="container-fluid content-top-gap">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Connecté(e) en tant que <span class="text-primary"><?php echo $ad_nom ?></span>, Bienvenue !</li>
      </ol>
    </nav>

	  <?php
	$type=(isset($_GET['type']))?(htmlspecialchars($_GET['type'])):'';
			
	switch($type){
		default:
			?>
			<!-- statistics data -->
			
			<!-- //statistics data -->

			
			

				

	  		<?php
		break;
			
    case 'Voies':
			include('Voies.php');
		break;
    

            
		case 'admins':
			include('admins.php');
		break;
	} //end of switch($type)
	  ?>
	  
	  
  </div>
  <!-- //content -->
</div>
<!-- main content end-->
</section>
	
  <!--footer section start-->
<footer class="dashboard">
  <p>&copy 2021 <?php echo $nom_site ?>. All Rights Reserved | <a href="mailto:jose.init.dev@gmail.com" target="_blank" style="font-size:9px">By Josué</a></p>
</footer>
<!--footer section end-->
<!-- move top -->
<button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button>
<script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("movetop").style.display = "block";
    } else {
      document.getElementById("movetop").style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>
<!-- /move top -->


<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery-1.10.2.min.js"></script>

<script src="assets/js/Chart.min.js"></script>
<script>
	var donnees1=[];
	var donnees2=[];
</script>








<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/scripts.js"></script>

<!-- close script -->
<script>
  var closebtns = document.getElementsByClassName("close-grid");
  var i;

  for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function () {
      this.parentElement.style.display = 'none';
    });
  }
</script>
<!-- //close script -->

<!-- disable body scroll when navbar is in active -->
<script>
  $(function () {
    $('.sidebar-menu-collapsed').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll when navbar is in active -->

 <!-- loading-gif Js -->
 <script src="assets/js/modernizr.js"></script>
 <script>
     $(window).load(function () {
         // Animate loader off screen
         $(".se-pre-con").fadeOut("slow");;
     });
 </script>
 <!--// loading-gif Js -->
	
<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>

<script>
	// document.querySelector('.toggle-btn').click();
	document.querySelector('.menu-collapsed__left').click();
</script>

</body>

</html>