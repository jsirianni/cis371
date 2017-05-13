package main
import (
    "net"
    "fmt"
)
/*
Main function creates a TCP socket on port 7070 and then waits for a client to
connect. Each connection is handed to a seprate thread by calling a go routine.
This allows the main to accept many connections at once.
*/
func main() {
  // Create a socket
  socket, _ := net.Listen("tcp", ":8080")

  // Notify terminal that the server is started
  fmt.Print("Server started. Listening on port 8080\r\n\r\n")

  for {
    connection, _ := socket.Accept()
    go handleClient(connection)
  }
}
