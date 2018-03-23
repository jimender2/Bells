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

###
 #      init_sophia.sh
 #
 #      Init script of "sophia" software.
 #		For more information on the software please visit:
 #		https://lizzit.it/sophia
 #
 #      Written by: Michele Lizzit <michele@lizzit.it>, 20 Mar 2014
 #      Last update: 25 Apr 2016
 #      Version: 1.0
 #
 #      Copyright (c) 2016 Michele Lizzit
 #      
 #      This program is free software: you can redistribute it and/or modify
 #      it under the terms of the GNU Affero General Public License as published
 #      by the Free Software Foundation, either version 3 of the License, or
 #      (at your option) any later version.
 #    
 #      This program is distributed in the hope that it will be useful,
 #      but WITHOUT ANY WARRANTY; without even the implied warranty of
 #      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 #      GNU Affero General Public License for more details.
 #    
 #      You should have received a copy of the GNU Affero General Public License
 #      along with this program.  If not, see <http://www.gnu.org/licenses/>.
###

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
