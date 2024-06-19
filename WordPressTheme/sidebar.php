<aside class="blog-side blog-side-layout">
    <!-- 人気記事 -->
    <div class="blog-side__items">
        <div class="blog-side__article blog-article">
            <h3 class="blog-article__title blog-side-title">人気記事</h3>
            <ul class="blog-article__items">
                <?php
                // 最新記事3件表示
                $latest_posts = new WP_Query(array(
                    'posts_per_page' => 3,
                    'post_type' => 'post',
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                if ($latest_posts->have_posts()) :
                    while ($latest_posts->have_posts()) : $latest_posts->the_post();
                ?>
                        <li class="blog-article__item">
                            <a href="<?php the_permalink(); ?>">
                                <div class="blog-article__flex">
                                    <div class="blog-article__img">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('custom-thumbnail'); ?>
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
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<li>最新記事がありません。</li>';
                endif;
                ?>
            </ul>

        </div>
    </div>
    <!-- 口コミ -->
    <div class="blog-side__items">
        <?php
        // 最新の口コミ1件表示
        $latest_reviews = new WP_Query(array(
            'posts_per_page' => 1,
            'post_type' => 'voice', // カスタム投稿タイプ名
            'orderby' => 'date',
            'order' => 'DESC'
        ));
        if ($latest_reviews->have_posts()) :
            while ($latest_reviews->have_posts()) : $latest_reviews->the_post();
                // カスタムフィールドの値を取得
                $voice_card = get_field('voice_card');
                $voice_age = $voice_card['voice_age'];
                $voice_gender = $voice_card['voice_gender'];
                $voice_title = get_the_title();
        ?>
                <div class="blog-side__review blog-review">
                    <h3 class="blog-review__title blog-side-title">口コミ</h3>
                    <div class="blog-review__content">
                        <div class="blog-review__img">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumbnail'); ?>
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
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>口コミがありません。</p>';
        endif;
        ?>
    </div>

    <!-- キャンペーン -->
    <div class="blog-side__items">
        <div class="blog-side__campaign blog-campaign">
            <h3 class="blog-campaign__title blog-side-title">キャンペーン</h3>
            <ul class="blog-campaign__cards">
                <?php
                // 最新のキャンペーン2件表示
                $latest_campaigns = new WP_Query(array(
                    'posts_per_page' => 2,
                    'post_type' => 'campaign', // カスタム投稿タイプ名
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                if ($latest_campaigns->have_posts()) :
                    while ($latest_campaigns->have_posts()) : $latest_campaigns->the_post();
                        // カスタムフィールドの値を取得
                        $campaign_card = get_field('campaign_card');
                        $price_comment = $campaign_card['price_comment'];
                        $normal_price = $campaign_card['normal_price'];
                        $campaign_price = $campaign_card['campaign_price'];

                        // 数値に変換
                        $normal_price_int = !empty($normal_price) ? intval(preg_replace('/[^\d]/', '', $normal_price)) : 0;
                        $campaign_price_int = !empty($campaign_price) ? intval(preg_replace('/[^\d]/', '', $campaign_price)) : 0;
                ?>
                        <li class="blog-campaign__card">
                            <div class="blog-campaign__card-img">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('custom-thumbnail'); ?>
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
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>キャンペーンがありません。</p>';
                endif;
                ?>
            </ul>
            <div class="blog-campaign__button-wrapper">
                <a href="<?php echo get_post_type_archive_link('campaign'); ?>" class="common-button">View more<span></span></a>
            </div>
        </div>
    </div>

    <!-- アーカイブ -->
    <div class="blog-side__items">
        <div class="blog-side__archive blog-archive">
            <h3 class="blog-archive__title blog-side-title">アーカイブ</h3>
            <div class="blog-archive__accordion">
                <ul class="blog-archive__items">
                    <?php
                    // アーカイブの年ごとにまとめる
                    $years = $wpdb->get_results("SELECT DISTINCT YEAR(post_date) AS year FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date DESC");
                    foreach ($years as $year) :
                    ?>
                        <li class="blog-archive__item js-accordion__item">
                            <div class="blog-archive__year blog-archive__year--first js-accordion"><?php echo $year->year; ?></div>
                            <ul class="blog-archive__month js-accordion__content">
                                <?php
                                // 年ごとの月を取得
                                $months = $wpdb->get_results($wpdb->prepare("SELECT DISTINCT MONTH(post_date) AS month FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' AND YEAR(post_date) = %d ORDER BY post_date DESC", $year->year));
                                foreach ($months as $month) :
                                ?>
                                    <li class="blog-archive__month-item"><a href="<?php echo get_month_link($year->year, $month->month); ?>"><?php echo $month->month; ?>月</a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</aside>