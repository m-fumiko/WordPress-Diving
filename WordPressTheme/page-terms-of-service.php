<?php get_header(); ?>
<main>
    <!-- sub-mv -->
<div class="sub-mv">
    <div class="sub-mv__inner">
        <h1 class="sub-mv__title sub-mv__title--other">Terms of Service</h1>
        <div class="sub-mv__img">
            <picture>
                <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sitemap-sp-img.jpg" media="(max-width: 768px)" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sitemap-img.jpg" alt="砂浜と青い海">
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
            <span class="current-item">利用規約</span>
        </span>
        <!-- Breadcrumb NavXTで出力される部分 ここまで -->
    </div>
</div>
<section class="terms-of-service terms-of-service-layout">
    <div class="terms-of-service__inner inner">
        <div class="terms-of-service__wrap">
            <h3 class="terms-of-service__title">利用規約</h3>
            <p class="terms-of-service__text">以下は、Webサイトで使用する一般的な利用規約の例です。
            </p>
            <dl class="terms-of-service__items">
                <div class="terms-of-service__item">
                    <dd class="terms-of-service__description">
                        <ol class="terms-of-service__description-numbers">
                            <li class="terms-of-service__description-number">概要&nbsp;この利用規約は、当社が提供するサービスの利用に関する条件を定めたものです。本規約に同意いただくことで、当社のサービスを利用いただけます。なお、本規約に違反した場合、当社はサービスの提供を中止することがあります。
                            </li>
                            <li class="terms-of-service__description-number">サービスの利用&nbsp;当社のサービスは、お客様が自己責任において利用するものとし、当社はその利用に対して責任を負いません。また、当社はいつでも、サービスの提供を中止することができるものとします。
                            </li>
                            <li class="terms-of-service__description-number">禁止事項&nbsp;お客様は、以下の行為を禁止します。
                            </li>
                        </ol>
                        <p class="terms-of-service__description-text"> ・当社のサービスに対して不正なアクセスをすること ・当社のサービスにおいて、他のユーザーに対して迷惑をかける行為をすること ・当社のサービスを商業目的で利用すること ・当社のサービスに関する知的財産権を侵害する行為をすること ・その他、法律や公序良俗に反する行為をすること</p>
                    </dd>
                </div>
                <div class="terms-of-service__item">
                    <dd class="terms-of-service__description">
                        <ol class="terms-of-service__description-numbers">
                            <li class="terms-of-service__description-number">知的財産権&nbsp;当社のサービスに関する知的財産権は、当社または当社にライセンスを許諾している者に帰属します。お客様は、当社の事前の承諾なしに、当社のサービスに関する知的財産権を使用することはできません。
                            </li>
                            <li class="terms-of-service__description-number">免責事項&nbsp;当社は、当社のサービスに関連して発生した損害について、一切の責任を負わないものとします。また、当社は、当社のサービスにより提供される情報の正確性、信頼性、完全性、適時性についても一切保証しません。
                            </li>
                            <li class="terms-of-service__description-number">プライバシー&nbsp;当社は、お客様の個人情報を適切に保護するために、個人情報保護方針に従って適切な取扱いを行います。
                            </li>
                            <li class="terms-of-service__description-number">その他の規定&nbsp;本規約は、日本法に準拠して解釈されるものとし、当社とお客様は、本規約に関する紛争が生じた場合、東京地方裁判所を第一審の専属的合意管轄裁判所とすることに同意します。
                            </li>
                            <li class="terms-of-service__description-number">利用規約の変更&nbsp;当社は、必要に応じて本利用規約を変更することがあります。変更後の利用規約は、当社のサイトに掲載された時点から効力を有するものとします。変更があった場合、当社は適切な手段でお知らせします。
                            </li>
                        </ol>
                    </dd>
                </div>
            </dl>
            <p class="privacy-policy__text">以上が、当社の利用規約の概要です。お客様のサービス利用にあたっては、本規約をお読みいただき、同意いただける場合のみサービスをご利用ください。</p>
        </div>
    </div>
</section>
</main>

<?php get_footer(); ?>