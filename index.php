<?php
/**
 * Daily with Doc - Joomla 6.0 Main Template File
 * @package     Joomla.Site
 * @subpackage  Templates.dailywithdoc
 * @copyright   Copyright (C) 2026 Daily with Doc. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

/** @var Joomla\CMS\Document\HtmlDocument $this */

$app             = Factory::getApplication();
$wa              = $this->getWebAssetManager();
$sitename        = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
$menu            = $app->getMenu();
$activeMenu      = $menu ? $menu->getActive() : null;
$defaultMenu     = $menu ? $menu->getDefault() : null;
$isHome          = ($activeMenu && $defaultMenu && $activeMenu->id === $defaultMenu->id);
$tpath           = Uri::base(true) . '/templates/' . $this->template;

// Template Parameters
$params          = $this->params;
$sitePhone       = $params->get('sitePhone', '855-949-3377');
$facebookUrl     = $params->get('facebookUrl', 'https://facebook.com');
$youtubeUrl      = $params->get('youtubeUrl', 'https://youtube.com');
$rumbleUrl       = $params->get('rumbleUrl', 'https://rumble.com');
$podcastUrl      = $params->get('podcastUrl', 'https://podcasts.apple.com');
$twitterUrl      = $params->get('twitterUrl', 'https://x.com');
$showHero        = (bool) $params->get('showHero', 1);
$heroHeadline    = $params->get('heroHeadline', 'Empowering Healthier Lives Through the');
$heroSubheadline = $params->get('heroSubheadline', '90 for Life');
$heroAuthorLead  = $params->get('heroAuthorLead', 'Teachings of');
$heroDoctorName  = $params->get('heroDoctorName', 'Dr. Joel D. Wallach BS, DVM, ND');
$customLogo      = $params->get('customLogo', '');
$demoContent     = (bool) $params->get('demoContent', 1);

// Register Web Assets
$wa->useStyle('template.dailywithdoc');
$wa->useStyle('template.dailywithdoc.custom');
$wa->useScript('template.dailywithdoc.js');

// Determine logo URL
$logoUrl = $customLogo ? Uri::root() . $customLogo : $tpath . '/images/logo.png';

// Check module counts
$countSidebarLeft = $this->countModules('sidebar-left');
$countHero        = $this->countModules('hero');
$countBottom1     = $this->countModules('bottom-1');
$countBottom2     = $this->countModules('bottom-2');
$countBottom3     = $this->countModules('bottom-3');
$countBottom4     = $this->countModules('bottom-4');
$hasBottomModules = ($countBottom1 || $countBottom2 || $countBottom3 || $countBottom4);
$showSidebar      = ($countSidebarLeft > 0 || ($isHome && $demoContent));
$displayHero      = ($showHero && ($countHero > 0 || ($isHome && $demoContent)));
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <jdoc:include type="head" />
    <!-- SEO & AEO (Answer Engine Optimization) Metadata -->
    <meta name="description" content="Empowering healthier lives through the 90 for Life nutritional teachings of Dr. Joel D. Wallach BS, DVM, ND. Truth-based health education, live shows, holistic coaching, and plant-derived minerals.">
    <meta name="keywords" content="Dr. Joel Wallach, Daily with Doc, 90 for Life, holistic health coach, plant derived minerals, dead doctors don't lie, nutritional supplements, food diary">
    <meta name="author" content="Dr. Joel D. Wallach">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://dailywithdoc.com/">

    <!-- Open Graph (Facebook / LinkedIn / AI crawlers) -->
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Daily with Doc - Empowering Healthier Lives | Dr. Joel D. Wallach">
    <meta property="og:description" content="Empowering healthier lives through the 90 for Life nutritional teachings of Dr. Joel D. Wallach BS, DVM, ND. Live shows, coaching, and plant minerals.">
    <meta property="og:url" content="https://dailywithdoc.com/">
    <meta property="og:site_name" content="Daily with Doc">
    <meta property="og:image" content="https://dailywithdoc.com/images/hero-composite.jpg">
    <meta property="og:image:width" content="1600">
    <meta property="og:image:height" content="650">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Daily with Doc - 90 for Life with Dr. Joel D. Wallach">
    <meta name="twitter:description" content="Empowering healthier lives through truth-based health education, certified holistic coaches, and essential mineral nutrition.">
    <meta name="twitter:image" content="https://dailywithdoc.com/images/hero-composite.jpg">

    <!-- Preconnect for Core Web Vitals performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Schema.org JSON-LD Structured Data for AEO (AI Answer Engines & Google Knowledge Graph) -->
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebSite",
      "@id": "https://dailywithdoc.com/#website",
      "url": "https://dailywithdoc.com/",
      "name": "Daily with Doc",
      "description": "Empowering Healthier Lives Through the 90 for Life Teachings of Dr. Joel D. Wallach BS, DVM, ND",
      "publisher": {
        "@id": "https://dailywithdoc.com/#organization"
      },
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://dailywithdoc.com/?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    },
    {
      "@type": "Organization",
      "@id": "https://dailywithdoc.com/#organization",
      "name": "Daily with Doc",
      "url": "https://dailywithdoc.com/",
      "logo": {
        "@type": "ImageObject",
        "url": "https://dailywithdoc.com/images/logo.png"
      },
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+1-855-949-3377",
        "contactType": "customer service",
        "areaServed": "US",
        "availableLanguage": "en"
      },
      "founder": {
        "@id": "https://dailywithdoc.com/#person"
      },
      "sameAs": [
        "https://facebook.com",
        "https://youtube.com",
        "https://rumble.com",
        "https://podcasts.apple.com",
        "https://x.com"
      ]
    },
    {
      "@type": "Person",
      "@id": "https://dailywithdoc.com/#person",
      "name": "Dr. Joel D. Wallach",
      "honorificSuffix": "BS, DVM, ND",
      "jobTitle": "Veterinarian, Naturopathic Physician, Nutritional Pioneer & Author",
      "description": "Founder of the 90 for Life nutritional movement and author of 'Dead Doctors Don't Lie'. Dr. Wallach proved the essential link between daily trace mineral nutrition and long-term biological vitality.",
      "knowsAbout": [
        "90 Essential Nutrients",
        "Plant Derived Minerals",
        "Clinical Nutrition",
        "Epigenetics",
        "Holistic Wellness",
        "Deficiency-Related Health Conditions"
      ]
    },
    {
      "@type": "FAQPage",
      "@id": "https://dailywithdoc.com/#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "What is Daily with Doc?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Daily with Doc is an educational health broadcast and holistic wellness portal dedicated to empowering healthier lives through the pioneering nutritional teachings and 90 for Life philosophy of Dr. Joel D. Wallach BS, DVM, ND."
          }
        },
        {
          "@type": "Question",
          "name": "What are the 90 for Life essential nutrients according to Dr. Joel Wallach?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The 90 for Life philosophy teaches that the human body requires 90 essential nutrients daily: 60 minerals, 16 vitamins, 12 essential amino acids, and 3 essential fatty acids. These nutrients must be consumed through diet and supplementation because the human body cannot manufacture them."
          }
        },
        {
          "@type": "Question",
          "name": "What are the four pillars of the Daily with Doc program?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The four pillars are: 1) EDUCATE - Truth-based health education decoding nutritional science. 2) EVALUATE - Finding the root deficiency cause rather than masking symptoms. 3) EQUIP - Supplying tools, food diaries, and mineral supplementation for lasting change. 4) EMPOWER - Guiding continuous personal wellness with certified health coaches."
          }
        },
        {
          "@type": "Question",
          "name": "How can I work with a certified Wholistic Health Coach?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "You can connect with a certified Wholistic Health Coach directly through the Daily with Doc coach directory to receive personalized guidance, nutrient evaluation, and protocol coaching."
          }
        },
        {
          "@type": "Question",
          "name": "What is the Food Diary program?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The Food Diary is a tracking program designed to record daily meals, identify nutritional gaps, eliminate harmful inflammatory foods, and measure daily health and energy improvements."
          }
        }
      ]
    }
  ]
}
    </script>

    <link rel="icon" type="image/png" href="<?php echo $tpath; ?>/images/logo.png">
</head>
<body class="site <?php echo $isHome ? 'is-homepage' : 'is-innerpage'; ?>">

    <!-- Top Header -->
    <header class="dwd-header">
        <div class="dwd-container dwd-header-inner">
            <div class="dwd-logo-area">
                <?php if ($this->countModules('logo')) : ?>
                    <jdoc:include type="modules" name="logo" style="clean" />
                <?php else : ?>
                    <a href="<?php echo Uri::base(); ?>" class="dwd-logo-link" title="<?php echo $sitename; ?>">
                        <img src="<?php echo $logoUrl; ?>" alt="<?php echo $sitename; ?> - Dr. Joel Wallach 90 for Life" class="dwd-logo-img">
                    </a>
                <?php endif; ?>
            </div>

            <div class="dwd-header-right">
                <?php if ($this->countModules('topbar-phone')) : ?>
                    <jdoc:include type="modules" name="topbar-phone" style="clean" />
                <?php else : ?>
                    <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $sitePhone); ?>" class="dwd-phone-link">
                        <span class="phone-icon-circle">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                        </span>
                        <span class="phone-number"><?php echo htmlspecialchars($sitePhone, ENT_QUOTES, 'UTF-8'); ?></span>
                    </a>
                <?php endif; ?>

                <?php if ($this->countModules('topbar-social')) : ?>
                    <jdoc:include type="modules" name="topbar-social" style="clean" />
                <?php else : ?>
                    <ul class="dwd-social-list">
                        <?php if ($facebookUrl) : ?>
                            <li class="dwd-social-item">
                                <a href="<?php echo htmlspecialchars($facebookUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener" class="social-fb" title="Facebook">
                                    <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($youtubeUrl) : ?>
                            <li class="dwd-social-item">
                                <a href="<?php echo htmlspecialchars($youtubeUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener" class="social-yt" title="YouTube">
                                    <svg viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($rumbleUrl) : ?>
                            <li class="dwd-social-item">
                                <a href="<?php echo htmlspecialchars($rumbleUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener" class="social-play" title="Video Channel">
                                    <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($podcastUrl) : ?>
                            <li class="dwd-social-item">
                                <a href="<?php echo htmlspecialchars($podcastUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener" class="social-podcast" title="Podcast">
                                    <svg viewBox="0 0 24 24"><path d="M12 1a9 9 0 0 0-9 9v7c0 1.66 1.34 3 3 3h1v-8H5v-2a7 7 0 0 1 14 0v2h-2v8h1c1.66 0 3-1.34 3-3v-7a9 9 0 0 0-9-9zm-4 13h2v4H8v-4zm8 0h2v4h-2v-4z"/></svg>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($twitterUrl) : ?>
                            <li class="dwd-social-item">
                                <a href="<?php echo htmlspecialchars($twitterUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener" class="social-x" title="X (Twitter)">
                                    <svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Main Navigation Bar -->
    <nav class="dwd-navbar-wrap">
        <div class="dwd-container dwd-navbar">
            <button class="dwd-mobile-toggle" aria-label="<?php echo Text::_('TPL_DAILYWITHDOC_TOGGLE_MENU'); ?>" aria-expanded="false">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
                <span>MENU</span>
            </button>

            <?php if ($this->countModules('menu')) : ?>
                <jdoc:include type="modules" name="menu" style="clean" />
            <?php else : ?>
                <!-- Default Sample Menu -->
                <ul class="dwd-nav-menu">
                    <li class="nav-item current active"><a href="<?php echo Uri::base(); ?>">HOME</a></li>
                    <li class="nav-item deeper dropdown">
                        <a href="#about">
                            <span>ABOUT</span>
                            <svg class="chevron-down" width="10" height="6" viewBox="0 0 10 6" fill="none"><path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#dr-wallach">Dr. Joel Wallach</a></li>
                            <li><a href="#mission">Our Mission</a></li>
                            <li><a href="#foundation">The 90 for Life Foundation</a></li>
                        </ul>
                    </li>
                    <li class="nav-item deeper dropdown">
                        <a href="#show">
                            <span>SHOW</span>
                            <svg class="chevron-down" width="10" height="6" viewBox="0 0 10 6" fill="none"><path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#watch-live">Watch Live</a></li>
                            <li><a href="#episodes">Past Episodes</a></li>
                            <li><a href="#schedule">Show Schedule</a></li>
                        </ul>
                    </li>
                    <li class="nav-item deeper dropdown">
                        <a href="#health-news">
                            <span>HEALTH NEWS</span>
                            <svg class="chevron-down" width="10" height="6" viewBox="0 0 10 6" fill="none"><path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#nutrition">Nutrition Articles</a></li>
                            <li><a href="#research">Research & Science</a></li>
                            <li><a href="#wellness">Holistic Wellness</a></li>
                        </ul>
                    </li>
                    <li class="nav-item deeper dropdown">
                        <a href="#resources">
                            <span>RESOURCES</span>
                            <svg class="chevron-down" width="10" height="6" viewBox="0 0 10 6" fill="none"><path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#food-diary">Food Diary</a></li>
                            <li><a href="#health-eval">Health Evaluation</a></li>
                            <li><a href="#charts">Mineral Deficiency Chart</a></li>
                        </ul>
                    </li>
                    <li class="nav-item deeper dropdown">
                        <a href="#store">
                            <span>STORE</span>
                            <svg class="chevron-down" width="10" height="6" viewBox="0 0 10 6" fill="none"><path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#90-essential">90 Essential Nutrients</a></li>
                            <li><a href="#plant-minerals">Plant Derived Minerals</a></li>
                            <li><a href="#healthy-packs">Healthy Body Packs</a></li>
                        </ul>
                    </li>
                    <li class="nav-item deeper dropdown">
                        <a href="#coach">
                            <span>FIND A COACH</span>
                            <svg class="chevron-down" width="10" height="6" viewBox="0 0 10 6" fill="none"><path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#directory">Coach Directory</a></li>
                            <li><a href="#become-coach">Become a Certified Coach</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="#contact">CONTACT</a></li>
                <li class="dwd-drawer-footer">
                    <a href="tel:8559493377" class="dwd-drawer-call-btn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                        <span>Call Toll-Free: 855-949-3377</span>
                    </a>
                    <ul class="dwd-social-list">
                        <li class="dwd-social-item"><a href="https://facebook.com" target="_blank" rel="noopener" class="social-fb" title="Facebook"><svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a></li>
                        <li class="dwd-social-item"><a href="https://youtube.com" target="_blank" rel="noopener" class="social-yt" title="YouTube"><svg viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a></li>
                        <li class="dwd-social-item"><a href="https://rumble.com" target="_blank" rel="noopener" class="social-play" title="Video Channel"><svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg></a></li>
                        <li class="dwd-social-item"><a href="https://podcasts.apple.com" target="_blank" rel="noopener" class="social-podcast" title="Podcast"><svg viewBox="0 0 24 24"><path d="M12 1a9 9 0 0 0-9 9v7c0 1.66 1.34 3 3 3h1v-8H5v-2a7 7 0 0 1 14 0v2h-2v8h1c1.66 0 3-1.34 3-3v-7a9 9 0 0 0-9-9zm-4 13h2v4H8v-4zm8 0h2v4h-2v-4z"/></svg></a></li>
                        <li class="dwd-social-item"><a href="https://x.com" target="_blank" rel="noopener" class="social-x" title="X (Twitter)"><svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a></li>
                    </ul>
                </li>

                </ul>
            <?php endif; ?>

            <div class="dwd-nav-actions">
                <button class="dwd-search-btn" aria-label="<?php echo Text::_('TPL_DAILYWITHDOC_SEARCH'); ?>" title="<?php echo Text::_('TPL_DAILYWITHDOC_SEARCH'); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
                <div class="dwd-search-modal">
                    <?php if ($this->countModules('search')) : ?>
                        <jdoc:include type="modules" name="search" style="clean" />
                    <?php else : ?>
                        <form action="<?php echo Uri::base(); ?>" method="get">
                            <input type="text" name="q" class="dwd-search-input" placeholder="Search Daily with Doc..." required>
                            <button type="submit" class="btn-navy">Go</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="dwd-container dwd-main-wrap">
        <div class="dwd-grid-layout">

            <!-- Left Sidebar -->
            <?php if ($showSidebar) : ?>
                <aside class="dwd-sidebar">
                    <?php if ($countSidebarLeft > 0) : ?>
                        <jdoc:include type="modules" name="sidebar-left" style="sidebar" />
                    <?php else : ?>
                        <!-- Sample Module 1: Newsletter -->
                        <div class="dwd-sidebar-box dwd-newsletter-box">
                            <h3 class="dwd-sidebar-title"><?php echo Text::_('TPL_DAILYWITHDOC_NEWSLETTER_TITLE'); ?></h3>
                            <p class="dwd-sidebar-desc"><?php echo Text::_('TPL_DAILYWITHDOC_NEWSLETTER_SUB'); ?></p>
                            <form action="#" method="post" class="dwd-newsletter-form">
                                <div class="form-group">
                                    <input type="text" name="first_name" class="dwd-input" placeholder="<?php echo Text::_('TPL_DAILYWITHDOC_FIRST_NAME'); ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="dwd-input" placeholder="<?php echo Text::_('TPL_DAILYWITHDOC_EMAIL'); ?>" required>
                                </div>
                                <button type="submit" class="btn-yellow"><?php echo Text::_('TPL_DAILYWITHDOC_SUBSCRIBE'); ?></button>
                            </form>
                        </div>

                        <!-- Sample Module 2: Food Diary -->
                        <div class="dwd-sidebar-box dwd-diary-box">
                            <h3 class="dwd-sidebar-title"><?php echo Text::_('TPL_DAILYWITHDOC_FOOD_DIARY_TITLE'); ?></h3>
                            <div class="dwd-diary-body">
                                <img src="<?php echo $tpath; ?>/images/food-diary-notebook.png" alt="Start Your Daily Food Diary - 90 for Life Nutritional Tracking" class="dwd-diary-img">
                                <p class="dwd-diary-text"><?php echo Text::_('TPL_DAILYWITHDOC_FOOD_DIARY_DESC'); ?></p>
                            </div>
                            <a href="#food-diary" class="btn-yellow"><?php echo Text::_('TPL_DAILYWITHDOC_GET_STARTED'); ?></a>
                        </div>

                        <!-- Sample Module 3: Quick Links -->
                        <div class="dwd-sidebar-box dwd-quicklinks-box">
                            <h3 class="dwd-sidebar-title"><?php echo Text::_('TPL_DAILYWITHDOC_QUICK_LINKS'); ?></h3>
                            <ul class="dwd-quick-links-list">
                                <li>
                                    <a href="#watch-live">
                                        <span class="dwd-link-icon">
                                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                                        </span>
                                        <?php echo Text::_('TPL_DAILYWITHDOC_WATCH_LIVE'); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#schedule">
                                        <span class="dwd-link-icon">
                                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 14c1.66 0 3-1.34 3-3V5c0-1.66-1.34-3-3-3S9 3.34 9 5v6c0 1.66 1.34 3 3 3z"/><path d="M17 11c0 2.76-2.24 5-5 5s-5-2.24-5-5H5c0 3.53 2.61 6.43 6 6.92V21h2v-3.08c3.39-.49 6-3.39 6-6.92h-2z"/></svg>
                                        </span>
                                        <?php echo Text::_('TPL_DAILYWITHDOC_SHOW_SCHEDULE'); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#store">
                                        <span class="dwd-link-icon">
                                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
                                        </span>
                                        <?php echo Text::_('TPL_DAILYWITHDOC_OUR_STORE'); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#find-coach">
                                        <span class="dwd-link-icon">
                                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                                        </span>
                                        <?php echo Text::_('TPL_DAILYWITHDOC_FIND_COACH_YOU'); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#become-coach">
                                        <span class="dwd-link-icon">
                                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/></svg>
                                        </span>
                                        <?php echo Text::_('TPL_DAILYWITHDOC_BECOME_COACH'); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#health-news">
                                        <span class="dwd-link-icon">
                                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 16H5c-.55 0-1-.45-1-1V6c0-.55.45-1 1-1h14c.55 0 1 .45 1 1v12c0 .55-.45 1-1 1zm-8-3H6v-2h5v2zm7 0h-5v-2h5v2zm0-4H6v-2h11v2z"/></svg>
                                        </span>
                                        <?php echo Text::_('TPL_DAILYWITHDOC_HEALTH_NEWS'); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#evaluation">
                                        <span class="dwd-link-icon">
                                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3.02 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                                        </span>
                                        <?php echo Text::_('TPL_DAILYWITHDOC_EVALUATION'); ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </aside>
            <?php endif; ?>

            <!-- Main Content Column -->
            <div class="dwd-main-column">

                <!-- Hero Section -->
                <?php if ($displayHero) : ?>
                    <?php if ($countHero > 0) : ?>
                        <div class="dwd-hero-module-wrap">
                            <jdoc:include type="modules" name="hero" style="clean" />
                        </div>
                    <?php else : ?>
                        <section class="dwd-hero-section">
                            <div class="dwd-hero-inner">
                                <div class="dwd-hero-content">
                                    <div class="dwd-hero-logo">
                                        <img src="<?php echo $logoUrl; ?>" alt="Daily with Doc - Empowering Healthier Lives Through 90 for Life">
                                    </div>
                                    <div class="dwd-hero-typography">
                                        <h1 class="dwd-hero-lead"><?php echo htmlspecialchars($heroHeadline, ENT_QUOTES, 'UTF-8'); ?></h1>
                                        <div class="dwd-hero-script-wrap">
                                            <span class="dwd-hero-script"><?php echo htmlspecialchars($heroSubheadline, ENT_QUOTES, 'UTF-8'); ?></span>
                                            <span class="dwd-hero-lead-author"><?php echo htmlspecialchars($heroAuthorLead, ENT_QUOTES, 'UTF-8'); ?></span>
                                        </div>
                                        <h2 class="dwd-hero-docname"><?php echo htmlspecialchars($heroDoctorName, ENT_QUOTES, 'UTF-8'); ?></h2>
                                    </div>

                                    <!-- 4 Pillars -->
                                    <div class="dwd-hero-pillars">
                                        <div class="dwd-pillar-item">
                                            <div class="dwd-pillar-icon pillar-educate">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M2 22s5.5-1.5 10-6c4.5-4.5 6-10 6-10s-5.5 1.5-10 6c-4.5 4.5-6 10-6 10zM17 7l-5 5"/></svg>
                                            </div>
                                            <h4 class="dwd-pillar-title"><?php echo Text::_('TPL_DAILYWITHDOC_EDUCATE'); ?></h4>
                                            <p class="dwd-pillar-sub"><?php echo Text::_('TPL_DAILYWITHDOC_EDUCATE_SUB'); ?></p>
                                        </div>
                                        <div class="dwd-pillar-item">
                                            <div class="dwd-pillar-icon pillar-evaluate">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                            </div>
                                            <h4 class="dwd-pillar-title"><?php echo Text::_('TPL_DAILYWITHDOC_EVALUATE'); ?></h4>
                                            <p class="dwd-pillar-sub"><?php echo Text::_('TPL_DAILYWITHDOC_EVALUATE_SUB'); ?></p>
                                        </div>
                                        <div class="dwd-pillar-item">
                                            <div class="dwd-pillar-icon pillar-equip">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                            </div>
                                            <h4 class="dwd-pillar-title"><?php echo Text::_('TPL_DAILYWITHDOC_EQUIP'); ?></h4>
                                            <p class="dwd-pillar-sub"><?php echo Text::_('TPL_DAILYWITHDOC_EQUIP_SUB'); ?></p>
                                        </div>
                                        <div class="dwd-pillar-item">
                                            <div class="dwd-pillar-icon pillar-empower">
                                                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3.02 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                                            </div>
                                            <h4 class="dwd-pillar-title"><?php echo Text::_('TPL_DAILYWITHDOC_EMPOWER'); ?></h4>
                                            <p class="dwd-pillar-sub"><?php echo Text::_('TPL_DAILYWITHDOC_EMPOWER_SUB'); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- People Hero Visual (Created from User Original Photo) -->
                                <div class="dwd-hero-visual">
                                    <img src="<?php echo $tpath; ?>/images/hero-people.png" alt="Dr. Joel D. Wallach BS DVM ND and Co-host on Daily with Doc Show" class="dwd-hero-people-img">
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- Bottom 4 Feature Cards -->
                <?php if ($hasBottomModules) : ?>
                    <div class="dwd-bottom-cards">
                        <div class="dwd-card-col"><jdoc:include type="modules" name="bottom-1" style="clean" /></div>
                        <div class="dwd-card-col"><jdoc:include type="modules" name="bottom-2" style="clean" /></div>
                        <div class="dwd-card-col"><jdoc:include type="modules" name="bottom-3" style="clean" /></div>
                        <div class="dwd-card-col"><jdoc:include type="modules" name="bottom-4" style="clean" /></div>
                    </div>
                <?php elseif ($isHome && $demoContent) : ?>
                    <section class="dwd-bottom-cards">
                        <!-- Card 1: Health News -->
                        <div class="dwd-feature-card">
                            <div class="dwd-card-bg-wrap">
                                <img src="<?php echo $tpath; ?>/images/card-news.jpg" alt="Daily with Doc Health News and Holistic Wellness Articles">
                            </div>
                            <div class="dwd-card-content">
                                <div class="dwd-card-icon-circle">
                                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 16H5c-.55 0-1-.45-1-1V6c0-.55.45-1 1-1h14c.55 0 1 .45 1 1v12c0 .55-.45 1-1 1zm-8-3H6v-2h5v2zm7 0h-5v-2h5v2zm0-4H6v-2h11v2z"/></svg>
                                </div>
                                <h3 class="dwd-card-title"><?php echo Text::_('TPL_DAILYWITHDOC_CARD_NEWS_TITLE'); ?></h3>
                                <p class="dwd-card-desc"><?php echo Text::_('TPL_DAILYWITHDOC_CARD_NEWS_DESC'); ?></p>
                                <a href="#health-news" class="btn-navy"><?php echo Text::_('TPL_DAILYWITHDOC_READ_NOW'); ?></a>
                            </div>
                        </div>

                        <!-- Card 2: Store -->
                        <div class="dwd-feature-card">
                            <div class="dwd-card-bg-wrap">
                                <img src="<?php echo $tpath; ?>/images/card-store.jpg" alt="90 for Life Essential Nutrients and Plant Derived Minerals Store">
                            </div>
                            <div class="dwd-card-content">
                                <div class="dwd-card-icon-circle">
                                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
                                </div>
                                <h3 class="dwd-card-title"><?php echo Text::_('TPL_DAILYWITHDOC_CARD_STORE_TITLE'); ?></h3>
                                <p class="dwd-card-desc"><?php echo Text::_('TPL_DAILYWITHDOC_CARD_STORE_DESC'); ?></p>
                                <a href="#store" class="btn-navy"><?php echo Text::_('TPL_DAILYWITHDOC_SHOP_NOW'); ?></a>
                            </div>
                        </div>

                        <!-- Card 3: Find a Coach for You -->
                        <div class="dwd-feature-card">
                            <div class="dwd-card-bg-wrap">
                                <img src="<?php echo $tpath; ?>/images/card-coach.jpg" alt="Find a Certified Wholistic Health Coach for You">
                            </div>
                            <div class="dwd-card-content">
                                <div class="dwd-card-icon-circle">
                                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                                </div>
                                <h3 class="dwd-card-title"><?php echo Text::_('TPL_DAILYWITHDOC_CARD_COACH_TITLE'); ?></h3>
                                <p class="dwd-card-desc"><?php echo Text::_('TPL_DAILYWITHDOC_CARD_COACH_DESC'); ?></p>
                                <a href="#coach" class="btn-navy"><?php echo Text::_('TPL_DAILYWITHDOC_FIND_COACH_BTN'); ?></a>
                            </div>
                        </div>

                        <!-- Card 4: About Us -->
                        <div class="dwd-feature-card">
                            <div class="dwd-card-bg-wrap">
                                <img src="<?php echo $tpath; ?>/images/card-about.jpg" alt="About Daily with Doc and Dr. Joel Wallach Mission">
                            </div>
                            <div class="dwd-card-content">
                                <div class="dwd-card-icon-circle">
                                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                                </div>
                                <h3 class="dwd-card-title"><?php echo Text::_('TPL_DAILYWITHDOC_CARD_ABOUT_TITLE'); ?></h3>
                                <p class="dwd-card-desc"><?php echo Text::_('TPL_DAILYWITHDOC_CARD_ABOUT_DESC'); ?></p>
                                <a href="#about" class="btn-navy"><?php echo Text::_('TPL_DAILYWITHDOC_LEARN_MORE'); ?></a>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>

                <!-- Content Top Module Position -->
                <?php if ($this->countModules('content-top')) : ?>
                    <div class="dwd-content-top">
                        <jdoc:include type="modules" name="content-top" style="card" />
                    </div>
                <?php endif; ?>

                <!-- Joomla Core Message & Component -->
                <main id="main-content" class="dwd-main-content">
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                </main>

                <!-- Content Bottom Module Position -->
                <?php if ($this->countModules('content-bottom')) : ?>
                    <div class="dwd-content-bottom">
                        <jdoc:include type="modules" name="content-bottom" style="card" />
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="dwd-footer">
        <div class="dwd-container">
            <div class="dwd-footer-grid">
                <!-- Col 1: About -->
                <div class="dwd-footer-col">
                    <?php if ($this->countModules('footer-1')) : ?>
                        <jdoc:include type="modules" name="footer-1" style="clean" />
                    <?php else : ?>
                        <h4>About Daily with Doc</h4>
                        <p class="dwd-footer-desc">
                            Daily with Doc brings you life-changing health education based on the pioneering nutritional research and 90 for Life teachings of Dr. Joel D. Wallach.
                        </p>
                        <div class="dwd-disclaimer-box">
                            <strong>Health Disclaimer:</strong> The information provided on this show and website is for educational purposes only and is not intended as medical advice. Always consult your qualified healthcare provider.
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Col 2: Quick Links -->
                <div class="dwd-footer-col">
                    <?php if ($this->countModules('footer-2')) : ?>
                        <jdoc:include type="modules" name="footer-2" style="clean" />
                    <?php else : ?>
                        <h4>Quick Links</h4>
                        <ul class="dwd-footer-links">
                            <li><a href="<?php echo Uri::base(); ?>">Home</a></li>
                            <li><a href="#about">About Dr. Wallach</a></li>
                            <li><a href="#show">Live Show & Replays</a></li>
                            <li><a href="#health-news">Health News & Blog</a></li>
                            <li><a href="#store">Official Store</a></li>
                            <li><a href="#contact">Contact Us</a></li>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Col 3: Resources -->
                <div class="dwd-footer-col">
                    <?php if ($this->countModules('footer-3')) : ?>
                        <jdoc:include type="modules" name="footer-3" style="clean" />
                    <?php else : ?>
                        <h4>90 For Life</h4>
                        <ul class="dwd-footer-links">
                            <li><a href="#food-diary">Food Diary Program</a></li>
                            <li><a href="#health-eval">Health Evaluation</a></li>
                            <li><a href="#coaches">Certified Health Coaches</a></li>
                            <li><a href="#become-coach">Become a Coach</a></li>
                            <li><a href="#minerals">Plant Derived Minerals</a></li>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Col 4: Contact & Socials -->
                <div class="dwd-footer-col">
                    <?php if ($this->countModules('footer-4')) : ?>
                        <jdoc:include type="modules" name="footer-4" style="clean" />
                    <?php else : ?>
                        <h4>Get in Touch</h4>
                        <p class="dwd-footer-desc">Call our toll-free support line for questions about nutritional formulas and live broadcasts:</p>
                        <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $sitePhone); ?>" class="dwd-phone-link" style="color: #ffc82c; font-size: 1.25rem;">
                            <?php echo htmlspecialchars($sitePhone, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                        <p style="margin-top: 14px; font-size: 0.8rem; color: #a2b7cd;">Broadcast Monday through Friday. Check our schedule for live streaming times.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Footer Bottom / Copyright -->
            <div class="dwd-footer-bottom">
                <?php if ($this->countModules('copyright')) : ?>
                    <jdoc:include type="modules" name="copyright" style="clean" />
                <?php else : ?>
                    <p>&copy; <?php echo date('Y'); ?> DailywithDoc.com. All Rights Reserved. Powered by Dr. Joel Wallach 90 For Life.</p>
                    <p>Joomla 6.0 Template</p>
                <?php endif; ?>
            </div>
        </div>
    </footer>

    <!-- Debug Position -->
    <jdoc:include type="modules" name="debug" />

</body>
</html>

