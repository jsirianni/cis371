#!/usr/bin/env python3
import os
import subprocess


#
# Function to get drive status
#
def driveStatus():
    status = subprocess.check_output('lsblk', shell=True)
    print(status)
    return status

#
# Run function driveStatus() if script is called
#
driveStatus()
