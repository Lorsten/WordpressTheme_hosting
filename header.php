<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/hamburgers.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
    <title><?php bloginfo('name') ?></title>
    <?php wp_head(); ?>
</head>

<body>

    <header>

        <?php
            // If page is category or a post use the custom iamge
             if (is_category() || is_single()) {
              // Add a custom header image
                 if (get_header_image()) : ?>
                   <img src="<?php header_image(); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
        <?php endif;
        }
          // else if the page has a featured image use it as header image
           elseif (has_post_thumbnail($post->ID)) {
               $url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
               $alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
            ?>
            <img src='<?php echo $url[0]; ?>' alt="<?php echo $alt; ?>">
            <?php
            // else Add a custom header image
        } else {
            if (get_header_image()) : ?>
                <img src="<?php header_image(); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
        <?php endif;
        } ?>
        <!-- min-width for header-->
        <div id="header_container">
            <!-- position fixed for menu -->
            <div id="header-bar">
                <div id="header-bar-max">
                <?php
              // Allow user to add a logo, if the logo doesn't exist use the site title
               the_custom_logo();
               ?>
               <a href="<?php echo home_url(); ?>">
                <h1><?php bloginfo('name'); ?></h1>
            </a>

            <!--Hamburger menu icon-->
            <button class="hamburger" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        
            <nav>
                <a href=<?php echo home_url(); ?>>
                    <h2><?php bloginfo('name') ?></h2>
                </a>
                <?php
                // Add a menu to the header
                wp_nav_menu(array(
                    'container' => '', // Leaving it empty removes the <div> container.
                    'menu_class'      => 'main-menu',
                    'theme_location' => 'main-menu'
                ));
                ?>
            </nav>
            </div>
            </div>
            <!-- Start of widget area-->
            <?php if (is_active_sidebar('header-widget')) : ?>
                <?php dynamic_sidebar('header-widget'); ?>
            <?php endif; ?>
            <!-- widget area end-->
        </div>
        <!-- Add svg shape to slice the header !-->
        <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon fill="white" points="0,100 100,0 100,100" />
        </svg>
    </header>
    <!-- start of wrapper-->
    <div id="wrapper">