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
    // Returns a web page / text file
    fun connect(): String {

        // Create the socket
        val clientSocket: Socket
        clientSocket = Socket(fqdn, port)


        // Create input and output data streams with the socket passed during method invocation
        val wrappedClientOut = wrapOutputStream(clientSocket.getOutputStream())
        val wrappedClientIn = wrapInputStream(clientSocket.getInputStream())


        // Craft an HTTP GET request
        val get = "GET $path HTTP/1.1\r\nHost: $fqdn\r\n\r\n"
        wrappedClientOut.writeBytes(get)
        wrappedClientOut.flush()


        // Read the HTML headers
        do {
            var httpResponse = wrappedClientIn.readLine()
            println(httpResponse)
        } while (!httpResponse!!.isEmpty())


        // Read the HTML body
        var page = ""
        while (true) {
            var httpResponse = wrappedClientIn.readLine()
            if (httpResponse == null) {
                clientSocket.close()
                return page
            } else {
                // Build the page
                page += httpResponse
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




