<?php get_header(); ?>
<main>
    <!-- sub-mv -->
    <div class="sub-mv">
        <div class="sub-mv__inner">
            <h1 class="sub-mv__title">FAQ</h1>
            <div class="sub-mv__img">
                <picture>
                    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/faq-sp-img.jpg" media="(max-width: 768px)" />
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/faq-img.jpg" alt="青空と砂浜の画像">
                </picture>
            </div>
        </div>
    </div>
    <!-- パンくず -->
    <?php get_template_part('breadcrumb'); ?>
    <!-- faq -->
    <div class="faq faq-layout">
        <div class="faq__inner inner">
            <ul class="faq__list faq-list">
                <?php
                // SCFのフィールドグループ 'faq' からデータを取得
                $faqs = SCF::get('faq');
                if (!empty($faqs)) :
                    foreach ($faqs as $faq) :
                        $question = esc_html($faq['faq_question']); // 質問を取得
                        $answer = esc_html($faq['faq_answer']); // 回答を取得
                        // questionまたはanswerが設定されているかをチェック
                        if (!empty($question) && !empty($answer)) :
                ?>
                            <li class="faq-list__item faq-item">
                                <p class="faq-item__question js-faq-question"><?php echo $question; ?></p>
                                <div class="faq-item__answer"><?php echo nl2br($answer); ?></div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <li class="faq-list__item faq-item">
                        <p>FAQがありません。</p>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</main>
<?php get_footer(); ?>