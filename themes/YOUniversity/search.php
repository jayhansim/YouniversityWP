<?php get_header() ?>
<?php get_template_part('top-nav'); ?>

    <div class="col-md-8 main">
      <section class="cheatsheet-articles">
        <h1 class="h5 section-title">
          <?php _e('Search Results for'); ?> &ldquo;<?php echo get_search_query(); ?>&rdquo;
        </h1>

        <?php get_template_part('loop','index'); ?>

      </section>
    </div>
    <?php get_sidebar(); ?>

<?php get_footer(); ?>
