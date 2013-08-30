<html lang="en">
<head>
<title>Kunal Arts</title>
<link rel="stylesheet" type="text/css" href="css/skeleton.css">
<link rel="shortcut icon" href="images/logo.png">
<link rel="apple-touch-icon" href="images/logo.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/logo.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/logo.png">
<script src="jquery.min.js"></script>
<script>
		
		var html5_audiotypes={ //define list of audio file extensions and their associated audio types. Add to it if your specified audio file isn't on this list:
			"mp3": "audio/mpeg",
			"mp4": "audio/mp4",
			"ogg": "audio/ogg",
			"wav": "audio/wav"
		}
		
		function createsoundbite(sound){
			var html5audio=document.createElement('audio')
			if (html5audio.canPlayType){ //check support for HTML5 audio
				for (var i=0; i<arguments.length; i++){
					var sourceel=document.createElement('source')
					sourceel.setAttribute('src', arguments[i])
					if (arguments[i].match(/\.(\w+)$/i))
						sourceel.setAttribute('type', html5_audiotypes[RegExp.$1])
					html5audio.appendChild(sourceel)
				}
				html5audio.load()
				html5audio.playclip=function(){
					html5audio.pause()
					html5audio.currentTime=0
					html5audio.play()
				}
				return html5audio
			}
			else{
				return {playclip:function(){throw new Error("Your browser doesn't support HTML5 audio unfortunately")}}
			}
		}
		var mouseoversound=createsoundbite("whistle.ogg", "whistle.mp3")
		
		</script>
<style>
.parent {
	overflow: hidden;
}
.left {
	background-color:#111111;
	height: 100%;
	width: 0%;
	float: left;
}
.right {
    background-color:#111111;
	height: 100%;
	width: 0%;
	float: right;
}
.top-margin-intro {
	margin-left: 20%;
	margin-top: 30%;
}
</style>
</head>


<body oncontextmenu="return false;">
<div class="parent">
  <div class="right"> <a href="painting.php">
    <div class="serviceItem top-margin-intro darkslider">
      <div class="serviceInfoWrap">
        <div class="serviceInfo">
          <div></div>
          <div class="serviceInfoBack">
            <h3><br><br>
            <span class="intro1" onMouseOver="mouseoversound.playclip()">Painting</span></h3>
          </div>
        </div>
      </div>
    </div>
    </a> </div>
    
  <div class="left" > <a href="home.php">
    <div class="serviceItem top-margin-intro lightslider">
      <div class="serviceInfoWrap">
        <div class="serviceInfo">
          <div></div>
          <div class="serviceInfoBack">
            <h3><br><br>
            <span class="intro2" onMouseOver="mouseoversound.playclip()">Photography</span></h3>
          </div>
        </div>
      </div>
    </div>
    </a> </div>
</div>
<script>

$(document).ready(function()
  {
  $(".right").animate({width:"50%"},1000);
  $(".left").animate({width:"50%"},1000);

});

</script>
</body>
</html>
