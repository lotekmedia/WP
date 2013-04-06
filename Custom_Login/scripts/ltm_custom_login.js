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

        jQuery('#upload_image_button').click(function() {
         var formfield = jQuery('#upload_image').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
        });

        window.send_to_editor = function(html) {
         var imgurl = jQuery('img',html).attr('src');
         jQuery('#upload_image').val(imgurl);
         tb_remove();
        }


    });
  }(jQuery));