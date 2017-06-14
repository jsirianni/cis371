import os
from time

while true:
    os.system('git pull')
    os.system('rm -rf /var/www/html/*')
    os.system('cp -r ./http_server/* /var/www/html/')
    time.sleep(2)
