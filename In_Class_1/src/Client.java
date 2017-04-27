import java.io.*;
import java.net.*;


public class Client {

	/*
	 * Simple client application creates a socket
	 * Binds to localhost:7070 by default
	 * Override by passing an ip and port as arguments
	 */
	public static void main(String[] args) throws UnknownHostException, IOException {

		
		// Default ip and port to be used
		String ip = "127.0.0.1";
		int port = 7070;
		
		
		// If arguments are passed, assign ip and port
		if (args.length != 0) 
		{
			ip = args[0];
			port = Integer.parseInt(args[1]);
		}
		
		
		
		/*
		 * Create a Socket to connect to server
		 * Create a print stream to send user commands to server
		 */
		Socket clientSocket = new Socket(ip, port);
		PrintStream outputCmd = new PrintStream(clientSocket.getOutputStream());
		
		
		
		/*
		 * Get input from user
		 * Create a buffered reader to recieve console commands
		 * Assign user input to the String 'command' 
		 */
		BufferedReader inputCmd = new BufferedReader(new InputStreamReader(System.in));
		System.out.print("Enter a command: ");
		String command = inputCmd.readLine();
	
		
		
		// Send command to the server
		outputCmd.println(command);
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}

}
