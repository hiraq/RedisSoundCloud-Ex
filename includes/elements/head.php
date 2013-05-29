<meta charset="utf-8">
<title>
    <?php if (isset($pageTitle)) : echo $pageTitle; ?>
    <?php else: ?>
        Redis - SoundCloud - Example
    <?php endif; ?>
</title>
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