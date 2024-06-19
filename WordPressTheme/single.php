<?php get_header(); ?>
<main>
    <!-- sub-mv -->
    <div class="sub-mv">
        <div class="sub-mv__inner">
            <div class="sub-mv__title">blog</div>
            <div class="sub-mv__img">
                <picture>
                    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/blog-mv-sp.jpg" media="(max-width: 768px)" />
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/blog-mv.jpg" alt="無数の魚の群れが泳いでいる様子">
                </picture>
            </div>
        </div>
    </div>
    <!-- パンくず -->
    <?php get_template_part('breadcrumb'); ?>
    <!-- 詳細 -->
    <div class="blog blog-layout">
        <div class="blog__inner inner">
            <div class="blog__wrap">
                <article class="blog-main">
                    <div class="blog-main__column-wrap blog-column-wrap">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('Y.m/d'); ?></time>
                                <h1><?php the_title(); ?></h1>
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('single-thumbnail'); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.jpg" alt="NoImage画像">
                                <?php endif; ?>
                                <div class="content">
                                    <?php the_content(); ?>
                                </div>
                        <?php endwhile;
                        endif; ?>
                    </div>
                    <!-- ページネーション -->
                    <div class="blog-column-wrap__pagenavi wp-pagenavi">
                        <!-- WP-PageNaviで出力される部分 ここから -->
                        <a class="previouspostslink" rel="prev" href="#"></a>
                        <a class="nextpostslink" rel="next" href="#"></a>
                        <!-- WP-PageNaviで出力される部分 ここまで -->
                    </div>
                </article>
                <!-- サイドバー -->
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>