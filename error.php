<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

/** @var Joomla\CMS\Document\ErrorDocument $this */
$app  = Factory::getApplication();
$wa   = $this->getWebAssetManager();
$logo = Uri::base(true) . '/templates/' . $this->template . '/images/logo.png';
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->error->getCode(); ?> - <?php echo htmlspecialchars($this->title, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="<?php echo Uri::base(true); ?>/templates/<?php echo $this->template; ?>/css/template.css">
</head>
<body class="site error-page">
    <header class="dwd-header">
        <div class="dwd-container dwd-header-inner">
            <div class="dwd-logo-area">
                <a href="<?php echo Uri::base(); ?>" class="dwd-logo-link">
                    <img src="<?php echo $logo; ?>" alt="Daily with Doc" class="dwd-logo-img">
                </a>
            </div>
            <div class="dwd-header-right">
                <a href="tel:8559493377" class="dwd-phone-link">
                    <span class="phone-icon-circle">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                    </span>
                    <span class="phone-number">855-949-3377</span>
                </a>
            </div>
        </div>
    </header>

    <main class="dwd-error-content">
        <div class="dwd-container">
            <div class="error-box text-center">
                <h1 class="error-code"><?php echo $this->error->getCode(); ?></h1>
                <h2 class="error-message"><?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></h2>
                <p class="error-desc"><?php echo Text::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?></p>
                <div class="error-actions">
                    <a href="<?php echo Uri::base(); ?>" class="btn btn-navy"><?php echo Text::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?></a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

