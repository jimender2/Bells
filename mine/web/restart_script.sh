#!/bin/bash

green_color () {
	echo -e "\e[1;31m";
}
default_color () {
	echo -e "\e[1;0m";
}

green_color;
echo "Checking for root permissions..."
default_color;

#sleep 1;

if [[ $EUID -ne 0 ]]; then
		green_color;
		echo "This script must be run as root";
	default_color;
		exit 1;
else
	green_color;
	echo "Root OK";
	default_color;
fi

killall bellringer.py
/opt/sophia/demone.py &
exit
