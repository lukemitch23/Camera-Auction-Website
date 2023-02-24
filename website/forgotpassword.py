import smtplib
import sys
import os
import subprocess

def randompass():
    import random
    import string
    global result_str
    letters = string.ascii_letters
    # result_str = ''.join(random.choice(letters) for i in range(16))
    result_str = 'HelloWorld'
    key = '715655524310713512439317'
    plain_text_file = 'plain_text.txt'
    with open(plain_text_file, 'w') as f:
        f.write(result_str)
    encrypted_text_file = 'encrypted_text.txt'
    subprocess.call(['openssl', 'enc', '-e', '-aes-256-cbc', '-in', plain_text_file, '-out', encrypted_text_file, '-k', key, '-a', '-md', 'md5', '-nosalt'])
    with open(encrypted_text_file, 'r') as f:
        encrypted_text = f.read()
    os.remove(plain_text_file)
    os.remove(encrypted_text_file)
    return encrypted_text

def updatepassword(username, password):
    import mysql.connector
    db = mysql.connector.connect(
    host="localhost",
    user="server",
    passwd=("server123"),
    database="site")
    mycursor = db.cursor()
    sql = "UPDATE users SET password = '" + password + "' WHERE username = '" + username + "'"
    mycursor.execute(sql)
    db.commit()
    db.close()

def send_email(to, username, encusername):
    password = randompass()
    updatepassword(encusername, password)
    with smtplib.SMTP('smtp.gmail.com', 587) as smtp:
        smtp.ehlo()
        smtp.starttls()
        smtp.ehlo()
        smtp.login('cameraauctionwebsite@gmail.com' ,'xrvkyxrmvhsufnzj')
        subject = 'One Time Password'
        body = ('Your one time password is ' + result_str + ' \n Please enter this into the website to continue. \n If you did not request this password please ignore this email. \n Thank you very much,\n Camera Auction Website Team')
        footer = ('This email was sent by Camera Auction Website. \n If you have any questions please contact us at cameraauctionwebsite@gmail.com')
        msg = f'Subject: {subject}\n\n{body}\n\n{footer}'

        smtp.sendmail('cameraauctionwebsite@gmail.com', to, msg)

send_email(sys.argv[1], sys.argv[2], sys.argv[3])


