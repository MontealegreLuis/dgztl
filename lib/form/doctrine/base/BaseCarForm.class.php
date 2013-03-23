<?php

/**
 * Car form base class.
 *
 * @method Car getObject() Returns the current form's model object
 *
 * @package    dgztl
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCarForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'brand'         => new sfWidgetFormInputText(),
      'model'         => new sfWidgetFormInputText(),
      'color'         => new sfWidgetFormInputText(),
      'status'        => new sfWidgetFormChoice(array('choices' => array('new' => 'new', 'used' => 'used'))),
      'mileage'       => new sfWidgetFormInputText(),
      'date_created'  => new sfWidgetFormDateTime(),
      'date_modified' => new sfWidgetFormInputText(),
      'user_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'brand'         => new sfValidatorString(array('max_length' => 60)),
      'model'         => new sfValidatorString(array('max_length' => 60)),
      'color'         => new sfValidatorString(array('max_length' => 60)),
      'status'        => new sfValidatorChoice(array('choices' => array(0 => 'new', 1 => 'used'))),
      'mileage'       => new sfValidatorInteger(),
      'date_created'  => new sfValidatorDateTime(),
      'date_modified' => new sfValidatorString(array('max_length' => 45)),
      'user_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
    ));

    $this->widgetSchema->setNameFormat('car[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Car';
  }

}
