<?php
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//IT" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
	<?php echo file_get_contents('head.html'); ?>
	<script>
			function status_bar() {
				var barWidth = 0;
				var bar_interval = window.setInterval(
					function barFunction() {
						if (barWidth < 100) {
							barWidth += 100 / 350;
							if (barWidth > 100) barWidth = 100;
							document.getElementById("status_bar").style.width = barWidth + "%";
						}
						if (barWidth >= 100) {
							window.clearInterval(bar_interval);
							document.getElementById("status_bar_box").style.display = "block";
						}
					}, 100);
				}
			function reboot() {
				var xmlHttp = new XMLHttpRequest();
    				xmlHttp.open( "GET", "/exec_reboot.php", true );
    				xmlHttp.send( null );
			}
	</script>
<body onload="javascript:status_bar();javascript:reboot();">
	<div id="wrapper">

		<?php echo file_get_contents('header_div.html'); ?>	

		<div id="sidebar"> 
			<ul>
			<li class="thispage"><a class="thispage" href="index.php">Home</a></li>
			<br>
			<li><a href="settings.php">Settings</a></li>
			<li><a href="status.php">Status</a></li>
			<li><a href="credits.php">Credits / Info</a></li>
		</div>
		<div id="main"> <p> <span id="title">restarting: </span>
				<br>
				<br>
				The system will restart, wait.
				<div class="status_bar_container" style="width: 95%; margin-left: auto; margin-right: auto;">
        			<div id="status_bar" class="status_bar" style="width: 0%;">&nbsp;</div>
      				</div>
      				<div id="status_bar_box" class="status_bar_box">
      				The system has been restarted.
      				<br>
      				<form action="/">
					<input type="submit" value="Homepage"/>
				</form>
      				</div>
			</p>
			<br>
			<br>


		</div>
		
		
		
	</div>
</body>
</html>
