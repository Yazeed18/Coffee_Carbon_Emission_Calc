#Variable values have been changed to avoid copyright issues with the university as well as research authors

<?php
$reusable = isset($_POST['reusable']) ? $_POST['reusable'] : "<script type='text/javascript'>alert('Please select Yes or No');</script>";
$size_val = isset($_POST['size']) ? $_POST['size'] : "<script type='text/javascript'>alert('Please select a size');</script>";
$sugar_val = isset($_POST['sugar']) ? $_POST['sugar'] : "<script type='text/javascript'>alert('Please enter number of shots of milk');</script>";
$milk_val = isset($_POST['milk']) ? $_POST['milk'] : "<script type='text/javascript'>alert('Please enter number of shots of milk');</script>";

//Carbon Emission values in g CO₂ for each size of cup based on 8oz paper cup carbon emission value of (redacted) g CO₂
$s = 1;
$m = 2;
$l = 3;
$xl = 4;
$xxl = 5;

//Carbon Emission values in g CO₂ per 100ml of Coffee
$planting = 2;
$brewing = 4;
$washing = 6;
$distribution = 8;
$processing = 10;
$packaging = 12;
$delivery = 14;
$treatment = 16;
$cultivation = 18;
$eol_wastes = -5;

//Check to see if submit button was pressed and if it's not a reusable cup
if (isset($_POST['submit'])){
  if($reusable == "NoReusable"){
    if($size_val == "Small"){
      $cup_value = $s;
      $cup_factor = 2.37;
    }
    else if($size_val == "Medium"){
        $cup_value = $m;
        $cup_factor = 2.96;
    }
    else if($size_val == "Large"){
        $cup_value = $l;
        $cup_factor = 3.54;
    }
    else if($size_val == "X-Large"){
        $cup_value = $xl;
        $cup_factor = 4.73;
    }
    else{
      $cup_value = $xxl;
      $cup_factor = 5.91;
    }
  }
  //Reusable cup is used here
  else{
    $cup_value = 0;
    if($size_val == "Small"){
      $cup_factor = 2.37;
    }
    else if($size_val == "Medium"){
        $cup_factor = 2.96;
    }
    else if($size_val == "Large"){
        $cup_factor = 3.54;
    }
    else if($size_val == "X-Large"){
        $cup_factor = 4.73;
    }
    else{
      $cup_factor = 5.91;
    }
  }
}

//total CO₂ emission for 100ml of Coffee multiplied by the cup_factor which gives the resulting CO₂ emission for that size of black coffee without any addition of milk and sugar
$coffeetotal = ($planting + $brewing + $washing + $distribution + $processing + $packaging + $delivery + $treatment
               + $cultivation + $eol_wastes) * $cup_factor;

//$sugartotal = $sugar_val * 5;
//5 is the CO₂ emission for 2g of sugar
if($sugar_val == NULL){
  $sugartotal = 0;
}else{
  $sugartotal = $sugar_val * 5;
}
//$milktotal = $milk_val * 12;
//12 is the CO₂ emission for 9ml of milk
if($milk_val == NULL){
  $milktotal = 0;
}
else{
  $milktotal = $milk_val * 12;
}

//Total Carbon Emission for one cup of Coffee
$message = (int)($cup_value + $milktotal + $sugartotal + $coffeetotal);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="./App.css" />
    <link rel="stylesheet" type="text/css" href="./index.css" />
    <title>Coffee Carbon Emission Calculator</title>
  </head>
  <body>
    <h1 class="web_header">Carbon Emission Calculator</h1>
    <div class="web_main">
      <form name="calc_carbon" method="post" action="#">
        <div class="options">
          <div class="question">
          <label class="labels">Reusable Cup?</label>
          </div>
          <div class="response">
          <select class="dropdown" className="reusable" name="reusable" id="reusable">
            <option value="YesReusable" <?php if (isset($_POST['reusable']) && ($_POST['reusable']=='YesReusable')){echo 'selected="selected"';} ?>>Yes!</option>
            <option value="NoReusable" <?php if (isset($_POST['reusable']) && ($_POST['reusable']=='NoReusable')){echo 'selected="selected"';} ?>>No</option>
          </select></div><br><br>
          </div>
        <div class="options">
          <div class="question">
          <label class="labels">Choose Coffee Cup Size:</label>
          </div>
          <div class="response">
          <select class="dropdown" className="size" name="size" id="size">
            <option value="Small" <?php if (isset($_POST['size']) && ($_POST['size']=='Small')){echo 'selected="selected"';}?>>8oz/237ml</option>
            <option value="Medium" <?php if (isset($_POST['size']) && ($_POST['size']=='Medium')){echo 'selected="selected"';}?>>10oz/296ml</option>
            <option value="Large" <?php if (isset($_POST['size']) && ($_POST['size']=='Large')){echo 'selected="selected"';}?>>12oz/354ml</option>
            <option value="X-Large" <?php if (isset($_POST['size']) && ($_POST['size']=='X-Large')){echo 'selected="selected"';}?>>16oz/473ml</option>
            <option value="XX-Large" <?php if (isset($_POST['size']) && ($_POST['size']=='XX-Large')){echo 'selected="selected"';}?>>20oz/591ml</option>
          </select></div><br><br>
        </div>
    <div class="options2">
      <div>
      <label class="labels2">Enter Number of packets of Sugar(2g)</label>
      </div>
      <div class="input">
      <input name="sugar" type="text" maxlength="4" pattern="^\d{0,4}(?:\.\d{0,4})?$" oninvalid="this.setCustomValidity('Please Enter Positive Numbers Only')"
      onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity('')" inputmode="numeric" class="textbox" placeholder="Number of packets of Sugar" value="<?php if (isset($_POST['sugar'])){echo htmlentities ($_POST['sugar']);} else{0;}?>"></div><br><br>
    </div>
    <div class="options2">
      <div>
      <label class="labels2">Enter Number of shots of Milk</label>
      </div>
      <div class="input">
      <input name="milk" type="text" maxlength="4" pattern="^\d{0,4}(?:\.\d{0,4})?$" oninvalid="this.setCustomValidity('Please Enter Positive Numbers Only')"
      onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity('')" inputmode="numeric" class="textbox" placeholder="Number of shots of Milk" value="<?php if (isset($_POST['milk'])){echo htmlentities ($_POST['milk']);} else{0;}?>"></div><br><br>
    </div>
    <div class="buttons">
      <button type="submit" name="submit" class="button" id="press">Submit</button>
    </div>
    </form>
    <div class="table_element">
    <table border="1">
      <caption>Results of your cup of Coffee</caption>
      <tbody><tr class="headings_table">
        <th>Product</th>
        <th>Process</th>
        <th>Results/g CO₂eq per unit</th></tr>
        <tr>
          <th rowspan="10" style="color:aqua; font-size:18pt; background-color: blue;">Coffee</th>
          <th>Planting</th>
          <th><?php if (isset($_POST['submit'])){echo (int)($cup_factor * $planting);}?></th>
        </tr>
        <tr>
          <th>Brewing</th>
          <th><?php if (isset($_POST['submit'])){echo (int)($cup_factor * $brewing);}?></th>
        </tr>
        <tr>
          <th>Washing</th>
          <th><?php if (isset($_POST['submit'])){echo (int)($cup_factor * $washing);}?></th>
        </tr>
        <tr>
          <th>Distribution</th>
          <th><?php if (isset($_POST['submit'])){echo (int)($cup_factor * $distribution);}?></th>
        </tr>
        <tr>
          <th>Processing</th>
          <th><?php if (isset($_POST['submit'])){echo (int)($cup_factor * $processing);}?></th>
        </tr>
        <tr>
          <th>Packaging</th>
          <th><?php if (isset($_POST['submit'])){echo (int)($cup_factor * $packaging);}?></th>
        </tr>
        <tr>
          <th>Delivery</th>
          <th><?php if (isset($_POST['submit'])){echo (int)($cup_factor * $delivery);}?></th>
        </tr>
        <tr>
          <th>Treatment</th>
          <th><?php if (isset($_POST['submit'])){echo (int)($cup_factor * $treatment);}?></th>
        </tr>
        <tr>
          <th>Cultivation</th>
          <th><?php if (isset($_POST['submit'])){echo (int)($cup_factor * $cultivation);}?></th>
        </tr>
        <tr>
          <th>End of Life Wastes</th>
          <th><?php if (isset($_POST['submit'])){echo (int)($cup_factor * $eol_wastes);}?></th>
        </tr>
        <tr>
          <th rowspan="3" style="color:aqua; font-size:18pt; background-color: blue;">Others</th>
          <th>Cup and Coffee Equipment Manufacture</th>
          <th><?php if (isset($_POST['submit'])){echo (int)$cup_value;}?></th>
        </tr>
        <tr>
          <th>Sugar</th>
          <th><?php if (isset($_POST['submit'])){echo round($sugartotal,1);}?></th>
        </tr>
        <tr>
          <th>Milk</th>
          <th><?php if (isset($_POST['submit'])){echo (int)$milktotal;}?></th>
        </tr>
          <th colspan="2" style="color:lightgreen; background-color:dodgerblue; font-size:19pt;">Total CO₂ emission is:</th>
          <th><?php if(isset($_POST['submit'])){echo $message;}?></th>
        </tr>

      </tr></tbody>
    </table>
    </div>
    </div>
    </div>
  </body>
</html>
