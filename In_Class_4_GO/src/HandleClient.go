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

/*
This function is called as a GO routine from main, allowing multiple connections
to be established and handled at one time. The client request is then read line
by line until the line is less than 2 charaters.The loop then breaks.

Checks are performed to validate the header and requested page

If the request is valid and the file exist, a 200 OK respons is sent along
with the requested page.
*/
func handleClient(c net.Conn) {
  // Close the conection when function finishes
  defer c.Close()

  // Variables to use later
  path, _ := os.Getwd()  // Current path
  var request = ""       // Client Request
  var reqFile = ""       // Requested content type


  // Create a new reader and create request variable
  r := bufio.NewReader(c)


  // Read each header line one by one, adding to the request if valid
  for {
    line, err := r.ReadString('\n')
    if err != nil && err != io.EOF {
      checkError(err)
    }
    // Add each line to request until EOF
    if len(line) > 2 {
      request += line
    } else {
        break
    }
  }
  // Print Client request to the terminal (Debug)
  fmt.Println(request)



  // Check if GET request
  if strings.Contains(request, "GET /") {
    // Create string array. The requested file will be = index[1]
    // Assign requested content type
    s := strings.Fields(request)
    if s[1] == "/" {
      s[1] = "index.html"
    }
    path += ("/" + strings.ToLower(strings.Trim((s[1]), "/")))
    reqFile = path
  } else {
    // If not a GET request,
    fmt.Println("Bad request, killing connection" + "\n")
    return
  }



  // 404 File Not Found
  if _, err := ioutil.ReadFile(path); os.IsNotExist(err) {
    // Print error to the console
    checkError(err)
    // Send 404 response
    var notFound = pageNotFound()
    badHeaders := []byte(notFound)
    c.Write(badHeaders)
    fmt.Printf(notFound)



  // 200 Ok file Found
  } else {
    // Read the requested file, determine the length
    responseBody, _ := ioutil.ReadFile(path)

    // Begin building response header
    respLen := strconv.Itoa(len(responseBody))
    var responseHeaders = okHeaders(reqFile, respLen)

    // Assign response headers to a byte array
    goodHeaders := []byte(responseHeaders)

    // Print response headers to the console (Debug)
    // Send HTML response to client (headers followed by body)
    fmt.Println(responseHeaders)
    c.Write(goodHeaders)
    c.Write(responseBody)
  }
} // End GO routine
