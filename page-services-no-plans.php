<?php
/*
  Template Name: Services - no plans
  */
get_header();

?>
 <section id="services">
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