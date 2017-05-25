package main
import (
    "io"
    "fmt"
    "bufio"
    "strings"
    "net"
)


// Main routing handles connections on all interfaces
func main() {
  socket, err := net.Listen("tcp", ":8090")
 checkError(err)

  // Loop forever, handle clients with go routine
  for {
    connection, err := socket.Accept()
    checkError(err)

    go handleClient(connection)
  }
}


// Go routine to read client reqport
func handleClient(c net.Conn) {
  defer c.Close()

  // Read the client report
  clientReport, err := bufio.NewReader(c).ReadString('\n')
  checkError(err)


  // IF valid report, assign variables
  if strings.Contains(clientReport, "report,") {
    s := strings.Split(clientReport, ",")
    hostname, status, timestamp := s[1], s[2], s[3]

    // Print parsed values
    fmt.Print(string(hostname) + "\n")
    fmt.Print(string(status) + "\n")
    fmt.Print(string(timestamp) + "\n")

    // Write to database
    go writeToDatabase(hostname, status, timestamp)

  // IF not valid report
  } else {
    return
  }
}


// Print error to console
func checkError(err error) {
  if err != nil && err != io.EOF {
    fmt.Printf("ERROR: " + err.Error() + "\n\n")
  }
}
