<?php
get_header();
?>
<?php
$category = get_cat_ID("Blog");
$cat_id = $category->cat_ID;
?>
<section id="nav-bread">
   <!--Breadcrumb navigation --->
   <ul>
      <li><a href="<?php echo home_url(); ?>">Home ></a></li>
      <li><a href="<?php echo esc_url(get_category_link($category)); ?>">Blogposts ></a></li>
      <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
   </ul>
   </section>
<div id="image-background">
   <?php
   // Get the post thumbnail with the $post-ID
   $_post = get_queried_object();
   if (has_post_thumbnail()) {
      echo get_the_post_thumbnail($_post->ID, 'large-post');
   }
   ?>
</div>
<section id="main-article">
   <?php
   if (have_posts()) :
      while (have_posts()) :
   ?>
         <article>
      <?php
         echo "<h3>" . get_the_title() . "</h3>";
         echo "<h4>" . get_the_date() . "</h4>";
         the_post();
         the_content();
      endwhile;
   endif;
      ?>
         </article>
         <div id="author-info">
         <h4>Author</h4>
         <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
         <h5><?php echo get_the_author() ?></h5>
         </div>

         
</section>
<section id="sidebar-post">
   <h3>Recent news</h3>
   <?php
   //Get the 2 most recent posts using the id of the category
   $cat_id = get_cat_ID ( 'blog' ); 
   $recent_posts = wp_get_recent_posts(array(
      'category'     => $cat_id,
      'numberposts'  => 2,
      'orderby'      => 'post_date',
      'order'        => 'DESC',
      'post_status'  => 'publish'
   ));
   // Using a foreach loop to loop through all posts
   foreach ($recent_posts as $posts) : ?>
      <article>
         <a href="<?php echo get_permalink($posts['ID']) ?>">
            <?php echo get_the_post_thumbnail($posts['ID'], 'small-size'); ?>
         </a>
         <h4><?php echo $posts['post_title'] ?></h3>
         <h4><?php echo the_time(get_option('date_format'))?></h4>
         <p><?php echo wp_trim_words($posts['post_content'], 7, '.') ?></p>
      </article>
   <?php endforeach;
   wp_reset_query(); ?>
</section>
<?php
get_footer();
?>