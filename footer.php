</div>
    <!--Start of footer-->
    <footer>
<div id="footer-container">
        <nav>
            <?php
        wp_nav_menu(array(
                    'container' => '', // Leaving it empty removes the <div> container.
                    'menu_class'      => 'footer_menu',
                    'theme_location' => 'footer_menu'
                  
                ));
                ?>
        </nav>
        <!-- Widget area-->
        <?php 
            if(is_active_sidebar('footer-widget')) : ?>
              <div class="footer-widget">
            <?php dynamic_sidebar( 'footer-widget' ); ?>
            <?php endif; ?>
            </div>
        <h4>&copy; Copyright <?php bloginfo('name');?></h4>
            </div>
    </footer>

   <?php wp_footer(); ?>
</body>

</html>