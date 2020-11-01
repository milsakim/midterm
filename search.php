<?php
  $title;
  $director;
  $year;
  $netflix = 0;
  $hulu = 0;
  $prime_video = 0;
  $disney_plus = 0;

  $title_query="";
  $director_query=" AND ";
  $year_query=" AND ";
  $netflix_query = " AND ";
  $hulu_query = " AND ";
  $prime_video_query = " AND ";
  $disney_plus_query = " AND ";

  if (isset($_POST['title'])) {
    $title = $_POST['title'];

    if (strlen($title) != 0) {
      $title_query .= "title LIKE '%{$title}%'";
    }
    else {
      $director_query = "";
    }
  }

  if (isset($_POST['director'])) {
    $director = $_POST['director'];

    if (strlen($director) != 0) {
      $director_query .= "director LIKE '%{$director}%'";
    }
    else {
      $director_query = "";
      $year_query = "";
    }
  }

  if (isset($_POST['year'])) {
    $year = $_POST['year'];

    if (strlen($year) != 0) {
      $year_query .= "year={$year}";
    }
    else {
      $year_query = "";
      $netflix_query = "";
    }
  }

  if (isset($_POST['netflix'])) {
    if ((strlen($title_query) != 0) || (strlen($director_query) != 0)) {
      $netflix_query = " AND ";
    }

    $netflix = 1;
    $netflix_query .= "netflix={$netflix}";
  }
  else {
    $netflix_query = "";
    $hulu_query = "";
  }

  if (isset($_POST['hulu'])) {
    if ((strlen($title_query) != 0) || (strlen($director_query) != 0) || (strlen($year_query) != 0)) {
      $hulu_query = " AND ";
    }
    $hulu = 1;
    $hulu_query .= "hulu={$hulu}";
  }
  else {
    $hulu_query = "";
    $prime_video_query = "";
  }

  if (isset($_POST['prime_video'])) {
    if ((strlen($title_query) != 0) || (strlen($director_query) != 0) || (strlen($year_query) != 0) || (strlen($netflix_query) != 0)) {
      $prime_video_query = " AND ";
    }

    $prime_video = 1;
    $prime_video_query .= "prime_video={$prime_video}";
  }
  else {
    $prime_video_query = "";
    $disney_plus_query = "";
  }

  if (isset($_POST['disney_plus'])) {
    if ((strlen($title_query) != 0) || (strlen($director_query) != 0) || (strlen($year_query) != 0) || (strlen($netflix_query) != 0) || (strlen($hulu_query) != 0)) {
      $disney_plus_query = " AND ";
    }

    $disney_plus = 1;
    $disney_plus_query .= "disney_plus={$disney_plus}";
  }
  else {
    $disney_plus_query = "";
  }

  $link = mysqli_connect("localhost", "root", "kimhj0314", "midterm");
  $query = "
    SELECT title, director, year, netflix, hulu, prime_video, disney_plus
    FROM movie
    WHERE {$title_query}{$director_query}{$year_query}{$netflix_query}{$hulu_query}{$prime_video_query}{$disney_plus_query}
    ORDER BY title
    ";
  $result = mysqli_query($link, $query);

  $movie_info = "";

  while ($row = mysqli_fetch_array($result)) {
    $movie_info .= "<tr>";
    $movie_info .= "<td>{$row['title']}</td>";
    $movie_info .= "<td>{$row['director']}</td>";
    $movie_info .= "<td>{$row['year']}</td>";

    if ($row['netflix'] == 0) {
      $movie_info .= "<td>X</td>";
    }
    else {
      $movie_info .= "<td>O</td>";
    }

    if ($row['hulu'] == 0) {
      $movie_info .= "<td>X</td>";
    }
    else {
      $movie_info .= "<td>O</td>";
    }

    if ($row['prime_video'] == 0) {
      $movie_info .= "<td>X</td>";
    }
    else {
      $movie_info .= "<td>O</td>";
    }

    if ($row['disney_plus'] == 0) {
      $movie_info .= "<td>X</td>";
    }
    else {
      $movie_info .= "<td>O</td>";
    }


    $movie_info .= "</tr>";
  }
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
  <h2><a href="index.php">Movies On Streaming Flatform</a></h2>
  <table border="1">
    <tr>
      <th>제목</th>
      <th>감독</th>
      <th>개봉연도</th>
      <th>Netflix</th>
      <th>Hulu</th>
      <th>Prime Video</th>
      <th>Disney+</th>
    </tr>
    <?=$movie_info?>
  </table>
</body>
</html>
