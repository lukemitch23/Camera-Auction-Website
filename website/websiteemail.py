import smtplib
import sys

def randompass():
    import random
    import string
    letters = string.ascii_letters
    result_str = ''.join(random.choice(letters) for i in range(16))
    import base64
    from Crypto.Cipher import AES

    ciphering = "AES-128-CTR"
    iv_length = 16
    options = 0
    encryption_iv = b'1234567891011121'
    encryption_key = b'715655524310713512439317'

    # pad the plaintext to a multiple of 16 bytes
    plaintext = result_str.encode()
    padding_length = 16 - (len(plaintext) % 16)
    plaintext += b' ' * padding_length

    # create the cipher object and encrypt the plaintext
    cipher = AES.new(encryption_key, AES.MODE_CTR, encryption_iv)
    encryptor = cipher.encryptor()
    encrypted_uname = encryptor.update(plaintext) + encryptor.finalize()

    # encode the encrypted message in base64
    encrypted_uname = base64.b64encode(encrypted_uname)
    return encrypted_uname

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

def send_email(to, username):
    password = randompass()
    updatepassword(username, password)
    with smtplib.SMTP('smtp.gmail.com', 587) as smtp:
        smtp.ehlo()
        smtp.starttls()
        smtp.ehlo()

        smtp.login('cameraauctionwebsite@gmail.com' ,'xrvkyxrmvhsufnzj')
        subject = 'One Time Password'
        body = ('Your one time password is ' + password + ' \n Please enter this into the website to continue. \n If you did not request this password please ignore this email. \n Thank you very much,\n Luke')
        footer = ('This email was sent by Camera Auction Website. \n If you have any questions please contact us at cameraauctionwebsite@gmail.com')
        msg = f'Subject: {subject}\n\n{body}\n\n{footer}'

        smtp.sendmail('cameraauctionwebsite@gmail.com', to, msg)
    print("Mail sent")

send_email(sys.argv[1], sys.argv[2])


