<?php

abstract class AControl
{
    public function action($action)
    {

        if (method_exists($this, $action)) {

            $this->$action();

        }

    }
}