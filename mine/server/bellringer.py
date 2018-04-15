#!usr/bin/env python  
#coding=utf-8  

import time
import datetime
import os
import winsound


def bellringer(sound_type) :

	temp_volume = "100 dB"
	
	#for windows
	winsound.PlaySound('bellsound.wav', winsound.SND_FILENAME)

	#for rasparian
	#os.system("amixer cset numid=3 1")
	#os.system("amixer sset PCM,0 100%")
	#os.system("aplay -q -D sysdefault /home/pi/Bells/server/bellsound.wav")

optionRead = open("options.txt", "r")
day = optionRead.readline()
day = day.rstrip('\n')
dayandtime = day + ' ' + optionRead.readline()
dayandtime = dayandtime.rstrip('\n')


bellOne = datetime.datetime.strptime(dayandtime, '%m/%d/%Y %H:%M:%S')


#bellTwo = optionRead.readline()
#bellThree = optionRead.readline()
#bellFour = optionRead.readline()

print(bellOne)

while 1==1:
	while datetime.datetime.now() < bellOne:
		time.sleep(1)
	bellringer(1)
	dayandtime = day + ' ' + optionRead.readline()
	dayandtime = dayandtime.rstrip('\n')
	bellOne = datetime.datetime.strptime(dayandtime, '%m/%d/%Y %H:%M:%S')
