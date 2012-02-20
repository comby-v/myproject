<?php

class Knight extends ChessPiece
{
    public function __construct ($color)
    {
      parent::__construct ($color, PieceType::KNIGHT);
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
