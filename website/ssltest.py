## encrypt a variable with openssl aes encryption

import os
import sys
import subprocess

def encrypt(plain_text):
    key = '715655524310713512439317'
    plain_text_file = 'plain_text.txt'
    with open(plain_text_file, 'w') as f:
        f.write(plain_text)
    encrypted_text_file = 'encrypted_text.txt'
    subprocess.call(['openssl', 'enc', '-e', '-aes-256-cbc', '-in', plain_text_file, '-out', encrypted_text_file, '-k', key, '-a', '-md', 'md5', '-nosalt'])
    with open(encrypted_text_file, 'r') as f:
        encrypted_text = f.read()
    os.remove(plain_text_file)
    os.remove(encrypted_text_file)
    return encrypted_text


print(encrypt(sys.argv[1]))
