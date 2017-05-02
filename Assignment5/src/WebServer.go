package main

import (
    "net"
    "fmt"
    "bufio"
    "io"
    "io/ioutil"
    "os"
)
/*
Main function creates a TCP socket on port 7070 and then waits for a client to
connect. Each connection is handed to a seprate thread by calling a go routine.
This allows the main to accept many connections at once.
*/
func main() {
  fmt.Print("Starting server...\r\n\r\n")
  socket, _ := net.Listen("tcp", ":8080")

  for {
    connection, _ := socket.Accept()
    go handleClient(connection)
  }
}


/*
This function is called as a GO routine from main, allowing multiple connections
to be established and handled at one time. Each connection is passed to a
bufio reader. The client request is then read line by line (and printed to the
terminal) until the line is less than 2 charaters.The loop then breaks.

The response begins with a response header being crafted along with a file being
selected. The response + body (file) is then pinted to the terminal as well as
being sent to the client. The connection is then closed.
*/
func handleClient(c net.Conn) {
  defer c.Close()
  r := bufio.NewReader(c)

  // Read each header line one by one, and print to terminal
  for {
    // Read a single header line, check for errors
    req, err := r.ReadString('\n')
    if err != nil && err != io.EOF {
      checkError(err)
    }
    // If no errors, print the header to the terminal
    fmt.Print(req)

    // Break loop after reading all headers
    if len(req) <= 2 {
      break
    }
  }

  // Build headers
  var h = ""
  h += "HTTP/1.1 200 OK\r\n"
  h += "Content-Type: text/html\r\n"
  h += "Content-Length: 1000\r\n"
  h += "Connection: keep-alive\r\n\r\n"

  headers := []byte(h)
  //headers := []byte("HTTP/1.1 200 OK\r\nContent-Type: text/html\r\n" +
  //  "Content-Length: 1000\r\nConnection: keep-alive\r\n\r\n")

  // Build body
  pwd, _ := os.Getwd()
  body, err := ioutil.ReadFile(pwd + "/example.html")
  if err != nil {
    checkError(err)
  }

  // Send HTML response to client (headers followed by body)
  c.Write(headers)
  c.Write(body)

} //Emd handleClient()


/*
This function is called when an error is detected. Pass an error as a parameter.
The error is printed to the terminal without halting the server.
*/
func checkError(err error) {
  if err != nil {
    fmt.Printf("ERROR: " + err.Error() + "\n\n")
  }
}
