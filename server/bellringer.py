#!usr/bin/env python  
#coding=utf-8  

import time
import os

def bellringer(sound_type) :
	os.system("amixer -q -- sset PPCM playback 100 dB")
	os.system("aplay -q -D sysdefault bellringer.wav")