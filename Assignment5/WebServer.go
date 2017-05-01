package main

import (
    "net"
    "fmt"
    "bufio"
    "io"
    //"io/ioutil"
    //"os"
    //"runtime"
)
/*
Simple server application that listens for a connection
on all network interfaces and port 8080
*/



/*
Main function creates a TCP socket on port 7070
Handles multiple client connections at one time with a go routine
Continues running after client disconnection
*/
func main() {
  fmt.Println("Starting server...")
  socket, _ := net.Listen("tcp", ":8080")

  for {
    connection, _ := socket.Accept()
    go handleClient(connection)
  }
}



/*
Closes the client connection when routine finishes
Creates a new reader for each incoming connection
Iterates through client request line by line
Handles bad request by printing the eorr, does not panic
Prints all header lines to terminal
Responds to the client request
*/
func handleClient(c net.Conn) {
  defer c.Close()
  r := bufio.NewReader(c)

  // Read each header line one by one, and print to terminal
  for {
    // Read a single header line
    req, err := r.ReadString('\n')

    // Handle errors, keep service running!
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

  // Send HTML reponse to client
  var headers = "HTTP/1.1 200 OK\r\nContent-Type: text/plain\r\nContent-Length: 70\r\nConnection: keep-alive\r\n\r\n"

  //pwd, _ := os.Getwd()

  //body, err := ioutil.ReadFile(pwd + "/test.txt")
  //if err != nil {
  //  checkError(err)
  //}

  fmt.Println(headers + "This is a test\nThis is a test\nThis is a test\nThis is a test\nThis is a test\n")
  fmt.Fprintf(c, headers + "This is a test\nThis is a test\nThis is a test\nThis is a test\nThis is a test\n" )
} //Emd handleClient()




/*
Function to handle errors
Calling this function allows us to handle the error without panicing
*/
func checkError(err error) {
  if err != nil {
    fmt.Printf("ERROR: " + err.Error() + "\n\n")
  }
}
