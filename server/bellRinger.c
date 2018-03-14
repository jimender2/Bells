#include <windows.h>
#include <stdio.h>

int main()
{
    PlaySound("bellsound.wav", NULL, SND_ASYNC);
    return 0;

}	