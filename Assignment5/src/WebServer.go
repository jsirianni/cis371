package main

import (
    "net"
    "fmt"
    "bufio"
    "io"
    "io/ioutil"
    "os"
    "strings"
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

  // Get current path
  path, _ := os.Getwd()

  // Create a new readr and create request variable
  r := bufio.NewReader(c)
  var request = ""


  // Read each header line one by one, adding to the request if valid
  for {
    // Read a single header line, check for errors
    line, err := r.ReadString('\n')
    if err != nil && err != io.EOF {
      checkError(err)
    }
    // Add header line to request if it is not a newline (end of request)
    if len(line) > 2 {
      request += line
    } else {
        break
    }
  }


  // Check if GET request
  if strings.Contains(request, "GET /") {
    // Create string array. The requested file will be = index[1]
    s := strings.Fields(request)
    // Create a string to find the required file
    if s[1] == "/" {
      s[1] = "index.html"
    }
    path += ("/" + strings.ToLower(strings.Trim((s[1]), "/")))

    // Notify the terminal of the requested file
    fmt.Println("Requested file: " + path)
  } else {
    // If not a get request, close the connection
    fmt.Println("Bad request, killing connection")
    return
  }


  // If valid GET request, create response headers
  var h = ""


  // Check if path is valid,
  // If file does not exist, send 404 not exist
  if _, err := ioutil.ReadFile(path); os.IsNotExist(err) {
    // Print error to the console
    checkError(err)
    // Return a 404 headers + body
    h += "HTTP/1.1 404 Not Found\r\n"
    h += "Content-Type: text/plain\r\n"
    h += "Content-Length: 200\r\n"
    h += "Connection: close\r\n\r\n"
    h += "This page does not exist\r\n"
    badHeaders := []byte(h)
    c.Write(badHeaders)

  // File exist, create 200 OK response
  } else {
    h += "HTTP/1.1 200 OK\r\n"
    if strings.Contains(request, ".html") {
      h += "Content-Type: text/html\r\n"
    } else if strings.Contains(request, ".css") {
      h += "Content-Type: text/css\r\n"
    } else {
      h += "Content-Type: text/plain\r\n"
    }
    h += "Content-Length: 200000\r\n"
    h += "Connection: keep-alive\r\n\r\n"
    goodHeaders := []byte(h)
    responseBody, _ := ioutil.ReadFile(path)


    // Send HTML response to client (headers followed by body)
    c.Write(goodHeaders)
    c.Write(responseBody)
  }
} // End handle client


/*
This function is called when an error is detected. Pass an error as a parameter.
The error is printed to the terminal without halting the server.
*/
func checkError(err error) {
  if err != nil {
    fmt.Printf("ERROR: " + err.Error() + "\n\n")
  }
}
