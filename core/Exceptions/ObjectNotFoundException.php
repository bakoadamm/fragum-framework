<?php
/**
 * Created by PhpStorm.
 * User: lapos
 * Date: 2020.03.28.
 * Time: 11:27
 */

namespace Core\Exceptions;


class ObjectNotFoundException extends \Exception
{
    public function __construct($objectName) {
        parent::__construct('Critical error: the '. $objectName . ' is not found!');
    }
}