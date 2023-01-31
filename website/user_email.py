import os
import sys

def send_email(to, username):
    import smtplib
    with smtplib.SMTP('smtp.gmail.com', 587) as smtp:
        smtp.ehlo()
        smtp.starttls()
        smtp.ehlo()
        smtp.login('cameraauctionwebsite@gmail.com' ,'xrvkyxrmvhsufnzj')
        subject = 'One Time Password'
        body = ('TEST')
        footer = ('TEst footer')
        msg = f'Subject: {subject}\n\n{body}\n\n{footer}'

        smtp.sendmail('cameraauctionwebsite@gmail.com', to, msg)

send_email(sys.argv[1], sys.argv[2])