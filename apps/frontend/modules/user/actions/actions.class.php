<?php
/**
 * user actions.
 *
 * @package    dgztl
 * @subpackage user
 * @author     Luis Montealegre <luis.montealegre@mandragora-web-systems.com>
 */
class userActions extends sfActions
{
    /**
     * Retrieve all the users and the count of the cars that they own
     *
     * @param sfWebRequest $request
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->users = UserTable::getInstance()->findAllWithCarCount();
    }

    /**
     * Retrieve a single user by its numerical id and the information about the cars she
     * owns
     *
     * @param sfWebRequest $request
     */
    public function executeShow(sfWebRequest $request)
    {
        $this->user = UserTable::getInstance()->findOneWithCarInfo(
            $request->getParameter('id')
        );
        $this->forward404Unless($this->user);
    }

    /**
     * Show the form to create a new user entry
     *
     * @param sfWebRequest $request
     */
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new UserForm();
    }

    /**
     * Save a new user entry
     *
     * @param sfWebRequest $request
     */
    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new UserForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    /**
     * Populate the form with the current user information in order to allow to update it
     *
     * @param sfWebRequest $request
     */
    public function executeEdit(sfWebRequest $request)
    {
        $user = UserTable::getInstance()->find($request->getParameter('id'));

        $this->forward404Unless(
            $user, sprintf('Object user does not exist (%s).', $request->getParameter('id'))
        );

        $this->form = new UserForm($user);
    }

    /**
     * Update the information of the given user
     *
     * @param sfWebRequest $request
     */
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless(
            $request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT)
        );

        $user = UserTable::getInstance()->find($request->getParameter('id'));
        $this->forward404Unless(
            $user, sprintf('Object user does not exist (%s).', $request->getParameter('id'))
        );

        $this->form = new UserForm($user);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    /**
     * Delete the information of the given user
     *
     * @param sfWebRequest $request
     */
    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $user = UserTable::getInstance()->find($request->getParameter('id'));
        $this->forward404Unless(
            $user, sprintf('Object user does not exist (%s).', $request->getParameter('id'))
        );

        $user->delete();

        $this->redirect('user/index');
    }

    /**
     * Bind the request values to the user form in order to update the user information
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

            $user = $form->save();

            $this->redirect('user/show?id=' . $user->getId());
        }
    }
}