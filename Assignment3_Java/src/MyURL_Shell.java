/**
 * Represents a URL
 */
public class MyURL_Shell {
  private String scheme = "http";
  private String domainName = null;
  private int port = 80;
  private String path = "/";



  /**
   Pass a URL that contains a domain at minimum
   **/
  public MyURL_Shell(String url) {

    // Set URL to lowercase to prevent problems
    url = url.toLowerCase();

    //
    // Parse URL for the protocol
    //
    if (url.contains("://")) {
      String[] x = url.split(":");
      scheme = x[0];
    }

    //
    // Parse URL for domain --> http://stackoverflow.com/questions/16673628/remove-url-prefix-from-string-http-www-etc
    //
    // Remove url prifix if present
    domainName = url.replaceFirst("^(http://www\\.|http://|www\\.)","");

    // If port specified, remove port and anything after
    if (domainName.contains(":")) {
      String[] x = domainName.split(":");
      domainName = x[0];

    // If no port, but path is specified, remove it
    } else if (domainName.contains("/")) {
      String[] x = domainName.split("/") ;
      domainName = x[0];
    }

    //
    // Parse URL for port and path
    //
    // Remove prefix from url
    String tmpUrl = url;
    tmpUrl = url.replaceFirst("^(http://www\\.|http://|www\\.)","");

    // IF path specified, assign and remove from tmpUrl
    if (tmpUrl.contains("/")) {
      String[] x = tmpUrl.split("/");
      tmpUrl = x[0];
      path = x[1];

      // If a port is specified, parse for it
      if (tmpUrl.contains(":")) {
        String[] y = tmpUrl.split(":");
        port = Integer.parseInt(y[1]);

      // If no port specified, default to 80
      } else {
        port = 80;
      }

    // IF no path specified, but port specified
    } else if (tmpUrl.contains(":")) {
      String[] x = tmpUrl.split(":");
      port = Integer.parseInt(x[1]);
      path = "/";

    // No path or port specified
    } else {
      port = 80;
      path = "/";
    }
  } // End constructor



  /**
   * Determine if newURL is a relatvie link or full link. Assign variables accordingly
   */
  public MyURL_Shell(String newURL, MyURL_Shell currentURL) {

    // If new URL does not have a protocol, treat as rel link --> http://stackoverflow.com/questions/20904922/split-string-on-the-last-occurrence-of-character
    if (newURL.contains("://") == false) {
      int index = currentURL.path.lastIndexOf("/");
      String newPath = currentURL.path.substring(0, (index - 1));  // Removes last / and anything after
      newPath = (newPath + newURL);
      currentURL.path = newPath;


    // If new URL does have a protocol, parse and assign values
    } else {
      // Set URL to lowercase to prevent problems
      newURL = newURL.toLowerCase();

      //
      // Parse URL for the protocol
      //
      if (newURL.contains("://")) {
        String[] x = newURL.split(":");
        scheme = x[0];
      }

      //
      // Parse URL for domain --> http://stackoverflow.com/questions/16673628/remove-url-prefix-from-string-http-www-etc
      //
      // Remove url prifix if present
      domainName = newURL.replaceFirst("^(http://www\\.|http://|www\\.)","");

      // If port specified, remove port and anything after
      if (domainName.contains(":")) {
        String[] x = domainName.split(":");
        domainName = x[0];

        // If no port, but path is specified, remove it
      } else if (domainName.contains("/")) {
        String[] x = domainName.split("/") ;
        domainName = x[0];
      }

      //
      // Parse URL for port and path
      //
      // Remove prefix from url
      String tmpUrl = newURL;
      tmpUrl = newURL.replaceFirst("^(http://www\\.|http://|www\\.)","");

      // IF path specified, assign and remove from tmpUrl
      if (tmpUrl.contains("/")) {
        String[] x = tmpUrl.split("/");
        tmpUrl = x[0];
        path = x[1];

        // If a port is specified, parse for it
        if (tmpUrl.contains(":")) {
          String[] y = tmpUrl.split(":");
          port = Integer.parseInt(y[1]);

          // If no port specified, default to 80
        } else {
          port = 80;
        }

        // IF no path specified, but port specified
      } else if (tmpUrl.contains(":")) {
        String[] x = tmpUrl.split(":");
        port = Integer.parseInt(x[1]);
        path = "/";

        // No path or port specified
      } else {
        port = 80;
        path = "/";
      }
    }
  }


  public String scheme() {
    return scheme;
  }
  public String domainName() {
    return domainName;
  }
  public int port() {
    return port;
  }
  public String path() {
    return path;
  }


  /**
   * Format this URL as a {@code String}
   * @return this URL formatted as a string.
   */
  public String toString() {
    // TODO:  Format this URL as a string
    String fullURL = scheme + "://" + domainName + ":" + port + path;
    return String.format(fullURL);
  }


  // Needed in order to use MyURL as a key to a HashMap
  @Override
  public int hashCode() {
    return toString().hashCode();
  }


  // Needed in order to use MyURL as a key to a HashMap
  @Override
  public boolean equals(Object other) {
    if (other instanceof MyURL_Shell) {
      MyURL_Shell otherURL = (MyURL_Shell) other;
      return this.scheme.equals(otherURL.scheme) &&
          this.domainName.equals(otherURL.domainName) &&
          this.port == otherURL.port() &&
          this.path.equals(otherURL.path);
    } else {
      return false;
    }
  }
} // end class
