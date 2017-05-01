#!/bin/bash
cd $(dirname $0)

# Build the server, move to deployment dir
go build WebServer.go
rm build/WebServer
mv WebServer build/
clear
ls
# run server
#./build/WebServer
