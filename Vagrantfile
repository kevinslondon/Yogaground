# -*- mode: ruby -*-
# vi: set ft=ruby :
 
# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"
 
Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "ubuntu14"
  config.vm.box_url = "https://cloud-images.ubuntu.com/vagrant/utopic/current/utopic-server-cloudimg-i386-vagrant-disk1.box"
  config.vm.hostname = "yogaground.com"
  config.vm.network :forwarded_port, guest: 80, host: 8080
  #config.vm.network :forwarded_port, guest: 1080, host: 8282
  config.vm.provision :shell, path: "bootstrap.sh"
end
