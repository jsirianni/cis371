package main
import (
    "net"
    "fmt"
    "bufio"
    "os"
    "time"
)

// Connect to server and send report
func main() {

  // Build report
  reader := bufio.NewReader(os.Stdin)
  fmt.Print("Text to send: ")
  text, _ := reader.ReadString('\n')

  for {
    connection, _ := net.Dial("tcp", "localhost:8090")
    time.Sleep(1 * time.Second)
    // send report and close connection
    fmt.Fprintf(connection, text + "\n")

  }
//connection.Close()
}
