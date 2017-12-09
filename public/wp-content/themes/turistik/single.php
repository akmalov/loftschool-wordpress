<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="content">
    <div class="article-title title-page">
        <?php the_title(); ?>
    </div>
    <div class="article-image"><img src="<?php echo getPostImage() ?>" alt="Image поста"></div>
    <div class="article-info">
      <div class="post-date"><?php the_date(); ?></div>
    </div>
    <div class="article-text">
        <?php the_content(); ?>
    </div>
    <div class="article-pagination">
      <div class="article-pagination__block pagination-prev-left">
        <a href="<?php $post = get_adjacent_post(); echo get_permalink($post); ?>" class="article-pagination__link">
          <i class="icon icon-angle-double-left"></i>
          Предыдущая статья</a>
        <div class="wrap-pagination-preview pagination-prev-left">
          <div class="preview-article__img"><img src="img/1.jpg" class="preview-article__image"></div>
          <div class="preview-article__content">
            <div class="preview-article__info"><a href="#" class="post-date"><?php echo date('d.m.Y', strtotime($post->post_date)); ?></a></div>
            <div class="preview-article__text"><?php echo $post->post_title ?></div>
          </div>
        </div>
      </div>
      <div class="article-pagination__block pagination-prev-right">
        <a href="<?php $post = get_adjacent_post(false, '', false); echo get_permalink($post); ?>" class="article-pagination__link">Следующая
          статья<i class="icon icon-angle-double-right"></i></a>
        <div class="wrap-pagination-preview pagination-prev-right">
          <div class="preview-article__img"><img src="img/2.jpg" class="preview-article__image"></div>
          <div class="preview-article__content">
            <div class="preview-article__info"><a href="#" class="post-date"><?php echo date('d.m.Y', strtotime($post->post_date)); ?></a></div>
            <div class="preview-article__text"><?php echo $post->post_date; ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <?php
    $fields = get_fields();
    $url = $fields['banner']['url'];
    ?>
  <img src="<?= $url ?>" width="100px" height="100px">
  <div>
    Цена: <?= $fields['price'] ?>
  </div>


<?php endwhile; else : ?>
  <p><?php _e('Ничего не найдено.'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>