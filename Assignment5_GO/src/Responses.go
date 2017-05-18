package main

import (
	"fmt"
	"os/exec"
	"strconv"
	"strings"
)

// Returns a dynamic web page containing the public IP address
func ipAddr() []byte {
	// Get the server IP & build page
	ip, _ := exec.Command("dig", "+short", "myip.opendns.com", "@resolver1.opendns.com").Output()

	// Build html body
	body := []byte(
		"<!DOCTYPE html>\r\n<html>\r\n<head>\r\n" +
			"<title>Server IP</title>\r\n" +
			"</head>\r\n<body>\r\n" +
			"<p>The public IP Address of this server is: " + string(ip) + "</p>\r\n" +
			"</body></html>\r\n")

	// Get 200 OK headers, provide a path and content length
	headers := okHeaders("/ip.html", strconv.Itoa(len(body)))
	// Return the page
	return append(headers, body...)
}

// Return a 404 Page
func pageNotFound() []byte {
	// Build response headers
	notFoundHeader := []byte(
		"HTTP/1.1 404 Not Found\r\n" +
			"Content-Type: text/html\r\n" +
			"Content-Length: 300\r\n" +
			"Connection: close\r\n\r\n")

	// Build the HTML body
	notFoundBody := []byte(
		"<!DOCTYPE html>\r\n<html>\r\n<head>\r\n" +
			"<title>Page Not Found</title>\r\n" +
			"</head>\r\n<body>\r\n" +
			"<p style='color:grey;font-size:30px;'>" +
			"Dazed and confused: 404 page not found.</p>\r\n" +
			"<a href='/index.html'>It is probably best to return to home</a>" +
			"</body></html>\r\n")

	// Print headers to console
	fmt.Print(string(notFoundHeader))
	return append(notFoundHeader, notFoundBody...)
}

// Return 200 Ok headers as byte slice
func okHeaders(fPath string, bodyLength string) []byte {
	okHeader := []byte(
		"HTTP/1.1 200 OK\r\n" +
			"Content-Type: " + contentType(fPath) +
			"Content-Length: " + bodyLength + "\r\n" +
			"Connection: keep-alive\r\n\r\n")

	// Print headers to console
	fmt.Print(string(okHeader))
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
