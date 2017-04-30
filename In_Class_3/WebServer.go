package main
import "net"
import "fmt"
import "bufio"
import "io"
/*
Simple server application that listens for a connection
on all network interfaces and port 7070
*/



// Standard TCP response, will likely be removed later
const standardResponse = "HTTP/1.1 200 OK\r\nContent-Type: text/plain\r\nContent-Length: 70\r\nConnection: close\r\n\r\nThis is not the real content because this server is not yet complete."



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
Function called to handle each invidivual client
Reads an incoming HTTP request until a blank line is read
Prints the request to the terminal
Closes the connection once done
*/
func handleClient(c net.Conn) {
  defer c.Close()

  r := bufio.NewReader(c)

  // Read each header line one by one, and print to terminal
  for {
    req, err := r.ReadString('\n')
    if err != nil && err != io.EOF {
      panic(err)
    }
    fmt.Print(req)

    // Break loop after reading all headers
    if len(req) <= 2 {
      break
    }
  }

  // Send reponse to client
  fmt.Fprintf(c, standardResponse)
}


/*
Function to handle errors
*/
func checkError(err error) {
  if err != nil {
    fmt.Printf("ERROR: " + err.Error())
  }
}
