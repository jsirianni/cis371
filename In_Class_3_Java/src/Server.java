import java.io.*;
import java.net.*;

/**
 * A simple java server socket
 * Listens on all IPs and port 8080
 * 
 * @author jsirianni
 */
public class Server {

	/**
	 * Main method does the following:
	 * Sets global variables; fqdn, port, file, path
	 * Creates a client socket
	 * 
	 * Calls downloadFile() method three times, downloading three different files
	 */
	public static void main(String[] args) throws IOException {
		
		
		// Specify port to listen on
		int port = 8080;

		
		// Create the socket and accept any incoming connection
		ServerSocket s = new ServerSocket(port);
		System.out.println("Java is listening for connections");
		
		
		// Accept any incoming connection
		Socket conn = s.accept();
		System.out.println("Java has accepted a connection");
		
		
		// Create buffered reader and print stream to read and write to the client
		BufferedReader fromClient = new BufferedReader(new InputStreamReader(conn.getInputStream()));
		PrintStream toClient = new PrintStream(conn.getOutputStream());
		
		
		// Read client message
		String msg = "";
		do {
			msg = fromClient.readLine();
			System.out.println(msg);
		} while (!msg.isEmpty());
		
		
		// Send generic response header to client
		String resp = "HTTP/1.1 200 OK\r\nContent-Type: text/plain\r\nContent-Length: 70\r\nConnection: close\r\n";
		toClient.println(resp);
		
		
		// Close the connection
		conn.close();
		
		
	}	// End Main
		
		
}	// end class