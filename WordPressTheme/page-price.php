<?php get_header(); ?>
<main>
    <!-- sub-mv -->
    <div class="sub-mv">
        <div class="sub-mv__inner">
            <h1 class="sub-mv__title">price</h1>
            <div class="sub-mv__img">
                <picture>
                    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/price-img-sp.jpg" media="(max-width: 768px)" />
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/price-img.jpg" alt="水面からダイバーの頭が出ている画像">
                </picture>
            </div>
        </div>
    </div>
    <!-- パンくず -->
    <?php get_template_part('breadcrumb'); ?>
    <!-- 料金表 -->
    <section class="price price-layout">
        <div class="price__inner inner">
            <div class="price__tables price-tables">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php
                        // 各コースのタイトルと詳細情報を取得
                        $courses = [
                            'course_title1' => 'details1',
                            'course_title2' => 'details2',
                            'course_title3' => 'details3',
                            'course_title4' => 'details4',
                            'course_title5' => 'details5',
                            'course_title6' => 'details6',
                        ];
                        foreach ($courses as $title_key => $details_key) {
                            // コースタイトルを取得
                            $course_title = SCF::get($title_key);
                            // detailsを取得
                            $details = SCF::get($details_key);

                            if (!empty($course_title) && !empty($details)) :
                                // detailsのカウントを取得
                                $row_count = count($details);
                        ?>
                                <table class="price-tables__item price-list">
                                    <tbody>
                                        <tr class="price-list__row">
                                            <th class="price-list__title" rowspan="<?php echo $row_count; ?>">
                                                <span><?php echo esc_html($course_title); ?></span>
                                            </th>
                                            <?php
                                            $first_row = true;
                                            foreach ($details as $detail) :
                                                if (!$first_row) :
                                            ?>
                                        <tr class="price-list__row">
                                        <?php endif; ?>
                                        <td class="price-list__item">
                                            <?php
                                                $course_content = $detail['course_content' . substr($title_key, -1)];
                                                echo esc_html($course_content); // 全角スペースの置換処理を削除
                                            ?>
                                        </td>
                                        <td class="price-list__value">
                                            <span>
                                                <?php echo esc_html($detail['course_price' . substr($title_key, -1)]); ?>
                                            </span>
                                        </td>
                                        </tr>
                                        <?php $first_row = false; ?>
                                    <?php endforeach; ?>
                                    </tr>
                                    </tbody>
                                </table>
                        <?php endif;
                        }
                        ?>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>