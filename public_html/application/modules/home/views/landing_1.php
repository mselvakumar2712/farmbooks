<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header_landing.php');?>
<style>
body, html {
  position:relevate;
  width :100%;
  height: 100%;
  background: url('<?php echo asset_url()?>img/img_4.jpg');
}
canvas {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  background:transparent;
}  
</style>
   <body class="login">
      <canvas id="canvas"><canvas>
      
      <footer class="footer">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-6 col-sm-6 text-left">
                     <span class="f-13">Copyrights © <?php echo date("Y");?> Yesteam Solution Private Limited</span>
                  </div>
                  <div class="col-md-6 col-sm-6 text-right">
                     <span class="f-13"> Powered by <span class="text-green">Traversit Group</span></span>
                  </div>
               </div>
            </div>
      </footer>
      <?php $this->load->view('templates/bottom.php');?>
      <script>
         var ctx = canvas.getContext("2d");
var w = document.body.clientWidth;
var h = document.body.clientHeight;
canvas.width = w;
canvas.height = h;

var nodes = [];


function draw() {
  requestAnimationFrame(draw);
  
  ctx.globalCompositeOperation = "destination-out";
  ctx.fillStyle = "rgba(0, 0, 0, .08)";
  ctx.fillRect(0, 0, w, h);
  
  ctx.globalCompositeOperation = "lighter";
  
  var l = nodes.length, node;
  while(l--) {
    node = nodes[l];
    drawNode(node);
    if (node.dead) {
      nodes.splice(l, 1);
    }
  }
  
  if (nodes.length < 10) {
    l = rand(4, 1) | 0;
    while(l--) {
      nodes.push(makeNode(
        Math.random() * w | 0,
        Math.random() * h | 0,
        40,
        "hsl(" + (rand(300, 0) | 0) + ", 100%, 50%)",
        100
      ));
    }
  }
}

function drawNode(node) {
  var l = node.children.length
    , point
    ;
  while(l--) {
    point = node.children[l];
    ctx.beginPath();
    ctx.fillStyle = point.color;
    ctx.arc(point.x, point.y, 1, 0, PI2);
    ctx.fill();
    ctx.closePath();
    updatePoint(point);
    if (point.dead) {
      node.children.splice(l, 1);
      if (node.count > 20) {
        nodes.push(makeNode(
            point.x, 
            point.y,
            node.radius * 10,
            node.color,
            (node.count / 10) | 0
        ))
      }
    }
  }
  if (!node.children.length) {
    node.dead = true;
  }
}

function updatePoint(point) {
  var dx = point.x - point.dx;
  var dy = point.y - point.dy;
  var c = Math.sqrt(dx * dx + dy * dy);
  point.dead = c < 1;
  point.x -= dx * point.velocity;
  point.y -= dy * point.velocity;
}

const rad = Math.PI / 180;
const PI2 = Math.PI * 2;
var ttt = 0;

function rand(max, min) {
  min = min || 0;
  return Math.random() * (max - min) + min;
}

function makeNode(x, y, radius, color, partCount) {
  
  radius = radius || 0;
  partCount = partCount || 0;
  var count = partCount;
  
  var children = []
    , kof
    , r 
    ;
  
  
  while(partCount--) {
    kof = 100 * Math.random() | 0;
    r = radius * Math.random() | 0;
    children.push({
      x: x,
      y: y,      
      dx: x + r * Math.cos(ttt * kof * rad),
      dy: y + r * Math.sin(ttt * kof * rad),
      color: color,
      velocity: rand(1, 0.05)
    });
    ttt++
  }
  
  return {
	  radius: radius,
    count: count,
    color: color,
    x: x,
    y: y,
    children: children
  }
}

draw();

//Countdown
// Set the date we're counting down to
var countDownDate = new Date("Nov 3, 2018 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("timer").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "GRATTIS!!!";
  }
}, 1000);


      </script>
   </body>
</html>