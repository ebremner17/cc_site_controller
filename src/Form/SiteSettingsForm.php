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

    $form['description'] = [
      '#type' => 'item',
      '#title' => $this->t('Site Settings'),
      '#description' => $this->t('Please enter/select all the settings for your site.'),
    ];

    $form['unit_info'] = [
      '#title' => t('Unit Info'),
      '#type' => 'fieldset',
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
    ];

    $form['unit_info']['type_of_cadets'] = [
      '#title' => t('Type of Cadets'),
      '#type' => 'select',
      '#options' => [
        'air' => $this->t('Air'),
        'army' => $this->t('Army'),
        'sea' => $this->t('Sea'),
      ],
      '#default_value' => $config->get('type_of_cadets') !== NULL ? $config->get('type_of_cadets') : '',
      '#required' => TRUE,
    ];

    $form['unit_info']['corps_number'] = [
      '#title' => t('Corps Number'),
      '#type' => 'textfield',
      '#default_value' => $config->get('corps_number'),
      '#required' => TRUE,
    ];

    $form['unit_info']['corps_name'] = [
      '#title' => t('Corps Name'),
      '#type' => 'textfield',
      '#default_value' => $config->get('corps_name'),
      '#description' => t('Enter the corps name, without the RCSCC, RCACS or RCACC'),
    ];

    $form['unit_info']['phone_number'] = [
      '#title' => t('Phone Number'),
      '#type' => 'textfield',
      '#default_value' => $config->get('phone_number'),
      '#description' => t('Enter the corps phone number.  (i.e. 555-555-5555)'),
      '#required' => TRUE,
    ];

    $form['unit_info']['email_address'] = [
      '#title' => t('Email Address'),
      '#type' => 'email',
      '#default_value' => $config->get('email_address'),
      '#description' => t('Enter the corps email address.  (i.e. cadets@unit.com)'),
    ];

    $form['parade_night_info'] = [
      '#title' => t('Parade Night Info'),
      '#type' => 'fieldset',
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
    ];

    $form['parade_night_info']['parade_night'] = [
      '#type' => 'select',
      '#title' => $this->t('Parade night'),
      '#options' => [
        'Monday' => $this->t('Monday'),
        'Tuesday' => $this->t('Tuesday'),
        'Wednesday' => $this->t('Wednesday'),
        'Thursday' => $this->t('Thursday'),
        'Friday' => $this->t('Friday'),
      ],
      '#default_value' => $config->get('parade_night') !== NULL ? $config->get('parade_night') : 'Monday',
      '#required' => TRUE,
    ];

    $form['parade_night_info']['parade_night_start_time'] = [
      '#title' => t('Start Time'),
      '#type' => 'textfield',
      '#default_value' => $config->get('parade_night_start_time'),
      '#description' => t('Enter the start time for your parade night.  (i.e. 6:30 pm)'),
      '#required' => TRUE,
    ];

    $form['parade_night_info']['parade_night_end_time'] = [
      '#title' => t('End Time'),
      '#type' => 'textfield',
      '#default_value' => $config->get('parade_night_end_time'),
      '#description' => t('Enter the end time for your parade night.  (i.e. 9:30 pm)'),
      '#required' => TRUE,
    ];

    $form['parade_night_info']['parade_night_address'] = [
      '#title' => t('Parade Night Address'),
      '#type' => 'textfield',
      '#default_value' => $config->get('parade_night_address'),
      '#description' => t('Enter the address for your parade night. (i.e. 104 Main Street)'),
      '#required' => TRUE,
    ];

    $form['parade_night_info']['parade_night_city'] = [
      '#title' => t('Parade Night City'),
      '#type' => 'textfield',
      '#default_value' => $config->get('parade_night_city'),
      '#required' => TRUE,
    ];

    $form['parade_night_info']['parade_night_province'] = [
      '#title' => t('Parade Night Province'),
      '#type' => 'select',
      '#options' => [
        'AB' => $this->t('Alberta'),
        'BC' => $this->t('British Columbia'),
        'NB' => $this->t('New Brunswick'),
        'NL' => $this->t('Newfoundland and Labrador'),
        'NT' => $this->t('Northwest Territories'),
        'NS' => $this->t('Nova Scotia'),
        'NU' => $this->t('Nunavut'),
        'ON' => $this->t('Ontario'),
        'PE' => $this->t('Prince Edward Island'),
        'QC' => $this->t('Quebec'),
        'SK' => $this->t('Saskatchewan'),
        'YT' => $this->t('Yukon'),
      ],
      '#default_value' => $config->get('parade_night_province'),
      '#required' => TRUE,
    ];

    $form['mailing_address_info'] = [
      '#title' => t('Mailing Address Info'),
      '#type' => 'fieldset',
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
    ];

    $form['mailing_address_info']['mailing_address'] = [
      '#title' => t('Mailing Address'),
      '#type' => 'textfield',
      '#default_value' => $config->get('mailing_address'),
      '#description' => t('Enter the mailing address for your unit. (i.e. 104 Main Street)'),
      '#required' => TRUE,
    ];

    $form['mailing_address_info']['mailing_address_city'] = [
      '#title' => t('Mailing Address City'),
      '#type' => 'textfield',
      '#default_value' => $config->get('mailing_address_city'),
      '#required' => TRUE,
    ];

    $form['mailing_address_info']['mailing_address_province'] = [
      '#title' => t('Mailing Address Province'),
      '#type' => 'select',
      '#options' => [
        'AB' => $this->t('Alberta'),
        'BC' => $this->t('British Columbia'),
        'NB' => $this->t('New Brunswick'),
        'NL' => $this->t('Newfoundland and Labrador'),
        'NT' => $this->t('Northwest Territories'),
        'NS' => $this->t('Nova Scotia'),
        'NU' => $this->t('Nunavut'),
        'ON' => $this->t('Ontario'),
        'PE' => $this->t('Prince Edward Island'),
        'QC' => $this->t('Quebec'),
        'SK' => $this->t('Saskatchewan'),
        'YT' => $this->t('Yukon'),
      ],
      '#default_value' => $config->get('mailing_address_province'),
      '#required' => TRUE,
    ];

    $form['mailing_address_info']['mailing_address_postal_code'] = [
      '#title' => t('Mailing Address Postal Code'),
      '#type' => 'textfield',
      '#default_value' => $config->get('mailing_address_postal_code'),
      '#required' => TRUE,
    ];

    $form['theme_info'] = [
      '#title' => t('Theme Info'),
      '#type' => 'fieldset',
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
    ];

    $form['theme_info']['cadet_theme'] = [
      '#type' => 'select',
      '#title' => $this->t('Theme'),
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
      'parade_night',
      'parade_night_start_time',
      'parade_night_end_time',
      'parade_night_address',
      'parade_night_city',
      'parade_night_province',
      'phone_number',
      'email_address',
      'mailing_address',
      'mailing_address_phone',
      'mailing_address_city',
      'mailing_address_province',
      'mailing_address_postal_code',
    ];

    foreach ($values_to_process as $value_to_process) {
      $this->config('cc_site_controller.sitesettings')
        ->set($value_to_process, $form_state->getValue($value_to_process))
        ->save();
    }
  }

}