<?php get_header() ?>
<?php get_template_part('top-nav'); ?>

    <div class="col-md-8 main">
      <section class="cheatsheet-articles">
        <h1 class="h5 section-title">
          <?php
            $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            if ($term) {
              echo $term->name;
            } elseif (is_day()) {
              printf(__('Daily Archives: %s', 'roots'), get_the_date());
            } elseif (is_month()) {
              printf(__('Monthly Archives: %s', 'roots'), get_the_date('F Y'));
            } elseif (is_year()) {
              printf(__('Yearly Archives: %s', 'roots'), get_the_date('Y'));
            } elseif (is_author()) {
              global $post;
              $author_id = $post->post_author;
              printf(__('Author Archives: %s', 'roots'), get_the_author_meta('user_nicename', $author_id));
            } else {
              single_cat_title('Cheat Sheets in ');
            }
          ?>
        </h1>

        <?php get_template_part('loop','index'); ?>

      </section>
    </div>
    <?php get_sidebar(); ?>

<?php get_footer(); ?>
