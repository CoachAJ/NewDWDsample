<?php
defined('_JEXEC') or die;

use Joomla\CMS\Filter\OutputFilter;
use Joomla\CMS\HTML\HTMLHelper;

$attributes = [];

if ($item->anchor_title) {
    $attributes['title'] = $item->anchor_title;
}

if ($item->anchor_css) {
    $attributes['class'] = $item->anchor_css;
}

if ($item->anchor_rel) {
    $attributes['rel'] = $item->anchor_rel;
}

if ($item->browserNav == 1) {
    $attributes['target'] = '_blank';
    $attributes['rel'] = 'noopener noreferrer';
} elseif ($item->browserNav == 2) {
    $attributes['target'] = '_blank';
}

$linktype = $item->title;

if ($item->menu_image) {
    $linktype = HTMLHelper::_('image', $item->menu_image, $item->title, ['class' => 'menu-image']) . $linktype;
}

$linktype = OutputFilter::cleanText($linktype);
$class = 'nav-link' . ($item->deeper ? ' dropdown-toggle' : '');

$attributes['class'] = isset($attributes['class']) ? $attributes['class'] . ' ' . $class : $class;

$attrString = '';
foreach ($attributes as $key => $val) {
    $attrString .= ' ' . $key . '="' . htmlspecialchars($val, ENT_QUOTES, 'UTF-8') . '"';
}
?>
<a href="<?php echo htmlspecialchars($item->flink, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $attrString; ?>>
    <span><?php echo $linktype; ?></span>
    <?php if ($item->deeper) : ?>
        <svg class="chevron-down" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
    <?php endif; ?>
</a>

