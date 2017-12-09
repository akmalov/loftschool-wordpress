<?php get_header(); ?>
  <div class="content">
    <h1 class="title-page">Последние новости и акции из мира туризма</h1>
    <div class="posts-list">
        <?php
        $params = [
            'post_type' => ['post', 'akcia']
        ];
        $posts = query_posts($params);;
        ?>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <div class="post-wrap">
            <div class="post-thumbnail"><img src="<?php echo getPostImage() ?>" alt="Image поста"
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
                    <?php the_excerpt(); ?>
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
    <div class="pagenavi-post-wrap"><a href="#" class="pagenavi-post__prev-postlink"><i
            class="icon icon-angle-double-left"></i></a><span class="pagenavi-post__current">1</span><a href="#"
                                                                                                        class="pagenavi-post__page">2</a><a
          href="#" class="pagenavi-post__page">3</a><a href="#" class="pagenavi-post__page">...</a><a href="#"
                                                                                                      class="pagenavi-post__page">10</a><a
          href="#" class="pagenavi-post__next-postlink"><i class="icon icon-angle-double-right"></i></a></div>
  </div>
  <!-- sidebar-->
  <div class="sidebar">
    <div class="sidebar__sidebar-item">
      <div class="sidebar-item__title">Теги</div>
      <div class="sidebar-item__content">
        <div class="tags-list">
            <?php wp_tag_cloud([
                'format' => 'list',
                'largest' => 8
            ]); ?>
        </div>
      </div>
    </div>
    <div class="sidebar__sidebar-item">
      <div class="sidebar-item__title">Категории</div>
      <div class="sidebar-item__content">
          <?php
          $categories = get_categories();
          ?>
        <ul class="category-list">
            <?php foreach ($categories as $category) : ?>
              <li class="category-list__item">
                <a href="<?php echo get_category_link($category->ID); ?>" class="category-list__item__link">
                    <?php echo $category->name ?>
                </a>
              </li>
            <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
<?php get_footer(); ?>