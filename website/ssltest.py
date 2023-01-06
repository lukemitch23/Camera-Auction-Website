import json
import binascii
from Crypto.Cipher import AES
from Crypto import Random
import base64

def my_encrypt(data, passphrase):
    try:
        key = binascii.unhexlify(passphrase)
        pad = lambda s : s+chr(16-len(s)%16)*(16-len(s)%16)
        iv = Random.get_random_bytes(16)
        cipher = AES.new(key, AES.MODE_CBC, iv)
        encrypted_64 = base64.b64encode(cipher.encrypt(pad(data).encode())).decode('ascii')
        iv_64 = base64.b64encode(iv).decode('ascii')
        json_data = {}
        json_data['iv'] = iv_64
        json_data['data'] = encrypted_64
        clean = base64.b64encode(json.dumps(json_data).encode('ascii'))
    except Exception as e:
        print("Cannot encrypt datas...")
        print(e)
        exit(1)
    return clean


my_encrypt()