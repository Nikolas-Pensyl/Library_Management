<?php
session_start();
if(!empty($_SESSION['id']) &&!empty($_SESSION['staff']) && $_SESSION['staff']==1 ) {
    if(!empty($_SESSION['manager']) && $_SESSION['manager']==1) {
        echo "<!DOCTYPE html>
        <html>
            <head>
            </head>
            <body>
                <header>
              <nav class=\"navbar navbar-expand-lg navbar-light bg-dark\">
                  <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapsingnavbar\">
                      <span class=\"navbar-toggler-icon\"></span>
                  </button>
                  <div class=\"navbar-collapse collapse\" id=\"collapsingnavbar\">
                      <ul class=\"navbar-nav nav-fill\">
                          <li><a href=\"main.php\">Home</a></li>
                          <li><a href=\"search_people.php\">Edit Members</a></li>
                          <li><a href=\"Register_Person.php\">Register person</a></li>
                          <li><a href=\"Register_Book.php\">Add Books</a></li>
                          <li><a href=\"search.php\">Search Books</a></li>
                          <li><a href=\"logout.php\">Logout</a></li>
                      </ul>
                  </div>
              </nav>
            </header>
            </body>
            </html>";
    } else {
        echo "<!DOCTYPE html>
        <html>
            <head>
            </head>
            <body>
                <header>
              <nav class=\"navbar navbar-expand-lg navbar-light bg-dark\">
                  <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapsingnavbar\">
                      <span class=\"navbar-toggler-icon\"></span>
                  </button>
                  <div class=\"navbar-collapse collapse\" id=\"collapsingnavbar\">
                      <ul class=\"navbar-nav nav-fill\">
                          <li><a href=\"main.php\">Home</a></li>
                          <li><a href=\"search.php\">Search Books</a></li>
                          <li><a href=\"logout.php\">Logout</a></li>
                      </ul>
                  </div>
              </nav>
            </header>
            </body>
            </html>";
    }
    
} else {
echo "<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <header>
      <nav class=\"navbar navbar-expand-lg navbar-light bg-dark\">
          <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapsingnavbar\">
              <span class=\"navbar-toggler-icon\"></span>
          </button>
          <div class=\"navbar-collapse collapse\" id=\"collapsingnavbar\">
              <ul class=\"navbar-nav nav-fill\">
                  <li><a href=\"main.php\">Home</a></li>    
                  <li><a href=\"search.php\">Search Books</a></li>
                  <li><a href=\"login.php\">Login</a></li>
              </ul>
          </div>
      </nav>
    </header>
    </body>
    </html>";
}
?>
