<!DOCTYPE html>
<!--[if lte IE 6 ]>
<html class="ie ie6 lte_ie7 lte_ie8" lang="zh-CN"><![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7 lte_ie7 lte_ie8" lang="zh-CN"><![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8 lte_ie8" lang="zh-CN"><![endif]-->
<!--[if IE 9 ]>
<html class="ie ie9" lang="zh-CN"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="zh-CN"><!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/lib/html5/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body>
<div class="wrapper">
    <header class="header" role="banner">
        <hgroup>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        </hgroup>
    </header><!-- header.header -->
    <nav class="menu" id="MENU">
        <ul class="menu-main">
            <li class="menu-main-item menu-main-current">
                <a href="/" class="menu-main-a" title="首页">
                    首页
                </a>
            </li>
            <li class="menu-main-item" data-box="subMenu">
                <a href="javascript:;" class="menu-main-a" title="web前端开发">
                    web前端开发
                    <i class="arrow-down-blue"></i>
                </a>
                <ul class="menu-child">
                    <li class="menu-child-item">
                        <a href="javascript:;" class="menu-child-a">CSS</a>
                    </li>
                    <li class="menu-child-item">
                        <a href="javascript:;" class="menu-child-a">HTML</a>
                    </li>
                    <li class="menu-child-item">
                        <a href="javascript:;" class="menu-child-a">Javascript</a>
                    </li>
                </ul>
            </li>
            <li class="menu-main-item" data-box="subMenu">
                <a href="javascript:;" class="menu-main-a">
                    web后端开发
                    <i class="arrow-down-blue"></i>
                </a>
                <ul class="menu-child">
                    <li class="menu-child-item">
                        <a href="javascript:;" class="menu-child-a">PHP</a>
                    </li>
                    <li class="menu-child-item">
                        <a href="javascript:;" class="menu-child-a">MySQL</a>
                    </li>
                    <li class="menu-child-item">
                        <a href="javascript:;" class="menu-child-a">Linux</a>
                    </li>
                </ul>
            </li>
            <li class="menu-main-item">
                <a href="javascript:;" class="menu-main-a">工具分享</a>
            </li>
            <li class="menu-main-item">
                <a href="javascript:;" class="menu-main-a">生活点滴</a>
            </li>
            <li class="menu-main-item">
                <a href="javascript:;" class="menu-main-a">友情链接</a>
            </li>
            <li class="menu-main-item">
                <a href="javascript:;" class="menu-main-a">关于Jones</a>
            </li>
        </ul>
    </nav><!-- nav.menu -->
    <div class="body">
