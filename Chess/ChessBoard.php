<?php
class ChessBoard
{
/*Singleton*/
    private static $_instance = null;

    private function __construct()
    {
      $this->_board = array ();
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
       return ($this->_board);
    }

   public function is_valid ($move)
   {

       
   }

   public function apply_move ($move)
   {
        if ($this->is_littleRock ($move))
        {
            
        }

       if ($)
   }

/*private function*/
 private function init_chessboard ()
 {
    for ($i = 0; $i < 8; $i++)
    {
        for ($j = 0; $j < 8; $j++)
        {
            $default_piece = new None;
            $this->_board[$i][$j] = $default_piece;
        }
    }
    $this->init_chesspieces ();
    
 }



 private function init_chesspieces ()
 {
    $this->_board[Position::ANNA][Position::EINS] = new Rook (Color::WHITE);
    $this->_board[Position::BELLA][Position::EINS] = new Knight (Color::WHITE);
    $this->_board[Position::CESAR][Position::EINS] = new Bishop (Color::WHITE);
    $this->_board[Position::DAVID][Position::EINS] = new Queen (Color::WHITE);
    $this->_board[Position::EVA][Position::EINS] = new King (Color::WHITE);
    $this->_board[Position::FELIX][Position::EINS] = new Bishop (Color::WHITE);
    $this->_board[Position::GUSTAV][Position::EINS] = new Knight(Color::WHITE);
    $this->_board[Position::HECTOR][Position::EINS] = new Rook (Color::WHITE);

    $this->_board[Position::ANNA][Position::ZWEI] = new Pawn (Color::WHITE);
    $this->_board[Position::BELLA][Position::ZWEI] = new Pawn (Color::WHITE);
    $this->_board[Position::CESAR][Position::ZWEI] = new Pawn (Color::WHITE);
    $this->_board[Position::DAVID][Position::ZWEI] = new Pawn (Color::WHITE);
    $this->_board[Position::EVA][Position::ZWEI] = new Pawn (Color::WHITE);
    $this->_board[Position::FELIX][Position::ZWEI] = new Pawn (Color::WHITE);
    $this->_board[Position::GUSTAV][Position::ZWEI] = new Pawn (Color::WHITE);
    $this->_board[Position::HECTOR][Position::ZWEI] = new Pawn (Color::WHITE);

    $this->_board[Position::ANNA][Position::SIEBEN] = new Pawn (Color::BLACK);
    $this->_board[Position::BELLA][Position::SIEBEN] = new Pawn (Color::BLACK);
    $this->_board[Position::CESAR][Position::SIEBEN] = new Pawn (Color::BLACK);
    $this->_board[Position::DAVID][Position::SIEBEN] = new Pawn (Color::BLACK);
    $this->_board[Position::EVA][Position::SIEBEN] = new Pawn (Color::BLACK);
    $this->_board[Position::FELIX][Position::SIEBEN] = new Pawn (Color::BLACK);
    $this->_board[Position::GUSTAV][Position::SIEBEN] = new Pawn (Color::BLACK);
    $this->_board[Position::HECTOR][Position::SIEBEN] = new Pawn (Color::BLACK);

    $this->_board[Position::ANNA][Position::ACHT] = new Rook (Color::BLACK);
    $this->_board[Position::BELLA][Position::ACHT] = new Knight (Color::BLACK);
    $this->_board[Position::CESAR][Position::ACHT] = new Bishop (Color::BLACK);
    $this->_board[Position::DAVID][Position::ACHT] = new Queen (Color::BLACK);
    $this->_board[Position::EVA][Position::ACHT] = new King (Color::BLACK);
    $this->_board[Position::FELIX][Position::ACHT] = new Bishop (Color::BLACK);
    $this->_board[Position::GUSTAV][Position::ACHT] = new Knight (Color::BLACK);
    $this->_board[Position::HECTOR][Position::ACHT] = new Rook (Color::BLACK);

 }



 /*private attributs*/
 private $_chessboard;
}

?>
