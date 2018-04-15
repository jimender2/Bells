#!usr/bin/env python  
#coding=utf-8  

import time
import os

def bellringer(sound_type) :

	temp_volume = "100 dB"
	os.system("amixer cset numid=3 1")
	#os.system("amixer -q -- sset PPCM playback " + temp_volume)
	os.system("amixer sset PCM,0 100%")
	os.system("aplay -q -D sysdefault /home/pi/Bells/server/bellsound.wav")

optionRead = open("options.txt", "r")
bellOne = optionRead.readline()
bellTwo = optionRead.readline()
bellThree = optionRead.readline()
bellFour = optionRead.readline()

print(bellOne)
print(bellTwo)
print(bellThree)
print(bellFour)

bellringer(1)

