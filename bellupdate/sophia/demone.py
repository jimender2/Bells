#! /usr/bin/python
# -*- coding: utf-8 -*-

#TODO: Check internet accessability befor playing

import time
import os
import RPi.GPIO as GPIO

#pin numbers are defined using GPIO.BOARD numeration
GPIO_sophia_PIN = 7
GPIO_LED_RED_PIN = 13
GPIO_LED_GREEN_PIN = 16
GPIO_LED_BLUE_PIN = 18
GPIO_BUTTON_PIN = 15


def sophia_suona(sound_type) : #ring bell
	set_led_color("blue") #sets led color
	GPIO.output(GPIO_sophia_PIN, True) #enable the output pin
	temp_volume = str(volume) + "dB"
	os.system("amixer -q -- sset PCM playback " + temp_volume)
	os.system("aplay -q -D sysdefault /opt/sophia/data/suono.wav")
	time.sleep(track_duration)
	set_led_color("green")
	GPIO.output(GPIO_sophia_PIN, False)
def get_ntp_time() :
	set_led_color("yellow")
	os.system("sudo service ntp stop")
	time.sleep(3)
	os.system("sudo ntpdate " + server_ntp)
	time.sleep(30)
	os.system("sudo service ntp start")
	time.sleep(3)
	set_led_color("green")
	
def set_led_color(color) :
	if color == "red":
		GPIO.output(GPIO_LED_RED_PIN, False)
		GPIO.output(GPIO_LED_GREEN_PIN, True)
		GPIO.output(GPIO_LED_BLUE_PIN, True)
	if color == "green":
		GPIO.output(GPIO_LED_RED_PIN, True)
		GPIO.output(GPIO_LED_GREEN_PIN, False)
		GPIO.output(GPIO_LED_BLUE_PIN, True)
	if color == "off":
		GPIO.output(GPIO_LED_RED_PIN, True)
		GPIO.output(GPIO_LED_GREEN_PIN, True)
		GPIO.output(GPIO_LED_BLUE_PIN, True)
	if color == "blue":
		GPIO.output(GPIO_LED_RED_PIN, True)
		GPIO.output(GPIO_LED_GREEN_PIN, True)
		GPIO.output(GPIO_LED_BLUE_PIN, False)
	if color == "yellow":
		GPIO.output(GPIO_LED_RED_PIN, True)
		GPIO.output(GPIO_LED_GREEN_PIN, False)
		GPIO.output(GPIO_LED_BLUE_PIN, False)
def write_error(tipo_errore) :
	error_file = open('/opt/sophia/ERROR.txt', 'w')
	error_file.write(tipo_errore)
	error_file.close()
	command = "logger " + tipo_errore;
	os.system(command)
def modifica_opzione_suona_ora() :
	options_file = open("/opt/sophia/OPTIONS.txt", 'r')
	temp_file_content = options_file.read()
	options_file.close()
	
	temp_file_content = temp_file_content.replace("#DO NOT MODIFY THIS COMMENT Rings now\n1", "#DO NOT MODIFY THIS COMMENT Rings now\n0", 1);
	
	options_file = open("/opt/sophia/OPTIONS.txt", 'w')
	options_file.write(temp_file_content)
	options_file.close()
def modifica_opzione_update_ntp() :
	options_file = open("/opt/sophia/OPTIONS.txt", 'r')
	temp_file_content = options_file.read()
	options_file.close()
	
	temp_file_content = temp_file_content.replace("update ntp now\n1", "update ntp now\n0", 1);
	
	options_file = open("/opt/sophia/OPTIONS.txt", 'w')
	options_file.write(temp_file_content)
	options_file.close()

#set the GPIO
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(GPIO_BUTTON_PIN, GPIO.IN, pull_up_down=GPIO.PUD_UP) #PULSANTE
GPIO.setup(GPIO_LED_GREEN_PIN, GPIO.OUT) #GREEN
GPIO.setup(GPIO_LED_BLUE_PIN, GPIO.OUT) #BLUE
GPIO.setup(GPIO_LED_RED_PIN, GPIO.OUT) #RED
GPIO.setup(GPIO_sophia_PIN, GPIO.OUT)  #sophia
set_led_color("green")

#Read the data from the file
error = 0
options = []
orari = []

write_error("") #Clear all errors

startTime = round(time.time())

if not(os.path.isfile("/opt/sophia/OPTIONS.txt")) :
	print time.strftime("[%H:%M:%S %d/%m/%Y") + "] sophia daemon: FATAL ERROR, file OPTIONS.txt does not exist"
	set_led_color("red")
	write_error(time.strftime("[%H:%M:%S %d/%m/%Y") + "] sophia daemon: FATAL ERROR, file OPTIONS.txt does not exist")
	exit()
if not(os.path.isfile("/opt/sophia/data/suono.wav")) :
	print time.strftime("[%H:%M:%S %d/%m/%Y") + "] sophia daemon: FATAL ERROR, file suono.wav does not exist"
	set_led_color("red")
	write_error(time.strftime("[%H:%M:%S %d/%m/%Y") + "] sophia daemon: FATAL ERROR, file suono.wav does not exist")
	exit()
options_file = open("/opt/sophia/OPTIONS.txt", 'r')

for line in options_file:
	temp_line = line
	temp_line = temp_line.replace("\n","")
	temp_line = temp_line.upper()
	if not(temp_line.startswith("#")) :
		options.append(temp_line)
options_file.close()

if (len(options) == int(options[0])) :
	print time.strftime("[%H:%M:%S %d/%m/%Y") + "] File OK"
else :
	print time.strftime("[%H:%M:%S %d/%m/%Y") + "] sophia daemon: FATAL ERROR, line mismatch in OPTIONS.txt"
	set_led_color("red")
	write_error(time.strftime("[%H:%M:%S %d/%m/%Y") + "] sophia daemon: FATAL ERROR, line mismatch in OPTIONS.txt")
	exit()

#Loads the data from file into variables
num_of_lines = 0
status = 0
run = 0
server_error = 0
num_options = 0
server_ntp = ""
volume = 0
track_duration = 0
update_ntp = ""
update_ntp_now = 0
update_status_interval = 0
suona_sophia_ora = 0

try:
	num_of_lines = int(options[0])
	run = int(options[1])
	track_duration = int(options[2])
	volume = int(options[3])
	server_ntp = options[4]
	update_ntp = options[5]
	update_ntp_now = int(options[6])
	suona_sophia_ora = int(options[7])
	num_options = int(options[8])
except ValueError:
	print time.strftime("[%H:%M:%S %d/%m/%Y") + "] sophia daemon: FATAL ERROR, syntax error in OPTIONS.txt"
	set_led_color("red")
	write_error(time.strftime("[%H:%M:%S %d/%m/%Y") + "] sophia daemon: FATAL ERROR, syntax error in OPTIONS.txt")
	exit()
if (run == 0) :
	print time.strftime("[%H:%M:%S %d/%m/%Y") + "] sophia daemon: disabled by OPTIONS.txt"
	exit()

tmp = 0
while (tmp + num_options < len(options)) :
	print time.strftime("[%H:%M:%S %d/%m/%Y") + "] Found new alarm in OPTIONS.txt: " + options[tmp + num_options]
	orari.append(options[tmp + num_options])
	tmp += 1

#remove trailing newline characters
orari = [e.rstrip() for e in orari]


print ""
print ""
print ""
print ""
print ""

if (suona_sophia_ora) :
	sophia_suona(1)
	modifica_opzione_suona_ora()

while (1) :
	suonato = 0
	prev_time = time.strftime("%H:%M:%S")

	print orari;
	
	#Check to see if it is time to play sophia
	if (time.strftime("%u %H:%M:%S") in orari) or (time.strftime("%H:%M:%S") in orari) or (time.strftime("%F %T") in orari) :
		sophia_suona(1)
		suonato = 1

	
	#See if I should update the NTP time from the server
	if ((time.strftime("%u %H:%M:%S") == update_ntp) or (time.strftime("%H:%M:%S") == update_ntp) or (time.strftime("%F %T") == update_ntp) or (update_ntp_now == 1)) :
		get_ntp_time()
		suonato = 1
		if (update_ntp_now == 1) :
			update_ntp_now = 0
			modifica_opzione_update_ntp()

	#Wait for the next server
	tmp = 0
	while time.strftime("%H:%M:%S") == prev_time :
		tmp += 1
		time.sleep(0.1)

	#See if I missed a second
	if (tmp <= 4) and (suonato == 0) :
		print time.strftime("[%H:%M:%S %d/%m/%Y") + "] sophia daemon: ERROR, did the system time change or is the system overloaded?"
	
	#Button control
	input_value = GPIO.input(GPIO_BUTTON_PIN)
	if input_value == 0 :
		sophia_suona(1)
		suonato = 1
