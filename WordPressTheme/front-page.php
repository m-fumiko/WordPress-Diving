<?php get_header(); ?>
<main>
  <!-- MV -->
  <section class="top-mv js-mv">
    <div class="top-mv__inner">
      <div class="top-mv__title-wrap">
        <h2 class="top-mv__main-title">diving</h2>
        <p class="top-mv__sub-title">into the ocean</p>
      </div>
      <div class="top-mv__swiper swiper js-mv-swiper">
        <div class="swiper-wrapper">
          <?php
          // カスタムフィールドの値を取得
          $slide_images = SCF::get('slider_images');
          // スライド画像を表示
          foreach ($slide_images as $slide_image) {
            $pc_image_id = $slide_image['pc_image'];
            $sp_image_id = $slide_image['sp_image'];

            if ($pc_image_id && $sp_image_id) {
              $pc_image_url = wp_get_attachment_image_src($pc_image_id, 'full')[0];
              $sp_image_url = wp_get_attachment_image_src($sp_image_id, 'full')[0];

              echo '<div class="swiper-slide">';
              echo '<picture>';
              echo '<source srcset="' . esc_url($sp_image_url) . '" media="(max-width: 767px)" />';
              echo '<img src="' . esc_url($pc_image_url) . '" alt="スライド画像">';
              echo '</picture>';
              echo '</div>';
            }
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <!-- キャンーペーン -->
  <section id="top-campaign" class="top-campaign top-campaign-layout">
    <div class="top-campaign__inner inner">
      <div class="top-campaign__container">
        <div class="top-campaign__title common-title">
          <p class="common-title__main">campaign</p>
          <h2 class="common-title__sub">キャンペーン</h2>
        </div>
        <!-- 矢印 -->
        <div class="top-campaign__swiper-button u-desktop">
          <div class="top-campaign__swiper-button-prev swiper-button-prev js-siwper-button"></div>
          <div class="top-campaign__swiper-button-next swiper-button-next js-siwper-button"></div>
        </div>
      </div>
      <div class="top-campaign__swiper ">
        <div class="swiper js-top-campaign-swiper">
          <ul class="swiper-wrapper">
            <li class="swiper-slide">
              <div class="top-campaign__card campaign-card">
                <div class="campaign-card__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign1.jpg" alt="無数の熱帯魚が泳いでいる様子">
                </div>
                <div class="campaign-card__content">
                  <p class="campaign-card__category">ライセンス講習</p>
                  <p class="campaign-card__title">ライセンス取得</p>
                  <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                  <div class="campaign-card__price">
                    <p class="campaign-card__price-black">¥56,000</p>
                    <p class="campaign-card__price-green">¥46,000</p>
                  </div>
                </div>
              </div>
            </li>
            <li class="swiper-slide">
              <div class="top-campaign__card campaign-card">
                <div class="campaign-card__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign2.jpg" alt="浅瀬に船が浮かんでいる景色の画像">
                </div>
                <div class="campaign-card__content">
                  <p class="campaign-card__category">体験ダイビング</p>
                  <p class="campaign-card__title">貸切体験ダイビング</p>
                  <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                  <div class="campaign-card__price">
                    <p class="campaign-card__price-black">¥24,000</p>
                    <p class="campaign-card__price-green">¥18,000</p>
                  </div>
                </div>
              </div>
            </li>
            <li class="swiper-slide">
              <div class="top-campaign__card campaign-card">
                <div class="campaign-card__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign3.jpg" alt="多くの光るクラゲが泳いでいる様子">
                </div>
                <div class="campaign-card__content">
                  <p class="campaign-card__category">体験ダイビング</p>
                  <p class="campaign-card__title">ナイトダイビング</p>
                  <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                  <div class="campaign-card__price">
                    <p class="campaign-card__price-black">¥10,000</p>
                    <p class="campaign-card__price-green">¥8,000</p>
                  </div>
                </div>
              </div>
            </li>
            <li class="swiper-slide">
              <div class="top-campaign__card campaign-card">
                <div class="campaign-card__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign4.jpg" alt="ダイビングをしている3人の男性が海から顔を出しているコミュニケーションを取っている様子">
                </div>
                <div class="campaign-card__content">
                  <p class="campaign-card__category">ファンダイビング</p>
                  <p class="campaign-card__title">貸切ファンダイビング</p>
                  <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                  <div class="campaign-card__price">
                    <p class="campaign-card__price-black">¥20,000</p>
                    <p class="campaign-card__price-green">¥16,000</p>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="top-campaign__button-wrapper">
        <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="common-button">View more<span></span>
        </a>
      </div>
    </div>
  </section>
  <!-- アバウト -->
  <section id="top-about" class="top-about top-about-layout">
    <div class="top-about__inner inner">
      <div class="top-about__title common-title">
        <p class="common-title__main">about us</p>
        <h2 class="common-title__sub">私たちについて</h2>
      </div>
      <div class="top-about__contents">
        <div class="top-about__img-wrap">
          <div class="top-about__img-before">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutus1.jpg" alt="屋根に乗っているシーサーの画像">
          </div>
          <div class="top-about__img-after">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutus2.jpg" alt="2匹の黄色い熱帯魚が泳いでいる様子">
          </div>
        </div>
        <div class="top-about__content">
          <h3 class="top-about__sub-title">
            Dive into<br>the Ocean
          </h3>
          <div class="top-about__content-right">
            <p class="top-about__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            </p>
            <!-- ボタン -->
            <div class="top-about__button-wrapper">
              <a href="<?php echo esc_url(home_url("/about")) ?>" class="common-button">View more<span></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- インフォメーション -->
  <section id="top-information" class="top-information top-information-layout">
    <div class="top-information__inner inner">
      <div class="top-information__title common-title">
        <p class="common-title__main">information</p>
        <h2 class="common-title__sub">ダイビング情報</h2>
      </div>
      <div class="top-information__flex">
        <div class="top-information__img color-box js-color-box">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/top/top-infomation.jpg" alt="サンゴに囲まれ複数の熱帯魚が泳いでいる様子">
        </div>
        <div class="top-information__content">
          <div class="top-information__content-title">ライセンス講習</div>
          <p class="top-information__content-text">
            当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br>正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。</p>
          <div class="top-information__button-wrapper">
            <a href="<?php echo esc_url(home_url("/information")) ?>" class="common-button">View more<span></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ブログ -->
  <section id="top-blog" class="top-blog top-blog-layout">
    <div class="top-blog__inner inner">
      <div class="top-blog__title common-title">
        <p class="common-title__main common-title__main--white">blog</p>
        <h2 class="common-title__sub common-title__sub--white">ブログ</h2>
      </div>
      <ul class="top-blog__list blog-list">
        <?php
        // カスタムクエリの作成
        $args = array(
          'post_type' => 'post', // 投稿タイプを「post」に指定
          'posts_per_page' => 3, // 表示する投稿数を3に設定
          'orderby' => 'date', // 日付で並べ替え
          'order' => 'DESC', // 降順で並べ替え（新しいものが先に表示される）
        );
        $custom_query = new WP_Query($args); // カスタムクエリを作成
        ?>
        <?php if ($custom_query->have_posts()) : // 投稿があるかチェック ?>
          <?php while ($custom_query->have_posts()) : $custom_query->the_post(); // 投稿がある限りループ ?>
            <li class="blog-list__item blog-card blog-card--2">
              <a href="<?php the_permalink(); // 投稿のパーマリンクを取得 ?>">
                <div class="blog-card__img">
                  <?php if (has_post_thumbnail()) : // アイキャッチ画像が設定されているかチェック ?>
                    <?php the_post_thumbnail('full'); // アイキャッチ画像をフルサイズで表示 ?>
                  <?php else : // アイキャッチ画像が設定されていない場合 ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/noimage.jpg'); ?>" alt="NoImage画像">
                  <?php endif; ?>
                </div>
                <div class="blog-card__content">
                  <time class="blog-card__date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('Y.m/d'); // 投稿の日付を表示 ?></time>
                  <p class="blog-card__title"><?php the_title(); // 投稿のタイトルを表示 ?></p>
                  <p class="blog-card__text">
                    <?php echo wp_trim_words(get_the_excerpt(), 100, '...'); // 投稿の抜粋を100語にトリムして表示 ?>
                  </p>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); // カスタムクエリのデータをリセット ?>
        <?php else : // 投稿がない場合の処理 ?>
          <p>記事が見つかりませんでした。</p>
        <?php endif; ?>
      </ul>
      <div class="top-blog__button-wrapper">
        <a href="<?php echo esc_url(home_url('/blog')); ?>" class="common-button">View more<span></span></a>
      </div>
    </div>
  </section>
  <!-- ボイス -->
  <section id="top-voice" class="top-voice top-voice-layout">
    <div class="top-voice__inner inner">
      <div class="top-voice__title common-title">
        <p class="common-title__main">voice</p>
        <h2 class="common-title__sub">お客様の声</h2>
      </div>
      <ul class="top-voice__list voice-list">
        <?php
        // カスタムクエリの作成
        $args = array(
          'post_type' => 'voice', // カスタム投稿タイプ「voice」を指定
          'posts_per_page' => 2, // 表示する投稿数を2に設定
          'orderby' => 'date', // 日付で並べ替え
          'order' => 'DESC', // 降順で並べ替え（新しいものが先に表示される）
        );
        $custom_query = new WP_Query($args); // カスタムクエリを作成
        ?>
        <?php if ($custom_query->have_posts()) : // 投稿があるかチェック ?>
          <?php while ($custom_query->have_posts()) : $custom_query->the_post(); // 投稿がある限りループ ?>
            <?php if (have_rows('voice_card')) : while (have_rows('voice_card')) : the_row(); // カスタムフィールド「voice_card」があるかチェック ?>
                <li class="voice-list__item">
                  <div class="voice-card">
                    <div class="voice-card__flex">
                      <div class="voice-card__content">
                        <div class="voice-card__meta">
                          <p class="voice-card__info"><?php echo esc_html(get_sub_field('voice_age')); ?>（<?php echo esc_html(get_sub_field('voice_gender')); ?>）</p> <!-- カスタムフィールド「voice_age」と「voice_gender」を表示 -->
                          <p class="voice-card__category">
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'voice_category'); // カテゴリーを取得
                            if ($categories && !is_wp_error($categories)) {
                              $category_list = array_map(function ($category) {
                                return esc_html($category->name);
                              }, $categories);
                              echo implode(', ', $category_list); // カテゴリー名をカンマ区切りで表示
                            }
                            ?>
                          </p>
                        </div>
                        <p class="voice-card__title">
                          <?php
                          $title = get_the_title(); // 投稿のタイトルを取得
                          if (mb_strlen($title) > 20) {
                            $title = mb_substr($title, 0, 20) . '...'; // タイトルが20文字以上の場合、20文字で切り取って「...」を追加
                          }
                          echo esc_html($title); // タイトルを表示
                          ?>
                        </p>
                      </div>
                      <div class="voice-card__img color-box js-color-box">
                        <?php if (has_post_thumbnail()) : // アイキャッチ画像が設定されているかチェック ?>
                          <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="151" height="117" loading="lazy" />
                        <?php else : // アイキャッチ画像が設定されていない場合 ?>
                          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/noimage.jpg" alt="NoImage画像">
                        <?php endif; ?>
                      </div>
                    </div>
                    <p class="voice-card__text">
                      <?php echo wpautop(esc_html(get_sub_field('voice_review'))); // カスタムフィールド「voice_review」を表示し、自動で段落を追加 ?>
                    </p>
                  </div>
                </li>
            <?php endwhile;
            endif; ?>
          <?php endwhile; // ループ終了 ?>
          <?php wp_reset_postdata(); // カスタムクエリのデータをリセット ?>
        <?php else : ?>
          <p>記事が見つかりませんでした。</p>
        <?php endif; ?>
      </ul>
      <div class="top-voice__button-wrapper">
        <a href="<?php echo esc_url(home_url("/voice")) ?>" class="common-button">View more<span></span></a>
      </div>
    </div>
  </section>

  <!-- プライス -->
  <section id="top-price" class="top-price top-price-layout">
    <div class="top-price__inner inner">
      <div class="top-price__title common-title">
        <p class="common-title__main">price</p>
        <h2 class="common-title__sub">料金一覧</h2>
      </div>
      <div class="top-price__flex">
        <div class="top-price__img-wrap">
          <picture class="top-price__img color-box js-color-box">
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/top/top-price-sp.jpg" media="(max-width: 767px)">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/top/top-price.jpg" alt="無数のオレンジ色の熱帯魚が巨大なサンゴの周囲で泳いでいる様子">
          </picture>
        </div>
        <ul class="top-price__items">
          <?php
          // 固定ページIDを手動で設定
          $price_page_id = 17; // 価格ページのIDを手動で設定
          // 各コースのタイトルと詳細情報を取得
          $courses = [
            'course_title1' => 'details1',
            'course_title2' => 'details2',
            'course_title3' => 'details3',
            'course_title4' => 'details4',
          ];
          foreach ($courses as $title_key => $details_key) {
            // SCFプラグインを使用してデータを取得
            $course_title = SCF::get($title_key, $price_page_id);
            $details = SCF::get($details_key, $price_page_id);
            if (!empty($course_title) && !empty($details)) {
              echo '<li class="top-price__item">';
              echo '<h3 class="top-price__item-title">' . esc_html($course_title) . '</h3>';
              echo '<dl>';
              foreach ($details as $detail) {
                $course_content = wp_kses_post($detail['course_content' . substr($title_key, -1)]);
                $course_price = esc_html($detail['course_price' . substr($title_key, -1)]);
                if (strpos($course_price, '¥') === false) {
                  $course_price = '¥' . $course_price;
                }
                echo '<div class="top-price__item-content">';
                echo '<dt class="top-price__item-text">' . $course_content . '</dt>';
                echo '<dd class="top-price__item-price">' . $course_price . '</dd>';
                echo '</div>';
              }
              echo '</dl>';
              echo '</li>';
            }
          }
          ?>
        </ul>
      </div>
    </div>
    <div class="top-price__button-wrapper">
      <a href="<?php echo esc_url(home_url("/price")) ?>" class="common-button">View more<span></span></a>
    </div>
  </section>
</main>
<?php get_footer(); ?>