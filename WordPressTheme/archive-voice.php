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
                // 投稿が存在するかチェック
                if (have_posts()) :
                    // 投稿をループ
                    while (have_posts()) : the_post();
                        // カスタムタクソノミー 'voice_category' のタームを取得
                        $category = get_the_terms(get_the_ID(), 'voice_category');
                        $category_name = !empty($category) ? $category[0]->name : '';
                        // カスタムフィールドの値を取得
                        $voice_age = get_field('voice_card_voice_age'); // カスタムフィールド "voice_age" の値を取得
                        $voice_gender = get_field('voice_card_voice_gender'); // カスタムフィールド "voice_gender" の値を取得
                        $voice_review = get_field('voice_card_voice_review'); // カスタムフィールド "voice_review" の値を取得
                        // 140文字まで制限
                        $trimmed_voice_review = mb_substr($voice_review, 0, 140, 'UTF-8') . (mb_strlen($voice_review) > 140 ? '...' : '');
                ?>
                        <li class="voice-card">
                            <div class="voice-card__flex">
                                <div class="voice-card__content">
                                    <div class="voice-card__meta">
                                        <p class="voice-card__info">
                                            <?php echo esc_html($voice_age); ?>（<?php echo esc_html($voice_gender); ?>）
                                        </p>
                                        <p class="voice-card__category">
                                            <?php echo esc_html($category_name); ?>
                                        </p>
                                    </div>
                                    <h2 class="voice-card__title voice-card__title--large">
                                        <?php
                                        $title = get_the_title(); // 投稿のタイトルを取得
                                        if (mb_strlen($title) > 20) {
                                            $title = mb_substr($title, 0, 20) . '...';
                                        }
                                        echo esc_html($title);
                                        ?>
                                    </h2>
                                </div>
                                <div class="voice-card__img">
                                    <?php if (has_post_thumbnail()) : // アイキャッチ画像があるかチェック 
                                    ?>
                                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.jpg" alt="No Image">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <p class="voice-card__text">
                                <?php echo wpautop(esc_html($trimmed_voice_review)); ?>
                            </p>
                        </li>
                    <?php endwhile; ?>
                <?php else : ?>
                    <li>投稿がありません。</li>
                <?php endif; ?>
            </ul>
            <!-- ページネーション -->
            <?php wp_pagenavi(); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>