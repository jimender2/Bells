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
			<li><a href="index.php" class="sidebarHome"></a></li>
			<li><a href="settings.php" class="sidebarSettings"></a></li>
			<li><a href="status.php" class="sidebarStatus"></a></li>
			<li><a href="credits.php" class="sidebarCredits"></a></li>
			<?php echo file_get_contents('language_selector.html'); ?>
		</div>

		<div id="main"> <p> <span id="title" class="guideTitle"></span>
				<form action="/">
				<input type="submit" class="textBack"/>
				</form>
				<br>
				<span class="guideContent">
				</span>
			</p>
			<br>
			<br>


		</div>



	</div>
</body>
</html>
