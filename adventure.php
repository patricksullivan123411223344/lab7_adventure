<?php 

    /*
          TO DO:
            1. Check if a cookie for the user's name exists.
              - If it exists, store its value in a variable.
              - If it does not exist, set the variable to a placeholder name to use in your story.
              
            2. Get the current page number from the query string. 
              - If it exists, store its value in a variable.
              - If it does not exist, set the variable to an empty string.

            3. Get the user's choice number from the query string. 
              - If it exists, store its value in a variable.
              - If it does not exist, set the variable to an empty string.

            4. Create an associative array for the BEGINNING of your story:
              - Include a title for the first part of the story. 
              - Add a description that uses the user's name.
              - Include an indexed array with two choices to continue the story.

            5. Create an associative array for the MIDDLE of your story:
              - Include a title for the second part of the story. 
              - Add two different descriptions (based on the user’s previous choice), each using the user's name.
              - Include an indexed array with two choices to continue the story.

            6. Create an associative array for the ENDING of your story:
              - Include a title for the final part of the story. 
              - Add two different ending descriptions (based on the previous choice), using the user's name.
              - Include an indexed array with ONE option — asking if the user wants to play again.

            7. Based on the page number and user’s choice:
              - Use conditional statements to set general variables for:
                - title
                - description
                - choices
              - Increment the page number each time to move the story forward. 
              
            8. Handle errors or invalid input:
              - If the page number or choice is missing or invalid:
                - Set the title and description to an error message.
                - Include an indexed array with ONE option — asking if the user wants to restart.
      */
     
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <title>Begin Your Adventure!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>

  <body>
    <div class="container" id="intro">

      <!-- TO DO: Display the title of the current story page. -->
      <h1></h1>

      <!-- TO DO: Display the description of the current story page. -->
      <p></p>
      
      <!-- TO DO: 
              - Loop through the available story choices for the current story page. 
                - If there's incorrect or missing data in the query string, show a restart button that redirects them back to index.php.
                - Otherwise, display buttons for each story choice and link to the next page with the selected choice.
      -->
      <a href="index.php">
        <button class="choice-btn"></button>
      </a>
           
      <a href="adventure.php?page=">
        <button class="choice-btn"></button>
      </a>
    </div>

    <!-- JavaScript file for animations -->
    <script src="js/animations.js"></script>
  </body>
</html>