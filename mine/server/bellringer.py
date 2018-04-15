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

moretofile = True
donotend = True
oneminold = datetime.timedelta(days=0, hours=0, minutes=1, seconds=0)

while moretofile == True:
	day = optionRead.readline()
	day = day.rstrip('\n')
	dayandtime = day + ' ' + optionRead.readline()
	dayandtime = dayandtime.rstrip('\n')
	bell = datetime.datetime.strptime(dayandtime, '%m/%d/%Y %H:%M:%S')
	while donotend==True:
		print(bell)
		#saves cpu cycles
		while datetime.datetime.now() < bell:
			time.sleep(1)
		
		#make it not ring if more than a minute old
		timeElapsed = datetime.datetime.now() - bell
		print(timeElapsed)
		while 1==1:
			if timeElapsed > oneminold:
				break
			bellringer(1)
			break
			
		timefromfile = optionRead.readline()
		timefromfile = timefromfile.rstrip('\n')
		if timefromfile == "done":
			break
		dayandtime = day + ' ' + timefromfile
		bell = datetime.datetime.strptime(dayandtime, '%m/%d/%Y %H:%M:%S')

	print("done with day " + day)
	timefromfile = optionRead.readline()
	timefromfile = timefromfile.rstrip('\n')
	if timefromfile == "End of File":
		break

print("done with everything")
