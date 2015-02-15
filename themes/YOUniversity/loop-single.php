<?php if(is_single()){
  $wrapper = 'cheatsheet-article';
} elseif (is_page()) {
  $wrapper = 'cheatsheet-page';
} ?>

<section class="<?php echo $wrapper ?>">

  <?php /* begin loop */ while (have_posts()) : the_post(); ?>
  <?php
    $classes = array(
      'article', 'article-single'
    );
  ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
    <header class="article-header">
      <h1 class="article-title">
        <?php the_title(); ?>
      </h1>
      <?php if(!is_page()): ?>
      <div class="postmeta">
        <?php if(is_attachment()): ?>
          <?php the_time( 'j F Y'); ?>
          <?php else: ?>
          <?php the_time( 'j F Y') ?> in <span class="postmeta-categories"><?php printf(get_the_category_list(', ')); ?></span>
        <?php endif; ?>

      </div>
      <?php endif; ?>
    </header>
    <div class="article-content">
      <?php the_content(); ?>
    </div>
    <?php if(is_single()): ?>
    <div class="article-footer">
      <div class="author">
        <img src="<?php echo the_author_image_url(); ?>" alt="" class="author-avatar">
        <div class="author-content">
          <p>Written by:</p>
          <h4 class="author-name h2"><?php the_author(); ?></h4>
          <?php the_author_meta('description'); ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  </article>

  <?php endwhile; /* End loop */ ?>

  <?php if(!have_posts()) { ?>
    <div class="col-xs-12">
      <div class="alert alert-info">Sorry, no cheat sheets were found.</div>
    </div>
  <?php } ?>



</section>

