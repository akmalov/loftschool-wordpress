<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <?php
  $fields = get_fields();
  ?>
  <?php
  $prev = getAdjacentPost('prev', array('post'));
  $next = getAdjacentPost('next', array('post'));
  ?>
  <div class="content">
    <div class="article-title title-page">
        <?php the_title(); ?>
    </div>
    <?php if($fields['banner']['url']) : ?>
      <div class="post-thumbnail"><img src="<?= $fields['banner']['url'] ?>" alt="Image поста"
                                       class="post-thumbnail__image"></div>
    <?php endif; ?>
    <?php if(!$fields['banner']['url']) : ?>
      <div class="article-image"><img src="<?php echo getPostImage() ?>" alt="Image поста"></div>
    <?php endif; ?>
    <div class="article-info">
      <div class="post-date"><?php the_date(); ?></div>
    </div>
    <div class="article-text">
        <?php the_content(); ?>
    </div>
    <br><br>
    <?php if(!$prev) : ?>
      <div style="justify-content: flex-end" class="article-pagination">
    <?php endif; ?>

    <?php if($prev) : ?>
    <div class="article-pagination">
    <?php endif; ?>

    <?php if($prev) : ?>
      <?php $fields = get_fields($prev->ID); ?>
      <div class="article-pagination__block pagination-prev-left">
        <a href="<?php echo get_permalink($prev->ID); ?>" class="article-pagination__link">
          <i class="icon icon-angle-double-left"></i>
          Предыдущая статья</a>
        <div class="wrap-pagination-preview pagination-prev-left">
          <div class="preview-article__img">
            <img src="<?= $fields['banner']['url'] ?>" class="preview-article__image">
          </div>
          <div class="preview-article__content">
            <div class="preview-article__info"><a href="<?php echo get_permalink($prev->ID); ?>" class="post-date"><?php echo date('d.m.Y', strtotime($prev->post_date)); ?></a></div>
            <div class="preview-article__text"><?php echo $prev->post_title ?></div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if($next) : ?>
      <?php $fields = get_fields($next->ID); ?>
      <div class="article-pagination__block pagination-prev-right">
        <a href="<?php echo get_permalink($next->ID); ?>" class="article-pagination__link">Следующая
          статья<i class="icon icon-angle-double-right"></i></a>
        <div class="wrap-pagination-preview pagination-prev-right">
          <div class="preview-article__img">
            <img src="<?= $fields['banner']['url'] ?>" class="preview-article__image"></div>
          <div class="preview-article__content">
            <div class="preview-article__info"><a href="<?php echo get_permalink($prev->ID); ?>" class="post-date"><?php echo date('d.m.Y', strtotime($next->post_date)); ?></a></div>
            <div class="preview-article__text"><?php echo $next->post_title; ?></div>
          </div>
        </div>
      </div>
    <?php endif; ?>
    </div>
    </div>
  <?php endwhile; else : ?>
    <p><?php _e('Ничего не найдено.'); ?></p>
  <?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>