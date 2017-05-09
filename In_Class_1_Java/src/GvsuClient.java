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

	/**
	 * Main method does the following:
	 * Sets global variables; fqdn, port, file, path
	 * Creates a client socket
	 * 
	 * Calls downloadFile() method three times, downloading three different files
	 */
	public static void main(String[] args) throws IOException {
		
		
		/*
		 * Global variables:
		 * 
		 * port:	 Default port 80 for HTML web servers
		 * fqdn:     Fully qualified domain name of server to connect to
		 * file:     File to download
		 * path:     Directory path that holds the file
		 */
		int port = 80;
		String fqdn = "www.cis.gvsu.edu";
		String file;
		String path;
		
		
		/*
		 * Create a socket and connect to the fqdn
		 *
		 */
		Socket clientSocket;
		
		
		/*
		 * Call the DownloadFile method to download a file
		 * Pass a socket, file path, fqdn, file name
		 */
		clientSocket = new Socket(fqdn, port);
		file = "stupid.html";
		path = "/~kurmasz/Humor/";
		downloadFile(clientSocket, fqdn, path, file);
		
		clientSocket = new Socket(fqdn, port);
		file = "HowTo.txt";
		path = "/~kurmasz/Distiller/";
		downloadFile(clientSocket, fqdn, path, file);

		clientSocket = new Socket(fqdn, port);
		file = "NoSuchFile.html";
		path = "/~kurmasz/";
		downloadFile(clientSocket, fqdn, path, file);
		
		clientSocket = new Socket(fqdn, port);
		file = "buzz1.jpg";
		path = "/~kurmasz/";
		downloadFile(clientSocket, fqdn, path, file);
	} 
	
	
	/**
	 * 
	 * @param s  : a client socket connection
	 * @param fq : a fully qualified domain (IE. www.cis.gvsu.edu)
	 * @param pa : a file path (IE. /mnt/)
	 * @param fi : a file name (IE. stupid.html)
	 * @throws IOException
	 */
	public static void downloadFile(Socket s, String fq, String pa, String fi) throws IOException {
		
		/*
		 * Build a full filePath from path and file
		 */
		String filePath = pa + fi;

		
		/*
		 * Create input and output data streams with the socket passed during method invocation 
		 */
		DataOutputStream wrappedClientOut = (wrapOutputStream(s.getOutputStream()));
		DataInputStream wrappedClientIn = (wrapInputStream(s.getInputStream()));			
		
		
		/*
		 * Craft an HTTP GET request
		 * The requests includes everything that is required 
		 * Send the get request over the connection to the fqdn
		 */
		String get = ("GET " + filePath + " HTTP/1.1\r\nHost: " + fq + "\r\n\r\n");
		wrappedClientOut.writeBytes(get);
		wrappedClientOut.flush();

		
		/*
		 * Read the HTML response using two loops
		 * The first loop prints the HTTP headers to the console 
		 * The second loop saves the HTTP content to a file
		 * 
		 */
		String httpResponse = "";
		FileOutputStream fileOutput = new FileOutputStream("/tmp/" + fi);

		do {
			httpResponse = wrappedClientIn.readLine();
			System.out.println(httpResponse);
		} while (!httpResponse.isEmpty());

		while (true) {
			httpResponse = wrappedClientIn.readLine();
			if (httpResponse == null) {
				fileOutput.close();
				s.close();
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
