#!usr/bin/env python  
#coding=utf-8  

import pyaudio  
import wave  

<<<<<<< HEAD
def bellringer(sound_type) :
	os.system("amixer -q -- sset PPCM playback 100 dB")
	os.system("aplay -q -D sysdefault bellringer.wav")
=======
#define stream chunk   
chunk = 1024  

#open a wav format music  
f = wave.open("bellsound.wav","rb")  
#instantiate PyAudio  
p = pyaudio.PyAudio()  
#open stream  
stream = p.open(format = p.get_format_from_width(f.getsampwidth()),  
                channels = f.getnchannels(),  
                rate = f.getframerate(),  
                output = True)  
#read data  
data = f.readframes(chunk)  

#play stream  
while data:  
    stream.write(data)  
    data = f.readframes(chunk)  

#stop stream  
stream.stop_stream()  
stream.close()  

#close PyAudio  
p.terminate()
>>>>>>> parent of 5200dd8... Use aplayer
