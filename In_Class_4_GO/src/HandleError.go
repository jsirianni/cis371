package main
import (
    "fmt"
)

// Print errors to the terminal, continue running program / do not crash
func checkError(err error) {
  if err != nil {
    fmt.Printf("ERROR: " + err.Error() + "\n\n")
  }
}
