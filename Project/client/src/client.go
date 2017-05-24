package main
import (
    "io"
    "os"
    "net"
    "fmt"
)


// Connect to server and send report
func main() {
  var report = buildReport()

  connection, err := net.Dial("tcp", "teamalerts.duckdns.org:8090")
  if err != nil && err != io.EOF {
     checkError(err)
  }
  connection.Write([]byte(report + "\n"))
  connection.Close()
}


// Go routine builds the report
func buildReport() string {
  // Declare report variable
  var r = "report,"

  // Get hostname
  hostname, err :=os.Hostname()
  if err != nil && err != io.EOF {
     checkError(err)
  }

  // Add hostname to report
  r = r + hostname
  r = r + ",ok"

  // Return the report
  return r
}


// Print error to console
func checkError(err error) {
    fmt.Printf("ERROR: " + err.Error() + "\n\n")
}
