<?php

namespace app\core\exception;

class NotFoundException extends \Exception
{
    protected $message = 'The page you are looking for not available! :\'(';
    protected $code = 404;

}