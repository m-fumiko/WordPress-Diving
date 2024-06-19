<?php get_header(); ?>
<main>
    <!-- sub-mv -->
<div class="sub-mv">
    <div class="sub-mv__inner">
        <h1 class="sub-mv__title">contact</h1>
        <div class="sub-mv__img">
            <picture>
                <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/contact-sp-img.jpg" media="(max-width: 768px)" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/contact-img.jpg" alt="砂浜と青い海">
            </picture>
        </div>
    </div>
</div>
<!-- パンくず -->
<div class="breadcrumb breadcrumb-layout">
    <div class="breadcrumb__inner inner">
        <!-- Breadcrumb NavXTで出力される部分 ここから -->
        <span>
            <a href="<?php echo esc_url(home_url("/")) ?>">
                <span>top</span>
            </a>
        </span>
        &nbsp;&gt;&nbsp;
        <span>
            <span class="current-item">お問い合わせ</span>
        </span>
        <!-- Breadcrumb NavXTで出力される部分 ここまで -->
    </div>
</div>
<!-- コンタクトフォーム -->
<div class="contact contact-layout">
    <div class="contact__inner inner">
        <form class="contact__form form" action="">
            <dl class="form__wrap">
                <dt class="form__label">お名前<span>必須</span></dt>
                <dd class="form__input form-input">
                    <input type="text" id="" name="" placeholder="沖縄&emsp;太郎">
                </dd>
            </dl>
            <dl class="form__wrap">
                <dt class="form__label">メールアドレス<span>必須</span></dt>
                <dd class="form__input form-input">
                    <input type="email" id="" name="" placeholder="aaa000@ggmail.com">
                </dd>
            </dl>
            <dl class="form__wrap">
                <dt class="form__label">電話番号<span>必須</span></dt>
                <dd class="form__input form-input">
                    <input type="tel" id="" name="" placeholder="000-0000-0000">
                </dd>
            </dl>
            <dl class="form__wrap">
                <dt class="form__label">お問合せ項目<span>必須</span></dt>
                <dd class="form__checkbox form-checkbox">
                    <label><input type="checkbox" name="" value=""><span>ダイビング講習について</span></label>
                    <label><input type="checkbox" name="" value=""><span>ファンデイビングについて</span></label>
                    <label><input type="checkbox" name="" value=""><span>体験ダイビングについて</span></label>
                </dd>
            </dl>
            <dl class="form__wrap">
                <dt class="form__label">キャンペーン</dt>
                <dd class="form__select form-select">
                    <select>
                        <option hidden>キャンペーン内容を選択</option>
                        <option value="">ライセンス取得</option>
                        <option value="">貸切体験ダイビング</option>
                        <option value="">ナイトダイビング</option>
                        <option value="">貸切ファンダイビング</option>
                    </select>
                </dd>
            </dl>
            <dl class="form__wrap form__wrap--textarea">
                <dt class="form__label">お問合せ内容<span>必須</span></dt>
                <dd class="form__textarea form-textarea">
                    <textarea name="message"></textarea>
                </dd>
            </dl>
            <div class="form__check form-check">
                <label>
                    <input type="checkbox" name="" value=""><span>個人情報の取り扱いについて同意のうえ<br class="u-mobile">送信します。</span>
                </label>
            </div>
            <div class="form__submit form-submit">
                <div class="form-submit__button common-button">
                    <input type="button" onclick="location.href='#'" value="Send"><span></span>
                </div>
            </div>
        </form>
    </div>
</div>
</main>

<?php get_footer(); ?>