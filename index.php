<?php

?>

<!DOCTYPE html>
<html>
<style>
  ul {
    list-style:none;
   }
</style>
<head>
    <meta charset="utf-8">
    <title>Movies On Streaming Flatform</title>
</head>
<body>
    <h1><a href="index.php">Movies On Streaming Flatform</a></h1>
    <form action="search.php" method="post">
      <ul>
        <li>
          <label for="title">제목</label>
          <input type="text" id="title" name="title">
        </li>
        <li>
          <label for="director">감독</label>
          <input type="text" id="director" name="director">
        </li>
        <li>
          <label for="year">개봉연도</label>
          <input type="text" id="year" name="year">
        </li>
        <li>
          <label>플랫폼
            <label><input type="checkbox" name="netflix">Netflix</label>
            <label><input type="checkbox" name="hulu">Hulu</label>
            <label><input type="checkbox" name="prime_video">Prime Video</label>
            <label><input type="checkbox" name="disney_plus">Disney+</label>
          </label>
        </li>
        <li><input type="submit" value="검색"></li>
      </ul>
    </form>
</body>
</html>
