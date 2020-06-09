<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tyristik
 */

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Главная страница</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php wp_head(); ?>
</head>
<body>
<div class="wrapper">
    <header class="main-header">
        <div class="top-header">
            <div class="top-header__wrap">
                <div class="logotype-block">
                    <div class="logo-wrap">
                        <a href="<?php bloginfo('url') ?>">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.svg"
                                 alt="<?php bloginfo('name'); ?>" class="logo-wrap__logo-img">
                        </a>
                    </div>
                </div>
                <nav class="main-navigation">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'top',
                            'container' => 'ul',
                            'menu_class' => 'nav-list',
                        ));
                    ?>
                </nav>
            </div>
        </div>
        <div class="bottom-header">
            <div class="search-form-wrap"><?php get_search_form(); ?></div>
        </div>
    </header>
    <!-- header_end-->