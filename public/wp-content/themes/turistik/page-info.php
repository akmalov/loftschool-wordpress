<?php

/**
 * Template name: info
 */

get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <?php
  $fields = get_fields();
  ?>

  <div class="content">
    <div class="article-title title-page">
      <?php the_title(); ?>
    </div>
    <div class="article-text">
      <img src="<?= $fields['bannerleft']['url'] ?>" alt="Image поста" class="alignleft">
      <?php the_content(); ?>
    </div>
  </div>
<?php endwhile; else : ?>
  <p><?php _e('Ничего не найдено.'); ?></p>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>