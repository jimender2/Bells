import pygame
pygame.init()

pygame.mixer.music.load("bellsound.wav")
pygame.mixer.music.play()
pygame.event.wait()