import smtplib
fromMy = 'cameraauctionwesbite@yahoo.com' # fun-fact: "from" is a keyword in python, you can't use it as variable.. did anyone check if this code even works?
to  = 'lukemitchell3@icloud.com'
subj='TheSubject'
message_text='Hello Or any thing you want to send'

msg = "From: %s\nTo: %s\nSubject: %s\n\n%s" % ( fromMy, to, subj, message_text )
  
username = str('yourMail@yahoo.com')  
password = str('yourPassWord')  
  
try :
    server = smtplib.SMTP("smtp.mail.yahoo.com",587)
    server.login(username,password)
    server.sendmail(fromMy, to,msg)
    server.quit()    
    print ("ok the email has sent")
except:
    print ("can't send the email")