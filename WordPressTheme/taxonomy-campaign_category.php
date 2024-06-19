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
                $terms = get_terms(array(
                    'taxonomy' => 'campaign_category',
                    'hide_empty' => false,
                ));
                if (!empty($terms)) {
                    foreach ($terms as $term) {
                        $active_class = is_tax('campaign_category', $term->slug) ? 'tag__menu-item--green' : '';
                        echo '<li class="tag__menu-item ' . esc_attr($active_class) . '"><a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <!-- キャンペーンカード -->
    <section class="campaign-card-contents campaign-card-contents-layout">
        <div class="campaign-card-contents__inner inner">
            <ul class="campaign-card-contents__items">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        $category = get_the_terms(get_the_ID(), 'campaign_category'); // カスタムタクソノミーを取得
                        $category_name = !empty($category) ? $category[0]->name : '';
                        $price_comment = get_field('campaign_card_price_comment');
                        $normal_price = get_field('campaign_card_normal_price');
                        $campaign_price = get_field('campaign_card_campaign_price');
                        $campaign_description = get_field('campaign_card_campaign_description');
                        $campaign_period = get_field('campaign_card_campaign_period');

                        // 価格から「¥」とカンマを取り除いて数値に変換
                        $normal_price = intval(preg_replace('/[^\d]/', '', $normal_price));
                        $campaign_price = intval(preg_replace('/[^\d]/', '', $campaign_price));
                        ?>
                        <li class="campaign-card-contents__item campaign-card">
                            <div class="campaign-card__img">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.jpg" alt="No Image">
                                <?php endif; ?>
                            </div>
                            <div class="campaign-card__content">
                                <p class="campaign-card__category"><?php echo esc_html($category_name); ?></p>
                                <h2 class="campaign-card__title campaign-card__title--large"><?php the_title(); ?></h2>
                                <p class="campaign-card__text campaign-card__text--sub"><?php echo esc_html($price_comment); ?></p>
                                <div class="campaign-card__price campaign-card__price--sub">
                                    <p class="campaign-card__price-black">¥<?php echo number_format($normal_price); ?></p>
                                    <p class="campaign-card__price-green">¥<?php echo number_format($campaign_price); ?></p>
                                </div>
                                <div class="campaign-card__pc-contents pc-contents u-desktop">
                                    <p class="pc-contents__article"><?php echo nl2br(esc_html($campaign_description)); ?></p>
                                </div>
                                <div class="pc-contents__contact u-desktop">
                                    <p class="pc-contents__date"><?php echo esc_html($campaign_period); ?></p>
                                    <p class="pc-contents__contact-text">ご予約・お問い合わせはコチラ</p>
                                    <div class="pc-contents__button-wrapper">
                                        <a href="contact.html" class="common-button">Contact us<span></span></a>
                                    </div>
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
        </div>
        <!-- ページネーション -->
        <div class="campaign-card-contents__pagenavi wp-pagenavi">
            <?php
            echo paginate_links(array(
                'total' => $wp_query->max_num_pages
            ));
            ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>
