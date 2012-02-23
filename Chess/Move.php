<?php

 class Move
 {
    public function __construct($init, $final)
    {
      $this->_initial = $init;
      $this->_final = $final;
      $this->_castling_flag = false;
      $this->_en_passant_flag = false;
      $this->_promotion = null;
    }


    public function __get($name)
    {
        return $this->$name;
    }
    
     private $_initial;
     private $_final;
     private $_castling_flag;
     private $_en_passant_flag;
     private $_promotion;
 }

?>
