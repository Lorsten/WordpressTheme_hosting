<?php
/*
  Template Name: Control-page
  */
get_header();

?>
      <section id="user-nav">
      <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
            <nav>
            <?php
            wp_nav_menu(array(
                    'container' => '', // Leaving it empty removes the <div> container.
                    'menu_class'      => 'user-menu',
                    'theme_location' => 'user-menu'
                  
                ));
                ?>
            </nav>
        </section>
        <section id="user-page">
        <h2><?php echo get_the_title() ?></h2>
    <?php
    if (have_posts()) :
      while (have_posts()) :

        the_post();
        the_content();
      endwhile;
    endif;
    ?>
</section>

<?php
get_footer();
?>