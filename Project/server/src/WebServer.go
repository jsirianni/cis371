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
  if err != nil && err != io.EOF {
     checkError(err)
  }
  // Loop forever, handle clients with go routine
  for {
    connection, err := socket.Accept()
    if err != nil && err != io.EOF {
       checkError(err)
    }
    go handleClient(connection)
  }
}


// Go routine to read client reqport
func handleClient(c net.Conn) {
  defer c.Close()

  // Read the client report
  clientReport, err := bufio.NewReader(c).ReadString('\n')
  if err != nil && err != io.EOF {
     checkError(err)
  }

  // IF valid report, assign variables
  if strings.Contains(clientReport, "report,") {
    s := strings.Split(clientReport, ",")
    hostname, status := s[1], s[2]

    // Print parsed values
    fmt.Print(string(hostname) + "\n")
    fmt.Print(string(status) + "\n")

  // IF not valid report
  } else {
    return
  }
}


// Print error to console
func checkError(err error) {
    fmt.Printf("ERROR: " + err.Error() + "\n\n")
}
