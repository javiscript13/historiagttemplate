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

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2ItemsBlock<?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); ?>">

	<?php if($params->get('itemPreText')): ?>
	<p class="modulePretext"><?php echo $params->get('itemPreText'); ?></p>
	<?php endif; ?>

	<?php if(count($items)): ?>
	
  
    <?php foreach ($items as $key=>$item):	?>
        <?php
            $firstImageFound = preg_match('/(<img)([^>])*(src=["\']([^"\']+)["\'])([^>])*/i', $item->introtext, $matches);
            if($firstImageFound) {
                $firstImage = $matches[4];
            }
            else {
                //default image (to replace if it is found something to replace it)s
                $firstImage = JURI::root().'images/logo-historia-gt.jpg';
                //try to get the image from any attachment
                $changed = false;
                if (count($item->attachments)) {
                    foreach($item->attachments as $attachment) {
                        if ($changed == false){
                            $ext = strtolower(pathinfo($attachment->title, PATHINFO_EXTENSION));
                            if ($ext == 'jpg' or $ext == 'gif' or $ext == 'png' or $ext == 'jpeg') {
                                $firstImage = $attachment->link;
                                $changed = true;
                            }
                        }
                    }
                }
                //try to get image from the item
                if(!empty($item->image) && ($changed == false)) {
                    $firstImage = $item->image;
                }
            }

            $doc = JFactory::getDocument();
            $style = '#jumbo-'.$item->id.' {'
                . 'background-image:linear-gradient(rgba(0, 0, 0, 0.25),rgba(0, 0, 0, 0.25)),' 
                . 'url('.$firstImage.');'
                . '}'
                . '#jumbo-'.$item->id.':hover {'
                . 'background-image:linear-gradient(rgba(55, 41, 22, 0.75),rgba(55, 41, 22, 0.75)),' 
                . 'url('.$firstImage.');'
                . '}'
                ; 
            $doc->addStyleDeclaration( $style );

        ?>
        <div class="jumbotron" id="jumbo-<?php echo $item->id; ?>">

          <!-- Plugins: BeforeDisplay -->
          <?php echo $item->event->BeforeDisplay; ?>

          <!-- K2 Plugins: K2BeforeDisplay -->
          <?php echo $item->event->K2BeforeDisplay; ?>

          <?php if($params->get('itemTitle')): ?>
            <a class="moduleItemTitle" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>

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

          <?php if($params->get('itemAuthor')): ?>
              <div class="moduleItemAuthor">
		            <?php if(isset($item->authorLink)): ?>
		            <a rel="author" title="<?php echo K2HelperUtilities::cleanHtml($item->author); ?>" href="<?php echo $item->authorLink; ?>"><?php echo $item->author; ?></a>
		            <?php else: ?>
		            <?php echo $item->author; ?>
		            <?php endif; ?>				
	           </div>
	       <?php endif; ?>

          <!-- Plugins: AfterDisplay -->
          <?php echo $item->event->AfterDisplay; ?>

          <!-- K2 Plugins: K2AfterDisplay -->
          <?php echo $item->event->K2AfterDisplay; ?>
      </div><!--jumbotron-->
    <?php endforeach; ?>
  
  <?php endif; ?>

</div>
