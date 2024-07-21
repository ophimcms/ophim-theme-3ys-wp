<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/css-mytheme-font.css" type="text/css">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/css-mytheme-ui.css" type="text/css">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/css-mytheme-site.css" type="text/css">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/css-mytheme-color3.css" type="text/css" name="default">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/css-slide.css" type="text/css">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/custom.css" type="text/css">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/css-swiper-bundle.min.css" type="text/css">
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/js-jquery.min.js"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/js-mytheme-site.js"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/js-mytheme-ui.js"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/js-mytheme-cms.js"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/js-swiper-bundle.min.js"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/js-home.js"></script>
</head>
<body class="active">
<?php get_template_part('templates/header') ?>
<?php if(get_option('ophim_is_ads') == 'on') { ?>
<div id=top_addd></div>
<?php } ?>