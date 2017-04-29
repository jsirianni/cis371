#!/bin/bash
cd $(dirname $0)

go build WebServer.go
rm build/WebServer
mv Webserver build/
