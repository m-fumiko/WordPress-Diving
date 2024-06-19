"use strict";

jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる

  // ヘッダー背景色変更
  $(function () {
    var headerHeight = $(".js-header").height();
    $('a[href^="#"]').click(function () {
      var speed = 600;
      var href = $(this).attr("href");
      var target = $(href == "#" || href == "" ? "html" : href);
      // ヘッダーの高さ分下げる
      var position = target.offset().top - headerHeight;
      $("body,html").animate({
        scrollTop: position
      }, speed, "swing");
      return false;
    });
  });
  jQuery(window).on('scroll', function () {
    if (jQuery('.js-mv').height() < jQuery(this).scrollTop()) {
      jQuery('.js-header').addClass('transform');
    } else {
      jQuery('.js-header').removeClass('transform');
    }
  });

  // ハンバーガーメニュー
  $(".js-hamburger").on("click", function () {
    $(this).toggleClass("is-open");
    if ($(this).hasClass("is-open")) {
      openDrawer();
    } else {
      closeDrawer();
    }
  });

  // backgroundまたはページ内リンクをクリックで閉じる
  $(".js-drawer a[href]").on("click", function () {
    closeDrawer();
  });

  // resizeイベント
  $(window).on('resize', function () {
    if (window.matchMedia("(min-width: 768px)").matches) {
      closeDrawer();
    }
  });
  function openDrawer() {
    $(".js-drawer").fadeIn();
    $(".js-header,.js-hamburger").addClass("is-open");
  }
  function closeDrawer() {
    $(".js-drawer").fadeOut();
    $(".js-header,.js-hamburger").removeClass("is-open");
  }

  // MVスライダー
  var mv_swiper = new Swiper(".js-mv-swiper", {
    loop: true,
    speed: 2000,
    effect: "fade",
    fadeEffect: {
      crossFade: true
    },
    autoplay: {
      delay: 4000,
      disableOnInteraction: false
    }
  });

  // キャンペーンスライダー
  new Swiper('.js-top-campaign-swiper', {
    loop: true,
    loopedSlides: 4,
    speed: 500,
    spaceBetween: 24,
    width: 280,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
      waitForTransition: false
    },
    navigation: {
      prevEl: '.swiper-button-next',
      nextEl: '.swiper-button-prev'
    },
    breakpoints: {
      768: {
        spaceBetween: 40,
        width: 333
      }
    }
  });

  // 画像の色スライド
  $('.js-color-box').each(function () {
    $(this).append('<div class="color"></div>');
    var color = $(this).find($('.color'));
    var image = $(this).find('img');
    var speed = 700;
    var counter = 0;
    image.css('opacity', '0');
    color.css('width', '0%');
    color.on('inview', function () {
      if (counter == 0) {
        $(this).delay(200).animate({
          'width': '100%'
        }, speed, function () {
          image.css('opacity', '1');
          $(this).css({
            'left': '0',
            'right': 'auto'
          });
          $(this).animate({
            'width': '0%'
          }, speed);
        });
        counter = 1;
      }
    });
  });

  // トップに戻るボタン
  $(document).ready(function () {
    $(".js-top-button").hide();
    $(window).on("scroll", function () {
      var scrollPositionFromTop = $(window).scrollTop();
      var windowHeight = $(window).height();
      var footerTop = $(".footer").offset().top;
      var triggerOffset = 200;

      // ボタンの表示・非表示
      if (scrollPositionFromTop > triggerOffset && scrollPositionFromTop + windowHeight < footerTop) {
        $(".js-top-button").fadeIn();
      } else {
        $(".js-top-button").fadeOut();
      }
    });
    // ボタンクリックでトップに戻る
    $(".js-top-button").click(function () {
      $("html, body").animate({
        scrollTop: 0
      }, 500);
      return false;
    });
  });

  // モーダル
  $(function () {
    var open = $(".js-modal-open"),
      close = $(".js-modal-close");
    // 各画像のクリックイベントを個別に処理
    open.on("click", function () {
      // クリックされた画像のdata-target属性値を取得
      var target = $(this).data("target");
      // 対応するモーダルを開く
      $("#gallery-modal-".concat(target)).addClass("is-open");
    });
    // 閉じるボタンをクリックしたらモーダルを閉じる
    close.on("click", function () {
      $(this).closest(".gallery-modal__item").removeClass("is-open");
      $('body').css('overflow', '');
    });
    // 新しいgallery__itemに対するクリックイベントを設定
    $(".gallery__items").on("click", ".gallery__item", function () {
      var target = $(this).data("target");
      $("#gallery-modal-".concat(target)).addClass("is-open");
      $('body').css('overflow', 'hidden');
    });
  });

  // タブ
  $(function () {
    // タブクリックイベント
    $('.js-tab-menu').on('click', function () {
      $('.js-tab-menu').removeClass('is-active');
      $('.js-tab-content').removeClass('is-active');
      $(this).addClass('is-active');
      var number = $(this).data("number");
      $('#' + number).addClass('is-active');
    });

    // URLのクエリパラメータをチェック
    function getQueryParam(param) {
      var urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(param);
    }
    var tab = getQueryParam('tab');
    if (tab) {
      // タブをアクティブにする
      $('.js-tab-menu').removeClass('is-active');
      $('.js-tab-content').removeClass('is-active');
      $('.js-tab-menu[data-number="' + tab + '"]').addClass('is-active');
      $('#' + tab).addClass('is-active');
    }
  });

  // アコーディオン
  $(function () {
    $('.js-accordion').on('click', function () {
      $(this).next().slideToggle();
      $(this).toggleClass('is-open');
    });
    $(".js-accordion__item:first-child .js-accordion__content").css("display", "block");
  });

  // サブメニュー三角
  $(function () {
    $('.blog-archive__year').on('click', function () {
      $(this).toggleClass('clicked');
    });
  });

  // アコーディオン
  jQuery(function ($) {
    $('.js-faq-question').on('click', function () {
      $(this).next().slideToggle();
      $(this).toggleClass('is-open');
    });
  });
});