<!DOCTYPE html>
<html lang="en" xmlns:ng="http://angularjs.org" ng-app="home">
  <head>       
    <?php \Core\Import::file('elements/head.php',array('pageTitle' => 'Redis - SoundCloud - Example')); ?>
  </head>

  <body ng-controller='HomeController'>

    <?php \Core\Import::file('elements/top_nav.php'); ?>

    <div class="container-fluid">

        <div class="row-fluid">
            <div class="span3"></div>
            <div class="span5 offset1">                
                <h1>Search Music</h1>
                <form ng-show="showForm" class="form-inline" action="<?php echo \Core\Request::setAction('search'); ?>" method="post" name="formsearch">                    
                    <fieldset>                                                
                        <input type="text" name="query" ng-model="query" class="input-xlarge" placeholder="keyword...">                        
                        <input type="submit" class="btn" id="submit" value="Search and Play" name="submit" ng-click="submit($event)" />
                    </fieldset>
                </form>
            </div>
            <div class="span4"></div>
        </div>
        
        <div class='row-fluid'>
            <div class='span3'></div>            
            <div class="span4 well offset1">
                <strong ng-bind="query"></strong>                
                <span ng-switch on="showProgress">
                    <span ng-switch-when="show">... connecting to soundcloud <img src="<?php echo \Core\Assets::image('ajax-loader.gif') ?>" /></span>
                </span>
                
            </div>
            <div class='span5'></div>
        </div>
        
        <div class="row-fluid" ng-show="showMusic">
            <div ng-bind-html-unsafe="play"></div>
        </div>

    </div> <!-- /container -->          
    
    <?php \Core\Import::file('elements/js.php'); ?>
    <script type="text/javascript" src="<?php echo \Core\Assets::js('apps/home.js'); ?>"></script>    
    
  </body>
</html>