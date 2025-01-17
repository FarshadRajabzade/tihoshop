<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon -->
    <!--    <link rel="icon" type="image/png" href="../../assets/images/logos/fashion-1-fav.png">-->
    <!--Flat Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!--AOS CSS-->

    <?php wp_head() ?>

</head>

<body class="ts-body">


<div class="container">

    <?php
//    var_dump(ts_option('ts_top_info_bar'));
    if (ts_option('ts_top_info_bar') == true){
        get_template_part('includes/elementor/ts_info_bar');
    }

    get_template_part('includes/templates/default-header');
 ?>

