# Prerequisites
- PHP  
	-https://www.php.net/downloads for Windows
	
	-https://www.ergonis.com/products/tips/install-php-on-macos.php for Mac
- Terminal or Command Prompt
- Code Editor 

# Running the Website
After installing php on your system and downloading the `public` folder which contains all the necessary files, go into terminal or command prompt and `cd` into this directory and run the folder using PHP to locally host on a localport. 

```
cd ~/public
php -S localhost:8000
```
Then go to your browser and search 
`localhost:8000`

This will launch the landing page (`index.html`) of the website and on submission will load the php webpages for further testing and development. 

# Application Interface

## Selections

The select options are straightforward and don't have much explanation to do in the `index.html` file. However, in the `webpage.php` file, two variables `$reusable` and `$size_val` are used for reusable cup question and size of cup respectively to hold the `value` mentioned in the `index.html` file. These variables are then used for certain conditions to determine quantities and amounts later on. 

## Inputs

The input elements in the `index.html` as well as the `webpage.php` file have certain rules that are to be followed by the user
- Only numeric inputs are to be submitted (`inputmode="numeric"`)
- Max input can only be 4 characters (`maxlength="4"`
- Decimal is allowed (`pattern="^\d{0,4}(?:\.\d{0,4})?$"`)
- Default value is 0 if no input is made (`value="<?php if (isset($_POST['milk'])){echo htmlentities ($_POST['milk']);} else{0;}?>"`)
- Throws an error if the format is incorrect
```js
oninvalid="this.setCustomValidity('Please Enter Positive Numbers Only')"
onchange="try{setCustomValidity('')}catch(e){}" 
oninput="setCustomValidity('')"
```

There are two variables in the `webpage.php` file which holds the `value` of the user inputs for sugar (`$sugar_val`) and milk (`$milk_val`). These values are then used for calculations to determine the CO<sub>2</sub> emission for sugar and milk. 
