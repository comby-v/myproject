<?php

class King extends ChessPiece
{
    public function __construct ($color)
    {
        parent::__construct ($color, PieceType::KING);
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
