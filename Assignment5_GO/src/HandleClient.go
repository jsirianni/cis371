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
// Call this function as a GO routine to handleClient
// each client connection concurrently.


// Go routine to handle each connection
func handleClient(c net.Conn) {
  defer c.Close()

  filePath, _ := os.Getwd()     // Current path global var
  var request = ""              // Client Request

  // Create a new reader and create request variable
  r := bufio.NewReader(c)

  // Read request header, build request, print to console
  for {
    line, err := r.ReadString('\n')
    if err != nil && err != io.EOF { checkError(err) }

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
  // The server can send dynamic or static responses
  // Dynamic responses are built at runtime
  // Static responses are stored on disk

  // If dynamic IP request, build and send 200 OK response
  if strings.Contains(request, "GET /ip") {
    c.Write(ipAddr())

  // If script, exec
  // Check if GET Contains one of following: .py, .sh, .rb, .go
  // Call functions from HandleScripts.go
  // Write function response c.Write()

  // Check if the file exists
  } else if _, err := ioutil.ReadFile(filePath); os.IsNotExist(err) {
    checkError(err)
    c.Write(pageNotFound())

  // File exists, send a static web page
  } else {
    // Read the requested file & determine length
    responseBody, _ := ioutil.ReadFile(filePath)
    respLen := strconv.Itoa(len(responseBody))

    // Write 200 Ok headers & file
    c.Write(append(okHeaders(filePath, respLen), responseBody...))
  }
}
