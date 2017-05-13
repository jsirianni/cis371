package main
import (
    "strings"
    "fmt"
)
// Functions to return dynamic content as a "response"
// The returned response is a string that includes HTTP headers and body content



// Return a 404 Page
func pageNotFound() string {
  var response = ""
  // Build the response headers, print to console
  response += "HTTP/1.1 404 Not Found\r\n"
  response += "Content-Type: text/html\r\n"
  response += "Content-Length: 300\r\n"
  response += "Connection: close\r\n\r\n"
  fmt.Print(response)
  // Build the HTML body
  response += "<!DOCTYPE html>\r\n<html>\r\n<head>\r\n"
  response += "<title>Page Not Found</title>\r\n"
  response += "</head>\r\n<body>\r\n"
  response += "<p style='color:grey;font-size:30px;'>"
  response += "Dazed and confused: 404 page not found.</p>\r\n"
  response += "<a href='/index.html'>It is probably best to return to home</a>"
  response += "</body></html>\r\n"
  return response
}



// Return 200 OK headers
func okHeaders(x string, bodyLength string) string {
  var okHeader = "HTTP/1.1 200 OK\r\n"

  // Determine content type
  if strings.Contains(x, ".css") {
    okHeader += "Content-Type: text/css\r\n"
  } else if strings.Contains(x, ".html") {
    okHeader += "Content-Type: text/html\r\n"
  } else if strings.Contains(x, ".jpg") || strings.Contains(x, ".png") {
    okHeader += "Content-Type: image/*\r\n"
  } else if strings.Contains(x, ".ico") {
    okHeader += "Content-Type: image/x-icon\r\n"
  } else {
    okHeader += "Content-Type: text/plain\r\n"
  }

  // Set content length and connection type
  okHeader += "Content-Length: " + bodyLength + "\r\n"
  okHeader += "Connection: keep-alive\r\n\r\n"

  // Print to console and return
  fmt.Print(okHeader)
  return okHeader
}
