#! /bin/sh
# /etc/init.d/sophia
#

### BEGIN INIT INFO
# Provides:          sophia
# Required-Start:    $all
# Required-Stop:     
# Default-Start:     2 3 4 5
# Default-Stop:      0 1 6
# Short-Description: Start sophia at boot time
# Description:       sophia init script
### END INIT INFO


case "$1" in
	start)
		echo "Starting script sophia..."
		/opt/sophia/start_script.sh
		echo "DONE"
	;;
	restart)
		echo "Stopping script sophia..."
		/opt/sophia/restart_script.sh
		echo "DONE"
	;;
	*)
		echo "Usage: /etc/init.d/sophia {start|restart}"
		exit 1
	;;
esac

exit 0
