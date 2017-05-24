package main
import (
    "fmt"
    "bufio"
    "net"
)


// Main routing handles connections on all interfaces
func main() {
  socket, _ := net.Listen("tcp", ":8090")
  for {
    connection, _ := socket.Accept()
    go handleClient(connection)
  }
}


// Go routine to read client reqport
func handleClient(c net.Conn) {
  message, _ := bufio.NewReader(c).ReadString('\n')
  fmt.Print(string(message))
  c.Close()
}
