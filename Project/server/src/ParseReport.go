package main
import (
      "strings"
      "gopkg.in/gomail.v2"
)


// Send email if report is bad
func statusCheck(h string, s string, t string) {
  if strings.Contains(s, "ok") {
    return

  } else {
    // Build message
    m := gomail.NewMessage()
    m.SetHeader("From", "alerts.team.it@gmail.com")
    m.SetHeader("To", "alerts.sirianni@gmail.com")
    m.SetHeader("Subject", "Host " + h + " has status " + s)
    m.SetBody("text/text", "alert")

    // Send alert
    //d := gomail.NewDialer("smtp.gmail.com", 587, "alerts.team.it@gmail.com", "")
    //if err := d.DialAndSend(m); err != nil {
    //  checkError(err)
    //}
  }

}
