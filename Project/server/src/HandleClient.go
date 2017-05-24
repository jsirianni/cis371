package main
import (
    "net"
    "fmt"
    "bufio"
)


func handleClient(c net.Conn) {
  // Read client report until a new line is read
  message, _ := bufio.NewReader(c).ReadString('\n')

  // Print client report
  fmt.Print("Message Received:", string(message))

  // Respond to client & close
  c.Write([]byte("ok\n"))
  c.Close()
}
