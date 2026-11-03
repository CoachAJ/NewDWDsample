<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

/** @var Joomla\CMS\Document\HtmlDocument $this */
$app      = Factory::getApplication();
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
$logo     = Uri::base(true) . '/templates/' . $this->template . '/images/logo.png';
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo Uri::base(true); ?>/templates/<?php echo $this->template; ?>/css/template.css">
</head>
<body class="site offline-page">
    <div class="offline-container">
        <div class="offline-card">
            <div class="offline-logo">
                <img src="<?php echo $logo; ?>" alt="<?php echo $sitename; ?>">
            </div>
            <jdoc:include type="message" />
            <h1 class="offline-title"><?php echo $sitename; ?></h1>
            <p class="offline-desc"><?php echo htmlspecialchars($app->get('offline_message'), ENT_QUOTES, 'UTF-8'); ?></p>

            <form action="<?php echo Route::_('index.php', true); ?>" method="post" id="form-login" class="offline-login-form">
                <div class="form-group">
                    <label for="username"><?php echo Text::_('JGLOBAL_USERNAME'); ?></label>
                    <input name="username" id="username" type="text" class="form-control" required autocomplete="username">
                </div>
                <div class="form-group">
                    <label for="password"><?php echo Text::_('JGLOBAL_PASSWORD'); ?></label>
                    <input name="password" id="password" type="password" class="form-control" required autocomplete="current-password">
                </div>
                <input type="hidden" name="return" value="<?php echo base64_encode(Uri::base()); ?>">
                <?php echo HTMLHelper::_('form.token'); ?>
                <button type="submit" name="Submit" class="btn btn-navy btn-block"><?php echo Text::_('JLOGIN'); ?></button>
            </form>
        </div>
    </div>
</body>
</html>

