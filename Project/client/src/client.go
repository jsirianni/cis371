package main
import (
    "net"
    "fmt"
    "bufio"
    "os"
    "strconv"
    "strings"
)


// Global var
var num int


// Connect to server and send report
func main() {
  // Build report
  reader := bufio.NewReader(os.Stdin)
  fmt.Print("Text to send: ")
  text, _ := reader.ReadString('\n')

  // Send report as many times as possible
  for {
    sendReport(text)
  }
}


func sendReport(t string) {
  // Create connection and increment num
  connection, _ := net.Dial("tcp", "localhost:8090")
  num = num + 1

  // send report and close connection
  connection.Write([]byte(strings.TrimSuffix(t, "\n") + strconv.Itoa(num) + "\n"))
  connection.Close()
}
