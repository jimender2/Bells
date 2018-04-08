var langEN = {
	greeting: "Hello",
	title: "Title",
	header: "sophia - Bell management system",
	languageText: "Language:",
	settings: "Settings",
	status: "Status",
	home: "Home",
	credits: "Credits / Info",
	projectDescription: "Bell System: ",
	quickguide: "Guide to using sophia",
	quickguideContent: "\
		<strong>sophia</strong> is an open-source bell management system designed for BR.<br>\
		",
	updateSettings: "Update Settings?",
	helpText: "\
	<li>\
	</br>\
	</br>\
	</br>\
	Disable or enable sophia.</br>\
	<i>Default: enabled</i>\
	</br>\
	</br>\
	</br>\
	</br>\
	</br>\
	</br>\
	Enter the times for sophia to play\
	Write the time in the format yyyy-MM-dd hh: mm: ss or d hh: mm: ss where d is between 1 and 7, and indicates the day of the week (eg 1 = Monday) or in the hh: mm: ss format to make sophia ring every day.\
	</br>\
	</br>\
	</br>\
	</br>\
	</br>\
	</br>\
	</br>\
	</br>\
	</br>\
	</br>\
	</br>\
	</br>\
	<b>\
	Enter the time when the raspberry pi must synchronize the internal clock with the NTP server</br>\
	NOTE:</br>\
	this procedure requires 35 seconds, during which the sophia is temporarily disabled.</br>\
	In case of lack of internet connection or in case of wrong NTP address the synchronization fails and NO error is reported in the status page</br>\
	</b>\
	It is recommended to set the time at night</br>\
	<i>Default: 02:00:00</i>\
	</br>\
	</br>\
	</br>\
	</br>\
	The NTP server with which to synchronize the time\
	</br>\
	The recommended server is ntp1.inrim.it of the Time and Frequency Sample Laboratory.\
	</br>\
	Default: ntp1.inrim.it\
	</br>\
	</br>\
	</br>\
	</br>\
	The Volume of Sophia. LEAVE ALONE.<br>\
	Max: 4         Min: -100\
	</br>\
	<b>\
	NOTE:\
	</br>\
	The volume is expressed in dB, which is why it is logarithmic\
	</br>\
	</b>\
\
	<i>Default: 4</i>\
	</br>\
	</br>\
	PLAY BELL NOW\
	</br>\
	</br>\
	UPDATE Sophia with NTP time\
	</br>\
	</br>\
	</br>\
	</br>\
	</li>\
	<li></li>\
	",
	settingsTitle: "Modify Bells: ",
	settingsReset: "Reset",
	settingsUpdate: "Update Settings",
	settingsRingNow: "Ringing Sophia",
	settingsVolume: "Volume (da -100 a 4)",
	settingsTime: "Time to synchronize the ntp server in the format hh:mm:ss",
	settingsNTP: "Server NTP",
	settingsSound: "Set sound (Not working)",
	settingsNTPnow: "Update NTP NOW",
	settingsEnable: "Enable/Disable sophia",
	settingsEnabledText: "Enabled",
	settingsDisabledText: "Disabled",
	settingsTimetable: "Orari",
	statusServer: "Indicate the status of the server",
	statusUSB: "Check USB ports",
	statusSDspace: "Space used on the SD card:",
	statusSD: "Memory of SD:",
	statusRAM: "RAM:",
	statusOptions: "Contents of the file OPTIONS.txt",
	statusErrors: "Server Errors:",
	statusNetwork: "Network Status",
	statusTitle: "System Status: ",
	rebootConfirm: "Are you sure you want to restart / shut down the system?",
	usbStatus: "Indicates the USB status",
	textBack: "Back",
	guideTitle: "Presentazione del progetto: ",
	guideContent: "\
	The software works on Raspberry PI Model A or B and on any Linux machine. <br> \
	For more information on the software please visit:
	<a href=\"https://jimender2.github.io\">https://jimender2.github.io</a>\
	",
	uploadText: "Upload",
	updateSettings: "Settings",
	uploadTitle: "Carica un nuovo suono sul server: ",
	uploadInfo: "NOTA: sono accettati solo file .wav",
	uploadLabel: "Carica il tuo file:",
	updateTitle: "Update Settings: ",
	updateSystemReboot: "The system will restart, wait.",
	updateDone: "The System is Working.",
	homeText: "Home",
	title404: "404 Not Found: ",
	text404: "The file is not present on this server",
	selectSoundDeleteAllButton: "Elimina tutti i suoni",
	selectSoundSetButton: "Imposta il suono",
	selectSoundUpload: "Carica un nuovo suono sul server",
	selectSoundDeleteButton: "Elimina suono selezionato",
	selectSoundTitle: "Pannello di gestione dei suoni",
	selectSoundInfo: "Qui puoi impostare il suono riprodotto dalle casse.",
	selectSoundDelete: "Elimina un suono in memoria",
	selectSoundSetInfo: "Imposta il suono"

};
