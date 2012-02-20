    function selectSquare (context, mousePos, selection)
    {
        if (selection.i != -1)
        {
            if ((selection.i % 2 == 0 && selection.j % 2 == 0) || (selection.i % 2 != 0 && selection.j % 2 != 0))
            {
                context.fillStyle="white";
            }
            else
            {
                context.fillStyle="black";
            }
            context.fillRect(selection.i * 100 , selection.j * 100, 100, 100);
            context.strokeStyle="black";
            context.lineWidth = 5;
            context.strokeRect (0, 0, 800, 800);
            
            displayPiece (selection);
        }
        var i = Math.floor (mousePos.x / 100);
        var j = Math.floor (mousePos.y / 100);
        var x = i * 100;
        var y = j * 100;
        selection.i = i;
        selection.j = j;
       context.fillStyle="#3366FF";
       context.fillRect(x, y, 100, 100);
       context.strokeStyle="black";
       context.lineWidth = 1;
       context.strokeRect (x, y, 100, 100);

       return selection;
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
        return {
            x: mouseX,
            y: mouseY
        };
    }

    function displayPiece (position)
    {
       var mon_image = new Image();
       mon_image.src = "Ressources/pion.png";
       alert (typeof mychessboard);
     //  if (mychessboard [position.i][position.j] == 5)
       {
       //context.drawImage(mon_image, position.i * 100, position.j * 100);
       
       }

    }

    function displayGrid (context)
    {
       context.fillStyle="black";
       context.strokeStyle="black";
       context.lineWidth = 5;
       context.strokeRect (0, 0, 800, 800);
       
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
    }

    window.onload = function()
    {
        var canvas = document.getElementById('boardCanvas');
        var context = canvas.getContext('2d');
        var selection = new Object ();
        selection.i = -1;
        selection.j = -1;
        alert (typeof mychessboard);
        canvas.addEventListener('click', function(evt)
        {
            var mousePos = getMousePos(canvas, evt);
            selectSquare(context, mousePos, selection);
        }, false);

       displayGrid (context);
    };

