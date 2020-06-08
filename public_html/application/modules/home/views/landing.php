<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header_landing.php');?>
<style>
canvas {
	display: block;
   top:0;
   position:absolute;
   background-color:transparent;
}
a #launch{
   background:#e87714;
   color:#fff;
}
a:hover #launch{
   background:#0add06;
   color:#001c00;
}
</style>
   <body class="login">
      <header>
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">               
               <!-- Slide Four - Set the background image for this slide in the line below -->
               <div class="carousel-item active" style="background-image: url('<?php echo asset_url()?>img/img_4.jpg')">
                  <div class="carousel-caption d-none d-md-block"></div>
               </div>
               <canvas id="canvas"></canvas>
               <div class="container-fluid img_logo">
                  <div class="col-md-12 text-center">           
                     <img class="img-fluid mt-5" src="<?php echo asset_url()?>img/app-icon.png" style="margin:auto;" alt="FPO">                  
                  </div>
                  <div class="col-md-12 text-center">           
                     <img class="img-fluid mt-5" src="<?php echo asset_url()?>img/logo.png" alt="FPO">
                  </div>
                  <div class="col-md-12 text-center">           
                    <a href="<?php echo base_url('/home/launch');?>"><input id="launch" value="Launch" class="btn btn-lg btn-fs text-center mt-5" type="button"></a>				  
                  </div>
               </div>
            </div>            
         </div>         
      </header>
      <footer style="position:fixed; bottom:0; background:#001c00;">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6 col-12 text-left  text-success">
                  <span class="copyright">Copyright &copy;<a target="_blank" href="#"> <?php echo date("Y");?> Yesteam Solution Private Limited</a></span>
               </div>
               <div class="col-md-6 col-12 pl-0 text-right text-success">
                  <span class="copyright">Powered by <a target="_blank" href="http://www.traversit.net/" title="Traversit Group">Traversit Group</a> </span>
               </div> 
            </div>
         </div>
      </footer>
      <?php $this->load->view('templates/bottom.php');?>		     	
   </body>
   <script>
jQuery(function() {
	var canvas = jQuery('#canvas')[0];
	canvas.width = jQuery(window).width();
	canvas.height = jQuery(window).height();
	var ctx = canvas.getContext('2d');
	// init
	ctx.fillStyle = '#001c00';
	ctx.fillRect(0, 0, canvas.width, canvas.height);
	// objects
	var listFire = [];
	var listFirework = [];
	var fireNumber = 9;
	var center = {
		x: canvas.width / 2,
		y: canvas.height / 2
	};
	var range = 540;
	for (var i = 0; i < fireNumber; i++) {
		var fire = {
			x: Math.random() * range / 2 - range / 4 + center.x,
			y: Math.random() * range * 2 + canvas.height,
			size: Math.random() + 0.5,
			fill: '#fd1',
			vx: Math.random() - 0.5,
			vy: -(Math.random() + 4),
			ax: Math.random() * 0.02 - 0.01,
			far: Math.random() * range + (center.y - range)
		};
		fire.base = {
			x: fire.x,
			y: fire.y,
			vx: fire.vx
		};
		//
		listFire.push(fire);
	}

	function randColor() {
		var r = Math.floor(Math.random() * 256);
		var g = Math.floor(Math.random() * 256);
		var b = Math.floor(Math.random() * 256);
		var color = 'rgb($r, $g, $b)';
		color = color.replace('$r', r);
		color = color.replace('$g', g);
		color = color.replace('$b', b);
		return color;
	}
	(function loop() {
		requestAnimationFrame(loop);
		update();
		draw();
	})();

	function update() {
		for (var i = 0; i < listFire.length; i++) {
			var fire = listFire[i];
			//
			if (fire.y <= fire.far) {
				// case add firework
				var color = randColor();
				for (var i = 0; i < fireNumber * 5; i++) {
					var firework = {
						x: fire.x,
						y: fire.y,
						size: Math.random() + 1.5,
						fill: color,
						vx: Math.random() * 5 - 2.5,
						vy: Math.random() * -5 + 1.5,
						ay: 0.05,
						alpha: 1,
						life: Math.round(Math.random() * range / 2) + range / 2
					};
					firework.base = {
						life: firework.life,
						size: firework.size
					};
					listFirework.push(firework);
				}
				// reset
				fire.y = fire.base.y;
				fire.x = fire.base.x;
				fire.vx = fire.base.vx;
				fire.ax = Math.random() * 0.02 - 0.01;
			}
			//
			fire.x += fire.vx;
			fire.y += fire.vy;
			fire.vx += fire.ax;
		}
		for (var i = listFirework.length - 1; i >= 0; i--) {
			var firework = listFirework[i];
			if (firework) {
				firework.x += firework.vx;
				firework.y += firework.vy;
				firework.vy += firework.ay;
				firework.alpha = firework.life / firework.base.life;
				firework.size = firework.alpha * firework.base.size;
				firework.alpha = firework.alpha > 0.6 ? 1 : firework.alpha;
				//
				firework.life--;
				if (firework.life <= 0) {
					listFirework.splice(i, 1);
				}
			}
		}
	}

	function draw() {
		// clear
		ctx.globalCompositeOperation = 'source-over';
		ctx.globalAlpha = 0.18;
		ctx.fillStyle = '#001c00';
		ctx.fillRect(0, 0, canvas.width, canvas.height);
		// re-draw
		ctx.globalCompositeOperation = 'screen';
		ctx.globalAlpha = 1;
		for (var i = 0; i < listFire.length; i++) {
			var fire = listFire[i];
			ctx.beginPath();
			ctx.arc(fire.x, fire.y, fire.size, 0, Math.PI * 2);
			ctx.closePath();
			ctx.fillStyle = fire.fill;
			ctx.fill();
		}
		for (var i = 0; i < listFirework.length; i++) {
			var firework = listFirework[i];
			ctx.globalAlpha = firework.alpha;
			ctx.beginPath();
			ctx.arc(firework.x, firework.y, firework.size, 0, Math.PI * 2);
			ctx.closePath();
			ctx.fillStyle = firework.fill;
			ctx.fill();
		}
	}
})
   </script>
</html>