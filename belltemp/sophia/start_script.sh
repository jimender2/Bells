#! /bin/bash

###
 #      start_script.sh
 #
 #		Startup script for the "sophia" bell management system
 #		For more information on the software please visit:
 #		https://lizzit.it/sophia
 #
 #      Written by: Michele Lizzit <michele@lizzit.it>, 20 Mar 2014
 #      Last update: 25 Apr 2016
 #      Version: 1.2
 #
 #      Copyright (c) 2016 Michele Lizzit
 #     	
 #      This program is free software: you can redistribute it and/or modify
 #		it under the terms of the GNU Affero General Public License as published
 #		by the Free Software Foundation, either version 3 of the License, or
 #		(at your option) any later version.
 #		
 #		This program is distributed in the hope that it will be useful,
 #		but WITHOUT ANY WARRANTY; without even the implied warranty of
 #		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 #		GNU Affero General Public License for more details.
 #		
 #		You should have received a copy of the GNU Affero General Public License
 #		along with this program.  If not, see <http://www.gnu.org/licenses/>.
###

echo 0 > /proc/sys/kernel/sysrq
/opt/sophia/power_daemon.py &
/opt/sophia/demone.py &
/opt/sophia/watchdog.py &
/opt/sophia/serial_daemon.py &
/opt/sophia/lcd_daemon.py &
exit
