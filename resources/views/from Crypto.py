from Crypto.Cipher import AES
from Crypto.Util.Padding import pad, unpad
from Crypto.Random import get_random_bytes

# Fungsi untuk enkripsi dan dekripsi menggunakan AES-CBC
def aes_cbc_encrypt_decrypt(data, secret_key, is_encrypt=True):
    key = (secret_key[:16] if len(secret_key) >= 16 else secret_key.ljust(16, '0')).encode()
    if is_encrypt:
        iv = get_random_bytes(AES.block_size)
        cipher = AES.new(key, AES.MODE_CBC, iv)
        encrypted_data = cipher.encrypt(pad(data.encode(), AES.block_size))
        return iv + encrypted_data
    else:
        iv = data[:AES.block_size]
        cipher = AES.new(key, AES.MODE_CBC, iv)
        decrypted_data = cipher.decrypt(data[AES.block_size:])
        return unpad(decrypted_data, AES.block_size).decode()

# Mengambil input dari pengguna
plain_text_input = input("Masukkan teks asli: ")
key_input = input("Masukkan kunci (min 8 karakter): ")

# Proses enkripsi
cipher_text = aes_cbc_encrypt_decrypt(plain_text_input, key_input, is_encrypt=True)
print("Teks terenkripsi (hex):", cipher_text.hex())

# Proses dekripsi
plain_text_output = aes_cbc_encrypt_decrypt(cipher_text, key_input, is_encrypt=False)
print("Teks setelah dekripsi:", plain_text_output)
