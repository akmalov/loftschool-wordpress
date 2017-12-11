<?php get_header(); ?>
  <div class="content">
    <h1 class="title-page"><?php single_cat_title(); ?></h1>
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
              <p>
                <?= $fields['excerpt']  ?>
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