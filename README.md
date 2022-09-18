## Note: Numbers and values do not reflect any actual data and are arbitrarily chosen for the purpose of this repo. 
 
## Background

- Responsive website built using PHP as the backend with HTML/CSS as the frontend. 

- The main goal of the website is to determine a user's coffee order carbon footprint. This was done as an initiative to bring about awareness to reducing carbon emissions producded by the coffee industry and highlight every aspect of a person's coffee order and its contribution to carbon emissions. The calculator details to the user where and how much of carbon emission is being output from their choices and allows them to configure their order such that they can bring about small reduction in their carbon footprint. 

- The target audience for this are students of the university and further development done by the university will look to work upon this calculator and make it more focused on campus coffee shops as to help the university be more environmentally conscience. 

## Website info
- The website takes in basic user inputs about their coffee order and displays detailed information of the Carbon footprint of their coffee order in the form of a table. 
    
![Intro_basic use](https://user-images.githubusercontent.com/45414646/190929845-d36aafdc-1a19-4da8-b261-d05f0582ab7f.gif)

## User Input

- The input boxes have restrictions on them where the user can only enter a maximum of 4 characters. These characters can only be numbers (0-9) as well one decimal point such that it is a proper floating point number. This was done using a regex pattern. 

-# Error check showcasing that only 4 characters allowed such that they must be positive numbers only.

![error check_1](https://user-images.githubusercontent.com/45414646/190930580-022e4b71-6097-4764-aaee-f6e73df57ef1.gif)

-# Proper decimal placement being shown versus error check of improper decimal point use.

![decimal_use](https://user-images.githubusercontent.com/45414646/190930285-c6db7200-d649-4ee1-98c4-8a74200a185f.gif)

![error check_2](https://user-images.githubusercontent.com/45414646/190929685-47bc0624-c35a-4b5a-a461-f7dd12957d13.gif)

## Website memory

- The inputs are also remembered upon submission meaning if the user wants to make a slight change to their order they can do so easily without having to re-enter their entire order. 

-# User is able to change their order by switching to a reusable cup and noticing the difference in their Carbon emission. 


