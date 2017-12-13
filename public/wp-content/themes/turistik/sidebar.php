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
          <?php if($category->slug != 'bez-rubriki') : ?>
            <li class="category-list__item">
              <a href="<?php echo get_category_link($category->cat_ID); ?>" class="category-list__item__link">
                <?php echo $category->name ?>
              </a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div class="sidebar__sidebar-item">
    <div class="sidebar-item__title">Календарь сообщений</div>
    <div class="sidebar-item__content">
      <?php echo get_calendar();?>
    </div>
  </div>
</div>
