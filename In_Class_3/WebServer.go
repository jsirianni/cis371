package main

import "net"
import "fmt"
import "bufio"
import "strings"


// Simple server application that listens for a connection
// on all network interfaces and port 8080


func main() {
  fmt.Println("Starting server...")


  // Create a socket, listen on all interfaces
  socket, _ := net.Listen("tcp", ":8080")
  connection, _ := socket.Accept()


  // Loop forever once connected
  for {

    // Set message equal to message from client
    message, _ := bufio.NewReader(connection).ReadString('\n')

    // Post the client message to the terminal
    fmt.Print("Message from client: ", string(message))
  }
}
