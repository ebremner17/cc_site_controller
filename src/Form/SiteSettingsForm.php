<?php

/**
 * @file
 * Contains Drupal\cc_site_controller\Form\SiteSettingsForm.
 */

namespace Drupal\cc_site_controller\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class SiteSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'cc_site_controller.sitesettings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'site_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('cc_site_controller.sitesettings');

    $form['site_title'] = [
      '#title' => t('Site title'),
      '#type' => 'textfield',
    ];

    $form['type_of_site'] = [
      '#type' => 'select',
      '#title' => $this->t('Type of site'),
      '#options' => [
        'air-cadets' => $this->t('Air'),
        'army-cadets' => $this->t('Army'),
        'sea-cadets' => $this->t('Sea'),
        'generic' => $this->t('Generic'),
        'rcscc-warspite' => $this->t('RCSCC Warspite'),
      ],
      '#default_value' => $config->get('type_of_site') !== NULL ? $config->get('type_of_site') : 'generic',
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    parent::submitForm($form, $form_state);

    $this->config('cc_site_controller.sitesettings')
      ->set('site_title', $form_state->getValue('site_title'))
      ->save();

    $this->config('cc_site_controller.sitesettings')
      ->set('type_of_site', $form_state->getValue('type_of_site'))
      ->save();
  }

}