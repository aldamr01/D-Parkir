<!DOCTYPE html>
<html>
<head>
<script>

// stores the device context of the canvas we use to draw the outlines
// initialized in myInit, used in myHover and myLeave
var hdc;

// shorthand func
function byId(e){return document.getElementById(e);}

// takes a string that contains coords eg - "227,307,261,309, 339,354, 328,371, 240,331"
// draws a line from each co-ord pair to the next - assumes starting point needs to be repeated as ending point.
function drawPoly(coOrdStr)
{
    var mCoords = coOrdStr.split(',');
    var i, n;
    n = mCoords.length;

    hdc.beginPath();
    hdc.moveTo(mCoords[0], mCoords[1]);
    for (i=2; i<n; i+=2)
    {
        hdc.lineTo(mCoords[i], mCoords[i+1]);
    }
    hdc.lineTo(mCoords[0], mCoords[1]);
    hdc.stroke();
}

function drawRect(coOrdStr)
{
    var mCoords = coOrdStr.split(',');
    var top, left, bot, right;
    left = mCoords[0];
    top = mCoords[1];
    right = mCoords[2];
    bot = mCoords[3];
    hdc.strokeRect(left,top,right-left,bot-top);
}

function myHover(element)
{
    var hoveredElement = element;
    var coordStr = element.getAttribute('coords');
    var areaType = element.getAttribute('shape');

    switch (areaType)
    {
        case 'polygon':
        case 'poly':
            drawPoly(coordStr);
            break;

        case 'rect':
            drawRect(coordStr);
    }
}

function myLeave()
{
    var canvas = byId('myCanvas');
    hdc.clearRect(0, 0, canvas.width, canvas.height);
}

function myInit()
{
    // get the target image
    var img = byId('img-imgmap201293016112');

    var x,y, w,h;

    // get it's position and width+height
    x = img.offsetLeft;
    y = img.offsetTop;
    w = img.clientWidth;
    h = img.clientHeight;

    // move the canvas, so it's contained by the same parent as the image
    var imgParent = img.parentNode;
    var can = byId('myCanvas');
    imgParent.appendChild(can);

    // place the canvas in front of the image
    can.style.zIndex = 1;

    // position it over the image
    can.style.left = x+'px';
    can.style.top = y+'px';

    // make same size as the image
    can.setAttribute('width', w+'px');
    can.setAttribute('height', h+'px');

    // get it's context
    hdc = can.getContext('2d');

    // set the 'default' values for the colour/width of fill/stroke operations
    hdc.fillStyle = 'red';
    hdc.strokeStyle = 'red';
    hdc.lineWidth = 2;
}
</script>

<style>
body
{
    background-color: gray;
}
canvas
{
    pointer-events: none;       /* make the canvas transparent to the mouse - needed since canvas is position infront of image */
    position: absolute;
}
</style>

<title></title>
</head>
<body onload='myInit()'>
    <canvas id='myCanvas'></canvas>     <!-- gets re-positioned in myInit(); -->
<center>
<img src='imgmap.png' usemap='#imgmap_css_container_imgmap201293016112' class='imgmap_css_container' title='imgmap201293016112' alt='imgmap201293016112' id='img-imgmap201293016112' />
<map id='imgmap201293016112' name='imgmap_css_container_imgmap201293016112'>
    <area shape="poly" onmouseover='myHover(this);' onmouseout='myLeave();' coords="2,0,604,-3,611,-3,611,166,346,165,345,130,-2,130,-2,124,1,128,1,126" href="" alt="imgmap201293016112-0" title="imgmap201293016112-0" class="imgmap201293016112-area" id="imgmap201293016112-area-0" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="1,131,341,213" href="" alt="imgmap201293016112-1" title="imgmap201293016112-1" class="imgmap201293016112-area" id="imgmap201293016112-area-1" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="346,166,614,241" href="" alt="imgmap201293016112-2" title="imgmap201293016112-2" class="imgmap201293016112-area" id="imgmap201293016112-area-2" />
    <area shape="poly" onmouseover='myHover(this);' onmouseout='myLeave();' coords="917,242,344,239,345,496,574,495,575,435,917,433" href="" alt="imgmap201293016112-3" title="imgmap201293016112-3" class="imgmap201293016112-area" id="imgmap201293016112-area-3" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="1,416,341,494" href="" alt="imgmap201293016112-4" title="imgmap201293016112-4" class="imgmap201293016112-area" id="imgmap201293016112-area-4" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="1,215,341,410" href="" alt="imgmap201293016112-5" title="imgmap201293016112-5" class="imgmap201293016112-area" id="imgmap201293016112-area-5" />
    <area shape="poly" onmouseover='myHover(this);' onmouseout='myLeave();' coords="916,533,916,436,578,436,576,495,806,496,807,535" href="" alt="imgmap201293016112-6" title="imgmap201293016112-6" class="imgmap201293016112-area" id="imgmap201293016112-area-6" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="805,536,918,614" href="" alt="imgmap201293016112-7" title="imgmap201293016112-7" class="imgmap201293016112-area" id="imgmap201293016112-area-7" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="461,494,803,616" href="" alt="imgmap201293016112-8" title="imgmap201293016112-8" class="imgmap201293016112-area" id="imgmap201293016112-area-8" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="0,497,223,616" href="" alt="imgmap201293016112-9" title="imgmap201293016112-9" class="imgmap201293016112-area" id="imgmap201293016112-area-9" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="230,494,456,614" href="" alt="imgmap201293016112-10" title="imgmap201293016112-10" class="imgmap201293016112-area" id="imgmap201293016112-area-10" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="345,935,572,1082" href="" alt="imgmap201293016112-11" title="imgmap201293016112-11" class="imgmap201293016112-area" id="imgmap201293016112-area-11" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="1,617,457,760" href="" alt="imgmap201293016112-12" title="imgmap201293016112-12" class="imgmap201293016112-area" id="imgmap201293016112-area-12" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="345,760,577,847" href="" alt="imgmap201293016112-13" title="imgmap201293016112-13" class="imgmap201293016112-area" id="imgmap201293016112-area-13" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="0,759,344,906" href="" alt="imgmap201293016112-14" title="imgmap201293016112-14" class="imgmap201293016112-area" id="imgmap201293016112-area-14" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="346,850,571,935" href="" alt="imgmap201293016112-15" title="imgmap201293016112-15" class="imgmap201293016112-area" id="imgmap201293016112-area-15" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="578,761,915,865" href="" alt="imgmap201293016112-16" title="imgmap201293016112-16" class="imgmap201293016112-area" id="imgmap201293016112-area-16" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="0,1017,226,1085" href="" alt="imgmap201293016112-17" title="imgmap201293016112-17" class="imgmap201293016112-area" id="imgmap201293016112-area-17" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="0,908,342,1017" href="" alt="imgmap201293016112-18" title="imgmap201293016112-18" class="imgmap201293016112-area" id="imgmap201293016112-area-18" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="229,1010,342,1084" href="" alt="imgmap201293016112-19" title="imgmap201293016112-19" class="imgmap201293016112-area" id="imgmap201293016112-area-19" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="0,1086,340,1206" href="" alt="imgmap201293016112-20" title="imgmap201293016112-20" class="imgmap201293016112-area" id="imgmap201293016112-area-20" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="0,1209,224,1290" href="" alt="imgmap201293016112-21" title="imgmap201293016112-21" class="imgmap201293016112-area" id="imgmap201293016112-area-21" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="0,1290,225,1432" href="" alt="imgmap201293016112-22" title="imgmap201293016112-22" class="imgmap201293016112-area" id="imgmap201293016112-area-22" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="0,1432,340,1517" href="" alt="imgmap201293016112-23" title="imgmap201293016112-23" class="imgmap201293016112-area" id="imgmap201293016112-area-23" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="346,1432,686,1517" href="" alt="imgmap201293016112-24" title="imgmap201293016112-24" class="imgmap201293016112-area" id="imgmap201293016112-area-24" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="461,1266,686,1429" href="" alt="imgmap201293016112-25" title="imgmap201293016112-25" class="imgmap201293016112-area" id="imgmap201293016112-area-25" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="230,1365,455,1430" href="" alt="imgmap201293016112-26" title="imgmap201293016112-26" class="imgmap201293016112-area" id="imgmap201293016112-area-26" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="231,1291,457,1360" href="" alt="imgmap201293016112-27" title="imgmap201293016112-27" class="imgmap201293016112-area" id="imgmap201293016112-area-27" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="230,1210,342,1289" href="" alt="imgmap201293016112-28" title="imgmap201293016112-28" class="imgmap201293016112-area" id="imgmap201293016112-area-28" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="692,928,916,1016" href="" alt="imgmap201293016112-29" title="imgmap201293016112-29" class="imgmap201293016112-area" id="imgmap201293016112-area-29" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="460,616,916,759" href="" alt="imgmap201293016112-30" title="imgmap201293016112-30" class="imgmap201293016112-area" id="imgmap201293016112-area-30" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="693,1316,917,1518" href="" alt="imgmap201293016112-31" title="imgmap201293016112-31" class="imgmap201293016112-area" id="imgmap201293016112-area-31" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="344,1150,572,1219" href="" alt="imgmap201293016112-32" title="imgmap201293016112-32" class="imgmap201293016112-area" id="imgmap201293016112-area-32" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="693,1015,916,1171" href="" alt="imgmap201293016112-33" title="imgmap201293016112-33" class="imgmap201293016112-area" id="imgmap201293016112-area-33" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="577,955,686,1032" href="" alt="imgmap201293016112-34" title="imgmap201293016112-34" class="imgmap201293016112-area" id="imgmap201293016112-area-34" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="577,1036,687,1101" href="" alt="imgmap201293016112-35" title="imgmap201293016112-35" class="imgmap201293016112-area" id="imgmap201293016112-area-35" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="576,1104,689,1172" href="" alt="imgmap201293016112-36" title="imgmap201293016112-36" class="imgmap201293016112-area" id="imgmap201293016112-area-36" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="691,1232,918,1313" href="" alt="imgmap201293016112-37" title="imgmap201293016112-37" class="imgmap201293016112-area" id="imgmap201293016112-area-37" />
    <area shape="rect" onmouseover='myHover(this);' onmouseout='myLeave();' coords="341,1085,573,1151" href="" alt="imgmap201293016112-38" title="imgmap201293016112-38" class="imgmap201293016112-area" id="imgmap201293016112-area-38" />
    <area shape="poly" onmouseover='myHover(this);' onmouseout='myLeave();' coords="917,868,917,925,688,927,688,955,576,955,574,867,572,864" href="" alt="imgmap201293016112-39" title="imgmap201293016112-39" class="imgmap201293016112-area" id="imgmap201293016112-area-39" />
    <area shape="poly" onmouseover='myHover(this);' onmouseout='myLeave();' coords="919,1173,917,1231,688,1231,688,1266,574,1267,576,1175,576,1175" href="" alt="imgmap201293016112-40" title="imgmap201293016112-40" class="imgmap201293016112-area" id="imgmap201293016112-area-40" />
    <area shape="poly" onmouseover='myHover(this);' onmouseout='myLeave();' coords="572,1222,572,1265,459,1265,458,1289,339,1290,344,1225" href="" alt="imgmap201293016112-41" title="imgmap201293016112-41" class="imgmap201293016112-area" id="imgmap201293016112-area-41" />
</map>
</center>

</body>
</html>
