import java.io.*
import java.net.*


// Objects created must pass:
// - Fully qualified domain name
// - Port
// - File path
class Connection constructor(fqdn: String, port: Int, path: String) {

    // Assign the vars
    var fqdn = fqdn
    var port = port
    var path = path



    // Function to connect to the requested server
    fun connect() {
        // Create the socket
        val clientSocket: Socket
        clientSocket = Socket(fqdn, port)
    }



    @Throws(IOException::class)
    fun downloadFile(c: Socket, fqdn: String, filePath: String) {

		// Create input and output data streams with the socket passed during method invocation
        val wrappedClientOut = wrapOutputStream(c.getOutputStream())
        val wrappedClientIn = wrapInputStream(c.getInputStream())

		// Craft an HTTP GET request
        val get = "GET $filePath HTTP/1.1\r\nHost: $fqdn\r\n\r\n"
        wrappedClientOut.writeBytes(get)
        wrappedClientOut.flush()

		// Read the HTML response using two loops
		// The first loop prints the HTTP headers to the console
		// The second loop saves the HTTP content to a file
        do {
            var httpResponse = wrappedClientIn.readLine()
            println(httpResponse)
        } while (!httpResponse!!.isEmpty())

        while (true) {
            var httpResponse = wrappedClientIn.readLine()
            if (httpResponse == null) {
                c.close()
                return
            } else {
                // *****
                // DISPLAY THE HTML CONTENT HERE
                // ******
                return // remove this
            }
        }
    }


    // Wrap the stream to be sent
    @Throws(IOException::class)
    fun wrapInputStream(`in`: InputStream): DataInputStream {
        val x = BufferedInputStream(`in`)
        val y = DataInputStream(x)
        return y
    }


    // Wrap the response
    @Throws(IOException::class)
    fun wrapOutputStream(`in`: OutputStream): DataOutputStream {
        val x = BufferedOutputStream(`in`)
        val y = DataOutputStream(x)
        return y
    }
}




