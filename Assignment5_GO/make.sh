#!/bin/bash
#cd $(dirname $0)

# Build the server, move to deployment dir
sh ./src/build.sh
rm ./bin/WebServer
mv ./src/WebServer bin/

# run server
#./build/WebServer
