<?php
/*
  Template Name: register-user
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
    <div class="half-width-container">
    <label for="Name">Name</label>
    <input type="text" placeholder="name..." id="Name">
    <label for="lastname">Last name</label>
    <input type="text" placeholder="Lastname..." id="lastname">
    <label for="Email">Last name</label>
    <input type="text" placeholder="Email..." id="Email">
    </div>
    <div class="half-width-container">
    <label for="username">Username</label>
    <input type="text" placeholder="Username..." id="username">
    <label for="subject">Password</label>
    <input type="password" placeholder="Password..." id="subject">
    </div>
    <input type="submit" value="Submit">
</form>
    <a href="signup.html">
      <h3>Already got a account? </h3>
    </a>
</section>
<?php
get_footer();
?>