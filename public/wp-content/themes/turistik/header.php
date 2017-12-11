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
            <a href="/">
              <img
                  src="<?php echo get_template_directory_uri() . '/img/logo.svg'; ?>"
                  alt="Логотип" class="logo-wrap__logo-img">
            </a>
          </div>
        </div>
        <nav class="main-navigation">
            <?php wp_nav_menu([
                'container' => false,
                'menu_class' => 'nav-list'
            ]); ?>
        </nav>
      </div>
    </div>
    <div class="bottom-header">
      <div class="search-form-wrap">
        <form class="search-form" action="<?php bloginfo( 'url' ); ?>" method="get">
          <input type="text" placeholder="Поиск..." name="s" id="search" class="search-form__input" value="<?php if(!empty($_GET['s'])){echo $_GET['s'];}?>">
          <input type="submit" value="Найти"/>
        </form>
      </div>
    </div>
  </header>
  <!-- header_end-->
  <div class="main-content">
    <div class="content-wrapper">
