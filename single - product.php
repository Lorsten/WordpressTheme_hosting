<?php
/*
  /* Template Name: Product post * Template Post Type: post*/
get_header( );
?>
<section id="product-section">
   <?php
   if (have_posts()) :
      while (have_posts()) :
   ?>
         <article>
      <?php
         echo "<h3>" . get_the_title() . "</h3>";
         the_post();
         the_content();
      endwhile;
   endif;
      ?>
         </article>



         
</section>

<?php
get_footer();
?>