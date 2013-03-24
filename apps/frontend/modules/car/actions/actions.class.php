<?php
/**
 * car actions.
 *
 * @package    dgztl
 * @subpackage car
 * @author     Luis Montealegre <montealegreluis@gmail.com>
 */
class carActions extends sfActions
{
    /**
     * The list of cars is filtered on the user's show action, and shouldn't be accesed
     * through this controller
     *
     * @param sfWebRequest $request
     */
    public function executeIndex(sfWebRequest $request)
    {
      $this->forward404();
    }

  public function executeShow(sfWebRequest $request)
  {
    $this->car = Doctrine_Core::getTable('Car')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->car);
  }

  /**
   * Create a new car entry associated to a given user
   *
   * @param sfWebRequest $request
   */
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CarForm();
    $this->form->setUserId($request->getParameter('user_id'));
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CarForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($car = Doctrine_Core::getTable('Car')->find(array($request->getParameter('id'))), sprintf('Object car does not exist (%s).', $request->getParameter('id')));
    $this->form = new CarForm($car);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($car = Doctrine_Core::getTable('Car')->find(array($request->getParameter('id'))), sprintf('Object car does not exist (%s).', $request->getParameter('id')));
    $this->form = new CarForm($car);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($car = Doctrine_Core::getTable('Car')->find(array($request->getParameter('id'))), sprintf('Object car does not exist (%s).', $request->getParameter('id')));
    $car->delete();

    $this->redirect('car/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $car = $form->save();

      $this->redirect('car/edit?id='.$car->getId());
    }
  }
}
