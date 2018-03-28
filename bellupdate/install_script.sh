#!/bin/bash

###
 #      install_script.sh
 #
 #      An EXPERIMENTAL script to automatically install "sophia" on Raspbian
 #		This script is HIGHLY EXPERIMENTAL and may irreversibly damage your system.
 #		Please make sure you have a backup before trying to execute it.
 #		In addition there is currently no uninstall script available,
 #		if you choose to use this script and then you want to uninstall the software
 #		you will have to manually uninstall the software.
 #
 #		For more information on the software please visit:
 #		https://lizzit.it/sophia
 #
 #      Written by: Michele Lizzit <michele@lizzit.it>, 25 Apr 2016
 #      Last update: 25 Apr 2016
 #      Version: 1.0
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

green_color () {
	echo -e "\e[1;31m";
}
default_color () {
	echo -e "\e[1;0m";
}


red_highlight () {
	echo -e "\e[1;41m";
}
blue_highlight () {
	echo -e "\e[1;44m";
}
white_bold() {
	echo -e "\e[37m";
}

green_color;
echo "Checking for root permissions..."
default_color;

sleep 1;

if [[ $EUID -ne 0 ]]; then
		green_color;
		echo "This script must be run as root";
		echo "Please execute: sudo ./install_script.sh";
	default_color;
		exit 1;
else
	green_color;
	echo "Root OK";
	default_color;
fi

echo -e "\n\n\n\n"
blue_highlight;
white_bold;
echo "sophia - Open-source bell management system"
echo "https://lizzit.it/sophia"
echo ""
default_color;
sleep 1;
red_highlight;
white_bold;
echo "WARNING:"
echo "This is a HIGHLY EXPERIMENTAL script"
default_color;
echo "If you choose to continue it may render your system unusable and you may lose your data"
echo "Please make sure you have a backup of your system and use this script at your own risk"
blue_highlight;
white_bold;
read -p "Continue (y/n)?" -n 1 -r
default_color;
echo ""
if [[ ! ($REPLY =~ ^[Yy]$) ]]
then
#if no
echo "Installation cancelled"
exit 0;
fi

green_color;
echo "Installing sophia bell management system..."
default_color;


sleep 1;

green_color;
echo "Setting working directory..."
default_color;
cd "$(dirname "$0")"
green_color;

sleep 1;

echo "Creating user sophia..."
default_color;
useradd sophia
green_color;

sleep 1;

echo "Insert password for user sophia..."
default_color;
passwd sophia
green_color;
echo "Adding user sophia to group gpio..."
default_color;
usermod -a -G gpio sophia
green_color;

sleep 1;

echo "Disabling shell for user sophia..."
default_color;
usermod -s /bin/false sophia
green_color;

sleep 1;

echo "Adding user sophia to group dialout..."
default_color;
usermod -a -G dialout sophia
green_color;

sleep 1;

echo "Adding user www-data to group sophia..."
default_color;
usermod -a -G sophia www-data
green_color;

sleep 1;

echo "Allowing user sophia limited root access..."
default_color;
cp installer_files/020_sophia /etc/sudoers.d/020_sophia
chmod 440 /etc/sudoers.d/020_sophia
chown root:root /etc/sudoers.d/020_sophia
green_color;

sleep 1;

echo "Allowing user www-data limited root access..."
default_color;
cp installer_files/030_sophia /etc/sudoers.d/030_sophia
chmod 440 /etc/sudoers.d/030_sophia
chown root:root /etc/sudoers.d/030_sophia
green_color;

sleep 1;

echo "Disabling sysrq..."
default_color;
green_color;
echo 0 > /proc/sys/kernel/sysrq
green_color;

sleep 1;

echo "Disabling console on ttyAMA0..."
default_color;
sudo systemctl disable serial-getty@ttyAMA0.service
sudo systemctl stop serial-getty@ttyAMA0.service

sleep 1;

green_color;
echo "Creating target directory..."
default_color;
sudo mkdir /opt/sophia
green_color;

sleep 1;

echo "Installing required software..."
default_color;
sudo apt-get update
sudo apt-get -y install python-pip python-dev
sudo pip install distribute
sudo pip install RPi.GPIO
sudo pip install RPLCD
sudo pip install pyserial
sudo apt-get -y install apache2 php
green_color;
echo "Enabling apache rewrite mod..."
default_color;
a2enmod rewrite

sleep 1;

green_color;
echo "Enabling ssl..."
default_color;
a2enmod ssl

sleep 1;

green_color;
echo "Configuring apache server..."
default_color;
cp installer_files/apache_sophia.conf /etc/apache2/sites-available/
rm /etc/apache2/sites-enabled/*
ln -s /etc/apache2/sites-available/apache_sophia.conf /etc/apache2/sites-enabled/

sleep 1;

green_color;
echo "Restarting apache server..."
default_color;

service apache2 restart
green_color;
echo "Installing..."
default_color;
cp -r ./sophia/* /opt/sophia/
cp -r ./www/* /var/www/
mkdir /var/www/uploads

sleep 1;

green_color;
echo "Setting permissions..."
default_color;
chown -R sophia:sophia /opt/sophia
chmod 555 -R /opt/sophia
chmod 777 -R /opt/sophia/data/
chown -R www-data:www-data /var/www
chmod 555 -R /var/www
chmod 755 /var/www/uploads
chmod 775 /opt/sophia/OPTIONS.txt

sleep 1;

green_color;
echo "Installing init script..."
default_color;
cp installer_files/init_sophia.sh /etc/init.d/sophia
chmod 755 /etc/init.d/sophia
chown root:root /etc/init.d/sophia
update-rc.d sophia defaults

sleep 1;

green_color;
echo "Starting sophia..."
default_color;
service sophia start

sleep 1;

green_color;
echo "Installation completed"
default_color;

sleep 0.8;

exit 0;
