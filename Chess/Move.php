<?php

 class Move
 {
    public function __construct($init, $final)
    {
      $this->_initial = $init;
      $this->_final = $final;
    }


    public function __get($name)
    {
        return $this->$name;
    }
    
     private $_initial;
     private $_final;
 }

?>
