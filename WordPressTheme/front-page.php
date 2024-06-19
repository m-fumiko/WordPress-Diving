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
              $sp_image_url = wp_get_attachment_image_src($sp_image_id, 'medium')[0];
              
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
  <!-- <section id="top-blog" class="top-blog top-blog-layout">
  <div class="top-blog__inner inner">
    <div class="top-blog__title common-title">
      <p class="common-title__main common-title__main--white">blog</p>
      <h2 class="common-title__sub common-title__sub--white">ブログ</h2>
    </div>
    <ul class="top-blog__list blog-list">
      <li class="blog-list__item blog-card">
        <a href="#">
          <div class="blog-card__img">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog1.jpg" alt="ピンク色の綺麗な珊瑚礁の画像">
          </div>
          <div class="blog-card__content">
            <time class="blog-card__date" datetime="2023-11-17">2023.11/17</time>
            <p class="blog-card__title">ライセンス取得</p>
            <p class="blog-card__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
          </div>
        </a>
      </li>
      <li class="blog-list__item blog-card">
        <a href="#">
          <div class="blog-card__img">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog2.jpg" alt="ウミガメがこちらに向かって泳いで来る画像">
          </div>
          <div class="blog-card__content">
            <time class="blog-card__date" datetime="2023-11-17">2023.11/17</time>
            <p class="blog-card__title">ウミガメと泳ぐ</p>
            <p class="blog-card__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
          </div>
        </a>
      </li>
      <li class="blog-list__item blog-card">
        <a href="#">
          <div class="blog-card__img">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog3.jpg" alt="カクレクマノミの画像">
          </div>
          <div class="blog-card__content">
            <time class="blog-card__date" datetime="2023-11-17">2023.11/17</time>
            <p class="blog-card__title">カクレクマノミ</p>
            <p class="blog-card__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
          </div>
        </a>
      </li>
    </ul>
    <div class="top-blog__button-wrapper">
      <a href="blog.html" class="common-button">View more<span></span>
      </a>
    </div>
  </div>
</section> -->
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
          'post_type' => 'post', // 投稿タイプが「post」（通常のブログ投稿）
          'posts_per_page' => 3, // 表示する投稿数
          'orderby' => 'date', // 日付順に並べる
          'order' => 'DESC', // 新しい順に表示
        );
        $custom_query = new WP_Query($args);
        ?>

        <?php if ($custom_query->have_posts()) : ?>
          <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
            <li class="blog-list__item blog-card">
              <a href="<?php the_permalink(); ?>">
                <div class="blog-card__img">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full'); ?>
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/noimage.jpg'); ?>" alt="NoImage画像">
                  <?php endif; ?>
                </div>
                <div class="blog-card__content">
                  <time class="blog-card__date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('Y.m/d'); ?></time>
                  <p class="blog-card__title"><?php the_title(); ?></p>
                  <p class="blog-card__text">
                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                  </p>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
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
        <li class="voice-list__item">
          <div class="voice-card">
            <div class="voice-card__flex">
              <div class="voice-card__content">
                <div class="voice-card__meta">
                  <p class="voice-card__info">20代(女性)</p>
                  <p class="voice-card__category">ライセンス講習</p>
                </div>
                <p class="voice-card__title">ここにタイトルが入ります。ここにタイトル</p>
              </div>
              <div class="voice-card__img color-box js-color-box">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice1.jpg" alt="ツバの広い帽子を被った笑顔の女性の画像">
              </div>
            </div>
            <p class="voice-card__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。
            </p>
          </div>
        </li>
        <li class="voice-list__item">
          <div class="voice-card">
            <div class="voice-card__flex">
              <div class="voice-card__content">
                <div class="voice-card__meta">
                  <p class="voice-card__info">30代(男性)</p>
                  <p class="voice-card__category">ファンダイビング</p>
                </div>
                <p class="voice-card__title">ここにタイトルが入ります。ここにタイトル</p>
              </div>
              <div class="voice-card__img color-box js-color-box">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice2.jpg" alt="親指を立てたポーズを取っている男性の画像">
              </div>
            </div>
            <p class="voice-card__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。
            </p>
          </div>
        </li>
      </ul>
      <div class="top-voice__button-wrapper">
        <a href="<?php echo esc_url(home_url("/voice")) ?>" class="common-button">View more<span></span>
        </a>
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
            <source srcset="./assets/images/top/top-price-sp.jpg" media="(max-width: 767px)">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/top/top-price.jpg" alt="無数のオレンジ色の熱帯魚が巨大なサンゴの周囲で泳いでいる様子">
          </picture>
        </div>
        <ul class="top-price__items">
          <li class="top-price__item">
            <h3 class="top-price__item-title">ライセンス講習</h3>
            <dl>
              <div class="top-price__item-content">
                <dt class="top-price__item-text">オープンウォーターダイバーコース</dt>
                <dd class="top-price__item-price">¥50,000</dd>
              </div>
              <div class="top-price__item-content">
                <dt class="top-price__item-text">アドバンスドオープンウォーターコース</dt>
                <dd class="top-price__item-price">¥60,000</dd>
              </div>
              <div class="top-price__item-content">
                <dt class="top-price__item-text">レスキュー＋EFRコース</dt>
                <dd class="top-price__item-price">¥70,000</dd>
              </div>
            </dl>
          </li>
          <li class="top-price__item">
            <h3 class="top-price__item-title">体験ダイビング</h3>
            <dl>
              <div class="top-price__item-content">
                <dt class="top-price__item-text">ビーチ体験ダイビング(半日)</dt>
                <dd class="top-price__item-price">¥7,000</dd>
              </div>
              <div class="top-price__item-content">
                <dt class="top-price__item-text">ビーチ体験ダイビング(1日)</dt>
                <dd class="top-price__item-price">¥14,000</dd>
              </div>
              <div class="top-price__item-content">
                <dt class="top-price__item-text">ボート体験ダイビング(半日)</dt>
                <dd class="top-price__item-price">¥10,000</dd>
              </div>
              <div class="top-price__item-content">
                <dt class="top-price__item-text">ボート体験ダイビング(1日)</dt>
                <dd class="top-price__item-price">¥18,000</dd>
              </div>
            </dl>
          </li>
          <li class="top-price__item">
            <h3 class="top-price__item-title">ファンダイビング</h3>
            <dl>
              <div class="top-price__item-content">
                <dt class="top-price__item-text">ビーチダイビング(2ダイブ)</dt>
                <dd class="top-price__item-price">¥14,000</dd>
              </div>
              <div class="top-price__item-content">
                <dt class="top-price__item-text">ボートダイビング(2ダイブ)</dt>
                <dd class="top-price__item-price">¥18,000</dd>
              </div>
              <div class="top-price__item-content">
                <dt class="top-price__item-text">スペシャルダイビング(2ダイブ)</dt>
                <dd class="top-price__item-price">¥24,000</dd>
              </div>
              <div class="top-price__item-content">
                <dt class="top-price__item-text">ナイトダイビング(1ダイブ)</dt>
                <dd class="top-price__item-price">¥10,000</dd>
              </div>
            </dl>
          </li>
          <li class="top-price__item">
            <h3 class="top-price__item-title">スペシャルダイビング</h3>
            <dl>
              <div class="top-price__item-content">
                <dt class="top-price__item-text">貸切ダイビング(2ダイブ)</dt>
                <dd class="top-price__item-price">¥24,000</dd>
              </div>
              <div class="top-price__item-content">
                <dt class="top-price__item-text">1日ダイビング(3ダイブ)</dt>
                <dd class="top-price__item-price">¥32,000</dd>
              </div>
            </dl>
          </li>
        </ul>
      </div>
    </div>
    <div class="top-price__button-wrapper">
      <a href="<?php echo esc_url(home_url("/price")) ?>" class="common-button">View more<span></span>
      </a>
    </div>
  </section>
</main>
<?php get_footer(); ?>