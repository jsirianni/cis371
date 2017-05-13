import java.io.*
import java.net.*


/**
 * A simple Java Socket client that connects to the Grand Valley
 * web server and requests documents.

 * @author jsirianni
 */
object GvsuClient {

    /**
     * Main method does the following:
     * Sets global variables; fqdn, port, file, path
     * Creates a client socket

     * Calls downloadFile() method three times, downloading three different files
     */
    @Throws(IOException::class)
    @JvmStatic fun main(args: Array<String>) {


        /*
		 * Global variables:
		 *
		 * port:	 Default port 80 for HTML web servers
		 * fqdn:     Fully qualified domain name of server to connect to
		 * file:     File to download
		 * path:     Directory path that holds the file
		 */
        val port = 80
        val fqdn = "www.cis.gvsu.edu"
        var file: String
        var path: String


        /*
		 * Create a socket and connect to the fqdn
		 *
		 */
        var clientSocket: Socket


        /*
		 * Call the DownloadFile method to download a file
		 * Pass a socket, file path, fqdn, file name
		 */
        clientSocket = Socket(fqdn, port)
        file = "stupid.html"
        path = "/~kurmasz/Humor/"
        downloadFile(clientSocket, fqdn, path, file)

        clientSocket = Socket(fqdn, port)
        file = "HowTo.txt"
        path = "/~kurmasz/Distiller/"
        downloadFile(clientSocket, fqdn, path, file)

        clientSocket = Socket(fqdn, port)
        file = "NoSuchFile.html"
        path = "/~kurmasz/"
        downloadFile(clientSocket, fqdn, path, file)

        clientSocket = Socket(fqdn, port)
        file = "buzz1.jpg"
        path = "/~kurmasz/"
        downloadFile(clientSocket, fqdn, path, file)
    }


    /**

     * @param s  : a client socket connection
     * *
     * @param fq : a fully qualified domain (IE. www.cis.gvsu.edu)
     * *
     * @param pa : a file path (IE. /mnt/)
     * *
     * @param fi : a file name (IE. stupid.html)
     * *
     * @throws IOException
     */
    @Throws(IOException::class)
    fun downloadFile(s: Socket, fq: String, pa: String, fi: String) {

        /*
		 * Build a full filePath from path and file
		 */
        val filePath = pa + fi


        /*
		 * Create input and output data streams with the socket passed during method invocation
		 */
        val wrappedClientOut = wrapOutputStream(s.getOutputStream())
        val wrappedClientIn = wrapInputStream(s.getInputStream())


        /*
		 * Craft an HTTP GET request
		 * The requests includes everything that is required
		 * Send the get request over the connection to the fqdn
		 */
        val get = "GET $filePath HTTP/1.1\r\nHost: $fq\r\n\r\n"
        wrappedClientOut.writeBytes(get)
        wrappedClientOut.flush()


        /*
		 * Read the HTML response using two loops
		 * The first loop prints the HTTP headers to the console
		 * The second loop saves the HTTP content to a file
		 *
		 */
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


    /*
     * Create a data input stream
     * First wrap an input stream in a buffered input stream
     * Then wrap the buffered input stream in a data input stream
     * Return the data input stream
     */
    @Throws(IOException::class)
    fun wrapInputStream(`in`: InputStream): DataInputStream {
        val x = BufferedInputStream(`in`)
        val y = DataInputStream(x)
        return y
    }


    /*
     * Create a data output stream
     * First wrap an output stream in a buffered output stream
     * Then wrap the buffered output stream in a data output stream
     * Return the data output stream
     */
    @Throws(IOException::class)
    fun wrapOutputStream(`in`: OutputStream): DataOutputStream {
        val x = BufferedOutputStream(`in`)
        val y = DataOutputStream(x)
        return y
    }


}                // end class