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
							barWidth += 100 / 50;
							if (barWidth > 100) barWidth = 100;
							document.getElementById("status_bar").style.width = barWidth + "%";
						}
						if (barWidth >= 100) {
							window.clearInterval(bar_interval);
							document.getElementById("status_bar_box").style.display = "block";
						}
					}, 100);
			}
  </script>
<body onload="javascript:status_bar();">
	<div id="wrapper">

		<?php echo file_get_contents('header_div.html'); ?>

		<div id="sidebar">
			<ul>
			<li><a href="index.php" class="sidebarHome"></a></li>
			<li><a href="settings.php" class="sidebarSettings"></a></li>
			<li><a href="settings.php" class="sidebarSettings"></a></li>
			<li><a href="status.php" class="sidebarStatus"></a></li>
			<li><a href="credits.php" class="sidebarCredits"></a></li>
			<?php echo file_get_contents('language_selector.html'); ?>
		</div>

		<div id="main"> <p> <span id="title" class="updateTitle"></span>
				<br>
				<br>
				<span class="updateSystemReboot">
				</span>
				<div class="status_bar_container" style="width: 95%; margin-left: auto; margin-right: auto;">
        			<div id="status_bar" class="status_bar" style="width: 0%;">&nbsp;</div>
      				</div>
      				<div id="status_bar_box" class="status_bar_box updateDone">
      				<br>
      				<form action="/">
				<input type="submit" class="homeText" value="Home"/>
				</form>
				<br>
				<form action="/settings.php">
				<input type="submit" value="" class="updateSettings"/>
				</form>
      			</div>
			</p>
			<br>
			<br>
		</div>
	</div>
</body>
</html>
