package main
import (
    "strings"
    "fmt"
)
// Functions to return dynamic content as a "response"
// The returned response is a string that includes HTTP headers and body content



// Return a 404 Page
func pageNotFound() string {
  // Build response headers
  var response = ""
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
func okHeaders(fPath string, bodyLength string) string {
  var okHeader = "HTTP/1.1 200 OK\r\n"
  okHeader += "Content-Type: " + contentType(fPath)
  okHeader += "Content-Length: " + bodyLength + "\r\n"
  okHeader += "Connection: keep-alive\r\n\r\n"
  fmt.Print(okHeader)
  return okHeader
}



// Helper function returns content type
func contentType(f string) string {
  // Determine content type
  var cType = ""
  if strings.Contains(f, ".css") {
    cType = "Content-Type: text/css\r\n"
  } else if strings.Contains(f, ".html") {
    cType = "Content-Type: text/html\r\n"
  } else if strings.Contains(f, ".jpg") || strings.Contains(f, ".png") {
    cType = "Content-Type: image/*\r\n"
  } else if strings.Contains(f, ".ico") {
    cType = "Content-Type: image/x-icon\r\n"
  } else {
    cType = "Content-Type: text/plain\r\n"
  }
  return cType
}
