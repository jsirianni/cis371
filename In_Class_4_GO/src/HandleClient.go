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


  // Create array from GET header. The requested file will be = index[1]
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


  // 404 File not found
  if _, err := ioutil.ReadFile(filePath); os.IsNotExist(err) {
    // Send 404 to client and console
    notFoundResp := []byte(pageNotFound())
    c.Write(notFoundResp)
    checkError(err)


  // 200 Ok page found
  } else {
    // Read the requested file & determine length
    responseBody, _ := ioutil.ReadFile(filePath)
    respLen := strconv.Itoa(len(responseBody))
    // Get 200 OK headers
    goodHeaders := []byte(okHeaders(filePath, respLen))
    // Send HTML response to client
    c.Write(goodHeaders)
    c.Write(responseBody)
  }
} // End GO routine
