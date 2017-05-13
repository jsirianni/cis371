package main
import (
    "net"
    "fmt"
    "bufio"
    "io"
    "io/ioutil"
    "os"
    "strings"
    "strconv"
)
// Handle each client connection:
// Determines request type
// Determines file type
// Determines content length
// Responding appropriatly
// This function can act concurrently when called as a GO Routine



// Go routine to handle each connection
func handleClient(c net.Conn) {
  defer c.Close()

  filePath, _ := os.Getwd()     // Current path global var
  var request = ""              // Client Request

  // Create a new reader and create request variable
  r := bufio.NewReader(c)



  // Read each header one by one, build request, print to console
  for {
    line, err := r.ReadString('\n')
    if err != nil && err != io.EOF {
      checkError(err)
    }
    if len(line) > 2 {
      request += line
    } else {
      fmt.Println("Client Request:\n" + request)
      break
    }
  }



  // Check for a valid GET request
  if strings.Contains(request, "GET /") {
    s := strings.Fields(request)
    if s[1] == "/" {
      s[1] = "index.html"
    }
    // Build full path to requested file
    filePath += ("/" + strings.ToLower(strings.Trim((s[1]), "/")))
  } else {
    // If not a GET request,
    fmt.Println("Not a GET request, killing connection" + "\n")
    return
  }



  // Determine how to respond to the GET requests
  // The server can send a dynamic or static response
  // Dynamic responses are built during runtime
  // Static responses are files stored on disk

  // If dynamic IP request
  if strings.Contains(request, "GET /ip") {
    // Build and send 200 OK response
    c.Write([]byte(ipAddr()))


  // File not found, return dynamic 404
  } else if _, err := ioutil.ReadFile(filePath); os.IsNotExist(err) {
    // Build and send 404 to client
    c.Write([]byte(pageNotFound()))
    checkError(err)


  // Static page found
  } else {
    // Read the requested file & determine length
    responseBody, _ := ioutil.ReadFile(filePath)
    respLen := strconv.Itoa(len(responseBody))

    // Write 200 Ok headers & file
    c.Write([]byte(okHeaders(filePath, respLen)))
    c.Write(responseBody)
  }
} // End GO routine
