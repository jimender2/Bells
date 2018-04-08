<?php

require('definitions.php');


if (isset($_POST['elimina_dati_button'])) {
echo "<pre>Ho eliminato il file selezionato</pre>";
	$file_eliminare = $SOUNDFILE_UPLOAD_DIR . $_POST['elimina_dati'];
	unlink($file_eliminare);

}


if (isset($_POST['elimina_tutto_button'])) {
echo "<pre>I have deleted all previously uploaded files</pre>";
if ($handle = opendir($SOUNDFILE_UPLOAD_DIR)) {

		while (false !== ($entry = readdir($handle))) {
			if ($entry !== ".") {
						if ($entry !== "..") {
								$file_eliminare = $SOUNDFILE_UPLOAD_DIR . $entry;
							unlink($file_eliminare);

						}
					}
			}
	closedir($handle);
}
}

if (isset($_POST['selected_sound'])) {
		if (substr($_POST['selected_sound'], -4) == ".wav") {
			echo "<pre>Set sound</pre>";
		$data_file = $SOUNDFILE_UPLOAD_DIR . $_POST['selected_sound'];
		unlink($ACTIVE_SOUNDFILE_PATH);
		copy($data_file, $ACTIVE_SOUNDFILE_PATH);
		}
		else {
			echo "<pre>File non valido</pre>";
		}
}
?>


<html>
<head>
	<title>File upload</title>
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<meta charset="utf-8">
	<style type="text/css"></style>
	<link href="style.css" rel="stylesheet" type="text/css">
	<?php echo file_get_contents('head.html'); ?>
</head>
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

		<div id="main">
			<br>
			<span id="title" class="selectSoundTitle"></span>
			<br>
			<span class="selectSoundInfo">
			</span>
			</br>
			<br>
			<form action="" method="post">
			<fieldset style="width: 100px;">
			<legend class="selectSoundDelete"></legend>
			<select name="elimina_dati" >
				<?php

				if ($handle = opendir($SOUNDFILE_UPLOAD_DIR)) {

					while (false !== ($entry = readdir($handle))) {
						if ($entry !== ".") {
							if ($entry !== "..") {
								echo '<option value="' . $entry . '">' . $entry . '</option>';

							}
						}
					}

					closedir($handle);
				}

				?>
			</select>
		</fieldset>

		<INPUT TYPE = "Submit" Name = "elimina_dati_button" class="selectSoundDeleteButton" value="">
			<form action="" method="post">
				<input type="Submit" name="elimina_tutto_button" class="selectSoundDeleteAllButton" value="">
			</form>
		</form>
		<br>
		<div style="float: left; width: 190px;">
			<form action="" method="post">
				<fieldset style="width: 100px;">
					<legend class="selectSoundSetInfo"></legend>
					<select name="selected_sound" >
						<?php
						if ($handle = opendir($SOUNDFILE_UPLOAD_DIR)) {
							while (false !== ($entry = readdir($handle))) {
								if ($entry !== ".") {
									if ($entry !== "..") {
										echo '<option value="' . $entry . '">' . $entry . '</option>';

									}
								}
							}
							closedir($handle);
						}
						?>
					</select>
				</fieldset>

				<input type="submit" class="selectSoundSetButton" value=""/>
			</form>
			<br>
			<div>
				<form action="upload.php">
					<input type="submit" value="" class="selectSoundUpload"/>

				</form>
				<form action="settings.php">
					<input type="submit" class="textBack"/>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
