package main

import "net"
import "fmt"
import "bufio"

/*
Simple server application that listens for a connection
on all network interfaces and port 7070
*/


// Standard TCP response, will likely be removed later
const standardResponse = "HTTP/1.1 200 OK\nContent-Type: text/plain\nContent-Length: 70\nConnection: close\n"


/*
Main function creates a TCP socket on port 7070
Handles multiple client connections at one time
Continues running after client disconnection
*/
func main() {
  // Start the server
  fmt.Println("Starting server...")

  // Create a listener called 'socket', check for errors
  socket, err := net.Listen("tcp", ":8080")
  checkError(err)

  // Accept multiple connections
  for {
    // Accept a single connection
    connection, err := socket.Accept()

    // Iqnore errors, if present
    if err != nil {
      continue
    }

    // Call handleClient function to create a new thread
    go handleClient(connection)
  }
}



/*
Function called to handle each invidivual client
Reads an incoming HTTP request until a blank line is read
Prints the request to the terminal
Closes once done
*/
func handleClient(connection net.Conn) {

  // Close connection when done
  defer connection.Close()

  // Loop forever once connected
  for {

    // Set message equal to message from client
    message, _ := bufio.NewReader(connection).ReadString('\n')

    // Post the client message to the terminal
    fmt.Print("Message from client: ", string(message))

    // Return standard response REGAURDLESS of the request
    fmt.Print(standardResponse)


    // Get out of loop after printing the request
    break
  }

}



// Function to handle errors
func checkError(err error) {
  if err != nil {
    fmt.Printf("ERROR: " + err.Error())
  }
}
