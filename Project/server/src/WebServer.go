package main
import "net"

// Main routing handles connections on all interfaces
func main() {
  socket, _ := net.Listen("tcp", ":8090")

  for {
    connection, _ := socket.Accept()
    go handleClient(connection)
  }
}
