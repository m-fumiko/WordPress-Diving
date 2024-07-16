<?php get_header(); ?>
<main>
    <!-- sub-mv -->
    <div class="sub-mv">
        <div class="sub-mv__inner">
            <h1 class="sub-mv__title">Site MAP</h1>
            <div class="sub-mv__img">
                <picture>
                    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sitemap-sp-img.jpg" media="(max-width: 768px)" />
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sitemap-img.jpg" alt="砂浜と青い海">
                </picture>
            </div>
        </div>
    </div>
    <!-- パンくず -->
    <?php get_template_part('breadcrumb'); ?>
    <!-- sitemap -->
    <section class="sitemap sitemap-layout">
        <div class="sitemap__inner inner">
            <nav class="sitemap__nav-menu sitemap-menu">
                <div class="sitemap-menu__left">
                    <div class="sitemap-menu__wrap-top">
                        <ul class="sitemap-menu__items">
                            <li class="sitemap-menu__item">
                                <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/campaign")) ?>">キャンペーン</a>
                                <ul class="sitemap-menu__sub-items">
                                    <?php
                                    // タクソノミー 'campaign_category' の全てのカテゴリを取得
                                    $args = array(
                                        'taxonomy' => 'campaign_category', // タクソノミー名
                                        'hide_empty' => false, // 投稿がない空のタームも取得する
                                    );
                                    $campaign_categories = get_terms($args); // タームを取得
                                    if (!empty($campaign_categories)) : // タームが存在するかチェック
                                        foreach ($campaign_categories as $category) : // 各タームをループ処理
                                    ?>
                                            <li class="sitemap-menu__sub-item">
                                                <a href="<?php echo esc_url(get_term_link($category)); ?>">
                                                    <?php echo esc_html($category->name); ?>
                                                </a>
                                            </li>
                                        <?php endforeach; // ループ終了 ?>
                                    <?php endif; // タームが存在するかチェック終了 ?>
                                </ul>
                            </li>
                        </ul>
                        <ul class="sitemap-menu__items">
                            <li class="sitemap-menu__item">
                                <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/about")) ?>">私たちについて</a>
                            </li>
                        </ul>
                    </div>
                    <div class="sitemap-menu__wrap">
                        <ul class="sitemap-menu__items">
                            <li class="sitemap-menu__item">
                                <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/information")) ?>">ダイビング情報</a>
                                <ul class="sitemap-menu__sub-items">
                                    <li class="sitemap-menu__sub-item">
                                        <a href="<?php echo esc_url(home_url('/information')); ?>?tab=tab01">ライセンス講習</a>
                                    </li>
                                    <li class="sitemap-menu__sub-item">
                                        <a href="<?php echo esc_url(home_url('/information')); ?>?tab=tab02">体験ダイビング</a>
                                    </li>
                                    <li class="sitemap-menu__sub-item">
                                        <a href="<?php echo esc_url(home_url('/information')); ?>?tab=tab03">ファンダイビング</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="sitemap-menu__items">
                            <li class="sitemap-menu__item">
                                <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/blog")) ?>">ブログ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sitemap-menu__right">
                    <div class="sitemap-menu__wrap-top">
                        <ul class="sitemap-menu__items">
                            <li class="sitemap-menu__item">
                                <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/voice")) ?>">お客様の声</a>
                            </li>
                        </ul>
                        <ul class="sitemap-menu__items">
                            <li class="sitemap-menu__item">
                                <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/price")) ?>">料金一覧</a>
                                <ul class="sitemap-menu__sub-items">
                                    <?php
                                    // カスタムクエリを使用して料金表のタイトルを取得
                                    $args = array(
                                        'post_type' => 'page',
                                        'pagename' => 'price' // "price" スラッグを持つ固定ページを指定
                                    );
                                    $price_query = new WP_Query($args); // カスタムクエリを作成
                                    ?>
                                    <?php if ($price_query->have_posts()) : // 投稿があるかチェック
                                    ?>
                                        <?php while ($price_query->have_posts()) : $price_query->the_post(); // 投稿がある限りループ
                                        ?>
                                            <?php
                                            $courses = [
                                                'course_title1',
                                                'course_title2',
                                                'course_title3',
                                                'course_title4',
                                                'course_title5',
                                                'course_title6',
                                            ];
                                            ?>
                                            <?php foreach ($courses as $title_key) : ?>
                                                <?php $course_title = SCF::get($title_key); ?>
                                                <?php if (!empty($course_title)) : ?>
                                                    <li class="sitemap-menu__sub-item">
                                                        <a href="<?php echo esc_url(home_url("/price#") . sanitize_title($course_title)); ?>">
                                                            <?php echo esc_html($course_title); ?>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php wp_reset_postdata(); // カスタムクエリのデータをリセット ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="sitemap-menu__wrap">
                        <ul class="sitemap-menu__items">
                            <li class="sitemap-menu__item">
                                <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/faq")) ?>">よくある質問</a>
                            </li>
                        </ul>
                        <ul class="sitemap-menu__items">
                            <li class="sitemap-menu__item">
                                <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/privacy-policy")) ?>"><span>プライバシー<br class="u-mobile">ポリシー</span></a>
                            </li>
                        </ul>
                        <ul class="sitemap-menu__items">
                            <li class="sitemap-menu__item">
                                <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/terms-of-service")) ?>">利用規約</a>
                            </li>
                        </ul>
                        <ul class="sitemap-menu__items">
                            <li class="sitemap-menu__item">
                                <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/contact")) ?>">お問い合わせ</a>
                            </li>
                        </ul>
                        <ul class="sitemap-menu__items">
                            <li class="sitemap-menu__item">
                                <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/sitemap")) ?>">サイトマップ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>
</main>

<?php get_footer(); ?>