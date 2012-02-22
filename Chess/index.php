<?php
   session_start ();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> My Chess Board</title>
        <script > </script>
    </head>
    <body>
        <?php
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

        $game = new Game ();
        $game->play ();

        
        ?>
        <canvas id="boardCanvas" width="800" height="800">
            Message pour les navigateurs ne supportant pas encore canvas.
        </canvas>

        <script src="Js/display.js" language="javascript" type="text/javascript">

        
        </script>
    </body>
</html>
