<?php
require('definitions.php');

$error = 0;
$url = "/update_settings.php";
$xx = 0;
$handle = fopen($OPTIONS_FILE_PATH, "r");
while (($line = fgets($handle)) !== false) {
	if (substr( $line, 0, 1 ) !== "#") {
		$options[$xx] = $line;
		$xx = $xx + 1;
	}
}

if (isset($_POST['enable']) && isset($_POST['schedule']) && isset($_POST['ntp_update_time']) && isset($_POST['ntp_server']) && isset($_POST['volume'])) {
	
	$timetable = trim($_POST['schedule']);
	$lines = 8 + substr_count($timetable,"\n") + 2;

	if (isset($_POST['squilla_ora'])) {
		$squilla_ora = 1;
	}
	else {
		$squilla_ora = 0;
	}
	if (isset($_POST['NTP_ora'])) {
		$update_ntp_now = 1;
	}
	else {
		$update_ntp_now = 0;
	}

	$options_string = "#le righe che iniziano con # vengono scartate\n"
	. $lines .
	"\n#enable\n"
	. $_POST['enable'] .
	"\n#track duratin in seconds\n" .
	"1\n" . 
	"#volume\n" . 
	$_POST['volume'] .
	"\n#ntp server\n"
	. $_POST['ntp_server'] .
	"\n#ntp update time\n"
	. $_POST['ntp_update_time'] .
	"\n#update ntp now\n"
	. $update_ntp_now .
	"\n#NON MODIFICARE QUESTO COMMENTO squilla ora\n"
	. $squilla_ora .
	"\n#num_options includendo questa\n" .
	"9\n"
	. $timetable;

	file_put_contents($OPTIONS_FILE_PATH, $options_string);

	header(sprintf('Location: %s', $url));
	printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
	exec("/usr/bin/sudo $RESTART_CAMPANELLA_SCRIPT_PATH > /dev/null", $prova);
	echo "<pre>Done</pre>";
	exit();
}
else if (isset($_POST['enable']) || isset($_POST['schedule']) || isset($_POST['ntp_update_time']) || isset($_POST['ntp_server']) || isset($_POST['update_ntp']) || isset($_POST['volume'])) {
	$error = 1;
}


?>

<!doctype html>
<html>
<head>
<style>
textarea {
	overflow: hidden;
}
</style>
<?php echo file_get_contents('head.html'); ?>

</head>
<body>

	<div id="wrapper">

		<?php echo file_get_contents('header_div.html'); ?>

		<div id="sidebar">
			<ul>
				<li ><a href="index.php" class="sidebarHome"></a></li>

				<li class="thispageSettings"><a class="thispageSettings sidebarSettings" href="settings.php"></a></li><br>

				<li>
					<a href="status.php" class="sidebarStatus"></a>
				</li>
				<li><a href="credits.php" class="sidebarCredits"></a></li>
				<?php echo file_get_contents('language_selector.html'); ?>
			</div>
			<div id="main" style="width:540px;"> <p> <span id="title" class="settingsTitle"></span></p>
				<?php
				if ($error == 1) {
					echo '		<script language="javascript" type="text/javascript"> alert("Hai compilato male il form")</script>';
				}
				?>

				<form method="post" onsubmit="return confirm(lang.updateSettings)">
					<h4 class="settingsEnable"></h4>
					<input type="radio" name="enable" value="1" <?php if ($options[1] == 1) { echo "checked=\"checked\""; } ?>><span class="settingsEnabledText"></span>
					<input type="radio" name="enable" value="0" <?php if ($options[1] == 0) { echo "checked=\"checked\""; } ?>><span class="settingsDisabledText"></span>
					<br>
					<h4 class="settingsTimetable"></h4>
					<textarea name="schedule" rows=5><?php

					$xx = $options[8] - 1;
					while($xx < count($options)) {
						$xx = $xx + 1;
						echo $options[$xx];
					} ?></textarea>
					<br>
					<h4 class="settingsTime"></h4>
					<h5><input type="text" name="ntp_update_time" value="<?php echo $options[5]; ?>"></h5>
					<h4 class="settingsNTP"></h4>
					<h5><input type="text" name="ntp_server" value="<?php echo $options[4]; ?>"></h5>
					<h4 class="settingsVolume"></h4>
					<h5><input type="text" name="volume" value="<?php echo $options[3]; ?>"></h5>

					<h4><input type="checkbox" name="squilla_ora" value="squilla_ora"/> <span class="settingsRingNow"></span></h4>
					<h4><input type="checkbox" name="NTP_ora" value="NTP_ora"/> <span class="settingsNTPnow"></span></h4>
					<br>
					<br>
					<a href="scegli_suono.php" class="invia settingsSound">

					</a>
					<br>
					<br>
					<input class="invia settingsReset" type="reset" value="">
					<input class="invia settingsUpdate" type="submit" value="">

				</form>
				<br>
				<br>

			</div>

			<div id="help">

				<span class="help-title"></span>
				<ul class="help helpText">
				</ul>


			</div>
		</div>

	</body>
	</html>
