<?php
/*
Template name: Message Form
*/
?>
<?php get_header(); ?>
  <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://www.pngall.com/wp-content/uploads/10/Message-Logo-PNG.png" alt="" width="72" height="72">
        <h2><?php the_title(); ?></h2>
        <p class="lead">Send your messages immediately, from any browser or device it is not necessary to have a telephone plan, you only need internet.</p>
      </div>

      <div class="row">
        
        <div class="col">
          
        <?php the_content(); ?>
        

        </div>
      </div>
  </div>
<?php get_footer(); ?>