<?php

/**
 * Template name: actions
 */

get_header(); ?>
  <div class="content">
    <h1 class="title-page">Последние акции</h1>
    <div class="posts-list">
      <?php
      $query = query_posts("post_type=akcia");
      ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php
        $fields = get_fields();

        $url = $fields['banner']['url'];
        $excerpt = $fields['excerpt'];

        ?>
        <div class="post-wrap">
          <div class="post-thumbnail"><img src="<?= $url ?>" alt="Image поста"
                                           class="post-thumbnail__image"></div>
          <div class="post-content">
            <div class="post-content__post-info">
              <div class="post-date"><?php the_date(); ?></div>
            </div>
            <div class="post-content__post-text">
              <div class="post-title">
                <?php the_title(); ?>
              </div>
              <p>
                <?= $excerpt ?>
              </p>
            </div>
            <div class="post-content__post-control"><a href="<?php the_permalink(); ?>" class="btn-read-post">Читать
                далее >></a></div>
          </div>
        </div>
      <?php endwhile; else : ?>
        <p><?php _e('Ничего не найдено.'); ?></p>
      <?php endif; ?>
    </div>
  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>