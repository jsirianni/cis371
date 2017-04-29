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
	@SuppressWarnings({ "resource", "deprecation" })
	public static void main(String[] args) throws IOException {
	
		
		
		// Global Variables
		String fqdn = "www.cis.gvsu.edu";
		String filePath = "/~kurmasz/Humor/stupid.html";
		int port = 80;

		
		
		/*
		 * Optionally pass an argument to select a file path
		 * The path must start with a "/" and will be appended to 
		 * the end of the URL "www.cis.gvsu.edu"
		 */
		if (args.length != 0) {
			filePath = args[0];
		}
		
		
		
		// Client socket to connect to www.cis.gvsu.edu
		Socket clientSocket = new Socket(fqdn, port);

		
		
		// Create a wrapped DataOutputStream & DataInputStream 
		DataOutputStream wrappedClientOut = (wrapOutputStream(clientSocket.getOutputStream()));
		DataInputStream wrappedClientIn = (wrapInputStream(clientSocket.getInputStream()));			
		
		
		
		// Create GET 
		String get = ("GET " + filePath + " HTTP/1.1\r\nHost: " + fqdn + "\r\n\r\n");

		
		
		// Send the request to the server, then flush
		wrappedClientOut.writeBytes(get);
		wrappedClientOut.flush();

		
		
		
		// Print response headers to the terminal
		String httpResponse = "";

		//do {
		//	httpResponse = wrappedClientIn.readLine();
		//	System.out.println(httpResponse);
		//} while (!httpResponse.isEmpty());
			

			
		while (true) {
			httpResponse = wrappedClientIn.readLine();
			if (httpResponse == null) {
				break;
			}
			else {
				System.out.println(httpResponse);

			}
		} 
		
		// FLUSH HERE??
		
		
		
		// Close Socket Here??
		
		
		
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				
	}

}
