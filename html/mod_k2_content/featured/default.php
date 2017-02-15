<?php
/**
 * @version    2.7.x
 * @package    K2
 * @author     JoomlaWorks http://www.joomlaworks.net
 * @copyright  Copyright (c) 2006 - 2016 JoomlaWorks Ltd. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2ItemsBlock">

	<?php if($params->get('itemPreText')): ?>
	<p class="modulePretext"><?php echo $params->get('itemPreText'); ?></p>
	<?php endif; ?>

	<?php if(count($items)): ?>
	
    <ul>
    <?php foreach ($items as $key=>$item):	?>

          <!-- Plugins: BeforeDisplay -->
          <?php echo $item->event->BeforeDisplay; ?>

          <!-- K2 Plugins: K2BeforeDisplay -->
          <?php echo $item->event->K2BeforeDisplay; ?>

          <?php if($params->get('itemTitle')): ?>
            <li><a class="moduleItemTitle" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></li>

          <?php endif; ?>

          <!-- Plugins: AfterDisplayTitle -->
          <?php echo $item->event->AfterDisplayTitle; ?>

          <!-- K2 Plugins: K2AfterDisplayTitle -->
          <?php echo $item->event->K2AfterDisplayTitle; ?>

          <!-- Plugins: BeforeDisplayContent -->
          <?php echo $item->event->BeforeDisplayContent; ?>

          <!-- K2 Plugins: K2BeforeDisplayContent -->
          <?php echo $item->event->K2BeforeDisplayContent; ?>

          <!-- Plugins: AfterDisplayContent -->
          <?php echo $item->event->AfterDisplayContent; ?>

          <!-- K2 Plugins: K2AfterDisplayContent -->
          <?php echo $item->event->K2AfterDisplayContent; ?>

          <!-- Plugins: AfterDisplay -->
          <?php echo $item->event->AfterDisplay; ?>

          <!-- K2 Plugins: K2AfterDisplay -->
          <?php echo $item->event->K2AfterDisplay; ?>
    <?php endforeach; ?>
    </ul>
  <?php endif; ?>

</div>
