<?php
  include './be/conexion.php';
  
  //$query = "INSERT INTO lista_regalos (gift) VALUES('Heladera')";
  //$conexionDB->exec($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Invite | Invitaciones Online</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Invitaciones online para eventos" />
  <meta name="keywords" content="invitacion online, casamiento, quince, invitacion, evento, invitacion para evento" />
<meta name="author" content="Ezequiel Estigarribia" />
<meta name="image" content="https://www.blur.com.ar/wp-content/uploads/2019/07/mockup-invitaciononline-1024x478.png" />

<meta property="og:title" content="Invite" />
<meta property="og:type" content="Invitaciones Online" />
<meta property="og:url" content="http://www.invite.blur.com/" />
<meta property="og:image" content="https://www.blur.com.ar/wp-content/uploads/2019/07/mockup-invitaciononline-1024x478.png" />
<meta property="og:description" content="Invitaciones online para eventos" />

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css">


<!-- Custom styles for this template -->
<link href="css/new-age.min.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="favicon.png"/>

<!-- DINAMIC-->
<link rel="stylesheet" href="vendor/owl-carousel/assets/owl.carousel.min.css" />


</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">Invite</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#nosotros">nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#informacion">información</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#video">video</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#fotos">fotos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#asistencia">asistencia</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<header class="masthead-admin">
    <div class="container">
        <div class="row">
        <div class="col-lg-12 my-auto">
            <div class="header-content mx-auto  text-center">
                <h1 class="mb-5">JOAQUIN Y MELISA <i class="fas fa-heart"></i></h1>
             <h3 class="mb-5">ADMINISTRACION</h3>
            </div>
        </div>
        </div>
    </div>
</header>

<section class="table-gift-admin bg-primary text-center" id="tableGift">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mx-auto">

        <button class="btn" onclick="addGift()">Agregar regalo</button>
        <div class="table-container">
          <h3>Regalos realizados por los invitados</h3>
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th>Regalo</th>
                <th>Realizado por</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $query = "SELECT id, gift, gifted, gifted_by FROM lista_regalos WHERE gifted = 1";
              
                $gifts = $conexionDB->query($query);
              ?>
              <?php foreach($gifts as $gift) {?>
              <tr>
                <td><?php echo $gift['gift']; ?></td>
                <td><?php echo $gift['gifted_by']; ?></td>
                <td>
                  <button class="btn" onclick=freeGift(<?php echo $gift['id']; ?>)>Liberar</button>
                </td> 
              </tr>
              <?php }?>  
            </tbody>
          </table>
        </div>
       
        <div>
          <h3>Regalos sin confirmar</h3>
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th>Regalo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $query = "SELECT id, gift, gifted FROM lista_regalos WHERE gifted = 0";

                $gifts = $conexionDB->query($query);
              ?>
              <?php foreach($gifts as $gift) {?>
                <tr>
                  <td><?php echo $gift['gift']; ?></td>
                  <td>
                    <button class="btn" onclick=editGift(<?php echo $gift['id']; ?>)>Editar</button>
                    <button class="btn" onclick=deleteGift(<?php echo $gift['id']; ?>)>Eliminar</button>
                  </td>
                </tr>
              <?php }?>   
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>





<footer>
<div class="container">
    <p>&copy; Invite 2019 | <a href="http://www.invite.blur.com.ar/">invite.blur.com</a></p>
</div>
</footer>


<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/simplycountdown/simplyCountdown.min.js"></script>
  <script src="vendor/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>


  <script>
    function addGift() {
      $.ajax({
          method: "POST",
          url: "./be/send-gift.php",
          data: formData
        })
      .done(function( res ) {
        res = JSON.parse(res);
        if (res.thereIsError == false) {
            $('.gift-response').html('Regalo agregado con éxito');
        } else {
            $('.gift-response').html('Error, intentelo nuevamente');
        }
      })
      .fail(function (res) {
          $('.gift-response').html('Error de servidor, intentelo nuevamente más tarde');
      });
    }

   function freeGift(idGift) {
    console.log('free ', idGift)
   }

   function deleteGift(idGift) {
    console.log('delete ', idGift)
   }

   function editGift(idGift) {
    console.log('edit ', idGift)
   }
  </script>


<script>
    $(document).ready(function(){
      $('.owl-carousel').owlCarousel({
        items: 1
      });
    });
  </script>
</body>
</html>