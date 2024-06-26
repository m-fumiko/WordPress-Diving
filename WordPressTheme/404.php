<?php get_header(); ?>
<main>
    <section class="not-found not-found-layout">
        <?php get_template_part('breadcrumb'); ?>
        <div class="not-found__inner inner">
            <div class="not-found__wrap">
                <h1 class="not-found__number">404</h1>
                <p class="not-found__text">申し訳ありません。<br>お探しのページが見つかりません。</p>
                <div class="not-found____button-wrapper">
                    <a href="<?php echo home_url("/"); ?>" class="common-button common-button--white">Page TOP<span></span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>