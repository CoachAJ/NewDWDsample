<?php
defined('_JEXEC') or die;

use Joomla\CMS\Filter\OutputFilter;
use Joomla\CMS\HTML\HTMLHelper;

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$id = '';

if ($tagId = $params->get('tag_id', '')) {
    $id = ' id="' . $tagId . '"';
}

$class = $params->get('class_sfx', '');
?>
<ul<?php echo $id; ?> class="dwd-nav-menu mod-menu <?php echo htmlspecialchars($class, ENT_QUOTES, 'UTF-8'); ?>">
<?php foreach ($list as $i => &$item) :
    $itemParams = $item->getParams();
    $class = 'nav-item item-' . $item->id;

    if ($item->id == $default_id) {
        $class .= ' default';
    }

    if ($item->id == $active_id || ($item->type === 'alias' && $itemParams->get('aliasoptions') == $active_id)) {
        $class .= ' current';
    }

    if (in_array($item->id, $path)) {
        $class .= ' active';
    } elseif ($item->type === 'alias') {
        $aliasToId = $itemParams->get('aliasoptions');
        if (count($path) > 0 && $aliasToId == $path[count($path) - 1]) {
            $class .= ' active';
        } elseif (in_array($aliasToId, $path)) {
            $class .= ' alias-parent-active';
        }
    }

    if ($item->type === 'separator') {
        $class .= ' divider';
    }

    if ($item->deeper) {
        $class .= ' deeper dropdown';
    }

    if ($item->parent) {
        $class .= ' parent';
    }

    echo '<li class="' . htmlspecialchars($class, ENT_QUOTES, 'UTF-8') . '">';

    switch ($item->type) :
        case 'separator':
        case 'component':
        case 'heading':
        case 'url':
            require __DIR__ . '/default_' . $item->type . '.php';
            break;
        default:
            require __DIR__ . '/default_url.php';
            break;
    endswitch;

    if ($item->deeper) {
        echo '<ul class="dropdown-menu">';
    } elseif ($item->shallower) {
        echo '</li>';
        echo str_repeat('</ul></li>', $item->level_diff);
    } else {
        echo '</li>';
    }
endforeach; ?>
</ul>

