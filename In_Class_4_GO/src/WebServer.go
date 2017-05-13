package main
import (
    "net"
    "fmt"
)
// Main function creates a TCP socket on port 7070 and then waits for a client to
// connect. Each connection is handed to a seprate thread by calling a GO Routine.


func main() {
  // Create the socket
  socket, _ := net.Listen("tcp", ":8080")
  fmt.Print("Server started. Listening on port 8080\r\n\r\n")

  // Handle all connections
  for {
    connection, _ := socket.Accept()
    go handleClient(connection)
  }
}
