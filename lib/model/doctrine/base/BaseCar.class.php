<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Car', 'doctrine');

/**
 * BaseCar
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $brand
 * @property string $model
 * @property string $color
 * @property enum $status
 * @property integer $mileage
 * @property timestamp $date_created
 * @property string $date_modified
 * @property integer $user_id
 * @property User $User
 * 
 * @method integer   getId()            Returns the current record's "id" value
 * @method string    getBrand()         Returns the current record's "brand" value
 * @method string    getModel()         Returns the current record's "model" value
 * @method string    getColor()         Returns the current record's "color" value
 * @method enum      getStatus()        Returns the current record's "status" value
 * @method integer   getMileage()       Returns the current record's "mileage" value
 * @method timestamp getDateCreated()   Returns the current record's "date_created" value
 * @method string    getDateModified()  Returns the current record's "date_modified" value
 * @method integer   getUserId()        Returns the current record's "user_id" value
 * @method User      getUser()          Returns the current record's "User" value
 * @method Car       setId()            Sets the current record's "id" value
 * @method Car       setBrand()         Sets the current record's "brand" value
 * @method Car       setModel()         Sets the current record's "model" value
 * @method Car       setColor()         Sets the current record's "color" value
 * @method Car       setStatus()        Sets the current record's "status" value
 * @method Car       setMileage()       Sets the current record's "mileage" value
 * @method Car       setDateCreated()   Sets the current record's "date_created" value
 * @method Car       setDateModified()  Sets the current record's "date_modified" value
 * @method Car       setUserId()        Sets the current record's "user_id" value
 * @method Car       setUser()          Sets the current record's "User" value
 * 
 * @package    dgztl
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCar extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('car');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('brand', 'string', 60, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 60,
             ));
        $this->hasColumn('model', 'string', 60, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 60,
             ));
        $this->hasColumn('color', 'string', 60, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 60,
             ));
        $this->hasColumn('status', 'enum', 4, array(
             'type' => 'enum',
             'fixed' => 0,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'new',
              1 => 'used',
             ),
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('mileage', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('date_created', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('date_modified', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}