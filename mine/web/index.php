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
	<body>
		<div id="wrapper">

			<?php echo file_get_contents('header_div.html'); ?>

			<div id="sidebar">
				<ul>
					<li class="thispage"><a class="thispage" href="index.php" class="sidebarHome">Home</a></li>
					<br>
					<li><a href="settings.php" class="sidebarSettings">Settings</a></li>
					<li><a href="status.php" class="sidebarStatus">Status</a></li>
					<li><a href="credits.php" class="sidebarCredits">Credits / Info</a></li>
					<?php echo file_get_contents('language_selector.html'); ?>

				</div>

				<div id="main2">


					<p> <span id="title" class="projectDescription"></span>
						<br><br>
						<center>
							<img src="logo3.png" class="titolo" alt="" width="230px"/>
							<br><br></br></br>
							<form action="/guide.php">
								<input type="submit" class="quickstart" value=""/>
							</form>
						</center>
						<br>
						<span class="quickstartContent"></span>
						<br>
					</br>

				</p>
				<br>
				<br>
			</br>

		</div>
	</div>
</body>
</html>
