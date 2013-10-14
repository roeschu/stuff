#!/bin/bash

for item in $*
do
        /bin/cp $item $item.bak
        sed -f /data/scripts/.sedfile $item.bak > $item

done




sedfile


s.39.79.g
