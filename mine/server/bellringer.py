#!usr/bin/env python  
#coding=utf-8  

import time
import datetime
import os
import winsound

#open log file for writing
f = open('log.txt', 'a')

#make log be spaced away from others
f.write("\n")
f.write("\n")
f.write("\n")
f.write("\n")
f.write("\n")
f.write("Start of log")
f.write('\n')

#write buffer to the file
f.flush()
os.fsync(f.fileno())

#This is the function that rings the bell
def bellringer(sound_type) :

	#sets volume of the bell in linux
	temp_volume = "100 dB"
	
	#for windows
	winsound.PlaySound('bellsound.wav', winsound.SND_FILENAME)

	#for rasparian
	#os.system("amixer cset numid=3 1")
	#os.system("amixer sset PCM,0 100%")
	#os.system("aplay -q -D sysdefault /home/pi/Bells/server/bellsound.wav")

def defaultDay():
	defaultFile = open("default.txt", "r")
	#Set some variables
	donotend = True
	oneminold = datetime.timedelta(days=0, hours=0, minutes=1, seconds=0)
	
	#get todays date
	day = datetime.datetime.now().strftime("%m/%d/%Y")

	#read time from file
	dayandtime = day + ' ' + defaultFile.readline()
	#strip formatting from the string
	dayandtime = dayandtime.rstrip('\n')
	dayandtime = dayandtime.rstrip('\r')
	dayandtime = dayandtime.rstrip()

	bell = datetime.datetime.strptime(dayandtime, '%m/%d/%Y %H:%M:%S')
	while donotend==True:
		f.write(dayandtime)
		f.write('\n')
		print(bell)
		
		#saves cpu cycles
		while datetime.datetime.now() < bell:
			time.sleep(1)
			
		#make it not ring if more than a minute old
		timeElapsed = datetime.datetime.now() - bell
			
		f.write(str(timeElapsed))
		f.write('\n')
		print(timeElapsed)
			
		while 1==1:
			if timeElapsed > oneminold:
				break
			bellringer(1)
			break
				
		timefromfile = defaultFile.readline()
		timefromfile = timefromfile.rstrip('\n')
		timefromfile = timefromfile.rstrip('\r')
		timefromfile = timefromfile.rstrip()

		if timefromfile == "done":
			break

		dayandtime = day + ' ' + timefromfile
		bell = datetime.datetime.strptime(dayandtime, '%m/%d/%Y %H:%M:%S')
			
		#write everything from buffer to file
		f.flush()
		os.fsync(f.fileno())
			
		print("done with default " + day)
		f.write("done with default " + day)
		f.write('\n')
		
		#write everything from buffer to file
		f.flush()
		os.fsync(f.fileno())
		##END OF FUNCTION
		##END OF FUNCTION


#Open the options file.
optionRead = open("options.txt", "r")

#Set some variables
moretofile = True
donotend = True
oneminold = datetime.timedelta(days=0, hours=0, minutes=1, seconds=0)

onedayold = datetime.timedelta(days=1, hours=0, minutes=0, seconds=0)

#Day run
while moretofile == True:
	#read date from file
	day = optionRead.readline()
	#strip formatting from the string
	day = day.rstrip('\n')
	day = day.rstrip('\r')
	day = day.rstrip()

	#read time from file
	dayandtime = day + ' ' + optionRead.readline()
	#strip formatting from the string
	dayandtime = dayandtime.rstrip('\n')
	dayandtime = dayandtime.rstrip('\r')
	dayandtime = dayandtime.rstrip()

	bell = datetime.datetime.strptime(dayandtime, '%m/%d/%Y %H:%M:%S')
	while donotend==True:
		f.write(dayandtime)
		f.write('\n')
		print(bell)
		
		if ( (bell - datetime.datetime.now()) > onedayold ):
			f.write("went into the function")
			f.flush()
			os.fsync(f.fileno())
			defaultDay()
		
		#saves cpu cycles
		while datetime.datetime.now() < bell:
			time.sleep(1)
		
		#make it not ring if more than a minute old
		timeElapsed = datetime.datetime.now() - bell
		
		f.write(str(timeElapsed))
		f.write('\n')
		print(timeElapsed)
		
		while 1==1:
			if timeElapsed > oneminold:
				break
			bellringer(1)
			break
			
		timefromfile = optionRead.readline()
		timefromfile = timefromfile.rstrip('\n')
		timefromfile = timefromfile.rstrip('\r')
		timefromfile = timefromfile.rstrip()

		if timefromfile == "done":
			break
		dayandtime = day + ' ' + timefromfile
		bell = datetime.datetime.strptime(dayandtime, '%m/%d/%Y %H:%M:%S')
		
		#write everything from buffer to file
		f.flush()
		os.fsync(f.fileno())
		
	print("done with day " + day)
	f.write("done with day " + day)
	f.write('\n')
	
	#write everything from buffer to file
	f.flush()
	os.fsync(f.fileno())
	
	timefromfile = optionRead.readline()
	timefromfile = timefromfile.rstrip('\n')
	timefromfile = timefromfile.rstrip('\r')
	timefromfile = timefromfile.rstrip()

	if timefromfile == "End of File":
		break

f.write("done with everything")
f.close()