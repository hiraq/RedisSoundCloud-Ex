<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Redis - SoundCloud - Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo \Core\Assets::bootstrapCss('bootstrap.css'); ?>" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="<?php echo \Core\Assets::bootstrapCss('bootstrap-responsive.css'); ?>" rel="stylesheet">   
    
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="/">RedisSoundCloud-Example</a>          
        </div>
      </div>
    </div>

    <div class="container-fluid">

        <div class="row-fluid">
            <div class="span3"></div>
            <div class="span5 offset1">                
                <h1>Search Music</h1>
                <form class="form-inline" action="<?php echo \Core\Request::setAction('search'); ?>" method="post">
                    <fieldset>                        
                        <input type="text" name="query" class="input-xlarge" placeholder="keyword...">                        
                        <input type="submit" class="btn" value="Search and Save" name="submit" />
                    </fieldset>
                </form>
            </div>
            <div class="span4"></div>
        </div>

    </div> <!-- /container -->    

  </body>
</html>