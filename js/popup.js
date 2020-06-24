(function ($, Drupal, drupalSettings) {

  Drupal.landbot = {};

  Drupal.behaviors.landbotPopup = {
    attach: function (context, settings) {
      if (Drupal.landbot.widget !== undefined) {
        return;
      }

      Drupal.landbot.widget = new LandbotPopup({
        index: settings.landbot.indexUrl,
      });
    }
  }

})(jQuery, Drupal, drupalSettings);