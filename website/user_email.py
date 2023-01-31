import os
import sys

def send_email(to, username, password):
    import smtplib
    with smtplib.SMTP('smtp.gmail.com', 587) as smtp:
        smtp.ehlo()
        smtp.starttls()
        smtp.ehlo()
        smtp.login('cameraauctionwebsite@gmail.com' ,'xrvkyxrmvhsufnzj')
        subject = 'One Time Password'
        body = (f'Your new password is: {password} \n Please enter this into the website to continue. \n If you did not request this password please ignore this email. \n Thank you very much,\n Luke')
        footer = ('Testing')
        msg = f'Subject: {subject}\n\n{body}\n\n{footer}'

        smtp.sendmail('cameraauctionwebsite@gmail.com', to, msg)

send_email(sys.argv[1], sys.argv[2], sys.argv[3])