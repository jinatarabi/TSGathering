<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>

    <title>Virtual Class</title>

    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, minimum-scale=1.0" />

    <style type="text/css">
        html, body {
            width:  100%;
            height: 100%;
        }

        #canvas {
            position: absolute;
            background-color: white;
            top: 131px;
            left: 350px;
        }

        #status {
            color: #008000;
            position: absolute;
            cursor: default;
            font-family: Helvetica, Verdana, sans-serif;
            font-weight: bold;
            margin: 10px;
            top: 130px;
            left: 350px;
        }

        #controls {
            background-color: gray;
            position: absolute;
            font-family: Helvetica, Verdana, sans-serif;
            font-weight: bold;
            font-size: smaller;
            padding: 3px;
            width: 594px;
            height: 25px;
            left: 350px;
            top:100px;
        } 

        select {
            font-family: monospace;
            font-size: medium;
        }

        * {
            padding:0;
            margin:0;
        }
    </style>


    <script type="text/javascript" src="js/OrbiterMicro_latest.js"></script>

    <script src="js/UnionDraw.js"></script>

</head>

<body style="background-color: #4b5320">

<div id="controls">
    Whiteboard :: Pen Size: 
    <select id="thickness" class="fixed">
        <option value="2">1</option>
        <option value="3">2</option>
        <option value="4">3</option>
        <option value="5">4</option>
    </select>

    Colour:
    <select id="color">
        <option value="#000000">Black</option>
        <option value="#0000FF">Blue</option>
        <option value="#FF0000">Red</option>
        <option value="#008000">Green</option>
    </select>
</div>

<canvas id="canvas"></canvas>

<div id="status"></div>
</body>
</html>