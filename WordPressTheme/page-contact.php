<?php get_header(); ?>
<main>
    <!-- sub-mv -->
    <div class="sub-mv">
        <div class="sub-mv__inner">
            <h1 class="sub-mv__title">contact</h1>
            <div class="sub-mv__img">
                <picture>
                    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/contact-sp-img.jpg" media="(max-width: 768px)" />
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/contact-img.jpg" alt="砂浜と青い海">
                </picture>
            </div>
        </div>
    </div>
    <!-- パンくず -->
    <?php get_template_part('breadcrumb'); ?>
    <!-- コンタクトフォーム -->
    <div class="contact contact-layout contact-layout--error">
        <div class="contact__inner inner">
            <!-- Contact Form7などのショートコードの読み込み -->
            <?php echo do_shortcode('[contact-form-7 id="a2d89ce" title="お問い合わせフォーム"]'); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>