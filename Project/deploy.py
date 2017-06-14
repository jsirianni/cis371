import os
import time

while True:
    os.system('git pull')
    os.system('rm -rf /var/www/html/*')
    os.system('cp -r ./http_server/* /var/www/html/')
    time.sleep(2)
