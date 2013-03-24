<?php
/**
 * User
 *
 * @package    dgztl
 * @subpackage model
 * @author     Luis Montealegre <montealegreluis@gmail.com>
 */
class User extends BaseUser
{
    /**
     * @return string
     */
    public function getFullName()
    {
        return sprintf('%s %s', $this->getFirstName(), $this->getLastName());
    }

    public function getCarsCount()
    {
        return $this->_values['cars_count'];
    }
}
