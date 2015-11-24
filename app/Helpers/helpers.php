<?php
/**
 * @author Kevin Saunders
 * Date: 07/07/2015
 */

/**
 * Returns an error class
 * @param $name
 * @param $errors
 * @return string
 */
function error_class($name, $errors)
{
    return $errors->first($name) ? 'class="red"' : '';
}

/**
 * Will return checked if user has already filled in a value
 * @param $name
 * @param $value
 * @return string
 */
function ticked($name, $value)
{
    return Input::old($name) == $value ? 'checked="checked" ' : '';
}