(function ($, Drupal, drupalSettings) {

    Drupal.behaviors.landbotLivechat = {
        attach: function (context, settings) {
            var myLandbot = new LandbotLivechat({
                index: settings.landbot.index,
            });
        }
    }

})(jQuery, Drupal, drupalSettings);