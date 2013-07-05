<!DOCTYPE html>
<html lang="en">
	<head>
		<title>purwandana - Absen</title>
		<meta http-equiv="refresh" content="60" > 

		<script type="text/javascript" language="javascript" src="<?php echo $this->asset("js/jquery.min.js"); ?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo $this->asset("js/jquery.carouFredSel.min.js"); ?>"></script>
		<link href="<?php echo $this->asset("css/absen.css"); ?>" rel="stylesheet">
		<link rel="shortcut icon" href="<?php echo $this->asset("image/favicon.ico"); ?>">
		<script type="text/javascript">
			$(document).ready(function() {
			
				$("#scroll").carouFredSel({
					items				: 5,
					direction			: "up",
					auto : {
						items			: 2,
						duration 		: 2000,
						easing			: "linear",
						timeoutDuration : 3000
					}
				});
				
				showTime();
			});
			
			function showTime() {
				var today = new Date();
				var d = today.getDay();
				var h = today.getHours();
				var m = today.getMinutes();
				var s = today.getSeconds();
				
				d = checkDay(d);
				h = checkTime(h);
				m = checkTime(m);
				s = checkTime(s);
				
				$("#clock").text(d+", "+h+":"+m+":"+s);
				t=setTimeout('showTime()',1000);
			}
			
			function checkTime(i) {
				if (i<10) {
					i="0" + i;
				}
				return i;
			}
			
			function checkDay(i) {
				if (i==1) {
					i="SENIN";
				} else if (i==2) {
					i="SELASA";
				} else if (i==3) {
					i="RABU";
				} else if (i==4) {
					i="KAMIS";
				} else if (i==5) {
					i="JUMAT";
				} else if (i==6) {
					i="SABTU";
				} else {
					i="MINGGU";
				}
				return i;
			}
		</script>
	</head>

	<body>
		<section class="header"></section>