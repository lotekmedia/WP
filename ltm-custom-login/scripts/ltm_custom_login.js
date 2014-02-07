  (function ($) {
      "use strict";

      var default_color = 'fbfbfb';

      function pickColor(color) {
          $('#link-color').val(color);
      }
      function toggle_text() {
          var link_color = $('#login_background_color');
          if ('' === link_color.val().replace('#', '')) {
              link_color.val(default_color);
              pickColor(default_color);
          } else {
              pickColor(link_color.val());
          }
      }

      $(document).ready(function () {
          var link_color = $('#login_background_color');
          link_color.wpColorPicker({
              change: function (event, ui) {
                  pickColor(link_color.wpColorPicker('color'));
              },
              clear: function () {
                  pickColor('');
              }
          });
          $('#link-color').click(toggle_text);

          toggle_text();

          window.send_to_editor = function (html) {
              var imgurl = jQuery('img', html).attr('src');
              jQuery('#upload_image').val(imgurl);
              tb_remove();
          }

          var custom_uploader;
          $('#upload_image_button').click(function (e) {
              e.preventDefault();
              //If the uploader object has already been created, reopen the dialog
              if (custom_uploader) {
                  custom_uploader.open();
                  return;
              }

              //Extend the wp.media object
              custom_uploader = wp.media.frames.file_frame = wp.media({
                  title: 'Choose Image',
                  button: {
                      text: 'Choose Image'
                  },
                  multiple: false
              });

              //When a file is selected, grab the URL and set it as the text field's value
              custom_uploader.on('select', function () {
                  var attachment = custom_uploader.state().get('selection').first().toJSON();
                  $('#upload_image').val(attachment.url);
              });

              //Open the uploader dialog
              custom_uploader.open();

          });


      });
  } (jQuery));