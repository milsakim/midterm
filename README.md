# 스트리밍 플랫폼에 있는 영화 검색 웹 페이지

## 개발 환경 소개
### 데이터베이스: MySQL
* 수업에서 다뤄본 데이터베이스인 MySQL과 MariaDB 중 어느 것을 선택해야할지 고민함.
* 2020년 11월 1일 기준으로 [RDBMS 랭킹](https://db-engines.com/en/ranking/relational+dbms)을 보면 MySQL이 2위이고 MariaDB는 8위임.
* MySQL은 MariaDB보다 딕셔너리와 같은 메타데이터 부분에서 더 강력한 기능을 가지고 있다고 함.
* MariaDB가 MySQL과 비교해 INSERT 같은 것을 수행할 때 24% 더 빠르다고 함.
* 데이터의 양이 많으면 MySQL보다 MariaDB를 사용하는게 더 유리하다는 의견도 하나 봤는데([하지만 NASA도 MySQL을 사용함.](https://www.mysql.com/customers/)) 대다수의 다큐먼트들에서 MariaDB는 MySQL의 fork 버전이기 때문에 거의 비슷하다는 의견이 많았음.
* 일단 데이터베이스 엔진을 선택하는 기준은 자신이 어떤 종류의 데이터를 어느 규모로 다룰 것인지라고 함. 이것에 따라 같은 데이터베이스 엔진도 다른 성능을 낼 수 있다고 함.
* 내가 다룰 데이터셋은 굉장히 소규모이기 때문에 어떤 데이터베이스를 사용해도 크게 성능 차이가 나지 않을거라고 판단함.
* 그래서 Oracle에서 책임지고 버전 관리를 해주고 있으며 원조격인 MySQL을 한 번 더 사용해보기로 함.
* MariaDB는 앞서 말했지만 MySQL의 fork 버전이기 때문에 완벽하게 호환됨. 나중에 MariaDB로 바꾸고 싶으면 언제든지 가능함.

### 서버 사이드 언어: PHP
* 사용할줄 아는 서버 사이드 스크립트 언어가 PHP밖에 없어서 선택지가 없었음.

### 클라이언트 사이드 언어: HTML
* CSS도 1학년 때 간단하게 배웠었으나 하나도 기억이 나질 않아 어쩔 수 없이 HTML만 사용함.

### 웹 서버: Apache
* Apache는 Linux 계열의 운영체제에서 NCSA httpd라는 초창기 웹 서버를 돌리는 것을 타겟팅하여 개발되었기 때문에 Linux 계열의 운영체제와 함께 할 때 가장 좋다고 함.
* 현재 맥을 사용하고 있어서 굳이 Ubuntu를 사용하지 않고 Mac OS에서 Apache를 사용함.
* Apache, MySQL, PHP를 세트로 묶어서 AMP라고 부르는데 나는 Mac OS에서 AMP를 사용하므로 MAMP임.

## 사용한 데이터 셋: Movies on Netflix, Prime Video, Hulu and Disney+
* https://www.kaggle.com/ruchi798/movies-on-netflix-prime-video-hulu-and-disney
* 나는 Netflix, Prime Video, Hulu, Disney+에 있는 영화에 관한 데이터 셋을 선택함.
* kaggle에서 다운로드 받아 csv 파일을 load하는 방식으로 함.


## 발견한 정보 3가지: 제목, 감독, 개봉연도, 플랫폼
* 검색하는 사람이 다양하게 검색 조건을 조합할 수 있도록 하는 것이 더 맞다고 판단함.
* 영화 제목, 감독, 개봉연도, 플랫폼을 선택할 수 있음.
* 간단한 경우의 수 계산을 해보면 가능한 조합은 2 x 2 x 2 x (1 + 4 + 12 + 24 + 1) = 336가지가 됨.
* 제목과 감독은 정확한 제목이나 이름이 아닌 단어만 넣어도 해당 단어를 포함하는 모든 영화를 찾아줌.
* 플랫폼은 체크박스로 꼭 포함하고 싶은 플랫폼을 여러 개 선택할 수 있음

## 시연 영상
[![](http://img.youtube.com/vi/b05k5rehqds/0.jpg)](http://www.youtube.com/watch?v=b05k5rehqds "")
