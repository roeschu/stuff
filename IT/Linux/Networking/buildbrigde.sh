#!/bin/bash
brctl addbr br0
brctl addif br0 eth0
brctl addif br0 eth1
ifconfig eth0 down
ifconfig eth1 down
ifconfig eth0 0.0.0.0 up
ifconfig eth1 0.0.0.0 up
ifconfig br0 up
