  (function ($) {
      "use strict";

      var default_color = 'fbfbfb';

      function pickColor(color) {
          $('#link-color').val(color);
      }

      function setColor(event) {
          var link_color = event.itemToColor; //$('#login_background_color');
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
          
          var background_color = $('#login_background_color');
          setColorPicker(background_color);

          var link_color = $('#login_link_color');
          setColorPicker(link_color);

          var link_hover_color = $('#login_link_hover_color');
          setColorPicker(link_hover_color);

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