<?php

/**
 * Description of mensajes
 *
 * @author robinson
 */
class mensajes {

    //put your code here
    public $t;
    public $m = array();

    public function setT($t) {
        $this->$t;
    }

    public function setM($m) {
        $this->m = $m;
    }

    public function getT() {
        return $this->t;
    }

    public function getM() {
        return $this->m;
    }

    public function __construct($type, $message) {
        $this->t = $type;
        $this->m = $message;
    }

    public function __destruct() {
        
    }
}
