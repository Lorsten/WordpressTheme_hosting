<?php
/*
  Template Name: Services
  */
get_header();

?>
 <section id="services">
 <section id="articles">
      <h2>Get started with one of our packages </h2>
      <?php
      global $post;
      $cat_id = get_cat_ID('Products-plans');
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
      wp_reset_postdata(); ?>
         <div class="button-center">
                <a href="">Compare plans</a>
            </div>
    </section>

    <?php
    if (have_posts()) :
      while (have_posts()) :

        the_post();
        the_content();
      endwhile;
    endif;
    ?>
    <section id="form-domain">
<form>
    <input type="text" id="domain" placeholder="www.yourname.com">
    <input type="submit" value="find">
</form>
</section>
</section>

<?php
get_footer();
?>