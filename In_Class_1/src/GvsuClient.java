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
	 * Main method - Creates a client socket, connecting to www.cis.gvsu.edu
	 * Calls the wrapItUp method to get a DataInputStream for file downloads
	 */
	@SuppressWarnings({ "deprecation" })
	public static void main(String[] args) throws IOException {
		
		
		/*
		 * Global variables:
		 * 
		 * fqdn:     Fully qualified domain name of server to connect to
		 * file:     File to download
		 * path:     Directory path that holds the file
		 * filePath: Combines path and file for use in the get request
		 */
		String fqdn = "www.cis.gvsu.edu";
		String file = "stupid.html";
		String path = "/~kurmasz/Humor/";
		String filePath = path + file;
		int port = 80;
		
		
		/*
		 * Optionally pass an argument to select a file path
		 * The path must start with a "/" and will be appended to 
		 * the end of the URL "www.cis.gvsu.edu"
		 * 
		 * Example: /~jsirianni/index.html
		 * 
		 * 
		 * Optionally pass a second argument to choose a download directory
		 * The directory must be the full path and end with a "/"
		 * 
		 * Example: /tmp/
		 */
		if (args.length != 0) {
			filePath = args[0];
		}
		
		
		/*
		 * Create a socket and connect to the fqdn
		 * Create data input and output streams by calling the wrap classes
		 */
		Socket clientSocket = new Socket(fqdn, port);
		DataOutputStream wrappedClientOut = (wrapOutputStream(clientSocket.getOutputStream()));
		DataInputStream wrappedClientIn = (wrapInputStream(clientSocket.getInputStream()));			
		
		
		/*
		 * Craft an HTTP GET request
		 * The requests includes everything that is required 
		 * Send the get request over the connection to the fqdn
		 */
		String get = ("GET " + filePath + " HTTP/1.1\r\nHost: " + fqdn + "\r\n\r\n");
		wrappedClientOut.writeBytes(get);
		wrappedClientOut.flush();

		
		/*
		 * Read the HTML response using two loops
		 * The first loop prints the HTTP headers to the console 
		 * The second loop saves the HTTP content to a file
		 * 
		 */
		String httpResponse = "";
		FileOutputStream fileOutput = new FileOutputStream("/tmp/" + file);

		do {
			httpResponse = wrappedClientIn.readLine();
			System.out.println(httpResponse);
		} while (!httpResponse.isEmpty());

		while (true) {
			httpResponse = wrappedClientIn.readLine();
			if (httpResponse == null) {
				fileOutput.close();
				clientSocket.close();
				return;
			}
			else {
				fileOutput.write(httpResponse.getBytes());
			}
		} 		
	} 
	
	
	/*
	 * Create a data input stream
	 * First wrap an input stream in a buffered input stream
	 * Then wrap the buffered input stream in a data input stream
	 * Return the data input stream
	 */
	public static DataInputStream wrapInputStream(InputStream in) throws IOException {
	   BufferedInputStream x = new BufferedInputStream(in);
	   DataInputStream y = new DataInputStream(x);
	   return y;
	}   
	
	
	/*
	 * Create a data output stream
	 * First wrap an output stream in a buffered output stream
	 * Then wrap the buffered output stream in a data output stream
	 * Return the data output stream
	 */
	public static DataOutputStream wrapOutputStream(OutputStream in) throws IOException {
		BufferedOutputStream x = new BufferedOutputStream(in);
		DataOutputStream y = new DataOutputStream(x);
		return y;
	}	
	
	
} 				// end class
