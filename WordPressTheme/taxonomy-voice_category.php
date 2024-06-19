<?php get_header(); ?>
<main>
    <!-- sub-mv -->
    <div class="sub-mv">
        <div class="sub-mv__inner">
            <h1 class="sub-mv__title">voice</h1>
            <div class="sub-mv__img">
                <picture>
                    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/voice-sp-img.jpg" media="(max-width: 768px)" />
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/voice-img.jpg" alt="5人のダイバーが海に浮かんでいる様子を上から撮影した写真">
                </picture>
            </div>
        </div>
    </div>
    <!-- パンくず -->
    <?php get_template_part('breadcrumb'); ?>
    <!-- タグ -->
    <div class="tag tag-layout">
        <div class="tag__inner inner">
            <ul class="tag__items">
                <li class="tag__menu-item <?php if (is_post_type_archive('voice')) echo 'tag__menu-item--green'; ?>">
                    <a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>">ALL</a>
                </li>
                <?php
                $terms = get_terms(array(
                    'taxonomy' => 'voice_category',
                    'hide_empty' => false,
                ));
                if (!empty($terms)) {
                    foreach ($terms as $term) {
                        $active_class = is_tax('voice_category', $term->slug) ? 'tag__menu-item--green' : '';
                        echo '<li class="tag__menu-item ' . esc_attr($active_class) . '"><a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <!-- ボイスカード -->
    <section class="voice voice-layout">
        <div class="voice__inner inner">
            <ul class="voice-list">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        if (have_rows('voice_card')) :
                            while (have_rows('voice_card')) : the_row();
                                $voice_age = get_sub_field('voice_age');
                                $voice_gender = get_sub_field('voice_gender');
                                $voice_review = get_sub_field('voice_review');
                ?>
                                <li class="voice-card">
                                    <div class="voice-card__flex">
                                        <div class="voice-card__content">
                                            <div class="voice-card__meta">
                                                <p class="voice-card__info"><?php echo esc_html($voice_age); ?>（<?php echo esc_html($voice_gender); ?>）</p>
                                                <p class="voice-card__category">
                                                    <?php
                                                    $categories = get_the_terms(get_the_ID(), 'voice_category');
                                                    if ($categories && !is_wp_error($categories)) {
                                                        $category_list = [];
                                                        foreach ($categories as $category) {
                                                            $category_list[] = esc_html($category->name);
                                                        }
                                                        echo implode(', ', $category_list);
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                            <?php
                                            $title = get_the_title();
                                            if (mb_strlen($title) > 20) {
                                                $title = mb_substr($title, 0, 20) . '...';
                                            }
                                            ?>
                                            <h2 class="voice-card__title"><?php echo esc_html($title); ?></h2>
                                        </div>
                                        <div class="voice-card__img">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="151" height="117" loading="lazy" />
                                            <?php else : ?>
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/noimage.jpg" alt="NoImage画像">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <p class="voice-card__text">
                                        <?php echo wpautop(esc_html($voice_review)); ?>
                                    </p>
                                </li>
                <?php
                            endwhile;
                        else :
                            echo '<li>口コミがありません。</li>';
                        endif;
                    endwhile;
                else :
                    echo '<li>投稿がありません。</li>';
                endif;
                ?>
            </ul>
        </div>
    </section>

    <!-- ページネーション -->
    <div class="voice__pagenavi wp-pagenavi">
        <?php
        if (function_exists('wp_pagenavi')) {
            wp_pagenavi();
        }
        ?>
    </div>
    </section>
</main>
<?php get_footer(); ?>