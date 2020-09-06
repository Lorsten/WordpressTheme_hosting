<?php
/*
  Template Name: Login-user
  */
get_header();

?> <section id="form-login">
 
<?php
if (have_posts()) :
  while (have_posts()) :

    the_post();
    the_content();
  endwhile;
endif;
?>
 <form action="dashboard.htm" method="post">
    <label for="email">Username</label>
    <input type="text" placeholder="Username..." id="email">
    <label for="subject">Password</label>
    <input type="password" placeholder="Password..." id="subject">
    <a href="">
      <h3>Forgot your password? </h3>
    </a>
    <input type="submit" value="Submit">
</form>
    <a href="signup.html">
      <h3>Create a account </h3>
    </a>
</section>

<?php
get_footer();
?>