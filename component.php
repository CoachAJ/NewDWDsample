<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;

/** @var Joomla\CMS\Document\HtmlDocument $this */
$app = Factory::getApplication();
$wa  = $this->getWebAssetManager();

// Use the template's style
$wa->useStyle('template.dailywithdoc');
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <jdoc:include type="head" />
</head>
<body class="contentpane component-body">
    <jdoc:include type="message" />
    <jdoc:include type="component" />
</body>
</html>

