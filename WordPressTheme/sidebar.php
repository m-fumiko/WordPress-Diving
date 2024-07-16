<aside class="blog-side blog-side-layout">
    <div class="blog-side__items">
        <div class="blog-side__article blog-article">
            <h2 class="blog-article__title blog-side-title">人気記事</h2>
            <ul class="blog-article__items">
                <?php
                // 人気記事3件表示
                $args = array(
                    'posts_per_page' => 3, // 表示する投稿数
                    'post_type' => 'post', // 投稿タイプ
                    'meta_key' => 'post_views_count', // メタキー
                    'orderby' => 'meta_value_num', // メタ値の数値で並び替え
                );
                $popular_posts = new WP_Query($args); // カスタムクエリを作成
                ?>
                <?php if ($popular_posts->have_posts()) : // 投稿があるかチェック ?>
                    <?php while ($popular_posts->have_posts()) : $popular_posts->the_post(); // 投稿がある限りループ ?>
                        <li class="blog-article__item">
                            <a href="<?php the_permalink(); ?>">
                                <div class="blog-article__flex">
                                    <div class="blog-article__img">
                                        <?php if (has_post_thumbnail()) : // アイキャッチ画像が設定されているかチェック ?>
                                            <?php the_post_thumbnail('custom-thumbnail'); // アイキャッチ画像を表示 ?>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.jpg" alt="No Image">
                                        <?php endif; ?>
                                    </div>
                                    <div class="blog-article__contents">
                                        <time class="blog-article__date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
                                        <p class="blog-article__text"><?php the_title(); ?></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endwhile; // ループ終了 ?>
                    <?php wp_reset_postdata(); // カスタムクエリのデータをリセット ?>
                <?php else : ?>
                    <li>人気記事がありません。</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <!-- 口コミ -->
    <div class="blog-side__items">
        <div class="blog-side__review blog-review">
            <h2 class="blog-review__title blog-side-title">口コミ</h2>
            <?php
            // 最新の口コミ1件表示
            $args = array(
                'posts_per_page' => 1, // 表示する投稿数
                'post_type' => 'voice', // カスタム投稿タイプ名
            );
            $latest_reviews = new WP_Query($args); // カスタムクエリを作成
            ?>
            <?php if ($latest_reviews->have_posts()) : // 投稿があるかチェック ?>
                <?php while ($latest_reviews->have_posts()) : $latest_reviews->the_post(); // 投稿がある限りループ ?>
                    <?php
                    // カスタムフィールドの値を取得
                    $voice_card = get_field('voice_card');
                    if ($voice_card) {
                        $voice_age = isset($voice_card['voice_age']) ? $voice_card['voice_age'] : '';
                        $voice_gender = isset($voice_card['voice_gender']) ? $voice_card['voice_gender'] : '';
                        $voice_title = get_the_title();
                    ?>
                        <div class="blog-review__content">
                            <div class="blog-review__img">
                                <?php if (has_post_thumbnail()) : // アイキャッチ画像が設定されているかチェック ?>
                                    <?php the_post_thumbnail('full'); // アイキャッチ画像を表示 ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.jpg" alt="No Image">
                                <?php endif; ?>
                            </div>
                            <div class="blog-review__contents">
                                <div class="blog-review__info"><?php echo esc_html($voice_age); ?> (<?php echo esc_html($voice_gender); ?>)</div>
                                <div class="blog-review__text"><?php echo esc_html($voice_title); ?></div>
                                <div class="blog-review__button-wrapper">
                                    <a href="<?php echo get_post_type_archive_link('voice'); ?>" class="common-button">View more<span></span></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php endwhile; // ループ終了 ?>
                <?php wp_reset_postdata(); // カスタムクエリのデータをリセット ?>
            <?php else : ?>
                <p>口コミがありません。</p>
            <?php endif; ?>
        </div>
    </div>
    <!-- キャンペーン -->
    <div class="blog-side__items">
        <div class="blog-side__campaign blog-campaign">
            <h2 class="blog-campaign__title blog-side-title">キャンペーン</h2>
            <ul class="blog-campaign__cards">
                <?php
                // 最新のキャンペーン2件表示
                $args = array(
                    'posts_per_page' => 2, // 表示する投稿数
                    'post_type' => 'campaign', // カスタム投稿タイプ名
                );
                $latest_campaigns = new WP_Query($args); // カスタムクエリを作成
                ?>
                <?php if ($latest_campaigns->have_posts()) : // 投稿があるかチェック ?>
                    <?php while ($latest_campaigns->have_posts()) : $latest_campaigns->the_post(); // 投稿がある限りループ ?>
                        <?php
                        // カスタムフィールドの値を取得
                        $campaign_card = get_field('campaign_card');
                        $price_comment = isset($campaign_card['price_comment']) ? $campaign_card['price_comment'] : '';
                        $normal_price = isset($campaign_card['normal_price']) ? $campaign_card['normal_price'] : '';
                        $campaign_price = isset($campaign_card['campaign_price']) ? $campaign_card['campaign_price'] : '';

                        // 数値に変換
                        $normal_price_int = !empty($normal_price) ? intval(preg_replace('/[^\d]/', '', $normal_price)) : 0;
                        $campaign_price_int = !empty($campaign_price) ? intval(preg_replace('/[^\d]/', '', $campaign_price)) : 0;
                        ?>
                        <li class="blog-campaign__card">
                            <div class="blog-campaign__card-img">
                                <?php if (has_post_thumbnail()) : // アイキャッチ画像が設定されているかチェック ?>
                                    <?php the_post_thumbnail('full'); // アイキャッチ画像を表示 ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.jpg" alt="No Image">
                                <?php endif; ?>
                            </div>
                            <div class="blog-campaign__card-content">
                                <p class="blog-campaign__card-title"><?php the_title(); ?></p>
                                <p class="blog-campaign__card-text"><?php echo esc_html($price_comment); ?></p>
                                <div class="blog-campaign__card-price">
                                    <p class="blog-campaign__card-black">¥<?php echo number_format($normal_price_int); ?></p>
                                    <p class="blog-campaign__card-green">¥<?php echo number_format($campaign_price_int); ?></p>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; // ループ終了 ?>
                    <?php wp_reset_postdata(); // カスタムクエリのデータをリセット ?>
                <?php else : ?>
                    <li>キャンペーンがありません。</li>
                <?php endif; ?>
            </ul>
            <div class="blog-campaign__button-wrapper">
                <a href="<?php echo get_post_type_archive_link('campaign'); ?>" class="common-button">View more<span></span></a>
            </div>
        </div>
    </div>
    <!-- アーカイブ -->
    <div class="blog-side__items">
        <div class="blog-side__archive blog-archive">
            <h2 class="blog-archive__title blog-side-title">アーカイブ</h2>
            <div class="blog-archive__accordion">
                <ul class="blog-archive__items">
                    <?php
                    // グローバル変数 $wpdb を使用してデータベースにアクセス
                    global $wpdb;
                    // 投稿の年を取得するクエリを実行
                    $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC");

                    // 各年をループ処理
                    foreach ($years as $index => $year) :
                        // 最初の年には特別なクラスを追加
                        $is_first = $index === 0 ? ' blog-archive__year--first' : '';
                    ?>
                        <li class="blog-archive__item js-accordion__item">
                            <div class="blog-archive__year js-accordion<?php echo $is_first; ?>"><?php echo $year; ?></div>
                            <ul class="blog-archive__month js-accordion__content" style="<?php echo $is_first ? 'display:block;' : 'display:none;'; ?>">
                                <?php
                                // 指定した年の各月を取得するクエリを実行
                                $months = $wpdb->get_results($wpdb->prepare("SELECT DISTINCT MONTH(post_date) AS month FROM $wpdb->posts WHERE YEAR(post_date) = %d AND post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC", $year));

                                // 各月をループ処理
                                foreach ($months as $month) :
                                    // 月の名前を取得
                                    $month_name = date_i18n('F', mktime(0, 0, 0, $month->month, 1));
                                ?>
                                    <li class="blog-archive__month-item"><a href="<?php echo get_month_link($year, $month->month); ?>"><?php echo $month_name; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</aside>