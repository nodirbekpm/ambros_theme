(function ($) {
  // scroll lock helper
  var scroll_lock_count = 0;
  function lock_scroll() {
    if (scroll_lock_count === 0) {
      $('body').data('prev_overflow', $('body').css('overflow'));
      $('body').css('overflow', 'hidden');
    }
    scroll_lock_count++;
  }
  function unlock_scroll() {
    scroll_lock_count = Math.max(0, scroll_lock_count - 1);
    if (scroll_lock_count === 0) {
      $('body').css('overflow', $('body').data('prev_overflow') || '');
    }
  }

  function open_modal($modal) {
    if (!$modal || !$modal.length) return;
    $modal.attr('aria-hidden', 'false').addClass('is_open');
    lock_scroll();

    // focus management (header title yoki birinchi fokusablega)
    var $focusable = $modal.find('[autofocus], .btn_primary, .btn_close_modal, .close').filter(':visible').first();
    if ($focusable.length) $focusable.trigger('focus');
  }

  function close_modal($modal) {
    if (!$modal || !$modal.length) return;
    $modal.attr('aria-hidden', 'true').removeClass('is_open');
    unlock_scroll();
  }

  // Global open via data attribute
  $(document).on('click', '[data_modal_target]', function (e) {
    e.preventDefault();
    var target = $(this).attr('data_modal_target');
    open_modal($(target));
  });

  // Close via .close or .btn_close_modal
  $(document).on('click', '.modal_container .close, .modal_container .btn_close_modal', function () {
    close_modal($(this).closest('.modal_container'));
  });

  // Close by clicking backdrop
  $(document).on('click', '.modal_container .modal_backdrop', function () {
    close_modal($(this).closest('.modal_container'));
  });

  // Prevent backdrop-close when clicking inside dialog
  $(document).on('click', '.modal_dialog', function (e) {
    e.stopPropagation();
  });

  // ESC to close (faqat ochiq modallar)
  $(document).on('keydown', function (e) {
    if (e.key === 'Escape') {
      $('.modal_container.is_open').each(function () {
        close_modal($(this));
      });
    }
  });

  /* ===== Contact Form 7 integratsiya (success modal) ===== */
  document.addEventListener('wpcf7mailsent', function (e) {
    // e.target — bu aynan yuborilgan <form>
    var $form = $(e.target);

    // 1) Formaning o‘zida data-success-modal bo‘lsa, shu ishlatiladi
    var selector =
        $form.attr('data-success-modal')
        // 2) Aks holda yuqoriroq konteynerda (masalan .wpcf7 yoki sizning wrapperingizda) qidiramiz
        || $form.closest('[data-success-modal]').attr('data-success-modal')
        // 3) Topilmasa default:
        || '#success_modal';

    open_modal($(selector));
  }, false);

  // (ixtiyoriy) xatoliklar uchun alohida modal ko‘rsatmoqchi bo‘lsangiz, shunga o‘xshash handler qo‘shasiz:
  // document.addEventListener('wpcf7mailfailed', function (e) {
  //   var $form = $(e.target);
  //   var selector = $form.attr('data-error-modal')
  //                 || $form.closest('[data-error-modal]').attr('data-error-modal')
  //                 || '#error_modal';
  //   open_modal($(selector));
  // }, false);

  // Expose simple API (ixtiyoriy)
  window.open_modal = function (selector) { open_modal($(selector)); };
  window.close_modal = function (selector) { close_modal($(selector)); };
})(jQuery);