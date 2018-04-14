#! /bin/bash


echo 0 > /proc/sys/kernel/sysrq
/opt/sophia/power_daemon.py &
/opt/sophia/demone.py &
/opt/sophia/watchdog.py &
/opt/sophia/serial_daemon.py &
/opt/sophia/lcd_daemon.py &
exit
