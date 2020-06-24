(function ($, Drupal, drupalSettings) {

    Drupal.landbot = {};

    Drupal.behaviors.landbotLivechat = {
        attach: function (context, settings) {
            if (Drupal.landbot.widget !== undefined) {
                return;
            }

            Drupal.landbot.widget = new LandbotLivechat({
                index: settings.landbot.indexUrl,
            });
        }
    }

})(jQuery, Drupal, drupalSettings);