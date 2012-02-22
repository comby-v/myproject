<?php


class None extends ChessPiece
{
    public function __construct ()
    {
         parent::__construct (Color::WHITE, "none");
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
