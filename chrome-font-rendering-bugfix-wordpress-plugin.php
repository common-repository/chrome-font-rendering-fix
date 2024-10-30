<?php
/*
Plugin Name: Chrome and Safari Web Font Rendering Fix
Description: This plugin displays the default fonts until web fonts loads in the background.
Version: 0.1
Author: Prerak Trivedi
Author URI: http://www.preraktrivedi.com
*/


	function chrome_font_render_bugfix( ) {
	   
	?>

  <script> 
WebFontConfig = {
  google: { families: ['FontOne', 'FontTwo'] },
    fontinactive: function (fontFamily, fontDescription) {
   //Something went wrong! Let's load our local fonts.
    WebFontConfig = {
      custom: { families: ['FontOne', 'FontTwo'],
      urls: ['font-one.css', 'font-two.css']
    }
  };
  loadFonts();
  }
};

function loadFonts() {
  var wf = document.createElement('script');
  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
}

(function () {
  //Once document is ready, load the fonts.
  loadFonts();
  })();
</script> 

<?php }

add_action( 'wp_head', 'chrome_font_render_bugfix', 80 );