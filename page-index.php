<?php
/*
  Template Name: Index
  */
get_header();

?>
<section id="main-content">

  <?php
  if (is_active_sidebar('page-widget')) : ?>
    <h2>Why choose us?</h2>
    <section id="top">
      <?php dynamic_sidebar('page-widget'); ?>
    <?php endif; ?>
    </section>
    <section id="articles">
      <h2>Choose one of our plan</h2>
      <?php
      // Get the recent 3 posts in the category 
      global $post;
      $cat_id = get_cat_ID('Product-plans');
      $get_posts = wp_get_recent_posts(array(
        'category'     => $cat_id,
        'numberposts'  => 3,
        'orderby'      => 'post_date',
        'order'        => 'ASC',
        'post_status'  => 'publish'
      ));
      // Using a foreach loop to loop through all posts  
      foreach ( $get_posts as $post) : ?>
        <article class="post">
          <h2><?php echo $post['post_title'] ?></h2>

          <?php echo $post['post_content'] ?>
          <div class="button">
          <a href="<?php echo get_permalink($post['ID']) ?>">Order now</a>
          </div>
        </article>
      <?php endforeach;
      //Restore the $post global to current post
      wp_reset_postdata(); ?>
    </section>

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