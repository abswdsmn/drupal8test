<?php
/**
 * @file
 * Contains \Drupal\rsvplist\Form\RSVPForm
 */
namespace Drupal\rsvplist\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class RSVPForm
 * Provides an RSVP Email form.
 * @package Drupal\rsvplist\Form
 */
class RSVPForm extends FormBase {
  /**
   * (@inheritDoc)
   * @return string
   */
  public function getFormId() {
    return 'rsvplist_email_form';
  }

  /**
   * Builds the form.
   *
   * (@inheritDoc)
   * @param array $form
   * @param FormStateInterface $form_state
   * @return array
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $node = \Drupal::routeMatch()->getParameter('node');
    $nid = $node->nid->value;

    $form['email'] = array(
      '#title' => t('Email Address'),
      '#type' => 'textfield',
      '#size' => 25,
      '#description' => t("We'll send updates to the mail address you provide."),
      '#required' => TRUE,
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('RSVP'),
    );
    $form['nid'] = array(
      '#type' => 'hidden',
      '#value' => $nid,
    );

    return $form;
  }

  /**
   * Validates the form.
   *
   * (@inheritDoc)
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $value = $form_state->getValue('email');
    if (!\Drupal::service('email.validator')->isValid($value)) {
      $form_state->setErrorByName('email', t('The email address %email is not valid.', array('%email' => $value)));
    }
  }

  /**
   * Submits the form.
   *
   * (@inheritDoc)
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $messenger = \Drupal::messenger();
    $messenger->addMessage(t('The form is working.'));
  }
}
