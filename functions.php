<?php

add_action('wp_footer', function () {
  if (is_admin()) return;
  ?>
  <div id="ec-help-overlay" class="ec-help-overlay" hidden></div>

  <div id="ec-help-modal" class="ec-help-modal" hidden>
    <div class="ec-help-modal-shell" role="dialog" aria-modal="true">
      <button type="button" class="ec-help-close" aria-label="Close dialog">×</button>
      <div class="ec-help-content">
        <!-- update the gravity form ID -->
        <?php echo do_shortcode('[gravityform id="1" ajax="true" title="false" description="false"]'); ?>
      </div>
    </div>
  </div>

  <style>
    .ec-help-overlay {
      position: fixed; inset: 0; background: rgba(0,0,0,0.6);
      z-index: 9998; opacity: 0; transition: opacity .2s ease;
    }
    .ec-help-overlay.ec-open { opacity: 1; }
    .ec-help-modal {
      position: fixed; inset: 0;
      display: flex; align-items: center; justify-content: center;
      z-index: 9999; pointer-events: none;
    }
    .ec-help-modal.ec-open { pointer-events: auto; }
    .ec-help-modal-shell {
      width: 600px; max-width: 95vw; min-height: 400px;
      max-height: 90vh;
      background: #fff; border-radius: 14px;
      box-shadow: 0 20px 60px rgba(0,0,0,.25);
      transform: translateY(10px) scale(0.98);
      opacity: 0; transition: transform .2s ease, opacity .2s ease;
      padding: 20px 20px 0 20px;

      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: relative;
    }
    .ec-help-modal.ec-open .ec-help-modal-shell {
      transform: translateY(0) scale(1); opacity: 1;
    }
    .ec-help-close {
    position: absolute;
    top: 10px;
    right: 12px;
    width: 36px;
    height: 36px;
    border-radius: 100% !important;
    border: none;
    background: transparent;
    font-size: 28px !important;
    line-height: 1 !important;
    cursor: pointer !important;
    padding: 0 !important;
    }
    .ec-help-close:hover { background: rgba(0,0,0,.08); }
    body.ec-no-scroll { overflow: hidden !important; }
  </style>

  <script>
    (function () {
      var overlay = document.getElementById('ec-help-overlay');
      var modal   = document.getElementById('ec-help-modal');
      var shell   = modal.querySelector('.ec-help-modal-shell');
      var closeBtn = modal.querySelector('.ec-help-close');
      var activeTrigger = null;

      function openModal(trigger) {
        activeTrigger = trigger || null;
        overlay.hidden = false;
        modal.hidden   = false;
        requestAnimationFrame(function () {
          overlay.classList.add('ec-open');
          modal.classList.add('ec-open');
          document.body.classList.add('ec-no-scroll');
        });
      }

      function closeModal() {
        overlay.classList.remove('ec-open');
        modal.classList.remove('ec-open');
        document.body.classList.remove('ec-no-scroll');
        setTimeout(function () {
          overlay.hidden = true;
          modal.hidden = true;
          if (activeTrigger) activeTrigger.focus();
        }, 200);
      }

      // Trigger open
      document.addEventListener('click', function (e) {
        var t = e.target.closest('.EC-help-form-popup');
        if (t) { e.preventDefault(); openModal(t); }
      });

      // Close events
      closeBtn.addEventListener('click', closeModal);
      overlay.addEventListener('click', closeModal);
      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeModal();
      });
    })();
  </script>
  <?php
});
