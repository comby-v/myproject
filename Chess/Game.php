<?php

class Game
{

    public function __get($name)
    {
        return $this->$name;
    }
    
    public function play ()
    {
        $this->_chessboard = ChessBoard::getInstance();
        $this->_player = 0;
    }

    public function switch_player ()
    {
        $this->_player = !$this->_player;
    }

    public $_chessboard;
    public $_player;
    public $_selection;
}


?>
