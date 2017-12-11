<?php

/**
 * Template name: service
 */

get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="content">
        <h1 class="title-page"><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
<?php endwhile; else : ?>
    <p><?php _e('Ничего не найдено.'); ?></p>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

