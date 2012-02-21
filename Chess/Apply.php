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

header("Content-Type: text/plain"); // Utilisation d'un header pour spécifier le type de contenu de la page. Ici, il s'agit juste de texte brut (text/plain).

$variable1 = (isset($_GET["i"])) ? $_GET["i"] : NULL;
$variable2 = (isset($_GET["j"])) ? $_GET["j"] : NULL;

//echo "[" . $_GET["i"] . "]" . "[" . $_GET["j"] . "]";

/*$XML = '<root>
    <soft piece="king" player="white"/>
	<soft piece="queen" player="black"/>
	<soft piece="pawn" player="white"/>
    <soft piece="pawn" player="black"/>
	<soft piece="queen" player="white"/>
</root>';*/

$XML = "<root>";
$chessboard = $_SESSION["chessboard"];
//echo " " . $chessboard->_chessboard[1][5];

for ($i = 0; $i < 8; $i++)
 {
    for ($j = 0; $j < 8; $j++)
    {
       //echo " " . $chessboard->_chessboard[$i][$j];
       $XML .= '<piece type⁼"' . $chessboard->_chessboard[$i][$j] . '" />';
    }
 }

echo $XML;

?>
