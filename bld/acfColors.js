
jQuery(document).ready(function($) {
  if( acf.fields.color_picker ) {
    // custom colors
    var palette = [
      "#669933",
      "#A5C867",
      "#54A1AA",
      "#E59421",
      "#DF74b1"
    ];

    function setColorPicker() {
      try {
        jQuery('.wp-color-picker').iris( 'option', 'palettes', palette);
      } catch(e) {}
    }

    jQuery(function(){
      try {
        setColorPicker();
        
        acf.add_action('append', function(){
          setColorPicker();
        })
    })
});