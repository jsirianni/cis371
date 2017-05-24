package main
import (
    "net"
    "fmt"
    "strings"
)


// Connect to server and send report
func main() {
  go sendReport(buildReport())
}


// Go routine builds the report
func buildReport() string {
  text := "A report from test1"
  return text
}


// Go routine sends the report to server
func sendReport(t string) {
  connection, err := net.Dial("tcp", "localhost:8090")
  if err != nil && err != io.EOF { checkError(err) }

  connection.Write([]byte(strings.TrimSuffix(t, "\n") + "\n"))
  connection.Close()
}


func checkError(err error) {
  // IF a port scan
  if strings.Contains(err.Error(), "connection reset by peer") {
    fmt.Println("Error: " + err.Error())
    fmt.Println("* * * * Most likely a port scan! * * * *")

  // Print any other error
  } else if err != nil {
    fmt.Printf("ERROR: " + err.Error() + "\n\n")
  }
}
