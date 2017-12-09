<?php
/**
 * Template name: news
 */

get_header(); ?>
<div class="content">
    <h1>Новости</h1>
    <ul>
    <?php
    $query = query_posts("post_type=post");
    ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <li><?php the_title(); ?></li>
    <?php endwhile; else : ?>
      <p><?php _e('Ничего не найдено.'); ?></p>
    <?php endif; ?>
    <?php
      echo get_the_posts_pagination();
      wp_reset_postdata();
      wp_reset_query();
    ?>
    <h1>Акции</h1>
    <?php
    $query = query_posts("post_type=akcia");
    ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <li><?php the_title(); ?></li>
    <?php endwhile; else : ?>
      <p><?php _e('Ничего не найдено.'); ?></p>
    <?php endif; ?>
    <?php
    wp_reset_postdata();
    wp_reset_query();
    ?>
    </ul>
</div>

<?php get_footer(); ?>
