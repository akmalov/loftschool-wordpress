<?php get_header(); ?>
  <div class="content">
    <h1 class="title-page">Результаты поиска</h1>
    <div class="posts-list">
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
              <div class="post-date"><?php the_date(); ?></div>
            </div>
            <div class="post-content__post-text">
              <div class="post-title">
                <?php the_title(); ?>
              </div>
              <?php if($fields['excerpt']) : ?>
                <p>
                  <?= $fields['excerpt']; ?>
                </p>
              <?php endif; ?>
              <?php if(!$fields['excerpt']) : ?>
                <p>
                  <?php the_excerpt(); ?>
                </p>
              <?php endif; ?>
            </div>
            <div class="post-content__post-control"><a href="<?php the_permalink(); ?>" class="btn-read-post">Читать
                далее >></a></div>
          </div>
        </div>
      <?php endwhile; else : ?>
        <p><?php _e('Ничего не найдено.'); ?></p>
      <?php endif; ?>
      <?php
      echo get_the_posts_pagination();
      wp_reset_postdata();
      wp_reset_query();
      ?>
    </div>
  </div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>