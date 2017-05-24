package main
import (
    "net"
    "fmt"
)
// Main function creates a TCP socket on port 7070 and then waits for a client to
// connect. Each connection is handed to a seprate thread by calling a GO Routine.


func main() {
  // Create a TCP socket
  socket, _ := net.Listen("tcp", ":8080")
  fmt.Print("Server started. Listening on port 8080\r\n\r\n")


  // Loop forever, listening for connections
  for {
    // Pause until a client connects
    connection, _ := socket.Accept()

    // Handle each incoming connection as a GO routine
    // Server can handle an arbitrary amount of connections
    go handleClient(connection)
  }
}
