<?php

/**
 * Template name: news
 */

get_header(); ?>
  <div class="content">
    <h1 class="title-page">Новости</h1>
    <div class="posts-list">
      <?php
      $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $params = [
          'posts_per_page' => 10,
          'post_type' => ['post'],
          'paged' => $page
      ];
      $posts = query_posts($params);
      ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php
        $fields = get_fields();
        ?>
        <div class="post-wrap">
          <?php if($fields['banner']['url']) : ?>
          <div class="post-thumbnail"><img src="<?= $fields['banner']['url'] ?>" alt="Image поста"
                                           class="post-thumbnail__image"></div>
          <?php endif; ?>
          <?php if(!$fields['banner']['url']) : ?>
            <div class="post-thumbnail"><img src="<?php echo getPostImage() ?>" alt="Image поста"
                                             class="post-thumbnail__image"></div>
          <?php endif; ?>
          <div class="post-content">
            <div class="post-content__post-info">
              <div class="post-date"><?php echo date('d.m.Y', strtotime($post->post_date)); ?></div>
            </div>
            <div class="post-content__post-text">
              <div class="post-title">
                <?php the_title(); ?>
              </div>
              <p>
                <?= the_excerpt(); ?>
              </p>
            </div>
            <div class="post-content__post-control"><a href="<?php the_permalink(); ?>" class="btn-read-post">Читать
                далее >></a></div>
          </div>
        </div>
      <?php endwhile;

        add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
        function my_navigation_template($template, $class)
        {
          return '
            <nav class="navigation %1$s" role="navigation">
              <div class="pagenavi-post-wrap">%3$s</div>
            </nav>
            ';
        }

        the_posts_pagination(array(
            'mid_size' => 2,
            'prev_next' => true,
            'prev_text' => __('«'),
            'next_text' => __('»'),
        ));
        wp_reset_postdata();
        wp_reset_query();?>
      <?php else : ?>
        <p><?php _e('Ничего не найдено.'); ?></p>
      <?php endif; ?>
    </div>
  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>