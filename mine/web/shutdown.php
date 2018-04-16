<?php
/*
 *      shutdown.php
 *
 *      This file if part of the "sophia" bell management system
 *      For more information on the software please visit:
 *      https://lizzit.it/sophia
 *
 *      Written by: Michele Lizzit <michele@lizzit.it>, 20 Mar 2014
 *      Last update: 25 Apr 2016
 *      Version: 1.2
 *
 *      Copyright (c) 2016 Michele Lizzit
 *      
 *      This program is free software: you can redistribute it and/or modify
 *      it under the terms of the GNU Affero General Public License as published
 *      by the Free Software Foundation, either version 3 of the License, or
 *      (at your option) any later version.
 *    
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU Affero General Public License for more details.
 *    
 *      You should have received a copy of the GNU Affero General Public License
 *      along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
?>

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
			function shutdown {
				var xmlHttp = new XMLHttpRequest();
    				xmlHttp.open( "GET", "/exec_shutdown.php", false );
    				xmlHttp.send( null );
			}
	</script>
<body onload="javascript:status_bar();javascript:shutdown();">
	<div id="wrapper">

		<?php echo file_get_contents('header_div.html'); ?>	

		<div id="sidebar"> 
			<ul>
			<li><a href="index.php">Home</a></li>
			
			<li><a href="settings.php">Settings</a></li>
			<li><a href="status.php">Status</a></li>
			<li><a href="credits.php">Credits / Info</a></li>
		</div>

		<div id="main"> <p> <span id="title">Spegnimento: </span>
				<br>
				<br>
				Il sistema verrà spento, attendi.
				<div class="status_bar_container" style="width: 95%; margin-left: auto; margin-right: auto;">
        			<div id="status_bar" class="status_bar" style="width: 0%;">&nbsp;</div>
      				</div>
      				<div id="status_bar_box" class="status_bar_box">
      				<br>
      				Il sistema è stato spento.
      				<br>
			</p>
			<br>
			<br>
		</div>
	</div>
</body>
</html>
