var langEN = {
	greeting: "Hello",
	title: "Title",
	header: "sophia - Bell management system",
	languageText: "Language:",
	settings: "Settings",
	status: "Status",
	home: "Home",
	credits: "Credits / Info",
	projectDescription: "Presentazione del progetto: ",
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
	settingsNTPnow: "Aggiorna NTP ORA",
	settingsEnable: "Enable/Disable sophia",
	settingsEnabledText: "Enabled",
	settingsDisabledText: "Disabled",
	settingsTimetable: "Orari",
	statusServer: "Indicazioni sullo stato del server",
	statusUSB: "Check USB ports",
	statusSDspace: "Spazio usato nella SD:",
	statusSD: "Memoria SD:",
	statusRAM: "RAM:",
	statusOptions: "Contenuto del file OPTIONS.txt",
	statusErrors: "Errori del server:",
	statusNetwork: "Stato della rete",
	statusTitle: "Stato del sistema: ",
	rebootConfirm: "Sei sicuro di riavviare/spegnere il sistema?",
	usbStatus: "Indicazioni sullo stato delle USB del server",
	textBack: "Back",
	guideTitle: "Presentazione del progetto: ",
	guideContent: "\
	Il software funziona su Raspberry PI Modello A o B e su qualunque macchina Linux.<br>\
	For more information on the software please visit:\
	<a href=\"https://lizzit.it/sophia\">https://lizzit.it/sophia</a>\
	",
	uploadText: "Upload",
	updateSettings: "Settings",
	uploadTitle: "Carica un nuovo suono sul server: ",
	uploadInfo: "NOTA: sono accettati solo file .wav",
	uploadLabel: "Carica il tuo file:",
	updateTitle: "Aggiorna impostazioni: ",
	updateSystemReboot: "Il sistema verrà riavviato, attendi.",
	updateDone: "Il sistema è funzionante.",
	homeText: "Home",
	title404: "404 Not Found: ",
	text404: "Il file non e' presente in questo server",
	selectSoundDeleteAllButton: "Elimina tutti i suoni",
	selectSoundSetButton: "Imposta il suono",
	selectSoundUpload: "Carica un nuovo suono sul server",
	selectSoundDeleteButton: "Elimina suono selezionato",
	selectSoundTitle: "Pannello di gestione dei suoni",
	selectSoundInfo: "Qui puoi impostare il suono riprodotto dalle casse.",
	selectSoundDelete: "Elimina un suono in memoria",
	selectSoundSetInfo: "Imposta il suono"

};
