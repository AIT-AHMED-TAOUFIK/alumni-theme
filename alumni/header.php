<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta http-equiv="Content-Type" content="text/html;" charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    href="https://fonts.googleapis.com/css2?family=Kufam&family=Plus+Jakarta+Sans&family=Roboto&family=Source+Sans+3&family=Work+Sans&family=SF+Pro&family=Montserrat&display=swap"
    rel="stylesheet">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png">

  <!-- BootStrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" /> -->
  <script src="https://kit.fontawesome.com/a8e0b80ebd.js" crossorigin="anonymous"></script>

  <!-- Swiper & style CSS -->
  <!-- <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css"> -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  
  <?php wp_head(); ?>
</head>

<body>
<?php wp_body_open(); ?>