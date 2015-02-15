<div class="articles articles-list" >

  <?php /* begin loop */ while (have_posts()) : the_post(); ?><?php $classes = array('article', 'col-sm-6'); ?><article id="post-<?php the_ID(); ?>" <?php post_class(/*$classes*/); ?>>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <?php /* getting the post thumbnail */
      if (has_post_thumbnail()) {
        the_post_thumbnail('article-thumbnail', array('class'=> 'featured-image'));
      }
    ?>
    </a>
    <div class="article-content">
      <h3 class="article-title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
      </h3>
      <div class="postmeta">
        <?php the_time( 'j F Y') ?> in <span class="postmeta-categories"><?php printf(get_the_category_list(', ')); ?></span>
      </div>
      <?php the_excerpt(); ?>
    </div>
  </article><?php endwhile; /* End loop */ ?>

  <?php if(!have_posts()) { ?>
    <div class="col-xs-12">
      <div class="alert alert-info">Sorry, no cheat sheets were found.</div>
    </div>
  <?php } ?>



</div>

<?php youniversity_numeric_posts_nav(); ?>

