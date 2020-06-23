<?php

namespace Drupal\landbot\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a settings form to configure the Landbot module.
 */
class LandbotSettings extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'landbot_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['landbot.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = [];

    $form['enabled'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable Landbot integration'),
      '#description' => $this->t('Abilitiy to quickly enable and disable Landbot integration.'),
      '#default_value' => $this->configFactory->get('landbot.settings')->get('enabled'),
    ];

    $form['index_url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Index URL'),
      '#description' => $this->t('Enter the index URL that landbot uses to create popups or livechat integration.'),
      '#default_value' => $this->configFactory->get('landbot.settings')->get('index_url'),
    ];

    $form['widget'] = [
      '#type' => 'select',
      '#title' => $this->t('Widget'),
      '#description' => $this->t('The supported widgets from the Landbot API.'),
      '#options' => [
        'popup' => $this->t('Popup'),
        'livechat' => $this->t('Livechat'),
      ],
      '#default_value' => $this->configFactory->get('landbot.settings')->get('widget'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->configFactory->getEditable('landbot.settings');
    $variables = [
      'enabled',
      'index_url',
      'widget',
    ];

    foreach ($variables as $variable) {
      $config->set($variable, $form_state->getValue($variable));
    }
    $config->save();

    parent::submitForm($form, $form_state);
  }

}
