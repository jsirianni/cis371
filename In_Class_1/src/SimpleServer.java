import java.io.*;
import java.net.*;

public class SimpleServer {

	/*
	 * 
	 * The main method will create a Java ServerSocket
	 * By default, socket uses all IPs and port 7070
	 * Override the port by passing an argument
	 * 
	 */
	public static void main(String[] args) throws UnknownHostException, IOException  {

		
		// Create port variable, assign defaults
		int port = 7070;		

		
		// If argument are passed, assign port
		if (args.length != 0) 
		{
			port = Integer.parseInt(args[0]);
		}
		
	
		// Create the socket using the IP and Port determined above
		ServerSocket mySocket = new ServerSocket(port);
		System.out.println("Server is using port: " + port);
		
		
		// Wait for a connection
		Socket clientConnection = mySocket.accept();
		
		
		// Get command from client
		BufferedReader cmd = new BufferedReader(new InputStreamReader(clientConnection.getInputStream()));
		
		
		// Run cmd
		if (cmd.readLine() == "quit") {
			System.out.println("Client command == quit");
			mySocket.close();	
		}
		else {
			System.out.println("Client command != quit");
			mySocket.close();
		}
		
		
	}
	
	
}


