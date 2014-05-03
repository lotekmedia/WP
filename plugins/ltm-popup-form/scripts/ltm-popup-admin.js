  (function ($) {
      "use strict";

      var default_color = 'fbfbfb';

      function pickColor(color) {
          $('#link-color').val(color);
      }

      function setColor(event) {
          var link_color = event.itemToColor;
          if ('' === link_color.val().replace('#', '')) {
              link_color.val(default_color);
              pickColor(default_color);
          } else {
              pickColor(link_color.val());
          }
      }

      function setColorPicker(itemToColor) {
          itemToColor.wpColorPicker({
              change: function (event, ui) {
                  pickColor(itemToColor.wpColorPicker('color'));
              },
              clear: function () {
                  pickColor('');
              }
          });
          $('#link-color').click({ item: itemToColor }, setColor);
      }

      $(document).ready(function () {

          var background_color = $('#ltm-popup-background-color');
          setColorPicker(background_color);

          var background_hover_color = $('#ltm-popup-background-hover-color');
          setColorPicker(background_hover_color);

          var text_color = $('#ltm-popup-text-color');
          setColorPicker(text_color);

          var button_color = $('#ltm-popup-button-color');
          setColorPicker(button_color);
      });
} (jQuery));
