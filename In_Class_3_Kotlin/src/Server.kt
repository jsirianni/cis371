import java.io.*
import java.net.*

/**
 * A simple java server socket
 * Listens on all IPs and port 8080
 * @author jsirianni
 */
object SimpleServer {

    /**
     * Main method does the following:
     * Sets global variables; fqdn, port, file, path
     * Creates a client socket
     * Calls downloadFile() method three times, downloading three different files
     */
    @Throws(IOException::class)
    @JvmStatic fun main(args: Array<String>) {

        // Specify port to listen on
        val port = 8080

        // Create the socket and accept any incoming connection
        val s = ServerSocket(port)

        // Accept any incoming connection
        val conn = s.accept()

        // Create buffered reader and print stream to read and write to the client
        val fromClient = BufferedReader(InputStreamReader(conn.getInputStream()))
        val toClient = PrintStream(conn.getOutputStream())

        // Read client message
        var msg = ""
        do {
            msg = fromClient.readLine()
            println(msg)
        } while (!msg.isEmpty())

        // Send generic response header to client
        val resp = "HTTP/1.1 200 OK\r\nContent-Type: text/plain\r\nContent-Length: 70\r\nConnection: close\r\n\"";
        toClient.println(resp)

        // Send html body
        val body = "This is not the real content because this server is not yet complete.\r\n"

        // Close the connection
        conn.close()

    }    // End Main


}    // end class