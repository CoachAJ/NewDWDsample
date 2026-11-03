<?php
defined('_JEXEC') or die;

use Joomla\CMS\Filter\OutputFilter;
use Joomla\CMS\HTML\HTMLHelper;

$title = $item->title;
if ($item->menu_image) {
    $title = HTMLHelper::_('image', $item->menu_image, $item->title, ['class' => 'menu-image']) . $title;
}
$title = OutputFilter::cleanText($title);
?>
<span class="nav-heading dropdown-header">
    <?php echo $title; ?>
    <?php if ($item->deeper) : ?>
        <svg class="chevron-down" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
    <?php endif; ?>
</span>

