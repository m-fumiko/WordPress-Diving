<?php get_header(); ?>
<main>
    <!-- sub-mv -->
    <div class="sub-mv">
        <div class="sub-mv__inner">
            <h1 class="sub-mv__title">campaign</h1>
            <div class="sub-mv__img">
                <picture>
                    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/campaign-mv-sp.jpg" media="(max-width: 768px)" />
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/campaign-mv.jpg" alt="2匹の黄色い熱帯魚が泳いでいる様子">
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
                <li class="tag__menu-item <?php if (is_post_type_archive('campaign')) echo 'tag__menu-item--green'; ?>">
                    <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>">ALL</a>
                </li>
                <?php
                // 'campaign_category' タクソノミーの全てのタームを取得
                $terms = get_terms(array(
                    'taxonomy' => 'campaign_category', // タクソノミー名
                    'hide_empty' => false, // 投稿がない空のタームも取得する
                ));
                ?>
                <?php if (!empty($terms)) : // タームが存在するかチェック ?>
                    <?php foreach ($terms as $term) : // 各タームをループ処理
                        // 現在表示されているタームと一致する場合、アクティブクラスを追加
                        $active_class = is_tax('campaign_category', $term->slug) ? 'tag__menu-item--green' : ''; ?>
                        <li class="tag__menu-item <?php echo esc_attr($active_class); ?>">
                            <a href="<?php echo esc_url(get_term_link($term)); ?>">
                                <?php echo esc_html($term->name); ?>
                            </a>
                        </li>
                    <?php endforeach; // ループ終了 ?>
                <?php endif; // タームが存在するかチェック終了 ?>
            </ul>
        </div>
    </div>
    <!-- キャンペーンカード -->
    <section class="campaign-card-contents campaign-card-contents-layout">
        <div class="campaign-card-contents__inner inner">
            <ul class="campaign-card-contents__items">
                <?php
                // 投稿が存在するかチェック
                if (have_posts()) :
                    // 投稿をループ
                    while (have_posts()) : the_post();
                        // カスタムタクソノミー 'campaign_category' のタームを取得
                        $category = get_the_terms(get_the_ID(), 'campaign_category');
                        $category_name = !empty($category) ? $category[0]->name : '';
                        
                        // カスタムフィールドの値を取得
                        $campaign_price = get_field('campaign_price');
                        $campaign_period = get_field('campaign_period');

                        // キャンペーン価格のサブフィールドを取得
                        $price_comment = isset($campaign_price['price_comment']) ? $campaign_price['price_comment'] : '';
                        $normal_price = isset($campaign_price['normal_price']) ? $campaign_price['normal_price'] : '';
                        $discount_price = isset($campaign_price['discount_price']) ? $campaign_price['discount_price'] : '';

                        // キャンペーン期間のサブフィールドを取得
                        $start_date = isset($campaign_period['start_date']) ? $campaign_period['start_date'] : '';
                        $end_date = isset($campaign_period['end_date']) ? $campaign_period['end_date'] : '';

                        // 日付を取得してフォーマットを変更
                        $start_year = date('Y', strtotime($start_date));
                        $end_year = date('Y', strtotime($end_date));
                        $start_formatted = date('Y/n/j', strtotime($start_date));
                        $end_formatted = date('n/j', strtotime($end_date));

                        // 西暦が同じかどうかで表示形式を変える
                        if ($start_year === $end_year) {
                            $period = "{$start_formatted} - {$end_formatted}";
                        } else {
                            $end_formatted_full = date('Y/n/j', strtotime($end_date));
                            $period = "{$start_formatted} - {$end_formatted_full}";
                        }
                ?>
                        <li class="campaign-card-contents__item campaign-card">
                            <div class="campaign-card__img">
                                <!-- アイキャッチ画像があるかチェック -->
                                <?php if (has_post_thumbnail()) : ?>
                                    <!-- アイキャッチ画像があれば 'full' サイズで出力 -->
                                    <?php the_post_thumbnail('full'); ?>
                                <?php else : ?>
                                    <!-- アイキャッチ画像がなければ NoImage 画像を出力 -->
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.jpg" alt="No Image">
                                <?php endif; ?>
                            </div>
                            <div class="campaign-card__content">
                                <p class="campaign-card__category"><?php echo esc_html($category_name); ?></p>
                                <h2 class="campaign-card__title campaign-card__title--large"><?php the_title(); ?></h2>
                                <?php if (!empty($discount_price)) : // ディスカウント価格が設定されている場合のみ表示 ?>
                                    <?php if (!empty($price_comment)) : ?>
                                        <p class="campaign-card__text campaign-card__text--sub"><?php echo esc_html($price_comment); ?></p>
                                    <?php endif; ?>
                                    <div class="campaign-card__price campaign-card__price--sub">
                                        <?php if (!empty($normal_price)) : // 通常価格が設定されているかチェック ?>
                                            <p class="campaign-card__price-black">¥<?php echo number_format((float) $normal_price); ?></p>
                                        <?php endif; ?>
                                        <p class="campaign-card__price-green">¥<?php echo number_format((float) $discount_price); ?></p>
                                    </div>
                                <?php endif; ?>
                                <div class="campaign-card__pc-contents pc-contents u-desktop">
                                    <p class="pc-contents__article"><?php the_content(); // 投稿の内容を表示 ?></p>
                                </div>
                                <div class="pc-contents__contact u-desktop">
                                    <?php if (!empty($start_date) && !empty($end_date)) : ?>
                                        <p class="pc-contents__date"><?php echo esc_html($period); ?></p>
                                    <?php elseif (!empty($start_date)) : ?>
                                        <p class="pc-contents__date"><?php echo esc_html($start_formatted); ?></p>
                                    <?php endif; ?>
                                    <p class="pc-contents__contact-text">ご予約・お問い合わせはコチラ</p>
                                    <div class="pc-contents__button-wrapper">
                                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="common-button">Contact us<span></span></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                <?php else : ?>
                    <li>
                        <p>キャンペーンがありません。</p>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- ページネーション -->
        <?php wp_pagenavi(); ?>
    </section>
</main>
<?php get_footer(); ?>