<?php

namespace VendorName\ProjectNameBundle;

/**
 * Class ExampleService
 *
 * @package VendorName\ProjectNameBundle
 */
class ExampleService
{
    /**
     * @var string
     */
    private $var;

    /**
     * ExampleService constructor.
     *
     * @param $var
     */
    public function __construct($var)
    {
        $this->var = $var;
    }

    /**
     * @return string
     */
    public function getVar()
    {
        return $this->var;
    }
}