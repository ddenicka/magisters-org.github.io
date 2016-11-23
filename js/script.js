var circle,bets=100500,timeleft=120,ms=1000;
var audioElement = document.createElement('audio');
audioElement.setAttribute('src', 'audio/audio.mp3');
var audioElement2 = document.createElement('audio');
audioElement2.setAttribute('src', 'audio/msg.mp3');
var audioElement3 = document.createElement('audio');
audioElement3.setAttribute('src', 'audio/open.wav');
var ls=0;
var roulet=0;
var clos=0;
var timerinterval;


window.onload = function onLoad() {
	timerinterval = setInterval("reloadinfo()",1000);
	
	$(document).on('click', '.sound-link-on', function() {
                $('.sound-link-on').addClass('hidden');
                $('.sound-link-off').removeClass('hidden');
                var audioElement = document.createElement('audio');
				audioElement.setAttribute('src', 'audio/1.mp3');
				var audioElement2 = document.createElement('audio');
				audioElement2.setAttribute('src', 'audio/1.mp3');
				var audioElement3 = document.createElement('audio');
				audioElement3.setAttribute('src', 'audio/1.mp3');
        });

        $(document).on('click', '.sound-link-off', function() {
                $('.sound-link-off').addClass('hidden');
                $('.sound-link-on').removeClass('hidden');
                var audioElement = document.createElement('audio');
				audioElement.setAttribute('src', 'audio/audio.mp3');
				var audioElement2 = document.createElement('audio');
				audioElement2.setAttribute('src', 'audio/msg.mp3');
				var audioElement3 = document.createElement('audio');
				audioElement3.setAttribute('src', 'audio/open.wav');
        });
		
		$(document).on('click', '.closech', function() {
				$('.closech').addClass('hidden');
				$('.closechs').removeClass('hidden');
				$('.hjgf').removeClass('hidden');
		});
		$(document).on('click', '.closechs', function() {
				$('.closech').removeClass('hidden');
				$('.closechs').addClass('hidden');
				$('.hjgf').addClass('hidden');
        });
		
};



function alert2(txt,typet) {
	var n = noty({
		layout: 'bottomRight',
		text: txt,
		type: typet,
		timeout: 10000
	});
	audioElement.play();
}


function reloadinfo() {
	$.ajax({
		type: "GET",
		url: "currentchance.php",
		success: function(msg){
			$("#mychance").text(msg);
		}
	});
	$.ajax({
		type: "GET",
		url: "currentitem.php",
		success: function(msg){
			$("#myitem").text(msg);
		}
	});
	$.ajax({
		type: "GET",
		url: "currentbank.php",
		success: function(msg){
			$('#money_round').text(msg+'');
		}
	});
	$.ajax({
		type: "GET",
		url: "items.php",
		success: function(msg){
			$('.rounditems').html(msg);
		}
	});
	$.ajax({ 
		type: "GET",
		url: "currentitems.php", 
		success: function(msg){ 
			$(".selector-items-counter").html(msg); 
		} 
	}); 
	$.ajax({
		type: "GET",
		url: "currentitemswidth.php",
		success: function(msg){
			$('#meter').width(msg);
		}
	});
	$.ajax({
		type: "GET",
		url: "timeleft.php",
		success: function(msg){
			$('#timeleft').html(msg);
		}
	});
}