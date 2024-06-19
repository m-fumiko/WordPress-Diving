<?php get_header(); ?>
<main>
    <div class="sub-mv">
        <div class="sub-mv__inner">
            <h1 class="sub-mv__title">blog</h1>
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
    <!-- ブログリスト -->
    <div class="blog blog-layout">
        <div class="blog__inner inner">
            <div class="blog__wrap">
                <article class="blog-main">
                    <!-- 記事があるかを判別→記事があればそれ以降のコードを実行 -->
                    <?php if (have_posts()) : ?>
                        <ul class="blog-main__items blog-list blog-list--2">
                            <!-- 記事のループ処理 -->
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                    <li class="blog-list__item blog-card blog-card--2">
                                        <!-- 記事のURLを出力 -->
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="blog-card__img">
                                                <!-- 記事のアイキャッチ画像があるかを判別 -->
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <!-- 記事のアイキャッチ画像があればその画像を出力 -->
                                                    <?php the_post_thumbnail('custom-thumbnail'); ?>
                                                <?php else : ?>
                                                    <!-- 記事のアイキャッチ画像がなければNoImage画像を出力 -->
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.jpg" alt="NoImage画像">
                                                <?php endif; ?>
                                            </div>
                                            <div class="blog-card__content">
                                                <!-- 記事の公開日を出力 -->
                                                <time class="blog-card__date" datetime="<?php the_time('c'); ?>">
                                                    <?php the_time('Y.m.d'); ?>
                                                </time>
                                                <!-- 記事のタイトルを出力する -->
                                                <p class="blog-card__title"><?php the_title(); ?></p>
                                                <p class="blog-card__text"><?php echo wp_trim_words(get_the_content(), 100, '...'); ?>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- ループ終了 -->
                            <?php endwhile;
                            endif;  ?>
                        </ul>
                    <?php else : ?>
                        <p>記事が投稿されていません</p>
                    <?php endif; ?>
                    <!-- ページネーション -->
                    <div class="blog-main__pagenavi wp-pagenavi">
                        <!-- WP-PageNaviで出力される部分 ここから -->
                        <a class="previouspostslink" rel="prev" href="#"></a>
                        <span class='current'>1</span>
                        <a class="page larger" href="#">2</a>
                        <a class="page larger" href="#">3</a>
                        <a class="page larger" href="#">4</a>
                        <a class="page larger u-desktop" href="#">5</a>
                        <a class="page larger u-desktop" href="#">6</a>
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