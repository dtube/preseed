##Dtube Standard Debian build for Stretch and Jessie
#Localization
d-i debian-installer/locale string en_US
d-i keyboard-configuration/xkb-keymap select us
#Networking
d-i netcfg/choose_interface select auto
#Static network configuration.
d-i netcfg/disable_autoconfig boolean true
d-i netcfg/get_ipaddress string <?php
echo $_GET['ip'];
?>
d-i netcfg/get_netmask string <?php
echo $_GET['nm'];
?>
d-i netcfg/get_gateway string <?php
echo $_GET['gw'];
?>
d-i netcfg/get_nameservers string 8.8.8.8
d-i netcfg/confirm_static boolean true
#set hostname
d-i netcfg/hostname string <?php
echo $_GET['hn'];
?>
d-i netcfg/domain string d.tube
#Mirror settings
d-i mirror/country string manual
d-i mirror/http/hostname string http.us.debian.org
d-i mirror/http/directory string /debian
d-i mirror/http/proxy string
#Set root pass
d-i passwd/root-password-crypted password $1$HiNK6b9j$8rxf7lLjDQmFCCBJ2jLYN1
#To create a normal user account & set pass
d-i passwd/user-fullname string dabbott
d-i passwd/username string dabbott
d-i passwd/user-password-crypted password $1$HiNK6b9j$8rxf7lLjDQmFCCBJ2jLYN1
#Clock and time zone setup
d-i clock-setup/utc boolean true
d-i time/zone string US/Eastern
#Partitioning
d-i partman-auto/init_automatically_partition select Guided
d-i partman-auto/disk string /dev/sda
d-i partman-auto/method string regular
d-i partman/default_filesystem string xfs
d-i partman-partitioning/confirm_write_new_label boolean true
d-i partman/choose_partition select finish
d-i partman/confirm boolean true
d-i partman/confirm_nooverwrite boolean true
#Install ssh server and standard tools
tasksel tasksel/first multiselect standard, ssh-server
d-i pkgsel/upgrade select full-upgrade
#The kernel image (meta) package to be installed
d-i base-installer/kernel/image string linux-image-686
#Grub install
d-i grub-installer/only_debian boolean true
d-i grub-installer/bootdev  string default
# Avoid that last message about the install being complete.
d-i finish-install/reboot_in_progress note
