package main
import (
    "io"
    "os"
    "net"
    "fmt"
    "time"
    "strconv"
)


// Connect to server and send report
func main() {
  for {
    connection, err := net.Dial("tcp", "localhost:8090")
    if err != nil && err != io.EOF {
       checkError(err)
    }
    connection.Write(buildReport())
    connection.Close()
  }

}



// Go routine builds the report
func buildReport() []byte {

  // Get hostname, status, timestamp
  hostname, _ := os.Hostname()
  status := "bad"
  timestamp := strconv.Itoa(int(time.Now().Unix()))

  // Build comma delim report as string
  var report = "report," + hostname + "," + status + "," + timestamp

  return []byte(report)
}



// Print error to console
func checkError(err error) {
    fmt.Printf("ERROR: " + err.Error() + "\n\n")
}
