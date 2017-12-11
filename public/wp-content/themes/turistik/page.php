<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="content">
    <h1 class="title-page"><?php the_title(); ?></h1>
    <p><img src="<?php echo getPostImage() ?>" alt="Image" class="alignleft"></p>
    <p><?php the_content(); ?></p>
  </div>
<?php endwhile; else : ?>
  <p><?php _e('Ничего не найдено.'); ?></p>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
