#! /bin/bash


echo 0 > /proc/sys/kernel/sysrq
/opt/sophia/bellringer.py &
exit
