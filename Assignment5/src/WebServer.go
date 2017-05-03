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
Main function creates a TCP socket on port 7070 and then waits for a client to
connect. Each connection is handed to a seprate thread by calling a go routine.
This allows the main to accept many connections at once.
*/
func main() {
  // Create a socket
  socket, _ := net.Listen("tcp", ":8080")

  // Notify terminal that the server is started
  fmt.Print("Server started. Listening on port 8080\r\n\r\n")

  for {
    connection, _ := socket.Accept()
    go handleClient(connection)
  }
}


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
  var reqCont = ""       // Requested content type
  var h = ""             // String to hold the response headers


  // Create a new readr and create request variable
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
    reqCont = path
  } else {
    // If not a GET request,
    fmt.Println("Bad request, killing connection" + "\n")
    return
  }


  // Check if path is valid,
  // If file does not exist, send 404 not exist
  if _, err := ioutil.ReadFile(path); os.IsNotExist(err) {
    // Print error to the console
    checkError(err)
    // Return a 404 headers + body
    h += "HTTP/1.1 404 Not Found\r\n"
    h += "Content-Type: text/plain\r\n"
    h += "Content-Length: 30\r\n"
    h += "Connection: close\r\n\r\n"
    h += "This page does not exist\r\n"
    badHeaders := []byte(h)
    c.Write(badHeaders)


  // If the file exist
  } else {
    // Read the requested file, determine the length
    responseBody, _ := ioutil.ReadFile(path)
    respLen := strconv.Itoa(len(responseBody))


    // Begin building response header
    h += "HTTP/1.1 200 OK\r\n"

    // Determine content type
    if strings.Contains(reqCont, "css") {
      h += "Content-Type: text/css\r\n"
    } else if strings.Contains(reqCont, "html") {
      h += "Content-Type: text/html\r\n"
    } else if strings.Contains(reqCont, ".jpg") {
      h += "Content-Type: text/plain\r\n"
    } else {
      h += "Content-Type: text/plain\r\n"
    }

    // Set content length
    h += "Content-Length: " + respLen + "\r\n"

    // Force connection close
    h += "Connection: close\r\n\r\n"


    // Assign response headers to a byte array
    goodHeaders := []byte(h)


    // Print response headers to the console (Debug)
    // Send HTML response to client (headers followed by body)
    fmt.Println(h)
    c.Write(goodHeaders)
    c.Write(responseBody)
  }
} // End GO routine


/*
Print errors to the terminal, continue running program / do not crash
*/
func checkError(err error) {
  if err != nil {
    fmt.Printf("ERROR: " + err.Error() + "\n\n")
  }
}
