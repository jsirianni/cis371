import java.io.*;
import java.net.*;


/**
 * A simple Java Socket client that connects to the Grand Valley
 * web server and requests documents.
 * 
 * @author jsirianni
 *
 */
public class GvsuClient {
	
	
	
	/*
	 * Methods taken from SampleCode/IOStreams/WrappingInputStreams.java
	 * Modified to do Input and Output streams
	 */
	public static DataInputStream wrapInputStream(InputStream in) throws IOException {
	   BufferedInputStream x = new BufferedInputStream(in);
	   DataInputStream y = new DataInputStream(x);
	   return y;
	}
	public static DataOutputStream wrapOutputStream(OutputStream in) throws IOException {
		BufferedOutputStream x = new BufferedOutputStream(in);
		DataOutputStream y = new DataOutputStream(x);
		return y;
	}
	
	
	
	/*
	 * Main method - Creates a client socket, connecting to www.cis.gvsu.edu
	 * Calls the wrapItUp method to get a DataInputStream for file downloads
	 */
	@SuppressWarnings({ "unused", "resource" })
	public static void main(String[] args) throws IOException {
		
		
		// Global Variables
		String fqdn = "www.cis.gvsu.edu";
		int port = 80;
		String filePath = "/~kurmasz/Humor/stupid.html";
		String httpRequest = "";
		
		
		
		// Optionally pass an argument to select a file path
		if (args.length != 0) {
			filePath = args[0];
		}
		
		
		
		// Client socket to connect to www.cis.gvsu.edu
		Socket clientSocket = new Socket(fqdn, port);
		
		
		
		// Create a wrapped DataOutputStream & DataInputStream 
		DataOutputStream wrappedClientOut = 						// Request data
				wrapOutputStream(clientSocket.getOutputStream());
		
		DataInputStream wrappedClientIn =							// Response data
				wrapInputStream(clientSocket.getInputStream());			
		

		
		// Perform HTTP GET request
		httpRequest = "GET / HTTP/1.1\r\n\";
		httpRequest+= "r\n";		
		URL url = new URL(fqdn);
	
		
		// Send the request to the server
		wrappedClientOut.write(request.getBytes());		// Call DataOutputStream to send the request 
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				
	}

}
