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

    $form['type_of_cadets'] = [
      '#title' => t('Type of Cadets'),
      '#type' => 'select',
      '#options' => [
        'air' => $this->t('Air'),
        'army' => $this->t('Army'),
        'sea' => $this->t('Sea'),
      ],
      '#default_value' => $config->get('type_of_cadets') !== NULL ? $config->get('type_of_cadets') : '',
    ];

    $form['corps_number'] = [
      '#title' => t('Corps Number'),
      '#type' => 'textfield',
      '#default_value' => $config->get('corps_number'),
    ];

    $form['corps_name'] = [
      '#title' => t('Corps Name'),
      '#type' => 'textfield',
      '#default_value' => $config->get('corps_name'),
      '#description' => t('Enter the corps name, without the RCSCC, RCACS or RCACC'),
    ];

    $form['cadet_theme'] = [
      '#type' => 'select',
      '#title' => $this->t('Theme of site'),
      '#options' => [
        'air-cadets' => $this->t('Air'),
        'army-cadets' => $this->t('Army'),
        'sea-cadets' => $this->t('Sea'),
        'generic' => $this->t('Generic'),
        'rcscc-warspite' => $this->t('RCSCC Warspite'),
      ],
      '#default_value' => $config->get('cadet_theme') !== NULL ? $config->get('cadet_theme') : 'generic',
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    parent::submitForm($form, $form_state);

    $values_to_process = [
      'type_of_cadets',
      'corps_number',
      'corps_name',
      'cadet_theme',
    ];

    foreach ($values_to_process as $value_to_process) {
      $this->config('cc_site_controller.sitesettings')
        ->set($value_to_process, $form_state->getValue($value_to_process))
        ->save();
    }
  }

}