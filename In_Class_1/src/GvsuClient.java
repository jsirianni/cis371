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
	@SuppressWarnings({ "unused", "resource", "deprecation" })
	public static void main(String[] args) throws IOException {
		
		
		// Global Variables
		String fqdn = "www.cis.gvsu.edu";
		String filePath = "/~kurmasz/Humor/stupid.html";
		int port = 80;

		
		
		// Optionally pass an argument to select a file path
		if (args.length != 0) {
			filePath = args[0];
		}
		
		
		
		// Client socket to connect to www.cis.gvsu.edu
		Socket clientSocket = new Socket(fqdn, port);

		
		
		// Create a wrapped DataOutputStream & DataInputStream 
		DataOutputStream wrappedClientOut = wrapOutputStream(clientSocket.getOutputStream());
		
		DataInputStream wrappedClientIn = wrapInputStream(clientSocket.getInputStream());			
		

		
		// Send the request to the server, then flush
		//wrappedClientOut.writeBytes("GET " + filePath + " HTTP/1.1" + "\r\nHost: " + fqdn + ":" + port + "\r\n");	
		//wrappedClientOut.writeBytes("Host: " + fqdn + ":" + port + "\r\n");
		//wrappedClientOut.writeBytes("");
		//wrappedClientOut.flush();
		
		PrintWriter printToServer = new PrintWriter(clientSocket.getOutputStream());
		printToServer.println("GET " + filePath + " HTTP/1.1");
		printToServer.println("Host: www.cis.gvsu.edu");
		printToServer.println("");
		printToServer.flush();
		
		
		
		// Read HTML response
		String httpResponse = "";

		do {
			httpResponse = wrappedClientIn.readLine();
			System.out.println(httpResponse);
		} while (!httpResponse.isEmpty());
			
		do {
			httpResponse = wrappedClientIn.readLine();
			System.out.println(httpResponse);
		} while (!httpResponse.isEmpty());

		
		// FLUSH HERE??
		
		
		
		
		
		
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				
	}

}
