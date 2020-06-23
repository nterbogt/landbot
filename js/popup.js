(function ($, Drupal, drupalSettings) {

    Drupal.behaviors.landbotPopup = {
        attach: function (context, settings) {
            var myLandbot = new LandbotPopup({
                index: settings.landbot.index,
            });
        }
    }

})(jQuery, Drupal, drupalSettings);