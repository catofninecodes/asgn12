<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Names</title>
</head>

<body>
  <?php
  include 'includes/functions.php';
  $fileName = 'names.txt';
  $fullNames = load_full_names($fileName);
  
  $firstNames = load_first_names($fullNames);
  $lastNames = load_last_names($fullNames);
  //dd($fullNames);
  
  //Get valid names
  for($i = 0; $i < sizeof($fullNames); $i++) {
    // jam the first and last name toghether without a comma, then test for alpha-only characters
    if(ctype_alpha($lastNames[$i].$firstNames[$i])) {
        $validFirstNames[$i] = $firstNames[$i];
        $validLastNames[$i] = $lastNames[$i];
        $validFullNames[$i] = $validLastNames[$i] . ", " . $validFirstNames[$i];
    }
}
    
//Get unique first names
    $countFirsts = array_count_values($firstNames);
    arsort($countFirsts);
    $commonFirstNames = array_slice(array_keys($countFirsts), 0, 10, true);
    
//Get unique last names
    $countLasts = array_count_values($lastNames);
    arsort($countLasts);
    $commonLastNames = array_slice(array_keys($countLasts), 0, 10, true);
    
    //Honestly no clue if this the right way to count the names. I found this function on StackOverflow searching something about 'best practices sort array php'. I changed the variable names and the count.//
  
  //Display results
  
  echo '<h1>Names - Results</h1>';
  
  echo '<h2>All Names</h2>';
  echo "<p>There are " . sizeof($fullNames) . " total names</p>";
  
  echo '<h2>All Valid Names</h2>';
  echo "<p>There are " . sizeof($validFullNames) . " valid names</p>";
  
  echo '<h2>Unique Names</h2>';
  $uniqueValidNames = (array_unique($validFullNames));
  echo ("<p>There are " . sizeof($uniqueValidNames) . " Unique names</p>");
  
echo '<h2>Most Common First Names</h2>';
echo '<ul style="list-style-type:none">';    
    foreach($commonFirstNames as $commonFirstName) {
        echo "<li>$commonFirstName</li>";
    }
echo "</ul>";
    
echo '<h2>Most Common Last Names</h2>';
    echo '<ul style="list-style-type:none">';    
    foreach($commonLastNames as $commonLastName) {
        echo "<li>$commonLastName</li>";
    }
echo "</ul>";

?>

</body>

</html>
