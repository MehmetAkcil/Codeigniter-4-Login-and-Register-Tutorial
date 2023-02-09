<?php

function error_function($validation, $field)
{
    if($validation->hasError($field))
    {
        return $validation->getError($field);
    }else{
        return false;
    }
}