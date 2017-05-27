package main
import (
    "io"
    "fmt"
    "bufio"
    "strings"
    "net"
)


// Main routing accepts each connection as a GO routine
func main() {
  socket, err := net.Listen("tcp", ":8090")
  checkError(err)

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

  // IF valid report, assign vars and write to db
  if strings.Contains(clientReport, "report,") {
    s := strings.Split(clientReport, ",")
    hostname, status, timestamp := s[1], s[2], s[3]

    go writeToDatabase(hostname, status, timestamp)

  // Not valid report, ignore
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
