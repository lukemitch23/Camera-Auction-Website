import smtplib
import sys
import os
import subprocess
# import mysql.connector

def decrypt(username):
    ## decrypt the ssl encryption of the inputs
    key = '715655524310713512439317'
    encrypted_text_file = 'encrypted_text.txt'
    with open(encrypted_text_file, 'w') as f:
        f.write(username)
    plain_text_file = 'plain_text.txt'
    subprocess.call(['openssl', 'enc', '-d', '-aes-256-cbc', '-in', encrypted_text_file, '-out', plain_text_file, '-k', key, '-a', '-md', 'md5', '-nosalt'])
    with open(plain_text_file, 'r') as f:
        username = f.read()
    os.remove(plain_text_file)
    os.remove(encrypted_text_file)
    print(username)


def listinginfo(listingid):
    db = mysql.connector.connect(
    host="localhost",
    user="server",
    passwd=("server123"),
    database="site")
    mycursor = db.cursor()
    sql = f"SELECT * FROM listings WHERE listingid = '{listingid}'"
    mycursor.execute(sql)
    listing = mycursor.fetchall()
    sql = f"SELECT * FROM users WHERE userid = '{listing[0][8]}'"
    mycursor.execute(sql)
    user = mycursor.fetchall()
    decrypt(user[0][1],user[0][3])
    send_email(listing[0][1],listing[0][2],listing[0][3],)

def send_email(make,model,price,username,to):
    with smtplib.SMTP('smtp.gmail.com', 587) as smtp:
        smtp.ehlo()
        smtp.starttls()
        smtp.ehlo()

        smtp.login('cameraauctionwebsite@gmail.com' ,'xrvkyxrmvhsufnzj')
        subject = 'One Time Password'
        body = ('Your one time password is ' + password + ' \n Please enter this into the website to continue. \n If you did not request this password please ignore this email. \n Thank you very much,\n Camera Auction Website Team')
        footer = ('This email was sent by Camera Auction Website. \n If you have any questions please contact us at cameraauctionwebsite@gmail.com')
        msg = f'Subject: {subject}\n\n{body}\n\n{footer}'

        smtp.sendmail('cameraauctionwebsite@gmail.com', to, msg)
    print("Mail sent")

decrypt(sys.argv[1])
