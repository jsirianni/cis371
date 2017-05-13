import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

/**
 * Created by jsirianni on 5/13/17.
 */
public class Browser {
    private JPanel mainForm;
    private JTextField urlField;
    private JButton connectBtn;
    private JTextArea textArea1;

    public Browser() {

        /**
         * When the 'Connect' button is pressed, do the following
         * Create an object of the Connection class, passing fqdn, port, path
         * Call Connection.connect() to attempt to down load the requested file
         */
        connectBtn.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent actionEvent) {

                // Vars default values
                String url = "localhost:8080/";
                String fqdn = "localhost";
                String path = "/";
                int port = 8080;


                // Parse the URL


                // Create Connection Object
                Connection c = new Connection(fqdn, port, path);


                // Retrieve the requested file
                String webPage = c.connect();

                // Display the returned string
                // Assign test box to be webPage

            }
        });
    }
}
