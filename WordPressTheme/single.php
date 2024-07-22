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
                <div class="blog__left">
                    <article class="blog-main">
                        <div class="blog-main__column-wrap blog-column-wrap">
                            <?php if (have_posts()) : // 投稿があるかチェック 
                            ?>
                                <?php while (have_posts()) : the_post(); // 投稿がある間ループ 
                                ?>
                                    <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('Y.m/d'); ?></time>
                                    <h1><?php the_title(); ?></h1>
                                    <?php if (has_post_thumbnail()) : // 投稿にサムネイル画像があるかチェック 
                                    ?>
                                        <?php the_post_thumbnail('single-thumbnail'); ?>
                                    <?php else : // サムネイル画像がない場合の処理 
                                    ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.jpg" alt="NoImage画像">
                                    <?php endif; // サムネイル画像の有無チェック終了 
                                    ?>
                                    <div class="content">
                                        <?php the_content(); ?>
                                    </div>
                                <?php endwhile; // 投稿のループ終了 
                                ?>
                            <?php endif; // 投稿があるかのチェック終了 
                            ?>
                        </div>
                        <!-- ページネーション -->
                        <div class="blog-column-wrap__pagenavi wp-pagenavi">
                            <!-- WP-PageNaviで出力される部分 ここから -->
                            <?php
                            $prev_post = get_previous_post();
                            $next_post = get_next_post();
                            ?>
                            <?php if ($next_post) : ?>
                                <?php $next_post_url = get_permalink($next_post->ID); ?>
                                <a class="previouspostslink" rel="prev" href="<?php echo esc_url($next_post_url); ?>" aria-label="次のページへ"></a>
                            <?php endif; ?>
                            <?php if ($prev_post) : ?>
                                <?php $prev_post_url = get_permalink($prev_post->ID); ?>
                                <a class="nextpostslink" rel="next" href="<?php echo esc_url($prev_post_url); ?>" aria-label="前のページへ"></a>
                            <?php endif; ?>
                            <!-- WP-PageNaviで出力される部分 ここまで -->
                        </div>
                    </article>
                </div>
                <div class="blog__right">
                    <!-- サイドバー -->
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>