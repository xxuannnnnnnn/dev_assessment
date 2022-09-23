<h1>Question 4</h1>
<?php

echo "<form method='POST' name='rollform'>
  Roll:<input type='submit' name='roll' value='Roll'/>
</form>";

echo "<form method='POST' name='addform'>
	Item Rarity:<input type='number' name='item_rarity' />
	Vip Rank:<input type='text' name='vip_rank' />
	<input type='submit' name='add' value='Add'/>
</form>";

$vip_ranks = array("vip1","vip2","vip3");
$items = array("1","2","3","4","5");

// foreach ($vip_ranks as $key) {
//   echo "$key";
// };


if (isset($_POST['roll'])) {


}elseif(isset($_POST['add'])) {
  $item_rarity = $_POST["item_rarity"];
  $vip_rank = $_POST["vip_rank"];

  if(isset($vip_rank)){
    //$vip_ranks[array("$vip_rank"=> array())];
    array_push($vip_ranks,"$vip_rank");
    print_r($array);
  }elseif (isset($item_rarity)) {
    array_push($items,"$item_rarity");
    print_r($items);
  }else{
    echo "No value entered!";
  }
}

function roll_item($vip_rank){
  //$vip_ranks = array("vip1","vip2","vip3");

  $array = array(
    "vip1" => array(),
    "vip2" => array(),
    "vip3" => array());
}



?>
