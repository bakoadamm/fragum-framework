<?php
/**
 * Created by PhpStorm.
 * User: Ádám
 * Date: 2020.03.28.
 * Time: 10:47
 */

namespace Core\Exceptions;


class FileIsNotWritableException extends \Exception {
    public function __construct($filename) {
        parent::__construct('Critical error: the '. $filename . ' is not writable!');
    }
}