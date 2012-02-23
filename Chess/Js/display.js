function Piece (kind, color)
{
    this._kind = kind;
    this._color = color;
}

function Chessboard ()
{
    this._board;
    this._selection = new Object ();
    this._selection.i = -1;
    this._selection.j = -1;
    this._player = "white";

    this.switch_player = function ()
    {
        var player = "white";
        if (this._player == "white")
        {
            player = "black";
        }
       this._player = player;
       document.getElementById('player').innerHTML =  "Player : "+ player;
    }
}

function selectSquare (context, mousePos, chessboard)
{
    var i = Math.floor (mousePos.x / 100);
    var j = Math.floor (mousePos.y / 100);

    var xhr = getXMLHttpRequest()
    xhr.onreadystatechange = function()
    {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
        {
            alert (xhr.responseText);
            read_xml_response (chessboard, context, xhr.responseXML);

        }
    };
    xhr.open ("GET", "Apply.php?function=handle_action&i=" + i + "&j=" + j, true);
    xhr.send(null);
}



function display_selection (chessboard, context, new_selection)
{
   selection = chessboard._selection;
   //On reaffiche l'ancienne case
   if (selection.i != -1)
   {
    clean_square (selection.i, selection.j, chessboard, context);
   }
   //on affiche la nouvelle case
   var x = new_selection.i * 100;
   var y = new_selection.j* 100;
   chessboard._selection = new_selection;
   context.fillStyle="#3366FF";
   context.fillRect(x, y, 100, 100);
   var piece = chessboard._board[new_selection.i][new_selection.j];
     display_piece (piece, new_selection.i, new_selection.j, context);
   context.strokeStyle="black";
   context.lineWidth = 1;
   context.strokeRect (x + 1, y + 1, 98, 98);

   displayContour(context);
}


function display_piece (piece, i, j, context)
{
   if (piece._kind != "none")
   {
       var mon_image = new Image();
       var ressource_name = piece._kind + "_" + piece._color;
       mon_image.src = "Ressources/" + ressource_name + ".png";
       mon_image.onload = function()
        {
            context.drawImage(mon_image, i * 100, j * 100);
        }
   }
}
function apply_move (node_initial, node_final, chessboard, context)
{
    chessboard._selection = new Object ()
    chessboard._selection.i = -1;
    chessboard._selection.i = -1;

    var init_i = node_initial[0].getAttribute("i");
    var init_j = node_initial[0].getAttribute("j");
    var final_i = node_final[0].getAttribute("i");
    var final_j = node_final[0].getAttribute("j");

    var piece_init = new Piece ("none", "color");
    var piece_final = chessboard._board[init_i][init_j];
    
    chessboard._board[init_i][init_j] = piece_init;
    chessboard._board[final_i][final_j] = piece_final;

    clean_square (init_i, init_j, chessboard, context);
    clean_square (final_i, final_j, chessboard, context);
}

function clean_square (i, j, chessboard, context)
{
   //On reaffiche l'ancienne case
       if ((i % 2 == 0 && j % 2 == 0) || (i % 2 != 0 && j % 2 != 0))
       {
           context.fillStyle="white";
       }
       else
       {
           context.fillStyle="grey";
       }
       context.fillRect(i * 100 , j * 100, 100, 100);
       context.strokeStyle="black";
       context.lineWidth = 5;
       context.strokeRect (0, 0, 800, 800);
       var piece = chessboard._board[i][j];
       display_piece (piece, i, j, context);
}

function display_chessboard (chessboard, context)
{
    for (i = 0; i < 8; i++)
    {
        for (j = 0; j < 8; j++)
        {
            display_piece (chessboard[i][j], i, j, context);
        }
    }
}
function displayContour (context)
{
   context.strokeStyle="black";
   context.lineWidth = 5;
   context.strokeRect (0, 0, 800, 800);
}

function displayGrid (context, chessboard)
{
   context.fillStyle="grey";
  
   for (x = 100; x < 800; x = x + 200)
   {
      for (y = 0; y < 800; y = y + 200)
      {
        context.fillRect(x, y, 100, 100);
      }
   }
   for (x = 0; x < 800; x = x + 200)
   {
      for (y = 100; y < 800; y = y + 200)
      {
        context.fillRect(x, y, 100, 100);
      }
   }
   get_chessboard (chessboard, context);
   displayContour(context);
}

function read_xml_response (chessboard, context, response)
{
    var node_initial = response.getElementsByTagName("initial");
    var node_final = response.getElementsByTagName("final");

    if (node_initial.length == 0)
    {
        var node_error = response.getElementsByTagName("error");
    }
    else
    {
        if (node_final.length == 0)
        {
            var selection = new Object ();
            selection.i = node_initial[0].getAttribute("i");
            selection.j = node_initial[0].getAttribute("j");

            display_selection (chessboard, context, selection);
        }
        else
        {
            apply_move (node_initial, node_final, chessboard, context);
            chessboard.switch_player ();
        }
    }
  /*  for (var i=0; i < nodes.length; i++)
    {
        if ( y > 7 )
        {
            y = 0;
            x++;
            chessboard[x] = new Array ();
        }
        var piece = new Piece (nodes[i].getAttribute("type"), nodes[i].getAttribute("color"))
        chessboard [x][y] = piece;
        y++
    }
    return chessboard;*/
}

function read_xml_board (xboard)
{
    var chessboard = new Array ();
   chessboard[0] = new Array ();
    var x = 0;
    var y = 0;

    var nodes = xboard.getElementsByTagName("piece");
    for (var i=0; i < nodes.length; i++)
    {
        if ( y > 7 )
        {
            y = 0;
            x++;
            chessboard[x] = new Array ();
        }
        var piece = new Piece (nodes[i].getAttribute("type"), nodes[i].getAttribute("color"))
        chessboard [x][y] = piece;
        y++
    }
    return chessboard;
}

function getXMLHttpRequest()
{
    var xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject)
    {
       if (window.ActiveXObject)
       {
            try
            {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch(e)
            {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        else
        {
            xhr = new XMLHttpRequest();
        }
    }
    else
    {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }
    return xhr;
}

function getMousePos(canvas, evt)
{
    // get canvas position
    var obj = canvas;
    var top = 0;
    var left = 0;
    while (obj && obj.tagName != 'BODY')
    {
        top += obj.offsetTop;
        left += obj.offsetLeft;
        obj = obj.offsetParent;
    }

    // return relative mouse position
    var mouseX = evt.clientX - left + window.pageXOffset;
    var mouseY = evt.clientY - top + window.pageYOffset;
    return{
        x: mouseX,
        y: mouseY
    };
}

function get_chessboard (chessboard, context)
{
    var xhr = getXMLHttpRequest()
    xhr.onreadystatechange = function()
    {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
        {
            chessboard._board = read_xml_board (xhr.responseXML);
            display_chessboard (chessboard._board, context);
        }
    };
    xhr.open ("GET", "Apply.php?function=get_chessboard_xml", true);
    xhr.send(null);
}

window.onload = function()
{
    var canvas = document.getElementById('boardCanvas');
    var context = canvas.getContext('2d');
    var chessboard = new Chessboard ();

    displayGrid (context, chessboard);
    
    canvas.addEventListener('click', function(evt)
    {
        var mousePos = getMousePos(canvas, evt);
        selectSquare(context, mousePos, chessboard);
    }, false);
};

