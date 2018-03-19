<html>
<body>
##Dtube Standard Debian build for Stretch and Jessie </br>
#Localization </br>
d-i debian-installer/locale string en_US </br>
d-i keyboard-configuration/xkb-keymap select us </br>
#Networking </br>
d-i netcfg/choose_interface select auto </br>
#Static network configuration. </br>
d-i netcfg/disable_autoconfig boolean true </br>
d-i netcfg/get_ipaddress string <?php echo $_GET['ip']; ?> </br>
d-i netcfg/get_netmask string <?php echo $_GET['nm']; ?> </br>
d-i netcfg/get_gateway string <?php echo $_GET['gw']; ?> </br>
d-i netcfg/get_nameservers string 8.8.8.8 </br>
d-i netcfg/confirm_static boolean true </br>
#set hostname </br>
d-i netcfg/hostname string <?php echo $_GET['hn']; ?> </br>
d-i netcfg/domain string d.tube </br>
#Mirror settings </br>
d-i mirror/country string manual </br>
d-i mirror/http/hostname string http.us.debian.org </br>
d-i mirror/http/directory string /debian </br>
d-i mirror/http/proxy string </br>
#Set root pass </br>
d-i passwd/root-password-crypted password $1$HiNK6b9j$8rxf7lLjDQmFCCBJ2jLYN1 </br>
#To create a normal user account & set pass </br>
d-i passwd/user-fullname string dabbott </br>
d-i passwd/username string dabbott </br>
d-i passwd/user-password-crypted password $1$HiNK6b9j$8rxf7lLjDQmFCCBJ2jLYN1 </br>
#Clock and time zone setup </br>
d-i clock-setup/utc boolean true </br>
d-i time/zone string US/Eastern </br>
#Partitioning </br>
d-i partman-auto/init_automatically_partition select Guided </br>
d-i partman-auto/disk string /dev/sda </br>
d-i partman-auto/method string regular </br>
d-i partman/default_filesystem string xfs </br>
d-i partman-partitioning/confirm_write_new_label boolean true </br>
d-i partman/choose_partition select finish </br>
d-i partman/confirm boolean true </br>
d-i partman/confirm_nooverwrite boolean true </br>
#Install ssh server and standard tools </br>
tasksel tasksel/first multiselect standard, ssh-server </br>
d-i pkgsel/upgrade select full-upgrade </br>
#The kernel image (meta) package to be installed </br>
d-i base-installer/kernel/image string linux-image-686 </br>
#Grub install </br>
d-i grub-installer/only_debian boolean true </br>
d-i grub-installer/bootdev  string default </br>
# Avoid that last message about the install being complete. </br>
d-i finish-install/reboot_in_progress note </br>
</body>
</html>
