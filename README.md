# Gravity Form Elementor Popup

A lightweight custom popup modal for WordPress that opens a Gravity Form inside a styled overlay.  
Designed to work with Elementor triggers (or any element with `.EC-help-form-popup` class).

## Features
- AJAX-enabled Gravity Form embed
- Responsive modal (700px wide, min-height 400px)
- Black overlay with fade animation
- Accessible close button + ESC + click-outside to close
- Prevents page scroll when open
- reCAPTCHA-friendly (GF initialization supported)

## Usage

1. Add the PHP snippet to your theme’s `functions.php` or a plugin like [Code Snippets].
2. Use the shortcode inside the modal:
   ```php
   [gravityform id="1" ajax="true" title="false" description="false"]
3. the selector <pre> ``` <a href="#" class="EC-help-form-popup">Open Help Form</a> ``` </pre>



## 📸 Image Preview

![Preview](https://github.com/elias1435/Gravityform-Elementor-Popup/blob/main/gravityform-elementor-popup.jpg?raw=true)
