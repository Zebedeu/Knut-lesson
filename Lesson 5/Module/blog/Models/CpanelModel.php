<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 11/04/18
 * Time: 18:10
 */

namespace Module\blog\Models;


use Ballybran\Database\Drives\AbstractDatabaseInterface;

class CpanelModel {


    /**
     * @var AbstractDatabaseInterface
     */
    private $entity;

    public function __construct(AbstractDatabaseInterface $entity)
    {

        $this->entity = $entity;
    }

    public function getAllUser()
    {
        return $this->entity->find("user", "*");
    }
}