<?php

class Rook extends ChessPiece
{
    public function __construct ($color)
    {
       parent::__construct ($color, "rook");
    }

    public function  __destruct()
    {
    }

    public function is_valid ($move)
    {
    }

    public function  is_free_way($move)
    {
    }
}

?>
