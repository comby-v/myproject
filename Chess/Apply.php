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
 
header("Content-Type: text/xml"); // Utilisation d'un header pour spécifier le type de contenu de la page. Ici, il s'agit juste de texte brut (text/plain).
echo '<?xml version="1.0" encoding="UTF-8" ?>';
$variable1 = (isset($_GET["i"])) ? $_GET["i"] : NULL;
$variable2 = (isset($_GET["j"])) ? $_GET["j"] : NULL;

//echo "[" . $_GET["i"] . "]" . "[" . $_GET["j"] . "]";

$chessboard = $_SESSION["chessboard"];
/*echo  '<root>
    <piece type="' . $chessboard->_chessboard[1][2]->_kind . '" color="' . $chessboard->_chessboard[1][2]->_color . '"/>
	<piece type="queen" color="black"/>
	<piece type="pawn" color="white"/>
    <piece type="pawn" color="black"/>
	<piece type="queen" color="white"/>
</root>';*/

$i = 1;
$j = 2;
echo '<root>';

for ($i = 0; $i < 8; $i++)
 {
    for ($j = 0; $j < 8; $j++)
    {
     echo  '<piece type="' . $chessboard->_chessboard[$i][$j]->_kind . '" color="' . $chessboard->_chessboard[$i][$j]->_color . '"/>';
    }
 }
echo "</root>";
 
?>
