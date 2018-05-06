<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<meta charset="utf-8">
<title>sophia - Bell management system</title>
<style type="text/css"></style>
<link href="style.css" rel="stylesheet" type="text/css">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<link rel="shortcut icon" type="image/png" href="favicon.png"/>
<script src="jquery-3.2.1.min.js"></script>
<script src="script.js"></script>

<?php echo file_get_contents('header_div.html'); ?>

<div id="sidebar">
			<ul>
				<li ><a href="index.php" class="sidebarHome">Home</a></li>

				<li class="thispageSettings"><a class="thispageSettings sidebarSettings" href="settings.php">Settings</a></li><br>

				<li>
					<a href="reboot.php" class="sidebarStatus">Reboot</a>
				</li>
				<?php echo file_get_contents('language_selector.html'); ?>
			</div>
<?php
if($_POST['Submit']){ 
$open = fopen("/opt/sophia/default.txt","w+"); 
$text = $_POST['update']; 
fwrite($open, $text); 
fclose($open); 
echo "File updated.<br />";  
echo "File:<br />"; 
$file = file("options.txt"); 
foreach($file as $text) { 
echo $text."<br />"; 
} 
}else{ 
$file = file("/opt/sophia/default.txt"); 
echo "<form action=\"".$PHP_SELF."\" method=\"post\">"; 
echo "<textarea Name=\"update\" cols=\"50\" rows=\"10\">"; 
foreach($file as $text) { 
echo $text; 
}  
echo "</textarea>"; 
echo "<input name=\"Submit\" type=\"submit\" value=\"Update\" />\n 
</form>"; 
} 
?>