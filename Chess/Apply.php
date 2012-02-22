<?php
session_start ();

 function __autoload($class)
 {
     $pieces = array ("None", "Pawn", "King", "Queen", "Rook", "Bishop",
         "Knight", "ChessPiece", "PieceType");

     foreach ($pieces as $value)
     {
        if ($class == $value)
        {
            $class = "Pieces/" . $class;
         //   echo $class . " ";
            break;
        }
     }
     require $class . '.php';
 }
 
header("Content-Type: text/xml");

$function = (isset($_GET["function"])) ? $_GET["function"] : NULL;
if ($function == 'get_chessboard_xml')
{
    get_chessboard_xml ();
}
else if ($function == 'handle_action')
{
    $variable1 = (isset($_GET["i"])) ? $_GET["i"] : -1;
    $variable2 = (isset($_GET["j"])) ? $_GET["j"] : -1;

    if ($variable1 != -1 && $variable2 != -1)
    {
        handle_action($variable1, $variable2);
    }
}

$variable1 = (isset($_GET["i"])) ? $_GET["i"] : NULL;
$variable2 = (isset($_GET["j"])) ? $_GET["j"] : NULL;

function get_chessboard_xml ()
{

    $chessboard = $_SESSION["game"]->_chessboard;

    echo '<?xml version="1.0" encoding="UTF-8" ?>';
    echo '<root>';
    for ($i = 0; $i < 8; $i++)
     {
        for ($j = 0; $j < 8; $j++)
        {
            $color = "white";
            if ($chessboard->_board[$i][$j]->_color == 1)
            {
                $color = "black";
            }
            echo  '<piece type="' . $chessboard->_board[$i][$j]->_kind . '" color="' . $color . '"/>';
        }
     }
    echo "</root>";
}

function handle_action ($i, $j)
{
    $game = $_SESSION["game"];
    $chessboard = $game->_chessboard;
    echo '<?xml version="1.0" encoding="UTF-8" ?>';

    //Si le joueur selectionne un de ses pions
    if (($game->_player == $chessboard->_board[$i][$j]->_color) && ($chessboard->_board[$i][$j]->_kind != "none"))
    {
      $same_square = false;
      if ($game->_selection != null)
      {
       $same_square = ($game->_selection->_file == $i) && ($game->_selection->_rank == $j);
      }
      //Si la case n'est pas deja selectionnée
      if (!$same_square)
      {
        echo '<root><initial i="' . $i . '" j="'. $j . '"/></root>';
      }
      else
      {
        echo '<root></root>';
      }
       $game->_selection = new Position ($i, $j);
    }
    else
    {
        if ($game->_selection != null)
        {

            $move = new Move ($game->_selection, new Position($i, $j));
            $valid = $chessboard->is_valid ($move);
            if ($valid)
            {
                echo '<root><initial i="' . $game->_selection->_file . '" j="'. $game->_selection->_rank . '"/>';
                echo '<final i="' . $i . '" j="'. $j . '"/></root>';
                $game->_selection = null;

                $chessboard->apply_move ($move);
                $game->switch_player ();
            }
            else
            {
                echo '<root></root>';
            }
        }
        else
        {
            echo '<root></root>';
        }
    }
}


 
?>
