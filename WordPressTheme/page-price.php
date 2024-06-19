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
            <?php
            // SCFで料金表のデータを取得
            $price_tables = SCF::get('price_table'); // 'price_table' が正しいフィールドグループ名であることを確認

            if (!empty($price_tables)) :
                foreach ($price_tables as $price_table) :
                    $course_title = $price_table['course_title']; // 'course_title' が正しいフィールド名であることを確認
                    $details = $price_table['details']; // 'details' が正しいフィールド名であることを確認
                    ?>
                    <table class="price-tables__item price-list">
                        <tbody>
                            <tr class="price-list__row">
                                <th class="price-list__title" rowspan="<?php echo count($details); ?>">
                                    <span><?php echo esc_html($course_title); ?></span>
                                </th>
                                <?php
                                $first_detail = true;
                                foreach ($details as $detail) :
                                    $course_content = $detail['course_content']; // 'course_content' が正しいフィールド名であることを確認
                                    $course_price = $detail['course_price']; // 'course_price' が正しいフィールド名であることを確認
                                    if (!$first_detail) {
                                        echo '<tr class="price-list__row">';
                                    }
                                    ?>
                                    <td class="price-list__item"><?php echo esc_html($course_content); ?></td>
                                    <td class="price-list__value"><?php echo esc_html($course_price); ?></td>
                                    <?php
                                    if ($first_detail) {
                                        $first_detail = false;
                                    } else {
                                        echo '</tr>';
                                    }
                                endforeach;
                                ?>
                            </tr>
                        </tbody>
                    </table>
                <?php
                endforeach;
            else :
                echo '<p>料金表が設定されていません。</p>';
            endif;
            ?>
        </div>
    </div>
</section>



</main>

<?php get_footer(); ?>