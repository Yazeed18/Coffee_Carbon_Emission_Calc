## Note: Numbers and values do not reflect any actual data and are arbitrarily chosen for the purpose of this repo. 



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

## Carbon Emission for Cup Sizes

There are 5 variables `$s, $m, $l, $xl, $xxl` each corresponding to their respective cup sizes listed in order for the selection where `$s` represents the smallest 8oz size all the way to `$xxl` which represents the largest 20oz size. The values listed in the `webpage.php` file are derived from a research paper (https://www.huhtamaki.com/globalassets/global/highlights/responsibility/taking-a-closer-look-at-paper-cups-for-coffee.pdf) which states that the Carbon footprint for a regular paper cup is approximately 8.1g CO<sub>2</sub>eq. This value was used to determine respective Carbon footprint values for the 5 cup sizes listed on the website linearly. 
###### Note: This may not be the most accurate values for these cup sizes as the brand was not considered as well as if the Carbon footprint for cup sizes are done on a linear scale.  

## CO₂ emission values for 100ml of Coffee

The variables listed in `webpage.php` file for 100ml of Coffee are for plain coffee meaning no sugar or milk is added. These values are referenced from https://www.appropedia.org/LCA_of_coffee (Table 3) which shows the CO₂ emission for the different processes that make 100ml of coffee.

## Cup Factors

There are 5 cup sizes and as such 5 cup factor variables which is simply the ml of the cup divided by 100. This is so because the CO₂ emission found for plain coffee without sugar and milk was for 100ml, as such the cup factors multiplied by these values will give the CO₂ emission for plain coffee of its respective cup size. 

## Sugar CO₂ Factor

In the `webpage.php` file is the value `0.392` for the `$sugartotal` variable. This value derives from https://www.e3s-conferences.org/articles/e3sconf/pdf/2018/06/e3sconf_icenis2018_04011.pdf page 3, Table 1, No 2 where it states 196kg CO₂ is emitted into air per tonne of raw cane sugar. Using this, `0.392` was found to represent the CO₂ emission value for 2g of sugar. 

## Milk CO₂ Factor

In the `webpage.php` file is the value `22.24739932` for the `$milktotal` variable. This value derives from https://www.fao.org/3/k7930e/k7930e00.pdf page 33, Table 4.1 under Milk where it states 2.4 kg CO₂eq emission per kg of milk. Using this, `22.24739932` was determined to represent the CO₂ value for 9ml of milk. As we assume one shot of milk is approximately 9ml. 

## Tabular Result

The results are only shown in the `php` file and not in the landing (`html`) page. This is so that the user can see a breakdown of CO₂ emissions on submission after inputting their values. The table showcases a breakdown of the Coffee processes and its CO₂ emissions which accounts for the size of the cup the user chose whether reusable or not. It then states the CO₂ emission for cup, sugar and milk. The CO₂ emission for cup is 0 if the user chose `Yes!` for the reusable cup option and 0 for sugar and milk if nothing is input or the user input 0. The results have also been typecast to be `int` rather than floating point numbers to help with readibility except for the sugar CO₂ emission which is rounded to 1 decimal place since the value for 1 or 2 packets of sugar will be set to 0 upon typecasting. 

## Options are shown after submission

Upon submission, the values and selections the user chose are still shown. This is because it makes it easier for the user to see what they had input and make minor changes to note a difference in their CO₂ emission. This is implemented in the `webpage.php` file. 
- For the selection elements, inside the option tag is `?php if (isset($_POST['reusable']) && ($_POST['reusable']=='YesReusable')){echo 'selected="selected"';} ?` (example from reusable cup question). The `echo 'selected="selected"'` displays the value the user chose. This is done respectively for each option in the selections. 
- For the input elements, it is done differently where inside the input tag is `value="<?php if (isset($_POST['milk'])){echo htmlentities ($_POST['milk']);} else{0;}?>"` (example from milk input). The `echo htmlentities ($_POST['milk'])` displays the value the user input. If nothing is input, it has a value of 0. This is done for both sugar and milk input respectively. 

## Submit Button

Lastly, the submit button has a special purpose in the `webpage.php` file where the `name` of the button is used to ensure that it was pressed. This is done using the `isset($_POST['submit'])` which ensures that it was pressed. This is used throughout the `php` file to ensure that certain calculations and results can be done only after the user has submitted their response. 

## Style and Design

The main styling and design was done using CSS and all the classes throughout the `html` and `php` files are found in the `App.css` file. The current design is not set and finalised but is free to be altered, changed or remade to better suit the true purpose of the website. This was done to have a foundation and easily identifiable div elements when making the website. 

# Recommendations and moving forward

- The current website is not one which achieved our original project statement. Ideally, we would have proper and correct information for the coffee stores here on UW campus but these values are all subject to change if this project was to be done for the UW campus coffee stores. The different variables listed in the `php` such as the CO₂ emission values for the different cup sizes, coffee processes, milk and sugar will all need to be changed to accommodate for accurate values which will be dependent on the brand the UW campus coffee stores use. This is the main recommendation for moving forward with this calculator. 
- In terms of details the user inputs, upon further development of this calculator, it would be nice if the user can have options of the different stores on campus, their preferred brew (dark, light, medium etc...) if applicable, lids for cups as well as options for set coffee types (cappuccino, americano, latte etc...). The idea is to have a basic calculator similar to what is currently set up and an advanced option which would allow the user to have more selections and inputs. 
- Results should be basic and user friendly in showcasing the main features of the cup of coffee. The table is very detailed and can be even more so if more options are to be added as well as the processes in the making of the cup, sugar and milk. Hence, a pie chart which will help showcase the biggest contributors to the user's cup of coffee CO₂ emission. 
