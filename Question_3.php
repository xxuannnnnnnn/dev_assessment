<h1>Question 3</h1>
<?php

echo "<form method='POST'>
	Name:<input type='text' name='name' required/>
	Gender:<input type='text' name='gender' required/>
  Mathematic Score:<input type='number' min='0' max = '100' name='math' required/>
  Science Score:<input type='number' min='0' max='100' name='science' required/>
	<input type='submit' name='submit'value='Submit'/>
</form>";

if (isset($_POST['submit'])) {

  function testSummary($array){
    $name = $_POST["name"];
  	$gender = $_POST["gender"];
    $mscore = $_POST["math"];
    $sscore = $_POST["science"];

    $array[] = $name;
    $array[] = $gender;
    $array[] = $mscore;
    $array[] = $sscore;
    $averagescore = ($mscore + $sscore) / 2;
    $part1 = " $array[0] has an average score of $averagescore from this test.";

    if($array[1]=='Female'){
      $pronoun = "she";
    }else {
      $pronoun = "he";
    }

    if($averagescore >= "50"){
      $part2 = "Overall, $pronoun is performing very well in this test.";
    } else {
      if($mscore < "50" && $sscore > "50"){
        $part2 = "However, $pronoun is not doing well for Mathematic subject.";
      }elseif ($sscore < "50" && $mscore > "50" ) {
        $part2 = "However, $pronoun is not doing well for Science subject.";
      } else {
        $part2 = "However, $pronoun is not doing well for Mathematic and Science subjects.";
      }
    }

    echo "$part1 $part2";
  }

  $array = array();
  testSummary($array);
}
?>
