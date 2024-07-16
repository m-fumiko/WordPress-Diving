<?php get_header(); ?>
<main>
    <!-- sub-mv -->
    <div class="sub-mv">
        <div class="sub-mv__inner">
            <h1 class="sub-mv__title sub-mv__title--other">About us</h1>
            <div class="sub-mv__img">
                <picture>
                    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/aboutus-mv-sp.jpg" media="(max-width: 768px)" />
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/aboutus-mv.jpg" alt="2匹の黄色い熱帯魚が泳いでいる様子">
                </picture>
            </div>
        </div>
    </div>
    <!-- パンくず -->
    <?php get_template_part('breadcrumb'); ?>

    <section class="about about-layout">
        <div class="about__inner inner">
            <div class="about__content">
                <div class="about__img-wrap">
                    <div class="about__img-01 u-desktop">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutus1.jpg" alt="屋根に乗っているシーサーの画像">
                    </div>
                    <div class="about__img-02">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutus2.jpg" alt="2匹の黄色い熱帯魚が泳いでいる様子">
                    </div>
                </div>
                <div class="about__contents">
                    <p class="about__contents-title">
                        Dive into<br>the Ocean
                    </p>
                    <p class="about__contents-text">
                        ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    </p>
                </div>
            </div>
            <!-- ギャラリー -->
            <div class="about__title common-title">
                <p class="common-title__main">gallery</p>
                <h2 class="common-title__sub">フォト</h2>
            </div>
            <div class="about__gallery gallery">
                <ul class="gallery__items">
                    <?php
                    // カスタムフィールドから画像を取得
                    $gallery_images = SCF::get('gallery', get_the_ID());

                    if (!empty($gallery_images)) :
                        foreach ($gallery_images as $index => $image_array) :
                            // 画像IDが存在し、かつ空でないか確認
                            if (isset($image_array['gallery_images']) && !empty($image_array['gallery_images'])) :
                                // ネストされた配列から画像IDを取得
                                $image_id = $image_array['gallery_images'];
                                // 画像URLを取得
                                $img_src = wp_get_attachment_image_src($image_id, 'full')[0];
                                // 画像のaltテキストを取得
                                $img_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                    ?>
                                <li class="gallery__item js-modal-open" data-target="<?php echo ($index + 1); ?>">
                                    <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>ギャラリー画像が設定されていません。</p>
                    <?php endif; ?>
                </ul>
                <!-- モーダル -->
                <div class="gallery__modal gallery-modal">
                    <ul class="gallery-modal__items">
                        <?php
                        // カスタムフィールドから画像を取得
                        $gallery_images = SCF::get('gallery', get_the_ID());

                        // ギャラリー画像が存在するかチェック
                        if (!empty($gallery_images)) :
                            // 画像データをループ処理
                            foreach ($gallery_images as $index => $image_array) :
                                // 画像IDが存在し、かつ空でないか確認
                                if (isset($image_array['gallery_images']) && !empty($image_array['gallery_images'])) :
                                    // ネストされた配列から画像IDを取得
                                    $image_id = $image_array['gallery_images'];
                                    // 画像URLを取得
                                    $img_src = wp_get_attachment_image_src($image_id, 'full')[0];
                                    // 画像のaltテキストを取得
                                    $img_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                        ?>
                                    <li class="gallery-modal__item js-modal js-modal-close" id="gallery-modal-<?php echo ($index + 1); ?>">
                                        <div class="gallery-modal__inner inner">
                                            <div class="gallery-modal__img">
                                                <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                            </div>
                                        </div>
                                    </li>
                                <?php endif; // 画像IDの存在チェック終了 ?>
                            <?php endforeach; // ループ終了 ?>
                        <?php endif; // ギャラリー画像の存在チェック終了 ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>