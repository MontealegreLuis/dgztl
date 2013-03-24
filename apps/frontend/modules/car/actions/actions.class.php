<?php
/**
 * Car actions.
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

    /**
     * Show a car's details given its numerical ID
     *
     * @param sfWebRequest $request
     */
    public function executeShow(sfWebRequest $request)
    {
        $this->car = CarTable::getInstance()->find(array($request->getParameter('id')));
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
        $this->form->setUserId($request->getParameter('user-id'));
    }

    /**
     * Save the details of the new car entry
     *
     * @param sfWebRequest $request
     */
    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CarForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    /**
     * Update the information of a car
     *
     * @param sfWebRequest $request
     */
    public function executeEdit(sfWebRequest $request)
    {
        $car = CarTable::getInstance()->find(array($request->getParameter('id')));

        $this->forward404Unless(
            $car, sprintf('Car does not exist (%s).', $request->getParameter('id'))
        );

        $this->form = new CarForm($car);
    }

    /**
     * Persist the changes of the given car entry
     *
     * @param sfWebRequest $request
     */
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless(
            $request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT)
        );
        $car = CarTable::getInstance()->find(array($request->getParameter('id')));

        $this->forward404Unless(
            $car, sprintf('Car does not exist (%s).', $request->getParameter('id'))
        );

        $this->form = new CarForm($car);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    /**
     * Perform the deletion of a car information given its numerical ID
     *
     * @param sfWebRequest $request
     */
    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $car = CarTable::getInstance()->find(array($request->getParameter('id')));

        $this->forward404Unless(
            $car, sprintf('Car does not exist (%s).', $request->getParameter('id'))
        );

        $car->delete();

        $this->redirect('user/index');
    }

    /**
     * Bind the information in the form with the information in the request
     *
     * @param sfWebRequest $request
     * @param sfForm $form
     */
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind(
            $request->getParameter($form->getName()), $request->getFiles($form->getName())
        );

        if ($form->isValid()) {

            $car = $form->save();

            $this->redirect(
                'car/edit?user-id=' . $car->getUserId() . '&id=' . $car->getId()
            );
        }
    }
}