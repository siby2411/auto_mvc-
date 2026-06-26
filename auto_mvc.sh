#!/bin/bash
cd ~/auto_mvc
service mariadb restart
pkill -9 php
echo "Serveur démarré sur http://localhost:8000"
php -S 0.0.0.0:8000 -t public &
sleep 2
termux-open http://localhost:8000
