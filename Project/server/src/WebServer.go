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
  // Ensure table is created in database
  createDB()

  // Start listener
  socket, err := net.Listen("tcp", ":8090")
  checkError(err)

  // Handle each connection
  for {
    connection, err := socket.Accept()
    checkError(err)
    handleClient(connection)
  }
}


// Go routine to read client reqport
func handleClient(c net.Conn) {
  defer c.Close()

  // Read the client report
  clientReport, err := bufio.NewReader(c).ReadString('\n')
  checkError(err)

  // Return if not valid report
  if strings.Contains(clientReport, "report,") {
    s := strings.Split(clientReport, ",")
    hostname, status, timestamp := s[1], s[2], s[3]

    // Check status & write to database
    go statusCheck(hostname, status, timestamp)
    writeToDatabase(hostname, status, timestamp)

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
