<!-- contact-section.php -->
<section class="common-contact common-contact-layout">
  <div class="common-contact__inner inner">
    <div class="common-contact__flex">
      <div class="common-contact__access">
        <div class="common-contact__access-logo">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps.svg" alt="CodeUps">
        </div>
        <div class="common-contact__access-info">
          <div class="common-contact__access-text-wrap">
            <?php
            // フロントページのIDを取得
            $front_page_id = get_option('page_on_front');

            // ACFフィールドから情報を取得
            $contact_info = get_field('contact_information', $front_page_id);

            if ($contact_info) :
              $address = isset($contact_info['address']) ? $contact_info['address'] : '';
              $tel = isset($contact_info['tel']) ? $contact_info['tel'] : '';
              $open = isset($contact_info['open_time']) ? $contact_info['open_time'] : '';
              $close = isset($contact_info['close_time']) ? $contact_info['close_time'] : '';
              $closed = isset($contact_info['closed']) ? $contact_info['closed'] : '';

              // 時間の表示形式を確認して変換
              $open_time = !empty($open) ? date('G:i', strtotime($open)) : '';
              $close_time = !empty($close) ? date('G:i', strtotime($close)) : '';
            ?>
              <?php if ($address) : ?>
                <p class="common-contact__access-text"><?php echo esc_html($address); ?></p>
              <?php endif; ?>
              <?php if ($tel) : ?>
                <p class="common-contact__access-text"><a href="tel:<?php echo esc_attr($tel); ?>">TEL: <?php echo esc_html($tel); ?></a></p>
              <?php endif; ?>
              <?php if ($open_time && $close_time) : ?>
                <p class="common-contact__access-text">営業時間: <?php echo esc_html($open_time) . ' - ' . esc_html($close_time); ?></p>
              <?php elseif ($open_time) : ?>
                <p class="common-contact__access-text">営業時間: <?php echo esc_html($open_time); ?></p>
              <?php endif; ?>
              <?php if ($closed) : ?>
                <p class="common-contact__access-text">定休日: <?php echo esc_html($closed); ?></p>
              <?php endif; ?>
            <?php else : ?>
              <p class="common-contact__access-text">情報が設定されていません。</p>
            <?php endif; ?>
          </div>
          <?php if (!empty($address)) : // addressが設定されているかチェック ?>
            <div class="common-contact__access-map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.36291128021!2d127.67381048705204!3d26.21739516794133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e5699d28718f37%3A0x2fa598ddae601d3b!2z44CSOTAwLTAwMzIg5rKW57iE55yM6YKj6KaH5biC5p2-5bGx77yR5LiB55uu77yR77yR!5e0!3m2!1sja!2sjp!4v1702611019185!5m2!1sja!2sjp" width="" height="" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="common-contact__content">
        <div class="common-contact__title common-title">
          <h2 class="common-title__main common-title__main--large">contact</h2>
          <p class="common-title__sub common-title__sub--large">お問い合わせ</p>
        </div>
        <p class="common-contact__text">ご予約・お問い合わせはコチラ</p>
        <div class="common-contact__button-wrapper">
          <a href="<?php echo esc_url(home_url("/contact")) ?>" class="common-button">Contact us<span></span></a>
        </div>
      </div>
    </div>
  </div>
</section>