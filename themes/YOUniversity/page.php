<?php get_header() ?>
<?php get_template_part('top-nav'); ?>

  <div class="col-md-8 main">
    <?php get_template_part('loop','single'); ?>
  </div>
  <?php get_sidebar(); ?>

<?php get_footer(); ?>
