package main
import (
    "fmt"
    "strings"
)

// Determin the error type
// Print correct response
func checkError(err error) {

  // IF a port scan
  if strings.Contains(err.Error(), "connection reset by peer") {
    fmt.Println("Error: " + err.Error())
    fmt.Println("* * * * Most likely a port scan! * * * *")

  // Print any other error
  } else if err != nil {
    fmt.Printf("ERROR: " + err.Error() + "\n\n")
    
  }
}
