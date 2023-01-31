import random
import string
import subprocess
import os
import sys

result_str = input("Enter a string: ")
print("The string you entered is: ", result_str)

letters = string.ascii_letters
key = '715655524310713512439317'
plain_text_file = 'plain_text.txt'
with open(plain_text_file, 'w') as f:
    f.write(result_str)
encrypted_text_file = 'encrypted_text.txt'
subprocess.call(['openssl', 'enc', '-e', '-aes-256-cbc', '-in', plain_text_file, '-out', encrypted_text_file, '-k', key, '-a', '-md', 'md5', '-nosalt'])
with open(encrypted_text_file, 'r') as f:
    encrypted_text = f.read()

print(encrypted_text)
os.remove(plain_text_file)
os.remove(encrypted_text_file)
