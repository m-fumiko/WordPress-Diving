<?php get_header(); ?>
<main>
  <!-- MV -->
  <?php
  // カスタムフィールドの値を取得
  $slide_images = SCF::get('slider_images');

  // スライド画像がある場合のみ表示
  if (!empty($slide_images)) :
  ?>
    <section class="top-mv js-mv">
      <div class="top-mv__inner">
        <div class="top-mv__title-wrap">
          <h2 class="top-mv__main-title">diving</h2>
          <p class="top-mv__sub-title">into the ocean</p>
        </div>
        <div class="top-mv__swiper swiper js-mv-swiper">
          <div class="swiper-wrapper">
            <?php
            // カスタムフィールドからスライド画像を取得
            $slide_images = SCF::get('slider_images');
            // スライド画像をループ処理
            foreach ($slide_images as $slide_image) :
              $pc_image_id = $slide_image['pc_image']; // PC用画像IDを取得
              $sp_image_id = $slide_image['sp_image']; // スマホ用画像IDを取得
              // どちらかの画像IDが存在する場合
              if ($pc_image_id || $sp_image_id) :
                // 画像URLを取得（IDが存在する場合）
                $pc_image_url = $pc_image_id ? wp_get_attachment_image_src($pc_image_id, 'full')[0] : '';
                $sp_image_url = $sp_image_id ? wp_get_attachment_image_src($sp_image_id, 'full')[0] : '';
            ?>
                <div class="swiper-slide">
                  <picture>
                    <?php if ($sp_image_url) : // スマホ用画像がある場合 
                    ?>
                      <source srcset="<?php echo esc_url($sp_image_url); ?>" media="(max-width: 767px)" />
                    <?php endif; ?>
                    <?php if ($pc_image_url) : // PC用画像がある場合 
                    ?>
                      <img src="<?php echo esc_url($pc_image_url); ?>" alt="スライド画像">
                    <?php endif; ?>
                  </picture>
                </div>
              <?php else : // どちらの画像もない場合 
              ?>
                <div class="swiper-slide">
                  <p>画像がありません</p>
                </div>
              <?php endif; ?>
            <?php endforeach; // ループ終了 
            ?>
          </div>
        </div>
      </div>
    </section>
  <?php
  endif;
  ?>
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
      <div class="top-campaign__swiper">
        <div class="swiper js-top-campaign-swiper">
          <ul class="swiper-wrapper">
            <?php
            // 最新のキャンペーン投稿を取得
            $args = array(
              'post_type' => 'campaign', // カスタム投稿タイプ名
              'posts_per_page' => -1, // 全ての投稿を表示
            );
            $campaign_query = new WP_Query($args);
            if ($campaign_query->have_posts()) :
              while ($campaign_query->have_posts()) : $campaign_query->the_post();
                $category = get_the_terms(get_the_ID(), 'campaign_category'); // カスタムタクソノミーを取得
                $category_name = !empty($category) ? $category[0]->name : '';

                // カスタムフィールドの値を取得
                $campaign_price = get_field('campaign_price');
                $campaign_period = get_field('campaign_period');

                // キャンペーン価格のサブフィールドを取得
                $price_comment = isset($campaign_price['price_comment']) ? $campaign_price['price_comment'] : '';
                $normal_price = isset($campaign_price['normal_price']) ? $campaign_price['normal_price'] : '';
                $discount_price = isset($campaign_price['discount_price']) ? $campaign_price['discount_price'] : '';

                // キャンペーン期間のサブフィールドを取得
                $start_date = isset($campaign_period['start_date']) ? $campaign_period['start_date'] : '';
                $end_date = isset($campaign_period['end_date']) ? $campaign_period['end_date'] : '';

                // 日付を取得してフォーマットを変更
                $start_year = date('Y', strtotime($start_date));
                $end_year = date('Y', strtotime($end_date));
                $start_formatted = date('Y/n/j', strtotime($start_date));
                $end_formatted = date('n/j', strtotime($end_date));

                // 西暦が同じかどうかで表示形式を変える
                if ($start_year === $end_year) {
                  $period = "{$start_formatted} - {$end_formatted}";
                } else {
                  $end_formatted_full = date('Y/n/j', strtotime($end_date));
                  $period = "{$start_formatted} - {$end_formatted_full}";
                }
            ?>
                <li class="swiper-slide">
                  <div class="top-campaign__card campaign-card">
                    <div class="campaign-card__img">
                      <?php if (has_post_thumbnail()) : ?>
                        <!-- アイキャッチ画像があれば 'full' サイズで出力 -->
                        <?php the_post_thumbnail('full'); ?>
                      <?php else : ?>
                        <!-- アイキャッチ画像がなければ NoImage 画像を出力 -->
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage.jpg" alt="No Image">
                      <?php endif; ?>
                    </div>
                    <div class="campaign-card__content">
                      <p class="campaign-card__category"><?php echo esc_html($category_name); ?></p>
                      <p class="campaign-card__title"><?php the_title(); ?></p>
                      <?php if (!empty($discount_price)) : // ディスカウント価格が設定されている場合のみ表示 
                      ?>
                        <?php if (!empty($price_comment)) : ?>
                          <p class="campaign-card__text campaign-card__text--sub"><?php echo esc_html($price_comment); ?></p>
                        <?php endif; ?>
                        <div class="campaign-card__price campaign-card__price--sub">
                          <?php if (!empty($normal_price)) : // 通常価格が設定されているかチェック 
                          ?>
                            <p class="campaign-card__price-black">¥<?php echo number_format((float) $normal_price); ?></p>
                          <?php endif; ?>
                          <p class="campaign-card__price-green">¥<?php echo number_format((float) $discount_price); ?></p>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </li>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php else : ?>
              <li>
                <p>キャンペーンがありません。</p>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
      <div class="top-campaign__button-wrapper">
        <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="common-button">View more<span></span></a>
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
        );
        $custom_query = new WP_Query($args); // カスタムクエリを作成
        ?>
        <?php if ($custom_query->have_posts()) : // 投稿があるかチェック
        ?>
          <?php while ($custom_query->have_posts()) : $custom_query->the_post(); // 投稿がある限りループ
          ?>
            <li class="blog-list__item blog-card blog-card--2">
              <a href="<?php the_permalink(); // 投稿のパーマリンクを取得
                        ?>">
                <div class="blog-card__img">
                  <?php if (has_post_thumbnail()) : // アイキャッチ画像が設定されているかチェック
                  ?>
                    <?php the_post_thumbnail('full'); // アイキャッチ画像をフルサイズで表示
                    ?>
                  <?php else : // アイキャッチ画像が設定されていない場合
                  ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/noimage.jpg'); ?>" alt="NoImage画像">
                  <?php endif; ?>
                </div>
                <div class="blog-card__content">
                  <time class="blog-card__date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('Y.m/d'); // 投稿の日付を表示
                                                                                            ?></time>
                  <p class="blog-card__title"><?php the_title(); // 投稿のタイトルを表示
                                              ?></p>
                  <p class="blog-card__text">
                    <?php echo wp_trim_words(get_the_excerpt(), 90, '...'); // 投稿の抜粋を100語にトリムして表示
                    ?>
                  </p>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); // カスタムクエリのデータをリセット 
          ?>
        <?php else : // 投稿がない場合の処理 
        ?>
          <li>
            <p>記事が見つかりませんでした。</p>
          </li>
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
        );
        $custom_query = new WP_Query($args); // カスタムクエリを作成
        ?>
        <?php if ($custom_query->have_posts()) : // 投稿があるかチェック 
        ?>
          <?php while ($custom_query->have_posts()) : $custom_query->the_post(); // 投稿がある限りループ 
          ?>
            <?php
            // カスタムタクソノミー 'voice_category' のタームを取得
            $category = get_the_terms(get_the_ID(), 'voice_category');
            $category_name = !empty($category) ? $category[0]->name : '';
            // カスタムフィールドの値を取得
            $voice_info = get_field('voice_info'); // カスタムフィールド "voice_info" の値を取得
            $voice_age = isset($voice_info['voice_age']) ? $voice_info['voice_age'] : ''; // カスタムフィールド "voice_age" の値を取得
            $voice_gender = isset($voice_info['voice_gender']) ? $voice_info['voice_gender'] : ''; // カスタムフィールド "voice_gender" の値を取得
            // 140文字まで制限
            $content = get_the_content();
            $trimmed_content = mb_substr($content, 0, 200, 'UTF-8') . (mb_strlen($content) > 200 ? '...' : '');
            ?>
            <li class="voice-list__item">
              <div class="voice-card">
                <div class="voice-card__flex">
                  <div class="voice-card__content">
                    <div class="voice-card__meta">
                      <?php if (!empty($voice_age) && !empty($voice_gender)) : // voice_ageとvoice_genderが両方設定されているかチェック 
                      ?>
                        <p class="voice-card__info">
                          <?php echo esc_html($voice_age); ?>（<?php echo esc_html($voice_gender); ?>）
                        </p>
                      <?php endif; ?>
                      <p class="voice-card__category">
                        <?php echo esc_html($category_name); ?>
                      </p>
                    </div>
                    <h2 class="voice-card__title voice-card__title--large">
                      <?php
                      $title = get_the_title(); // 投稿のタイトルを取得
                      if (mb_strlen($title) > 20) {
                        $title = mb_substr($title, 0, 20) . '...';
                      }
                      echo esc_html($title);
                      ?>
                    </h2>
                  </div>
                  <div class="voice-card__img color-box js-color-box">
                    <!-- アイキャッチ画像があるかチェック -->
                    <?php if (has_post_thumbnail()) : ?>
                      <!-- アイキャッチ画像があれば 'full' サイズで出力 -->
                      <?php the_post_thumbnail('full', ['alt' => the_title_attribute('echo=0'), 'width' => 151, 'height' => 117, 'loading' => 'lazy']); ?>
                    <?php else : ?>
                      <!-- アイキャッチ画像がなければ NoImage 画像を出力 -->
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/noimage.jpg" alt="NoImage画像">
                    <?php endif; ?>
                  </div>
                </div>
                <p class="voice-card__text">
                  <?php echo wp_trim_words(strip_shortcodes(get_the_content()), 115, '...'); // 投稿の内容を要約し、ショートコードを除去 
                  ?>
                </p>
              </div>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>
            <p>記事が見つかりませんでした。</p>
          </li>
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
            'course_title5' => 'details5',
            'course_title6' => 'details6',
          ];
          // 各コースをループ処理
          foreach ($courses as $title_key => $details_key) :
            // SCFプラグインを使用してデータを取得
            $course_title = SCF::get($title_key, $price_page_id); // コースタイトルを取得
            $details = SCF::get($details_key, $price_page_id); // コース詳細情報を取得
            // コースタイトルと詳細情報が存在する場合
            if (!empty($course_title) && !empty($details)) :
          ?>
              <li class="top-price__item">
                <h3 class="top-price__item-title"><?php echo esc_html($course_title); ?></h3> <!-- コースタイトルを表示 -->
                <dl>
                  <?php foreach ($details as $detail) : // 各詳細情報をループ処理
                    $course_content = wp_kses_post($detail['course_content' . substr($title_key, -1)]); // コース内容を取得
                    $course_price = esc_html($detail['course_price' . substr($title_key, -1)]); // コース価格を取得
                    // コース価格に '¥' が含まれていない場合、先頭に追加
                    if (strpos($course_price, '¥') === false) :
                      $course_price = '¥' . $course_price;
                    endif;
                  ?>
                    <div class="top-price__item-content">
                      <dt class="top-price__item-text"><?php echo $course_content; ?></dt> <!-- コース内容を表示 -->
                      <dd class="top-price__item-price"><?php echo $course_price; ?></dd> <!-- コース価格を表示 -->
                    </div>
                  <?php endforeach; ?>
                </dl>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="top-price__button-wrapper">
      <a href="<?php echo esc_url(home_url("/price")) ?>" class="common-button">View more<span></span></a>
    </div>
  </section>
</main>
<?php get_footer(); ?>