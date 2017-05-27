package main
import (
    _ "github.com/go-sql-driver/mysql"
    "database/sql"
)

// Write a report to the database
func writeToDatabase(h string, s string, t string) {


  // Connect to database
  dbconn, err := sql.Open("mysql", "reportuser:password@/report?charset=utf8")
  checkError(err)
  defer dbconn.Close()


  // Create table if not exist
  _, err = dbconn.Exec("CREATE TABLE IF NOT EXISTS reports " +
                       " (id int AUTO_INCREMENT PRIMARY KEY, " +
                       "hostname varchar(50), " +
                       "status varchar(10), " +
                       "timestamp varchar(50))")
  checkError(err)


  // Format the values by adding single quotes
  var vals = "'" + h + "'" + "," + "'" + s + "'" + "," + "'" + t + "'"

  // Exec insert
  _, err = dbconn.Exec("INSERT INTO reports (hostname,status,timestamp) VALUES (" + vals + ")")
  checkError(err)
}
