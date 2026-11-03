<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;

/**
 * Module chrome for DailywithDoc template
 */

function modChrome_card($module, &$params, &$attribs)
{
    $headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
    $moduleClass = $params->get('moduleclass_sfx', '');
    ?>
    <div class="dwd-card-module <?php echo htmlspecialchars($moduleClass, ENT_QUOTES, 'UTF-8'); ?>">
        <?php if ($module->showtitle) : ?>
            <h<?php echo $headerLevel; ?> class="dwd-module-title">
                <?php echo $module->title; ?>
            </h<?php echo $headerLevel; ?>>
        <?php endif; ?>
        <div class="dwd-module-body">
            <?php echo $module->content; ?>
        </div>
    </div>
    <?php
}

function modChrome_sidebar($module, &$params, &$attribs)
{
    $headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
    $moduleClass = $params->get('moduleclass_sfx', '');
    ?>
    <div class="dwd-sidebar-box <?php echo htmlspecialchars($moduleClass, ENT_QUOTES, 'UTF-8'); ?>">
        <?php if ($module->showtitle) : ?>
            <h<?php echo $headerLevel; ?> class="dwd-sidebar-title">
                <?php echo $module->title; ?>
            </h<?php echo $headerLevel; ?>>
        <?php endif; ?>
        <div class="dwd-sidebar-body">
            <?php echo $module->content; ?>
        </div>
    </div>
    <?php
}

function modChrome_clean($module, &$params, &$attribs)
{
    echo $module->content;
}

