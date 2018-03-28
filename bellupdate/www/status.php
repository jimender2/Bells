<?php
if (isset($_POST['reboot'])) {
	$url="/reboot.php";
	// redirect to form again
	header(sprintf('Location: %s', $url));
	printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
	exit();
}

if (isset($_POST['shutdown'])) {
	$url="/shutdown.php";
	header(sprintf('Location: %s', $url));
	printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
	exit();
}
?>
<!doctype html>
<html>
<head>
	<?php echo file_get_contents('head.html'); ?>
</head>

<body>
	<div id="wrapper">

		<?php echo file_get_contents('header_div.html'); ?>

		<div id="sidebar">
			<ul>
			<li><a href="index.php" class="sidebarHome"></a></li>
			<li><a href="settings.php" class="sidebarSettings"></a></li>
			<li class="thispage"><a href="status.php" class="thispage sidebarStatus"></a></li>
			<br>
			<li><a href="credits.php" class="sidebarCredits"></a></li>
			<?php echo file_get_contents('language_selector.html'); ?>
		</div>

		<div id="main" style="width: 75%;"> <p> <span id="title" class="statusTitle"></span>
			<br><br>
			<span class="statusServer"></span>

    			</br>



			<?php
			exec("/etc/init.d/ssh status", $output_ssh);
			$output2_ssh = str_replace("Array\n(\n    [0] => ", "", print_r($output_ssh, true));
			$output2_ssh = str_replace("\n)", "", $output2_ssh);
      			echo $output2_ssh;
			?>
			</br>
			<?php
			exec("/etc/init.d/apache2 status", $output_apache);
			$output2_apache = str_replace("Array\n(\n    [0] => ", "", print_r($output_apache, true));
			$output2_apache = str_replace("\n)", "", $output2_apache);
      			echo $output2_apache;
			?>
			</br>
			<?php
			exec("ps -A", $output);
			if (strpos(print_r($output, true),'power_daemon') !== false) {
				echo "Power Daemon running";
			}
			else {
      				echo "Power Daemon NOT running";
			}
			?>
			</br>
			<?php
			exec("ps -A", $output);
			if (strpos(print_r($output, true),'watchdog') !== false) {
				echo "Watchdog running";
			}
			else {
      				echo "Watchdog NOT running";
			}
			?>
			</br>
			<?php
			exec("ps -A", $output);
			if (strpos(print_r($output, true),'demone') !== false) {
				echo "sophia Daemon running";
			}
			else {
      				echo "sophia Daemon NOT running";
			}
			?>
			</br>
			<a href="/usb.php" class="statusUSB"></a>
  			</br>
  			</br>
  			</br>
  			<form method="post" onsubmit="return confirm(lang.rebootConfirm)">
  				<input name="reboot" type="submit" value="Reboot">
  				<input name="shutdown" type="submit" value="Shutdown">
  			</form>
  			</br>
  			</br>
  			<center>
    			<span class="statusSDspace"></span>
    			</center>
    			<div class="status_bar_container" style="width: 95%; margin-left: auto; margin-right: auto;">
        		<div class="status_bar" style="width: <?php

        		$free_space = disk_free_space("/");
        		$total_space = disk_total_space("/");
        		echo (($total_space - $free_space)/$total_space)*100;

        		?>%;">&nbsp;</div>
      			</div>
    			<center>
			<span class="statusSD"></span>
    				</br>
    				<?php

        		$free_space = (disk_free_space("/"));
			$total_space = (disk_total_space("/"));
        		echo "Libero: " . number_format((($free_space)/$total_space)*100) . "% = " . number_format($free_space/(1024*1024)) . "GB" . "</br>";
        		echo "Usato: " . number_format((($total_space - $free_space)/$total_space)*100) . "% = " . number_format(($total_space-$free_space)/(1024*1024)) . "GB" . "</br>";
        		echo "Totale: " . number_format($total_space/(1024*1024)) . "GB" . "</br>";

        		?>

    			</br>
    			<span class="statusRAM"></span>
    			</center>
    			<div class="status_bar_container" style="width: 95%; margin-left: auto; margin-right: auto;">
        		<div class="status_bar" style="width: <?php

        		exec("cat /proc/meminfo", $output_mem);
			$output3_mem = str_replace("MemTotal:", "", trim($output_mem[0]));
			$output3_mem = str_replace("kB", "", $output3_mem);

			$output4_mem = str_replace("MemFree:", "", trim($output_mem[1]));
			$output4_mem = str_replace("kB", "", $output4_mem);

      			$total_space = (int)trim($output3_mem);
      			$free_space = (int)trim($output4_mem);



        		echo (($total_space - $free_space)/$total_space)*100;

        		?>%;">&nbsp;</div>
      			</div>
    			<center>
			<span class="statusRAM"></span>
    				</br>
    				<?php
        		echo "Free: " . number_format((($free_space)/$total_space)*100) . "% = " . number_format($free_space/(1024)) . "MB" . "</br>";
        		echo "Used: " . number_format((($total_space - $free_space)/$total_space)*100) . "% = " . number_format(($total_space-$free_space)/(1024)) . "MB" . "</br>";
        		echo "Total: " . number_format($total_space/(1024)) . "MB" . "</br>";
        		?>

    			</br>
    			<?php
			//exec("cat /proc/meminfo", $output_mem);
			echo "<pre>";
			$output2_mem = str_replace("Array\n(", "", print_r(array_slice($output_mem, 0, 15), true));
			$output2_mem = str_replace("\n)", "", $output2_mem);
      			echo $output2_mem;
      			echo "</pre>";
			?>
  			</br>
  			</center>
  			<span class="statusOptions"></span>
  			</br>
    			<?php
			$options = file_get_contents("/opt/sophia/OPTIONS.txt");
			echo "<pre>";
      			echo $options;
      			echo "</pre>";
			?>
  			</br>
  			</br><center>
  			<span class="statusErrors"></span>
  			</br>
    			<?php
			$options = file_get_contents("/opt/sophia/ERROR.txt");
			echo "<pre>";
			if ($options !== "") {
      				echo $options;
			}
			else {
				echo "Non ci sono errori";
			}
      			echo "</pre>";
			?>
  			</br>
  			</br>
  			<span class="statusNetwork"></span>
  			</br></center>
    			<?php
			exec("/sbin/ifconfig", $output_lan);
			echo "<pre>";
			$output2_lan = str_replace("Array\n(", "", print_r(array_slice($output_lan, 0, 15), true));
			$output2_lan = str_replace("\n)", "", $output2_lan);
      			echo $output2_lan;
      			echo "</pre>";
			?>
  			</br>
  			</br>
		</div>
	</div>
</body>
</html>
