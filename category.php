<?php
//Category page template
get_header();
?>
<section id="news-articles">
    <h2>Explore our blog Posts </h2>
    <?php
    if (have_posts()) :
        while (have_posts()) :
    ?>
            <article>

                <?php
                the_post();
                if (has_post_thumbnail()) {
                ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        the_post_thumbnail('custom-size');
                        ?>
                    </a>
                <?php
                } else {
                    // using a default picture if the thumbnail is missing
                ?>
                    <img width="350" height="250" src="<?php bloginfo('template_directory'); ?>/images/placeholder.jpg" alt="<?php the_title(); ?>" />
                <?php
                }
                ?>
                <h3><?php the_title(); ?></h3>
                <h4><?php echo get_the_date(); ?></h4>
                <?php
                the_excerpt();
                ?>

                <?php
                echo get_avatar(get_the_author_meta('ID'), 32);

                ?>
                <h5><?php echo get_the_author(); ?></h5>

            </article>
    <?php
        endwhile;
    endif;
    ?>

</section>
<?php
get_footer();
?>