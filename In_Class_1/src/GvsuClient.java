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
		
		
		// Optionally pass an argument to select a file path
		if (args.length != 0) {
			filePath = args[0];
		}
		
		
		// Client socket to connect to www.cis.gvsu.edu
		Socket clientSocket = new Socket(fqdn, port);
		
		
		// Create a wrapped DataInputStream & DataOutputStream
		DataInputStream wrappedClientIn =
				wrapInputStream(clientSocket.getInputStream());			
		
		DataOutputStream wrappedclientOut = 
				wrapOutputStream(clientSocket.getOutputStream());
		
	
		// Perform HTTP GET request
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				
	}

}
