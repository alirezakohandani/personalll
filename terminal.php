<section style="background: rgba(10, 10, 10, 0.8);
    padding: 15px;
    border-radius: 5px;
    color: rgba(255, 255, 255, 0.9);
    font-family: 'Open Sans Condensed', sans-serif;
    font-size: larger;
    box-shadow: 0 0 1px rgba(255, 255, 255, 0.5);
    text-shadow: none;
    max-height: 400px;
    overflow-y: auto;
    word-spacing: 3px;
    text-align: left;
    height: 110px;
    overflow: scroll;
">
    <div>
      <form method="post" action="">terminal@alirezakohandani:~$ <input style="
     background: rgba(10, 10, 10, 0.8); 
     border: 0px solid;
    color: rgba(255, 255, 255, 0.9);
    font-family: 'Open Sans Condensed', sans-serif;
    font-size: larger;
   
    text-shadow: none;
    max-height: 400px;
    overflow-y: auto;
    word-spacing: 3px;
    text-align: left;" type="text" name="command"></form>
</div>

 <?php
if ($_POST["command"] == "help") {
    echo "
    <table style='color: white'>
    <tbody>
    <tr>
    <td>about</td>
       <td>About me</td>
       </tr>
       <tr>
    <td>contact</td>	<td>
    Contact me</td>
    </tr>
    <tr>
    <td>ip</td>	<td>Your IP</td>
    </tr>
    <tr>
    <td>random</td>	<td>Generate random numbers</td>
    </tr>
    <tr>
    <td>time</td>	<td>Current date and time</td></tr>";
} elseif($_POST["command"]) {
    echo "about me";
    echo "
    <div>
    <form method='post' action=''>terminal@alirezakohandani:~$ <input style='
   background: rgba(10, 10, 10, 0.8); 
   border: 0px solid;
  color: rgba(255, 255, 255, 0.9);
  font-family: 'Open Sans Condensed', sans-serif;
  font-size: larger;
 
  text-shadow: none;
  max-height: 400px;
  overflow-y: auto;
  word-spacing: 3px;
  text-align: left;' type='text' name='command'></form>
</div>";
}




?>
   

</section>

<?php

