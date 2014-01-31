//<![CDATA[

// SET TARGET DATE HERE
var target = 'January 31, 2014 17:00';

// That's all you need to do.

/************************************************************************/
// Initial digit position for each number graphic
// 9-0
var initialPosCountdown = [0, -618, -1236, -1854, -2472, -3090, -3708, -4326, -4944, -5562];
var classNamesCountdown = ['jours', 'heures', 'minutes', 'secondes'];
var idNamesCountdown = ['d', 'h', 'm', 's'];
var animationFramesCountdown = 5;
var frameShiftCountdown = 103;

// If no number in URL (?date=1/1/11), then use default one
target = (window.location.search == "") ? target : window.location.search.substring(6);

// Starting numbers
var nowCountdown = new Date().getTime();
var endCountdown = Date.parse(target);
var theDiffCountdown;
var theDiffStringCountdown;
// Fix if date is in past
if (endCountdown < nowCountdown){
	alert('Bye Bye Tessi, Welcome MailForGood !');
	initialDigitCheckCountdown('00:00:00:00');
	return;
} else {
	theDiffCountdown = endCountdown-nowCountdown;
	theDiffStringCountdown = getTimeStringCountdown(theDiffCountdown);
}
// Increment (count one second at a time)
var incrementCountdown = 1000;
// Pace of counting in milliseconds (refresh digits every second)
var paceCountdown = 1000;

// Function that controls counting
function doCountCountdown(){
	var x = getTimeStringCountdown(theDiffCountdown);
	theDiffCountdown -= incrementCountdown;
	var y = getTimeStringCountdown(theDiffCountdown);
	// For debugging
	//console.log(y);
	digitCheckCountdown(x,y);
}

// This checks the old value vs. new value, to determine how many digits need to be animated.
function digitCheckCountdown(x,y){
	var a = x.split(':');
	var b = y.split(':');
	for (var i = 0, c = a.length; i < c; i++){
		if (a[i].length < 2) a[i] = '0' + a[i];
		if (b[i].length < 2) b[i] = '0' + b[i];
		var countA = a[i].toString().length;
		var countB = b[i].toString().length;
		if (countB < countA) removeDigitCountdown(i, countB);
		for (var j = 0; j < countB; j++){
			if (b[i].charAt(j) != a[i].charAt(j)){
				var which = idNamesCountdown[i] + j;
				animateDigitCountdown(which, a[i].charAt(j), b[i].charAt(j));
			}
		}
	}
}

// Function to break the time into day:hour:minute:second
function getTimeStringCountdown(d){
	var diff = d;
	var days = Math.floor(diff / 86400000);
	diff -= days * 86400000;
	var hours = Math.floor(diff / 3600000);
	diff -= hours * 3600000;
	var minutes = Math.floor(diff / 60000);
	diff -= minutes * 60000;
	var seconds = Math.floor(diff / 1000);
	return days + ':' + hours + ':' + minutes + ':' + seconds;
}

// Animation function
function animateDigitCountdown(which, oldDigit, newDigit){
	var speed = 80;
	var pos = initialPosCountdown[oldDigit];
	var newPos = initialPosCountdown[newDigit];
	// Each animation is 5 frames long, and 103px down the background image.
	// We delay each frame according to the speed above.
	for (var k = 0; k < animationFramesCountdown; k++){
		pos -= frameShiftCountdown;
		if (k == (animationFramesCountdown - 1)){
			$("#" + which).delay(speed).animate({'background-position': '0 ' + pos + 'px'}, 0, function(){
				// At end of animation, shift position to new digit.
				$("#" + which).css({'background-position': '0 ' + newPos + 'px'}, 0);
			});
		}
		else{
			$("#" + which).delay(speed).animate({'background-position': '0 ' + pos + 'px'}, 0);
		}
	}
}

// Remove digit
function removeDigitCountdown(i,count){
	$("li#" + idNamesCountdown[i] + count).remove();
}

// Sets the correct digits on load
function initialDigitCheckCountdown(initial){
	// Creates the html
	var a = initial.split(':');
	for (var i = 0, c = a.length; i < c; i++){
		if (a[i].length < 2) a[i] = '0' + a[i];
		var count = a[i].toString().length;
		var html = '<div class="set"><ul class="' + classNamesCountdown[i] + '">';
		var bit = count;
		for (var j = 0; j < count; j++){
			bit--;
			html += '<li id="' + idNamesCountdown[i] + j + '"></li>';
			if (bit != 0 && bit != (count) && bit % 3 == 0) html += '<li class="comma"></li>';
		}
		html += '</ul><h2>' + classNamesCountdown[i].toUpperCase() + '</h2>';
		// If you don't like the ':' separator, remove the following line
		if (i != 3) html += '</div><div class="separator">:</div>';
		//
		$("#countdown-blog").append(html);
	}
	// Sets digits to the right number
	for (var n = 0, cn = a.length; n < cn; n++){
		count = a[n].toString().length;
		for (var m = 0; m < count; m++){
			var thisID = idNamesCountdown[n] + m;
			var thisPos = initialPosCountdown[a[n].charAt(m)];
			$("#" + idNamesCountdown[n] + m).css({'background-position': '0 ' + thisPos + 'px'});
		}
	}
}

// Start it up
initialDigitCheckCountdown(theDiffStringCountdown);
setInterval(doCountCountdown, paceCountdown);

//]]>