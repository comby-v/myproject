<?php
class ChessBoard
{
/*Singleton*/
    private static $_instance = null;

    private function __construct()
    {
      $this->_chessboard = array ();
      $this->init_chessboard ();
      
    }

    public static function getInstance()
    {
     if (is_null (self::$_instance))
     {
         self::$_instance = new ChessBoard ();
     }
     return self::$_instance;
    }


    public function __get($name)
    {
    return $this->$name;
    }

    public function __toString ()
    {
       return ($this->_chessboard);
    }

/*private function*/
 private function init_chessboard ()
 {
    for ($i = 0; $i < 8; $i++)
    {
        for ($j = 0; $j < 8; $j++)
        {
            $default_piece = new None;
            $this->_chessboard[$i][$j] = $default_piece;
        }
    }
    $this->init_chesspieces ();
    
 }



 private function init_chesspieces ()
 {
    $this->_chessboard[Position::ANNA][Position::EINS] = new Rook (Color::WHITE);
    $this->_chessboard[Position::BELLA][Position::EINS] = new Knight (Color::WHITE);
    $this->_chessboard[Position::CESAR][Position::EINS] = new Bishop (Color::WHITE);
    $this->_chessboard[Position::DAVID][Position::EINS] = new Queen (Color::WHITE);
    $this->_chessboard[Position::EVA][Position::EINS] = new King (Color::WHITE);
    $this->_chessboard[Position::FELIX][Position::EINS] = new Bishop (Color::WHITE);
    $this->_chessboard[Position::GUSTAV][Position::EINS] = new Knight(Color::WHITE);
    $this->_chessboard[Position::HECTOR][Position::EINS] = new Rook (Color::WHITE);

    $this->_chessboard[Position::ANNA][Position::ZWEI] = new Pawn (Color::WHITE);
    $this->_chessboard[Position::BELLA][Position::ZWEI] = new Pawn (Color::WHITE);
    $this->_chessboard[Position::CESAR][Position::ZWEI] = new Pawn (Color::WHITE);
    $this->_chessboard[Position::DAVID][Position::ZWEI] = new Pawn (Color::WHITE);
    $this->_chessboard[Position::EVA][Position::ZWEI] = new Pawn (Color::WHITE);
    $this->_chessboard[Position::FELIX][Position::ZWEI] = new Pawn (Color::WHITE);
    $this->_chessboard[Position::GUSTAV][Position::ZWEI] = new Pawn (Color::WHITE);
    $this->_chessboard[Position::HECTOR][Position::ZWEI] = new Pawn (Color::WHITE);

    $this->_chessboard[Position::ANNA][Position::SIEBEN] = new Pawn (Color::BLACK);
    $this->_chessboard[Position::BELLA][Position::SIEBEN] = new Pawn (Color::BLACK);
    $this->_chessboard[Position::CESAR][Position::SIEBEN] = new Pawn (Color::BLACK);
    $this->_chessboard[Position::DAVID][Position::SIEBEN] = new Pawn (Color::BLACK);
    $this->_chessboard[Position::EVA][Position::SIEBEN] = new Pawn (Color::BLACK);
    $this->_chessboard[Position::FELIX][Position::SIEBEN] = new Pawn (Color::BLACK);
    $this->_chessboard[Position::GUSTAV][Position::SIEBEN] = new Pawn (Color::BLACK);
    $this->_chessboard[Position::HECTOR][Position::SIEBEN] = new Pawn (Color::BLACK);

    $this->_chessboard[Position::ANNA][Position::ACHT] = new Rook (Color::BLACK);
    $this->_chessboard[Position::BELLA][Position::ACHT] = new Knight (Color::BLACK);
    $this->_chessboard[Position::CESAR][Position::ACHT] = new Bishop (Color::BLACK);
    $this->_chessboard[Position::DAVID][Position::ACHT] = new Queen (Color::BLACK);
    $this->_chessboard[Position::EVA][Position::ACHT] = new King (Color::BLACK);
    $this->_chessboard[Position::FELIX][Position::ACHT] = new Bishop (Color::BLACK);
    $this->_chessboard[Position::GUSTAV][Position::ACHT] = new Knight (Color::BLACK);
    $this->_chessboard[Position::HECTOR][Position::ACHT] = new Rook (Color::BLACK);

 }



 /*private attributs*/
 private $_chessboard;
 private $_test;
}

?>
