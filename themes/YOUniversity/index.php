<?php get_header() ?>
<?php get_template_part('top-nav'); ?>


    <!-- Featured CheatSheet -->
    <div class="col-xs-12">
      <section class="cheatsheet-featured">
        <h5 class="section-title">
          Featured Cheat Sheets
        </h5>

        <div class="featured-slider">

          <?php $original_query = $wp_query;
                $wp_query = null;
                $args=array('posts_per_page'=>5, 'tag' => 'featured');
                $wp_query = new WP_Query( $args );
                if (have_posts()):
                  while (have_posts()) : the_post();
          ?>
          <div class="featured-slider-wrapper">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php /* getting the featured post thumbnail */
              if (has_post_thumbnail()):
                the_post_thumbnail('featured-article-thumbnail',
                                    array('class'=> 'featured-image'));
              endif;
            ?>
            </a>

            <div class="featured-content">
              <h2 class="article-title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                  <?php the_title(); ?>
                </a>
              </h2>
              <div class="postmeta">
                <span class="postmeta-categories">
                  <?php printf(get_the_category_list(', ')); ?>
                </span>
              </div>
              <?php the_excerpt(); ?>
            </div>
          </div>
          <?php endwhile;
                else:
          ?>
            <div class="alert alert-info">No featured post</div>
          <?php endif;
                $wp_query = null;
                $wp_query = $original_query;
                wp_reset_postdata();
          ?>

        </div>
      </section>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 main">
      <section class="cheatsheet-articles">
        <h5 class="section-title">
          Latest Cheat Sheets
        </h5>

        <?php get_template_part('loop','index'); ?>

      </section>
    </div>
    <?php get_sidebar(); ?>

<?php get_footer(); ?>
