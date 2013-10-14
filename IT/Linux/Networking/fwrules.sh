#!/bin/bash
MAILHUB="xxx.xxx.ch"
KLNT="xxx.xxx.ch"


iptables -P INPUT DROP 
iptables -P OUTPUT DROP 
iptables -P FORWARD DROP 

iptables -A INPUT -p all -i lo -j ACCEPT 
iptables -A OUTPUT -p all -o lo -j ACCEPT

iptables -A INPUT -m state --state ESTABLISHED,RELATED -j ACCEPT
iptables -A FORWARD -m state --state ESTABLISHED,RELATED -j ACCEPT
iptables -A FORWARD -p icmp -j ACCEPT



#iptables -A INPUT -p tcp --dport 110 -m physdev --physdev-in eth0 -j ACCEPT
#iptables -A INPUT -p tcp --dport 80 -m physdev --physdev-in eth0 -j ACCEPT
#iptables -A INPUT -p tcp --dport 143 --m physdev --physdev-in eth0 -j ACCEPT
#iptables -A INPUT -p tcp --dport 25 --m physdev --physdev-in eth0 -j ACCEPT



#VON xxx via SMTP zum MAILHUB
iptables  -A FORWARD -p tcp -d $MAILHUB --dport 25 -j ACCEPT
iptables -A FORWARD -p tcp -s $KLNT --dport 53 -j ACCEPT
iptables -A FORWARD -p udp -s $KLNT --dport 53 -j ACCEPT

#VON AUSSEN zum xxx
iptables -A FORWARD -p tcp  -d $KLNT --dport 110 -j ACCEPT
iptables -A FORWARD -p tcp -d $KLNT --dport 80 -j ACCEPT
iptables -A FORWARD -p tcp -d $KLNT --dport 143 -j ACCEPT
iptables -A FORWARD -p tcp -d $KLNT --dport 8014 -j ACCEPT
iptables -A FORWARD -p tcp -s 192.41.152.245 -d $KLNT --dport 389 -j ACCEPT
