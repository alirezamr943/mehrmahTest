As you said we need to solve this problem with two other scenario:
- n + 1 query 
- sorting/orderBy (i added the depth param for this)

For testing this project project 
1. `docker compose up`
2. make some topics throuse store/topic api
3. use auto question creator to make questions for each topic
4. get the hierarcchical data through hierarcical/data/{id} api

there was two mistakes during the session:
1. docker issue (i fixed this)
2. it was about recursion and iteration - instead of sending an array for recurssion i did iterate before sendig them for recurssion 