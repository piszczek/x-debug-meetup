<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$currentNesting = 0;
$checkNesting = function () use (&$currentNesting) {
    return ($currentNesting++) < 2000;
};

$variable = new class ($_SERVER, $checkNesting) {
    protected $server;
    protected $previous;
    protected $checkNesting;


    public function __construct(array $server, callable &$checkNesting)
    {
        $this->server = $server;
        $this->checkNesting = $checkNesting;
    }

    public function __clone()
    {
        if (call_user_func($this->checkNesting)) {
            $this->previous = clone $this;
        }
    }
};

var_dump(clone $variable);
