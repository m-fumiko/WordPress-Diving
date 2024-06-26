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

    <div class="thanks thanks-layout">
        <div class="tanks__inner inner">
            <p class="thanks__top-text">
                お問い合わせ内容を送信完了しました。</p>
            <p class="thanks__text">このたびは、お問い合わせ頂き<br class="u-mobile">誠にありがとうございます。<br>お送り頂きました内容を確認の上、<br class="u-mobile">3営業日以内に折り返しご連絡させて頂きます。<br>また、ご記入頂いたメールアドレスへ、<br class="u-mobile">自動返信の確認メールをお送りしております。</p>
        </div>
    </div>
</main>
<?php get_footer(); ?>