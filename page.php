<?php
get_header();
?>
  <section id="content">
<?php
if (have_posts()) :
   ?>

   <?php
   while (have_posts()) :
      the_post();
      the_content();
      ?>
  
      <?php
   endwhile;
endif;

?>
</section>
<?php
get_footer(); 
?>