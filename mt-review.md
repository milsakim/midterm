# 중간고사 대체 과제 회고록

## 1. 새로 배운 내용
### csv 파일 MySQL 테이블에 load하기
* 일단 load하려는 csv 파일과 동일한 구조의 테이블이 필요함.
* 그리고 아래 명령을 MySQL에 입력하면 됨.
```PHP
LOAD DATA LOCAL INFILE 'load하려는 csv 파일 경로'
INTO TABLE 데이터베이스.테이블
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;
```

## 2. 발생한 문제 & 해결 과정
### csv 파일 MySQL 테이블에 load하기
* `LOAD DATA` 명령을 사용하려고 하니 해당 파일이 없다는 에러가 계속 나왔음(파일이 있는데 왜 자꾸 없다고 하니!).
* 에러 메세지를 구글링해서 몇 가지 방법을 찾아냄.
* 먼저 `secure_file_priv`에 내가 로드하려는 파일이 있는 디렉토리 경로를 설정함.
* 디렉토리 경로를 설정하는 방법은 my.cnf 파일을 수정하면 됨.
* 그 다음에 `local_infile`을 ON 시켜주면 됨.

## 3. 참고할만한 내용
* https://stackoverflow.com/questions/59993844/error-loading-local-data-is-disabled-this-must-be-enabled-on-both-the-client
* https://stackoverflow.com/questions/63361962/error-2068-hy000-load-data-local-infile-file-request-rejected-due-to-restrict
* https://moonlighting.tistory.com/140
* https://medium.com/@andrewpongco/solving-the-mysql-server-is-running-with-the-secure-file-priv-option-so-it-cannot-execute-this-d319de864285

## 4. 회고
* (+) 여러가지 검색 조건을 처리해서 SQL문으로 만드는 부분에서 애를 먹었으나 잘 처리함.
* (-) 웹 페이지 모양이 예뻤으면 좋았을텐데 신경쓰지 못해서 아쉬움.
* (!) 내가 처음으로 혼자서 아무것도 없이 만들어본 웹페이지라 신기함.
