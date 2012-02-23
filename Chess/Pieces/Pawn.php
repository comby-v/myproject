<?php
    //session_start ();
    
class Pawn extends ChessPiece
{
    public function __construct ($color)
    {
       parent::__construct ($color, "pawn");
    }

    public function  __destruct()
    {
    }

    public function is_valid ($move)
    {
        $chessboard = $_SESSION["game"]->_chessboard->_board;
        $init_file = $move->_initial->_file;
        $init_rank = $move->_initial->_rank;
        $final_file = $move->_final->_file;
        $final_rank = $move->_final->_rank;
        $init_color = $chessboard[$init_file][$init_rank]->_color;
        $final_color = $chessboard[$final_file][$final_rank]->_color;

        if ($chessboard[$final_file][$final_rank]->_kind == "none")
        {
            if (!$this->good_direction($init_color, $final_rank, $init_rank))
                return false;
            if (!$this->check_move_length ($init_color, $final_rank, $init_rank))
                return false;
            return $this->is_free_way ($move);
        }
        if ($init_color != $final_color)
        {
            return true;
        }
        return false;
    }

    public function  is_free_way($move)
    {
        return true;
    }

    private function good_direction($init_color, $final_rank, $init_rank)
    {
       if ($init_color == 0 && $final_rank <= $init_rank)
       {
          return false;
       }
       if ($init_color == 1 && $final_rank >= $init_rank)
       {
          return false;
       }
       return true;
    }

    private function check_move_length ($init_color, $final_rank, $init_rank)
    {
        if (abs ($final_rank - $init_rank) > 2)
        {
            return false;
        }
        if (abs ($final_rank - $init_rank) == 2)
        {
            if ($init_color == 0 && $init_rank != 1)
            {
                return false;
            }
            if ($init_color == 1 && $init_rank != 6)
            {
                return false;
            }
        }
        return true;
    }

    private function handle_border ($final_file, $final_rank)
    {
       
    }
}
?>
