<?php

namespace Drupal\webform_view_mode\Plugin\views\field;

use Drupal\views\Plugin\views\field\Standard;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a Views handler that allow webform view mode config.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("webform_view_mode_field")
 */
class ViewModeField extends Standard {

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['view_mode_field'] = ['default' => 'key'];

    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    $form['view_mode_field'] = [
      '#type' => 'select',
      '#title' => $this->t('View mode'),
      '#description' => t('Choose the webform fields view mode.'),
      '#options' => [
        'key' => $this->t('Keys'),
        'value' => $this->t('Values'),
      ],
      '#default_value' => $this->options['view_mode_field'],
    ];

  }
}