/**
 * Represents a URL
 */
public class MyURL_Shell {
  private String scheme = "http";
  private String domainName = null;
  private int port = 80;
  private String path = "/";


  // Pass a URL that contains a domain at minimum
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
    if (domainName.contains(":") {
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
      port = x[1];
      path = "/";

    // No path or port specified
    } else {
      port = 80;
      path = "/";
    }
  } // End constructor


  
  /**
   * If {@code newURL} has a scheme (e.g., begins with "http://", "ftp://", etc), then parse {@code newURL} 
   * and ignore {@code currentURL}.  If {@code newURL} does not have a scheme, then assume it is intended 
   * to be a relative link and replace the file component of {@code currentURL}'s path with {@code newURL}.
   *
   * @param newURL     a {@code String} representing the new URL.
   * @param currentURL the current URL
   */
  public MyURL_Shell(String newURL, MyURL_Shell currentURL) {

    // TODO: If newURL has a scheme, then take the same action as the other constructor.
    // If newURL does not have a scheme
    // (1) Make a copy of currentURL
    // (2) Replace the filename (i.e., the last segment of the path) with the relative link.
    // See the test file for examples of correct and incorrect behavior.
    // Hint:  Consider using String.lastIndexOf
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
   *
   * @return this URL formatted as a string.
   */
  public String toString() {
    // TODO:  Format this URL as a string
    return String.format("");
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
