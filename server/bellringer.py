#!usr/bin/env python  
#coding=utf-8  

import time
import os

def bellringer(sound_type) :

	temp_volume = 100 + "dB"
	os.system("amixer cset numid=3 1")
	os.system("amixer -q -- sset PPCM playback " + temp_volume)
	os.system("aplay -q -D sysdefault /bellsound.wav")

bellringer(1)