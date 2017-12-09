// Variables
var context = document.getElementById("game-canvas").getContext("2d");

var game = {
	'width': 400,
	'height': 500,
	'speed': 2.15,
	'lifeTime': 0,
	'objects': [],
	'labels': [],
	'popTime': 0,
	'run': true,
	'canRestart': false
};
var player = {
	'x': 200 - game.width/12,
	'y': game.height - 50 - game.width/3.5,
	'sizeX': null,
	'sizeY': null,
	'beerTaken': 0,
	'coefDrunk': 0,
	'img': null,
	'score': 0
};
player.img = document.getElementById("res_car");


// Classes
var item = {
	'x': Math.random() * game.width,
	'y': null,
	'sizeX': null,
	'sizeY': null,
	'color': 'yellow',
	'class': 'beer',
	'img': null
}
var label = {
	'x': game.width - 30,
	'y': 30,
	'startFrom': 'white',
	'fadeTo': 'red',
	'lifeTime': 50,
	'timeLived': 0
}

// Event triggers
document.getElementById("playButton").onclick = function(){
	resizeCanvas();
	main();
	document.getElementById("header404").style.display = "none";
	document.getElementsByClassName("py-5 bg-dark fixed-bottom")[0].style.display = "none";
}

document.getElementById("game-canvas").onclick = restart;
document.getElementById("game-canvas").ontouchstart = restart;

function restart(){
	if (!game.run && game.canRestart){
		game = {
			'width': 400,
			'height': 500,
			'speed': 2.15,
			'lifeTime': 0,
			'objects': [],
			'labels': [],
			'popTime': 0,
			'run': true
		};
		player = {
			'x': 200 - game.width/12,
			'y': game.height - 50 - game.width/3.5,
			'sizeX': null,
			'sizeY': null,
			'beerTaken': 0,
			'coefDrunk': 0,
			'img': null,
			'score': 0
		};
		player.img = document.getElementById("res_car");
		resizeCanvas();
		main();
	}
}


//preventing
window.resize = resizeCanvas();
document.body.addEventListener("touchstart", function (e) {
  if (e.target == document.getElementById("game-canvas"))
    e.preventDefault();
}, false);
document.body.addEventListener("touchend", function (e) {
  if (e.target == document.getElementById("game-canvas"))
    e.preventDefault();
}, false);
document.body.addEventListener("touchmove", function (e) {
  if (e.target == document.getElementById("game-canvas"))
    e.preventDefault();
}, false);


//canvas event catcher
var activeButton = false;
var cursorPos = {x:0, y:0};
document.getElementById("game-canvas").addEventListener("mousedown", function (e) { activeButton = true; cursorPos = getCursorPos(document.getElementById("game-canvas"), e); }, false);
document.getElementById("game-canvas").addEventListener("mouseup", function (e) { activeButton = false; }, false);
document.getElementById("game-canvas").addEventListener("mousemove", function (e) { cursorPos = getCursorPos(document.getElementById("game-canvas"), e); }, false);
function getCursorPos(canvas, mouseEvent) {
  	var rect = canvas.getBoundingClientRect();
	return {
		x: mouseEvent.clientX - rect.left,
    	y: mouseEvent.clientY - rect.top
  	};
}

document.onkeydown = function(e){
	e = e || window.event;
	if (e.keyCode == '37') {
       cursorPos.x = 1;
       activeButton = true;
    }
    else if (e.keyCode == '39') {
       cursorPos.x = game.width - 1;
       activeButton = true;
    }
}
document.onkeyup = function(e){ activeButton = false; }


//touch as mouse
document.getElementById("game-canvas").addEventListener("touchstart", function (e) {
    mousePos = getTouchPos(document.getElementById("game-canvas"), e);
  	var touch = e.touches[0];
  	var mouseEvent = new MouseEvent("mousedown", {
    	clientX: touch.clientX,
    	clientY: touch.clientY
	});
	document.getElementById("game-canvas").dispatchEvent(mouseEvent);
}, false);
document.getElementById("game-canvas").addEventListener("touchend", function (e) {
	var mouseEvent = new MouseEvent("mouseup", {});
	document.getElementById("game-canvas").dispatchEvent(mouseEvent);
}, false);
document.getElementById("game-canvas").addEventListener("touchmove", function (e) {
  	var touch = e.touches[0];
  	var mouseEvent = new MouseEvent("mousemove", {
    	clientX: touch.clientX,
    	clientY: touch.clientY
  	});
  	document.getElementById("game-canvas").dispatchEvent(mouseEvent);
}, false);
function getTouchPos(canvas, touchEvent) {
  var rect = canvas.getBoundingClientRect();
  return {
    x: touchEvent.touches[0].clientX - rect.left,
    y: touchEvent.touches[0].clientY - rect.top
  };
}


// Game
var render = function(){
	game.lifeTime++;
	game.popTime++;
	player.score += game.speed;

	if (game.popTime > 160 - game.lifeTime/25){
		game.objects.push(Object.create(item));
		var rand = Math.random();
		game.objects[game.objects.length - 1].class = (rand > 0.5 ? 'beer' : 'wall');
		game.objects[game.objects.length - 1].color = (rand > 0.5 ? 'yellow' : 'gray');
		game.objects[game.objects.length - 1].img = (rand > 0.5 ? document.getElementById("res_beer") : document.getElementById("res_wall"));
		game.objects[game.objects.length - 1].sizeX = (rand > 0.5 ? item.sizeX : (263/187)*item.sizeX);
		game.objects[game.objects.length - 1].x = (Math.random() * game.width < 0 ? 0 : Math.random() * game.width);
		if (game.objects[game.objects.length - 1].x + game.objects[game.objects.length - 1].sizeX > game.width){
			game.objects[game.objects.length - 1].x = game.width - game.objects[game.objects.length - 1].sizeX;
		}

		game.popTime = 0;
	}

	// Background
	context.beginPath();
	context.fillStyle = "#333333"; 
	context.fillRect(0, 0, game.width, game.height);

	for (var y = -20; y <= game.height/60 + 2; y++){
		context.fillStyle = "white"; 
		context.fillRect(game.width/2 - 5, y*60 + (game.lifeTime%60)*game.speed, 10, 50);
	}

	//Get Input
	if (activeButton){
		if (cursorPos.x >= game.width/2){
			player.x += 3;
		}else{
			player.x -= 3;
		}
	}

	// Player
	if (game.lifeTime % 30 == 0){
		player.coefDrunk = (Math.random() - 0.5) * player.beerTaken * 0.8; 
		game.speed += 0.05;
	}
	player.x += player.coefDrunk;
	context.drawImage(player.img, player.x, player.y, player.sizeX, player.sizeY);
	if (player.x > game.width - player.sizeX || player.x < 0){
		sfx.crash.play();
		game.run = false;
	}

	// Obstacles
	for (var objectId in game.objects){
		game.objects[objectId].y += game.speed;
		context.fillStyle = game.objects[objectId].color; 
		context.drawImage(game.objects[objectId].img, game.objects[objectId].x, game.objects[objectId].y, game.objects[objectId].sizeX, game.objects[objectId].sizeY);

		if (!((game.objects[objectId].x >= player.x + player.sizeX) 
		|| (game.objects[objectId].x + game.objects[objectId].sizeX <= player.x) 
		|| (game.objects[objectId].y >= player.y + player.sizeY)
		|| (game.objects[objectId].y + game.objects[objectId].sizeY <= player.y))){
			if (game.objects[objectId].class == 'beer'){
				sfx.coldOne.play();
				game.objects.splice(objectId, 1);
				game.speed += 1;
				player.beerTaken++;
				player.score -= 900;
				game.labels.push(Object.create(label));
				if (player.beerTaken >= 5){
					game.run = false;
				}
			}else{
				sfx.crash.play();
				game.run = false;
			}
		}

		if (game.objects[objectId]){
			if (game.objects[objectId].y > game.height){
				game.objects.splice(objectId, 1);
			}
		}
	}

	// GUI
	context.fillStyle = "#EFEFEF"; 
	context.fillRect(10, 10, 104, 26);
	context.fillStyle = "#999999"; 
	context.fillRect(12, 12, 100, 22);
	context.fillStyle = "#FFFF00"; 
	context.fillRect(12, 12, 100 * (player.beerTaken / 5), 22);

	context.font = "18pt Calibri,Geneva,Arial";
	context.fillStyle = "white";
	context.textAlign = "end";
	context.fillText("SCORE: " + Math.round(player.score), game.width - 10, 30);
	context.fillText("VITESSE: " + Math.round(game.speed*12) + "km/h", game.width - 10, game.height - 30);

	for (var labelId in game.labels){
		game.labels[labelId].timeLived++;
		game.labels[labelId].y++;
		game.labels[labelId].color = 'rgb(' + Math.round(255 - 170*(game.labels[labelId].timeLived/game.labels[labelId].lifeTime)) + ',0,0)';
		context.font = "18pt Calibri,Geneva,Arial";
		context.textAlign = "center";
    	context.fillStyle = game.labels[labelId].color;
    	context.fillText(-900, game.labels[labelId].x,  game.labels[labelId].y);
    	if (game.labels[labelId].timeLived >= game.labels[labelId].lifeTime){
			game.labels.splice(labelId, 1);
		}
	}

}

var main = function(){
	render();

	if (game.run){
		requestAnimationFrame(main);
	}else{

		context.font = "30pt Impact,Calibri,Geneva,Arial";
		context.textAlign = "center";
    	context.fillStyle = "red";
    	context.strokeStyle = "black";
    	context.fillText("BOIRE", game.width/2, game.height/4-40);
    	context.strokeText("BOIRE", game.width/2, game.height/4-40);
    	setTimeout(function(){
    		context.fillText("OU CONDUIRE", game.width/2, 2*game.height/4-40);
    		context.strokeText("OU CONDUIRE", game.width/2, 2*game.height/4-40);
    		setTimeout(function(){
    			context.fillText("IL FAUT", game.width/2, 3*game.height/4-40);
    			context.strokeText("IL FAUT", game.width/2, 3*game.height/4-40);
	    		setTimeout(function(){
	    			context.fillText("CHOISIR", game.width/2, game.height-40);
	    			context.strokeText("CHOISIR", game.width/2, game.height-40);
	    			setTimeout(function(){
	    				context.fillStyle = "#555555";
	    				context.fillRect(0, 0, game.width, game.height);
	    				context.fillStyle = "white";
	    				context.font = "18pt Impact,Calibri,Geneva,Arial";
	    				context.fillText("Score: " + Math.round(player.score), game.width/2, game.height/4 - 30);
	    				context.fillText("Tappez pour relancer", game.width/2, 3*game.height/4 - 30);
	    				game.canRestart = true;
	    			}, 3000);
	    		}, 200);
    		}, 500);
    	}, 500);

	}
}

function resizeCanvas(){
	game.width = window.innerWidth;
	game.height = window.innerHeight;
	document.getElementById("game-canvas").width = game.width;
	document.getElementById("game-canvas").height = game.height;

	player.sizeX = game.width/6,
	player.sizeY = game.width/3.5

	item.sizeX = game.width*0.12;
	item.sizeY = item.sizeX;
	item.y = -item.sizeY;

	label.x = game.width - 30;
}

