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
    fun downloadFile(s: Socket, fq: String, pa: String, fi: String) {

		// Build a full filePath from path and file
		val filePath = pa + fi

		// Create input and output data streams with the socket passed during method invocation
        val wrappedClientOut = wrapOutputStream(s.getOutputStream())
        val wrappedClientIn = wrapInputStream(s.getInputStream())

		// Craft an HTTP GET request
        val get = "GET $filePath HTTP/1.1\r\nHost: $fq\r\n\r\n"
        wrappedClientOut.writeBytes(get)
        wrappedClientOut.flush()

		// Read the HTML response using two loops
		// The first loop prints the HTTP headers to the console
		// The second loop saves the HTTP content to a file
        var httpResponse: String? = ""
        val fileOutput = FileOutputStream("/tmp/" + fi)

        do {
            httpResponse = wrappedClientIn.readLine()
            println(httpResponse)
        } while (!httpResponse!!.isEmpty())

        while (true) {
            httpResponse = wrappedClientIn.readLine()
            if (httpResponse == null) {
                fileOutput.close()
                s.close()
                return
            } else {
                fileOutput.write(httpResponse.toByteArray())
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




