<?php

abstract class ChessPiece
{
    public function __construct ($color, $kind)
    {
        $this->_color = $color;
        $this->_kind = $kind;
    }

    abstract public function is_valid ($move);
    abstract public function is_free_way ($move);
    
    /*private var*/
    private $_color;
    private $_kind;
}
?>
