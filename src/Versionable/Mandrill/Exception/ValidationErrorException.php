<?php

namespace Versionable\Mandrill\Exception;

/**
 * Description of ValidationException
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class ValidationErrorException extends \InvalidArgumentException
{
    public function __construct($message, $code)
    {
        list($message, $json) = explode(": ", $message);
        
        $errors = "";
        if (null !== $json) {
            foreach (json_decode($json) as $field => $error) {
                $errors .= sprintf("\t%s: %s\r\n", $field, $error);
            }
        }
        
        parent::__construct(sprintf("%s:\r\n%s", $message, $errors), $code);
    }
}
