// logic.js
// game logic for picross game

var hitArr = [];
var hitArr2 = [];

var squareCount7 = 0;
var hitCount7 = 0;

var squareCount13 = 0;
var hitCount13 = 0;

//---Score tracking Variables
var randomScore7 = 0;
var randomMisses7 = 0;  //Holds how many times a player missed in random 7x7 mode
var attackScore7 = 0;
var arcadeScore7 = 0;
var gameMode;
var attackMisses7 = 0;//Holds how many times a player missed in attack 7x7 mode
var attackEmpty7 = 0; //Hows the total amount of wrong "x" tiles available in attack 7x7 mode
var arcadeMisses7 = 0;//Holds how many times a player missed in arcade 7x7 mode
var arcadeEmpty7 = 0;//Hows the total amount of wrong "x" tiles available in arcade 7x7 mode
var endScore = 0;
var endMisses = 0;
//---

var loginName = "";
var populatedUsername = false;

var row;
var length;

var boolArr7 = [];
var boolArr13 = [];
var hitArrLvL1 = [];
var hitArrLvL1a = [];
var hitArrLvL2a = [];
var hitArrLvL2b = [];
var hitArrLvL3a = [];
var hitArrLvL3b = [];
var isLevel7;

/* ------------- Variables for displaying --------------- */
var rowTip = [];
var colTip = [];
var rowTip2 = [];
var colTip2 = [];


var scoreList = [];
var nameList = [];
var timeList = [];
var mistakeList = [];
var parsedData = [];

var it;//holds json info
var sec;
var min;
var hour;
var numTurns;
var numElem;
var numElem2
var endTimeM;
var endTimeS;
var doAttack;
var doArcade;
var attackFinished = false;
var arcadeFinished = false;
var timeLevelPassed = [];
var arcadeLevelPassed = [];
var active13;
var active7;
var doTrans = []; //boolean array for attack
var doTrans2 = []; //boolean array for arcade
var docreate;


function setTime() {
	sec = 0;
	min = 0;
	hour = 0;
	numTurns = 0;
	numElem = 0;
	doAttack = false;
	doArcade = false;
	attackFinished = false;
	arcadeFinished = false;
	//
	timeLevelPassed[0] = false;
	timeLevelPassed[1] = false;
	timeLevelPassed[2] = false;
	//
	arcadeLevelPassed[0] = false;
	arcadeLevelPassed[1] = false;
	arcadeLevelPassed[2] = false;
	//
	doTrans[0] = true;
	doTrans[1] = true;
	doTrans[2] = true;
	doTrans[3] = true;
	//
	doTrans2[0] = true;
	doTrans2[1] = true;
	doTrans2[2] = true;
	doTrans2[3] = true;
	//
	active13 = false;
	active7 = true;
	docreate = false;
	setDatabase();
	checkLoginStatus();
	initTableAnsw();

}
function setDatabase() {
	$.ajax({
		type: 'GET',
		url: 'database_init.php',
		dataType: "jsonp",
		//data: {action: "yeet"},    
		success: function (data) {
			//console.log(data);
			//it = JSON.parse(data);
		}
	});
}
function arcade() {
	
	docreate = false;
	attackFinished = false;
	arcadeFinished = false;
	arcadeLevelPassed[0] = false;
	arcadeLevelPassed[1] = false;
	arcadeLevelPassed[2] = false;
	doTrans[0] = true;
	doTrans[1] = true;
	doTrans[2] = true;
	doTrans[3] = true;
	doTrans2[0] = true;
	doTrans2[1] = true;
	doTrans2[2] = true;
	doTrans2[3] = true;
	min = 0;
	sec = 0;
	numElem = 0;
	numTurns = 0;
	doArcade = true;
	doAttack = false;
	hitCount7 = 0;
	hitCount13 = 0;
	arcadeMisses7 = 0;
	arcadeEmpty7 = 0;
	if (arcadeLevelPassed[0] == false && arcadeLevelPassed[1] == false && arcadeLevelPassed[2] == false && active7) {
		deleteTable();
			loadLevel1();
		
		
	}

	if (arcadeLevelPassed[0] == false && arcadeLevelPassed[1] == false && arcadeLevelPassed[2] == false && active13) {
		deleteTable();
		loadLevel4();
	}
	//createLevel();
	addTips();
	displayTips();
}
function attack() {
	
	docreate = false;
	timeLevelPassed[0] = false;
	timeLevelPassed[1] = false;
	timeLevelPassed[2] = false;
	doTrans[0] = true;
	doTrans[1] = true;
	doTrans[2] = true;
	doTrans[3] = true;
	doTrans2[0] = true;
	doTrans2[1] = true;
	doTrans2[2] = true;
	doTrans2[3] = true;
	attackFinished = false;
	arcadeFinished = false;
	min = 0;
	sec = 0;
	numElem = 0;
	numTurns = 0;
	doAttack = true;
	doArcade = false;
	endTimeM = min + 1;
	endTimeS = sec;
	hitCount7 = 0;
	hitCount13 = 0;
	attackMisses7 = 0;
	attackEmpty7 = 0;
	if (timeLevelPassed[0] == false && timeLevelPassed[1] == false && timeLevelPassed[2] == false && active7) {
		deleteTable();
			loadLevel1();
		
	}
	if (timeLevelPassed[0] == false && timeLevelPassed[1] == false && timeLevelPassed[2] == false && active13) {
		deleteTable();
		loadLevel4();
	}
	//createLevel();
	//addTips();
	//displayTips();
	//need to add timeLevelPassed[1]=true; to the win condition
}

function createLevel() {
	/* -------------------- For 7x7 tables -------------------------*/
	numElem = 0;
	numTurns = 0;
	document.getElementById("turns").innerHTML = numTurns;
	var tbl = document.getElementById("table");
	var i = 0;
	//console.log(it[0]["one"]);
	while (i < 7) {
		hitArr.push([]);
		hitArr[i][0] = it[i]['one'];
		hitArr[i][1] = it[i]['two'];
		hitArr[i][2] = it[i]['three'];
		hitArr[i][3] = it[i]['four'];
		hitArr[i][4] = it[i]['five'];
		hitArr[i][5] = it[i]['six'];
		hitArr[i][6] = it[i]['seven'];
		i++;
	}

	for (var i = 0; i < tbl.rows.length - 1; i++) {
		boolArr7.push([]);
		rowTip.push([]);
		colTip.push([]);
		for (var j = 0; j < tbl.rows[i].cells.length - 1; j++) {
			boolArr7[i][j] = 0;
			rowTip[i][j] = 0;
			colTip[i][j] = 0;
			if (hitArr[i][j] == "1")//left side of X
			{
				numElem++;
				squareCount7++;
			}
		}
	}
	addTips();
	displayTips();

	if (doAttack) {
		attackEmpty7 = attackEmpty7 + (49 - squareCount7);
	}

	if (doArcade) {
		arcadeEmpty7 = arcadeEmpty7 + (49 - squareCount7);
	}

	document.getElementById("elements").innerHTML = numElem;
	/* -------------------- For 13x13 tables -------------------------*/
	var tbl2 = document.getElementById("table2");
	i = 0;
	while (i < 13) {
		hitArr2.push([]);
		hitArr2[i][0] = it[i]['one'];
		hitArr2[i][1] = it[i]['two'];
		hitArr2[i][2] = it[i]['three'];
		hitArr2[i][3] = it[i]['four'];
		hitArr2[i][4] = it[i]['five'];
		hitArr2[i][5] = it[i]['six'];
		hitArr2[i][6] = it[i]['seven'];
		hitArr2[i][7] = it[i]['eight'];
		hitArr2[i][8] = it[i]['nine'];
		hitArr2[i][9] = it[i]['ten'];
		hitArr2[i][10] = it[i]['eleven'];
		hitArr2[i][11] = it[i]['twelve'];
		hitArr2[i][12] = it[i]['thirteen'];
		i++;
	}

	for (var i = 0; i < tbl2.rows.length - 1; i++) {
		boolArr13.push([]);
		rowTip.push([]);
		colTip.push([]);
		for (var j = 0; j < tbl2.rows[i].cells.length - 1; j++) {
			boolArr13[i][j] = 0;
			rowTip[i][j] = 0;
			colTip[i][j] = 0;
			if (hitArr2[i][j] == 1)//left side of X
			{
				numElem++;
				squareCount13++;
			}
		}
	}
	document.getElementById("elements").innerHTML = numElem;

}
function loadLevel1() {
	//alert("Loading level 1");
	delete it;
	$.ajax({
		type: 'GET',
		url: 'levelLoad.php',
		//data: {action: "yeet"},    
		success: function (data) {
			it = JSON.parse(data); 
			delTips();
			createLevel();
		}
	});
}
function loadLevel2() {
	
	//alert("Loading level 2");
	delete it;
	$.ajax({

		type: 'GET',
		url: 'levelLoad2.php',
		//data: {action: "yeet"},    
		success: function (data) {
			//console.log(data);
			it = JSON.parse(data);
			docreate = true;
			//console.log(it);
		}
	});
}
function loadLevel3() {
	
	//alert("Loading level 3");
	$.ajax({
		type: 'GET',
		url: 'levelLoad3.php',
		//data: {action: "yeet"},    
		success: function (data) {
			//console.log(data);
			it = JSON.parse(data);
			docreate = true;
		}
	});
}

function loadLevel4() {
	$.ajax({
		type: 'GET',
		url: 'levelLoad4.php',
		//data: {action: "yeet"},    
		success: function (data) {
			//console.log(data);
			it = JSON.parse(data);
			docreate = true;
		}
	});
}
function loadLevel5() {
	$.ajax({
		type: 'GET',
		url: 'levelLoad5.php',
		//data: {action: "yeet"},    
		success: function (data) {
			//console.log(data);
			it = JSON.parse(data);
			docreate = true;
		}
	});
}
function loadLevel6() {
	$.ajax({
		type: 'GET',
		url: 'levelLoad6.php',
		//data: {action: "yeet"},    
		success: function (data) {
			//console.log(data);
			it = JSON.parse(data);
			docreate = true;
		}
	});
}

function checkLoginStatus() {
	lgn = document.getElementById("login");
	lgt = document.getElementById("logout");
	$.ajax({
		type: 'GET',
		url: 'getUsername.php',
		//data: {action: "yeet"},    
		success: function (data) {
			//console.log(data);
			loginName = JSON.parse(data);
			if (loginName != "") {
				lgt.style.visibility = "visible";
				lgn.innerHTML = loginName;
				populatedUsername = true;
			}
		}
	});


}
function displayTips() {
	//---------------------------------------7x7------------------------------------//
	tbl = document.getElementById("table");
	for (var i = 0; i < rowTip.length; i++) {
		for (var j = 0; j < rowTip.length; j++) {
			if (rowTip[i][j] > 0) {
				var elemID = "" + "t" + i;
				var element = document.getElementById(elemID);
				var insElement = " " + rowTip[i][j];
				element.insertAdjacentHTML('beforeend', insElement);
			}
		}
	}

	for (var i = 0; i < colTip.length; i++) {
		for (var j = 0; j < colTip.length; j++) {
			if (colTip[i][j] > 0) {
				var elemID = "" + "r" + (i + 1);
				var element = document.getElementById(elemID);
				var insElement = " " + colTip[i][j] + "<br>";
				element.insertAdjacentHTML('beforeend', insElement);
			}
		}
	}

	//---------------------------------------13x13------------------------------------//
	tbl2 = document.getElementById("table2");
	for (var i = 0; i < rowTip2.length; i++) {
		for (var j = 0; j < rowTip2.length; j++) {
			if (rowTip2[i][j] > 0) {
				var elemID = "" + "s" + i;
				var element = document.getElementById(elemID);
				//console.log(element);
				var insElement = " " + rowTip2[i][j];
				element.insertAdjacentHTML('beforeend', insElement);
			}
		}
	}

	for (var i = 0; i < colTip2.length; i++) {
		for (var j = 0; j < colTip2.length; j++) {
			if (colTip2[i][j] > 0) {
				var elemID = "" + "k" + (i + 1);
				var element = document.getElementById(elemID);
				var insElement = " " + colTip2[i][j] + "<br>";
				element.insertAdjacentHTML('beforeend', insElement);
			}
		}
	}
}

function update() {
	var x = setInterval(function () {
		var i = 0;

		//checkLoginStatus();
		//console.log(loginName);
		if (doAttack && active7) {

			if (timeLevelPassed[0] && timeLevelPassed[1] == false && timeLevelPassed[2] == false && doTrans[2]) {
				deleteTable();
				loadLevel2();
				if (docreate) {
					doTrans[2] = false;
					docreate = false;
					createLevel();
				}
			}


			if (timeLevelPassed[0] && timeLevelPassed[1] && timeLevelPassed[2] == false && doTrans[3]) {
				deleteTable();
				loadLevel3();
				if (docreate) {
					doTrans[3] = false;
					docreate = false;
					createLevel();
				}
			}

			if (timeLevelPassed[0] && timeLevelPassed[1] && timeLevelPassed[2]) {

				//alert("You Won! " + " Completion time: " + hour + " hours " + min + " minutes " + sec + " seconds");
				doAttack = false;
			}
		}
		if (doAttack && active13) {

			if (timeLevelPassed[0] && timeLevelPassed[1] == false && timeLevelPassed[2] == false && doTrans2[0]) {
				deleteTable();
				loadLevel5();
				if (docreate) {
					doTrans2[0] = false;
					docreate = false;
					createLevel();
				}
			}


			if (timeLevelPassed[0] && timeLevelPassed[1] && timeLevelPassed[2] == false && doTrans2[1]) {
				deleteTable();
				loadLevel6();
				if (docreate) {
					doTrans2[1] = false;
					docreate = false;
					createLevel();
				}
			}

			if (timeLevelPassed[0] && timeLevelPassed[1] && timeLevelPassed[2]) {
				//alert("You Won! " + " Completion time: " + hour + " hours " + min + " minutes " + sec + " seconds");
				doAttack = false;
			}
		}

		if (doArcade && active7) {
			if (arcadeLevelPassed[0] && arcadeLevelPassed[1] == false && arcadeLevelPassed[2] == false && doTrans[0]) {
				deleteTable();
				loadLevel2();
				if (docreate) {
					doTrans[0] = false;
					docreate = false;
					createLevel();
				}

			}
			if (arcadeLevelPassed[0] && arcadeLevelPassed[1] && arcadeLevelPassed[2] == false && doTrans[1]) {
				deleteTable();
				loadLevel3();
				if (docreate) {
					doTrans[1] = false;
					docreate = false;
					createLevel();
				}

			}
			if (arcadeLevelPassed[0] && arcadeLevelPassed[1] && arcadeLevelPassed[2]) {
				//alert("You Won! " + " Completion time: " + hour + " hours " + min + " minutes " + sec + " seconds");
				deleteTable();
				doArcade = false;
			}
		}

		if (doArcade && active13) {
			if (arcadeLevelPassed[0] && arcadeLevelPassed[1] == false && arcadeLevelPassed[2] == false && doTrans2[2]) {
				deleteTable();
				loadLevel5();
				if (docreate) {
					doTrans2[2] = false;
					docreate = false;
					createLevel();
				}
			}
			if (arcadeLevelPassed[0] && arcadeLevelPassed[1] && arcadeLevelPassed[2] == false && doTrans2[3]) {
				deleteTable();
				loadLevel6();
				if (docreate) {
					doTrans[3] = false;
					docreate = false;
					createLevel();
				}
			}
			if (arcadeLevelPassed[0] && arcadeLevelPassed[1] && arcadeLevelPassed[2]) {
				//alert("You Won! " + " Completion time: " + hour + " hours " + min + " minutes " + sec + " seconds");
				doArcade = false;
			}
		}
	}, 1000);
}
function createTable(rowSize, colSize) {
	row = rowSize;
	length = colSize;
	var body = document.getElementById("innerBody");
	var tbl = document.getElementById("table");

	for (var i = 0; i < rowSize; i++) {
		var tr = tbl.insertRow();
		for (var j = 0; j < colSize; j++) {
			if (i == rowSize && j == colSize)
				break;
			else {
				var td = tr.insertCell();
				td.appendChild(document.createTextNode(""));
				td.style.border = '1px solid black';
				var a = i + 1;
				var b = j + 1;
				td.id = "" + a + " " + b;
			}
		}
	}
	body.appendChild(tbl);
}

function deleteTable() {
	randomMisses7 = 0;
	gameMode = "";
	randomScore7 = 0;
	squareCount7 = 0;
	numElem = 0;
	numTurns = 0;
	document.getElementsByTagName("table")[0];
	var x = document.getElementsByClassName("content");
	delTips();
	for (var i = 0; i < x.length; i++) {
		var item = x[i];
		item.style.backgroundColor = "rgba(170, 170, 170, 0.4)";
		item.innerHTML = "";
	}
}


function cellClick() {
	/* -------------------For 7x7 tables ------------------------*/
	var tbl = document.getElementById("table");
	if (tbl != null) {
		for (var i = 0; i < tbl.rows.length; i++)
			for (var j = 0; j < tbl.rows[i].cells.length; j++)
				tbl.rows[i].cells[j].onclick = function () { checkAns(this); };
	}

	/* -------------------For 13x13 tables ------------------------*/
	var tbl2 = document.getElementById("table2");
	if (tbl2 != null) {
		for (var i = 0; i < tbl2.rows.length; i++)
			for (var j = 0; j < tbl2.rows[i].cells.length; j++)
				tbl2.rows[i].cells[j].onclick = function () { checkAns(this); };
	}
}

function checkAns(cel) {
	/* -------------------- For 7x7 tables -------------------------*/
	if (cel.parentNode.parentNode.parentNode.id == "table") {
		var num = cel.id.split('');
		var splitted = num.map(Number);
		if (hitArr[splitted[0]][splitted[1]] == "1") {
			cel.style.backgroundColor = "rgb(33, 204, 138)";
			//cel.style.boxShadow = "0 0 5px 2px rgb(0, 187, 140) inset";
			if (boolArr7[splitted[0]][splitted[1]] != 1) {
				boolArr7[splitted[0]][splitted[1]] = 1;
				hitCount7++;
				numElem--;
				document.getElementById("elements").innerHTML = numElem;

				/* ----------------Displaying the number of turns ---------------*/
				numTurns++;
				document.getElementById("turns").innerText = numTurns;
				/* --------------------------------------------------------------*/
			}
		}
		else {
			cel.innerHTML = "<div class = 'backG'>X</div>";
			cel.style.backgroundColor = "rgba(255, 255, 255, 0.65)";
			//cel.style.boxShadow = "0 0 5px 2px rgba(170, 170, 170, 0.4) inset";
			if (boolArr7[splitted[0]][splitted[1]] != 2) {
				randomMisses7++;
				if (doArcade)
					arcadeMisses7++;
				if (doAttack)
					attackMisses7++;
				boolArr7[splitted[0]][splitted[1]] = 2;
				/* ----------------Displaying the number of turns ---------------*/
				numTurns++;
				document.getElementById("turns").innerText = numTurns;
				/* --------------------------------------------------------------*/
			}
		}
	}
	/* -------------------- For 13x13 tables -------------------------*/
	if (cel.parentNode.parentNode.parentNode.id == "table2") {
		var num2 = cel.id.split(" ", 2);
		var splitted2 = num2.map(Number);
		if (hitArr2[splitted2[0]][splitted2[1]] == "1") {
			cel.style.backgroundColor = "rgb(0, 235, 176)";
			//cel.style.boxShadow = "0 0 5px 2px rgb(0, 187, 140) inset";
			hitCount13++;
		}
		else {
			cel.innerHTML = "<div class = 'backG2'>X</div>";
			cel.style.backgroundColor = "rgba(255, 255, 255, 0.65)";
			//cel.style.boxShadow = "0 0 5px 2px rgba(170, 170, 170, 0.4) inset";
		}
	}
	/*console.log("hitCount7:", hitCount7);
	console.log("numElem:", numElem);
	console.log("SquareCount7:", squareCount7);*/
	checkVictory();

	console.clear()
	console.log("randomMisses7: ", randomMisses7);
	console.log("attackMisses7: ", attackMisses7);
	console.log("attackEmpty7: ", attackEmpty7);
	console.log("arcadeMisses7: ", arcadeMisses7);
	console.log("arcadeEmpty7: ", arcadeEmpty7);
	console.log("squareCount7: ", squareCount7);
	console.log("hitCount7: ", hitCount7);

}

function checkVictory() {
	if (squareCount7 == hitCount7) {
		if (doAttack) {

			if (timeLevelPassed[0] == false && timeLevelPassed[1] == false && timeLevelPassed[2] == false) {
				timeLevelPassed[0] = true;
				console.log("level 1 passed");
				hitCount7 = 0;
				return;
			}
			if (timeLevelPassed[0] && timeLevelPassed[1] == false && timeLevelPassed[2] == false) {
				timeLevelPassed[1] = true;
				console.log("level 2 passed");
				hitCount7 = 0;
				return;
			}
			if (timeLevelPassed[0] && timeLevelPassed[1] && timeLevelPassed[2] == false) {
				console.log("level 3 passed");
				timeLevelPassed[2] = true;
				hitCount7 = 0;
				attackFinished = true;
				//return;
			}
		}
		if (doArcade) {
			if (arcadeLevelPassed[0] == false && arcadeLevelPassed[1] == false && arcadeLevelPassed[2] == false) {
				arcadeLevelPassed[0] = true;
				console.log("level 1 passed");
				hitCount7 = 0;
				return;
			}
			if (arcadeLevelPassed[0] && arcadeLevelPassed[1] == false && arcadeLevelPassed[2] == false) {
				arcadeLevelPassed[1] = true;
				console.log("level 2 passed");
				hitCount7 = 0;
				return;
			}
			if (arcadeLevelPassed[0] && arcadeLevelPassed[1] && arcadeLevelPassed[2] == false) {
				arcadeLevelPassed[2] = true;
				console.log("level 3 passed");
				hitCount7 = 0;
				arcadeFinished = true;
				//return;
			}
		}

		//alert("You Won! " + " Completion time: " + hour + " hours " + min + " minutes " + sec + " seconds");


		if (active7 && !doArcade && !doAttack) {
			randomScore7 = Math.abs(49 - squareCount7);
			randomScore7 = randomScore7 - randomMisses7;
			endScore = "" + randomScore7;
			gameMode = "Random";
			endMisses = "" + randomMisses7;
			deleteTable();
		}

		if (active7 && arcadeFinished) {
			endScore = arcadeEmpty7 - arcadeMisses7;
			endScore = "" + endScore;
			gameMode = "Arcade";
			endMisses = "" + arcadeMisses7;
			arcadeFinished = false;
		}

		if (active7 && attackFinished) {
			endScore = attackEmpty7 - attackMisses7;
			endScore = "" + endScore;
			gameMode = "Attack";
			endMisses = "" + attackMisses7;
			attackFinished = false
		}

		if (loginName != "") {
			document.getElementById('winningText').innerHTML = "Congratulations " + loginName + ", you won! <br>GameMode: " + gameMode + "<br>Time Spent: " + hour + "h: " + min + "m: " + sec + "s<br>Score: " + endScore + "<br>Mistakes: " + endMisses + "<br><br>";
			document.getElementById('light').style.display = 'block';
			document.getElementById('fade').style.display = 'block';
		}
		else {
			document.getElementById('winningText').innerHTML = "Congratulations, you won! <br>GameMode: " + gameMode + "<br>Time Spent: " + hour + "h: " + min + "m: " + sec + "s<br>Score: " + endScore + "<br>Mistakes: " + endMisses + "<br><br>";
			document.getElementById('light').style.display = 'block';
			document.getElementById('fade').style.display = 'block';
		}

		var timeSpent = hour + ":" + min + ":" + sec;

		if (active7 && loginName != "") {
			$.ajax({
				url: 'gameScores.php',
				data: { score: endScore, spentTime: timeSpent, gameType: gameMode, totalErrs: endMisses },
				type: 'post',
				success: function (output) { },
				error: function (xhr, textStatus, error) {
					alert(xhr.statusText);
					alert(textStatus);
					alert(error);
				}
			});
		}


		if (active13) {

		}




	}
}

function initTableAnsw() {
	deleteTable();
	/* -------------------- For 7x7 tables -------------------------*/
	doArcade = false;
	doAttack = false;
	attackFinished = false;
	arcadeFinished = false;
	hitCount7 = 0;
	min = 0;
	sec = 0;
	numElem = 0;
	numTurns = 0;
	randomScore7 = 0;
	randomMisses7 = 0;
	document.getElementById("turns").innerHTML = numTurns;
	var tbl = document.getElementById("table");
	for (var i = 0; i < tbl.rows.length - 1; i++) {
		hitArr.push([]);
		boolArr7.push([]);
		rowTip.push([]);
		colTip.push([]);
		for (var j = 0; j < tbl.rows[i].cells.length - 1; j++) {
			var ran = Math.round(Math.random());
			hitArr[i][j] = ran;
			boolArr7[i][j] = 0;
			rowTip[i][j] = 0;
			colTip[i][j] = 0;
			if (ran == 1) {
				numElem++;
				if (active7)
					document.getElementById("elements").innerHTML = numElem;
			}
		}
	}
	for (var i = 0; i < tbl.rows.length - 1; i++) {
		for (var j = 0; j < tbl.rows[i].cells.length - 1; j++) {
			if (hitArr[i][j] == "1") {
				squareCount7++;
				//tbl.rows[i + 1].cells[j + 1].style.backgroundColor = "grey";
			}
		}
	}

	/* -------------------- For 13x13 tables -------------------------*/
	numElem2 = 0;
	numTurns = 0;
	document.getElementById("turns").innerHTML = numTurns;
	var tbl2 = document.getElementById("table2");
	for (var i = 0; i < tbl2.rows.length - 1; i++) {
		hitArr2.push([]);
		boolArr13.push([]);
		rowTip2.push([]);
		colTip2.push([]);
		for (var j = 0; j < tbl2.rows[i].cells.length - 1; j++) {
			var ran = Math.round(Math.random());
			hitArr2[i][j] = ran;
			boolArr13[i][j] = 0;
			rowTip2[i][j] = 0;
			colTip2[i][j] = 0;
			if (ran == 1) {
				numElem2++;
				if (active13)
					document.getElementById("elements").innerHTML = numElem2;
			}
		}
	}
	for (var i = 0; i < tbl2.rows.length - 1; i++) {
		for (var j = 0; j < tbl2.rows[i].cells.length - 1; j++) {
			if (hitArr2[i][j] == "1") {
				squareCount13++;
				//tbl.rows[i].cells[j].style.backgroundColor = "";
			}
		}
	}
	addTips();
	displayTips();
	console.log(hitArr2);
}

function colorFunction(color) {

	for (var i = 0; i < row; i++) {
		for (var j = 0; j < length; j++) {
			if (i == row && j == length)
				break;
			else {
				var a = i + 1;
				var b = j + 1;
				var tmp = "" + a + " " + b;

				document.getElementById(tmp).style.background = color;
			}
		}
	}
}

function gridColorFunction(color) {

	for (var i = 0; i < row; i++) {
		for (var j = 0; j < length; j++) {
			if (i == row && j == length)
				break;
			else {
				var a = i + 1;
				var b = j + 1;
				var tmp = "" + a + " " + b;

				document.getElementById(tmp).style.borderColor = color;

			}
		}
	}
}

function timer() {
	var x = setInterval(function () {
		sec++;
		if (sec < 60 && min == 0)
			document.getElementById("demo").innerHTML = sec + " seconds";// hours + "h "+ minutes + "m " + seconds + "s ";

		if (sec == 60) {
			sec = 0;
			min++;
		}

		if (min > 0)
			document.getElementById("demo").innerHTML = min + " minutes " + sec + " seconds";
		if (min == 60) {
			min = 0;
			hour++;
		}
		if (hour > 0)
			document.getElementById("demo").innerHTML = hour + " hours " + min + " minutes " + sec + " seconds";
		if ((min >= endTimeM && sec >= endTimeS) && doAttack) {
			alert("fail");
			//console.log(min);
			doAttack = false;
		}
	}, 1000);
}

function seven() {
	document.getElementById("tblCont2").style.display = "none";
	document.getElementById("tblCont").style.display = "initial";
	active13 = false;
	active7 = true;
}
function thirteen() {
	document.getElementById("tblCont").style.display = "none";
	document.getElementById("tblCont2").style.display = "initial";
	active13 = true;
	active7 = false;
}
function gridColor(tmp) {
	document.getElementsByTagName("table")[0].style.borderColor = tmp;

	var x = document.getElementsByClassName("content");
	for (var i = 0; i < x.length; i++) {
		var item = x[i];//get the td with class name content
		item.style.borderColor = tmp;
		item.style.backGround = tmp;
	}

}
function backGroundColor(tmp) {
	document.getElementsByTagName("table")[0];

	var x = document.getElementsByClassName("content");
	for (var i = 0; i < x.length; i++) {
		var item = x[i];
		item.style.background = tmp;
		//console.log(item);
	}

}

function addTips() {
	tbl = document.getElementById("table");
	hitArr.push([]); //without this, the columns don't work and throw an out of bounds error on array.
	var k; //incrementer for the row tips array
	var n; //incrementer for the col tips array
	for (var i = 0; i < tbl.rows.length - 1; i++) {
		k = 0;
		n = 0;
		for (var j = 0; j < tbl.rows[i].cells.length - 1; j++) {
			/*--------------- For Rows ----------------------*/
			if (hitArr[i][j] == 1 && hitArr[i][j + 1] == 1) {
				rowTip[i][k] = rowTip[i][k] + 1;

			}
			else if (hitArr[i][j] == 1 && hitArr[i][j + 1] != 1) {
				rowTip[i][k] = rowTip[i][k] + 1;
				k++;
			}
			else {
				rowTip[i][k] = rowTip[i][k];
			}
			/*-----------------------------------------------*/
			/*--------------- For Cols ----------------------*/
			if (hitArr[j][i] == 1 && hitArr[j + 1][i] == 1) {
				colTip[i][n]++;
			}
			else if (hitArr[j][i] == 1 && hitArr[j + 1][i] != 1) {
				colTip[i][n]++;
				n++;
			}
			else {
				colTip[i][n] = colTip[i][n];
			}
		}
		/*-----------------------------------------------*/
	}
	tbl2 = document.getElementById("table2");
	hitArr2.push([]); //without this, the columns don't work and throw an out of bounds error on array.
	var a; //incrementer for the row tips array
	var b; //incrementer for the col tips array
	for (var i = 0; i < tbl2.rows.length - 1; i++) {
		a = 0;
		b = 0;
		for (var j = 0; j < tbl2.rows[i].cells.length - 1; j++) {
			if (hitArr2[i][j] == 1 && hitArr2[i][j + 1] == 1) {
				rowTip2[i][a] = rowTip2[i][a] + 1;

			}
			else if (hitArr2[i][j] == 1 && hitArr2[i][j + 1] != 1) {
				rowTip2[i][a] = rowTip2[i][a] + 1;
				a++;
			}
			else {
				rowTip2[i][a] = rowTip2[i][a];
			}

			if (hitArr2[j][i] == 1 && hitArr2[j + 1][i] == 1) {
				colTip2[i][b]++;
			}
			else if (hitArr2[j][i] == 1 && hitArr2[j + 1][i] != 1) {
				colTip2[i][b]++;
				b++;
			}
			else {
				colTip2[i][b] = colTip2[i][b];
			}
		}
	}
	//console.log(rowTip);
	//console.log(colTip);
}

function delTips() {
	//-----------------------------7x7-----------------------//
	document.getElementsByTagName("table");
	var row = document.getElementsByClassName("rowLabel");
	var col = document.getElementsByClassName("colLabel");
	var itemRow;
	var itemCol;

	for (var i = 0; i < row.length; i++) {
		itemRow = row[i];
		itemRow.innerHTML = "";
	}
	for (var i = 0; i < col.length; i++) {
		itemCol = col[i];
		itemCol.innerHTML = "";
	}

	//console.log("Attempted to delete tips");
	delete colTip;
	delete rowTip;
	//-----------------------------13x13-----------------------//
}

function level1() { console.log("wrong function"); }
function level2() {//creates a simley face :)
	/* -------------------- For 7x7 tables -------------------------*/
	numTurns = 0;
	document.getElementById("turns").innerHTML = numTurns;
	var tbl = document.getElementById("table");
	for (var i = 0; i < tbl.rows.length - 1; i++) {
		hitArr.push([]);
		boolArr7.push([]);
		for (var j = 0; j < tbl.rows[i].cells.length - 1; j++) {
			boolArr7[i][j] = 0;
			hitArr[i][j] = 0;
		}
	}
	hitArr[2][2] = 1;
	hitArr[2][4] = 1;
	hitArr[4][1] = 1;
	hitArr[4][5] = 1;
	hitArr[5][2] = 1;
	hitArr[5][3] = 1;
	hitArr[2][4] = 1;
	numElem = 7;
	squareCount7 = 7;

	document.getElementById("elements").innerHTML = numElem;

	for (var i = 0; i < tbl.rows.length - 1; i++) {
		for (var j = 0; j < tbl.rows[i].cells.length - 1; j++) {
			if (hitArr[i][j] == "1") {
				tbl.rows[i].cells[j].style.backgroundColor = "";
			}
		}
	}
	/* -------------------- For 13x13 tables -------------------------*/
	var tbl2 = document.getElementById("table2");
	for (var i = 0; i < tbl2.rows.length - 1; i++) {
		hitArr2.push([]);
		boolArr13.push([]);
		for (var j = 0; j < tbl2.rows[i].cells.length - 1; j++) {
			boolArr13[i][j] = 0;
			hitArr2[i][j] = 0;
		}
	}
	hitArr2[2][2] = 1;
	hitArr2[2][4] = 1;
	hitArr2[4][1] = 1;
	hitArr2[4][5] = 1;
	hitArr2[5][2] = 1;
	hitArr2[5][3] = 1;
	hitArr2[2][4] = 1;

	for (var i = 0; i < tbl2.rows.length - 1; i++) {
		for (var j = 0; j < tbl2.rows[i].cells.length - 1; j++) {
			if (hitArr2[i][j] == "1") {
				tbl2.rows[i].cells[j].style.backgroundColor = "";
			}
		}
	}
}
function level3() {//creates 
	/* -------------------- For 7x7 tables -------------------------*/
	numTurns = 0;
	document.getElementById("turns").innerHTML = numTurns;
	var tbl = document.getElementById("table");
	numElem = 1;
	squareCount7 = 1;
	document.getElementById("elements").innerHTML = numElem;

	for (var i = 0; i < tbl.rows.length - 1; i++) {
		hitArr.push([]);
		boolArr7.push([]);
		for (var j = 0; j < tbl.rows[i].cells.length - 1; j++) {
			boolArr7[i][j] = 0;
			hitArr[i][j] = 0;
		}
	}
	hitArr[0][0] = 1;
	for (var i = 0; i < tbl.rows.length - 1; i++) {
		for (var j = 0; j < tbl.rows[i].cells.length - 1; j++) {
			if (hitArr[i][j] == "1") {
				tbl.rows[i].cells[j].style.backgroundColor = "";
			}
		}
	}
	/* -------------------- For 13x13 tables -------------------------*/
	var tbl2 = document.getElementById("table2");
	for (var i = 0; i < tbl2.rows.length - 1; i++) {
		hitArr2.push([]);
		boolArr13.push([]);
		for (var j = 0; j < tbl2.rows[i].cells.length - 1; j++) {
			boolArr13[i][j] = 0;
			hitArr2[i][j] = 0;
		}
	}
	hitArr2[10][10] = 1;
	for (var i = 0; i < tbl2.rows.length - 1; i++) {
		for (var j = 0; j < tbl2.rows[i].cells.length - 1; j++) {
			if (hitArr2[i][j] == "1") {
				tbl2.rows[i].cells[j].style.backgroundColor = "";
			}
		}
	}
}

function submitChoice(a) {
	//alert("in here boi");
	tbl = document.getElementById('hiScoreTable');
	tbl.innerHTML = "";
	$.ajax({
		url: 'highScores.php',
		data: { selectIf: a },
		type: 'GET',
		success: function (data) {
			parsedData = JSON.parse(data);
			for (var i = 0; i < parsedData.length; i++) {
				scoreList.push([]);
				scoreList[i] = parsedData[i]['score'];
				nameList[i] = parsedData[i]['player'];
				timeList[i] = parsedData[i]['duration'];
				mistakeList[i] = parsedData[i]['errors'];
			}
			console.log("Name: ", nameList, "Scores: ", scoreList, "Duration: ", timeList);

			 
			//tbl.innerHTML = "";

			for (var i = 0; i < parsedData.length + 1; i++) {
				var row = tbl.insertRow(i);
				for (var j = 0; j < 5; j++) {
					if (i == 0) {
						var parent = tbl.children[0];
						var th = document.createElement('th');
						if (j == 0) {
							th.innerText = "#";
						}
						if (j == 1) {
							th.innerText = "Player";
						}
						if (j == 2) {
							th.innerText = "Score";
						}
						if (j == 3) {
							th.innerText = "Time";
						}
						if (j == 4) {
							th.innerText = "Errors";
						}
						parent.appendChild(th);
					}
					else {
						
					var cell = row.insertCell(j);
						if (j == 0) {
							cell.innerText = i;
						}
						if (j == 1) {
							cell.innerText = nameList[i - 1];
						}
						if (j == 2) {
							cell.innerText = scoreList[i - 1];
						}
						if (j == 3) {
							cell.innerText = timeList[i - 1];
						}
						if (j == 4) {
							cell.innerText = mistakeList[i - 1];
						}
					}

				}
			}

		},
		error: function (xhr, textStatus, error) {
			alert(xhr.statusText);
			alert(textStatus);
			alert(error);
		}
	});




}

function getScores() {
	/*	$.ajax({
    type: 'GET',
    url: 'highScores.php', 
    success: function (data) {
      parsedData = data;
		}
	});

	for (var i = 0; i < parsedData.length; i++) {
		scoreList.push([]);
		scoreList[i] = parsedData[i]['score'];
	}*/
	//console.log("Scores: ", scoreList);
}
