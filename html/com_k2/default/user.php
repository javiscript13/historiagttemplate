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

// Get user stuff (do not change)
$user = JFactory::getUser();

?>

<!-- Start K2 User Layout -->

<div id="k2Container" class="userView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

	<?php if($this->params->get('show_page_title') && $this->params->get('page_title')!=$this->user->name): ?>
	<!-- Page title -->
	<div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
	<?php endif; ?>

	<?php if ($this->params->get('userImage') || $this->params->get('userName') || $this->params->get('userDescription') || $this->params->get('userURL') || $this->params->get('userEmail')): ?>
	<div class="userBlock">

		<?php if ($this->params->get('userImage') && !empty($this->user->avatar)): ?>
		<img src="<?php echo $this->user->avatar; ?>" alt="<?php echo htmlspecialchars($this->user->name, ENT_QUOTES, 'UTF-8'); ?>" style="width:<?php echo $this->params->get('userImageWidth'); ?>px; height:auto;" />
		<?php endif; ?>

		<?php if ($this->params->get('userName')): ?>
		<h2><?php echo $this->user->name; ?></h2>
		<?php endif; ?>

		<?php if ($this->params->get('userDescription') && trim($this->user->profile->description)): ?>
		<div class="userDescription"><?php echo $this->user->profile->description; ?></div>
		<?php endif; ?>

		<?php echo $this->user->event->K2UserDisplay; ?>

		<div class="clr"></div>
	</div>
	<?php endif; ?>



	<?php if(count($this->items)): ?>
	<!-- Item list -->
	<div class="row">
	    <div class="userItemList">
		    <?php foreach ($this->items as $item): ?>
                <?php
                    $firstImageFound = preg_match('/(<img)([^>])*(src=["\']([^"\']+)["\'])([^>])*/i', $item->introtext, $matches);
                    if($firstImageFound) {
                        $firstImage = JURI::root().$matches[4];
                    }
                    else {
                        //default image (to replace if it is found something to replace it)s
                        $firstImage = JURI::root().'images/logo-historia-gt.jpg';
                        //try to get image from the item
                        if(!empty($item->imageGeneric)) {
                            $firstImage = $item->imageGeneric;
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
		    <!-- Start K2 Item Layout -->
		    <div id="jumbo-<?php echo $item->id; ?>" class="jumbotron userItemView<?php if(!$item->published || ($item->publish_up != $this->nullDate && $item->publish_up > $this->now) || ($item->publish_down != $this->nullDate && $item->publish_down < $this->now)) echo ' userItemViewUnpublished'; ?><?php echo ($item->featured) ? ' userItemIsFeatured' : ''; ?>">

			    <!-- Plugins: BeforeDisplay -->
			    <?php echo $item->event->BeforeDisplay; ?>

			    <!-- K2 Plugins: K2BeforeDisplay -->
			    <?php echo $item->event->K2BeforeDisplay; ?>

			    <div class="userItemHeader">
			      <?php if($this->params->get('userItemTitle')): ?>
			      <!-- Item title -->
			      <h3 class="userItemTitle">
			      	<?php if ($this->params->get('userItemTitleLinked') && $item->published): ?>
					    <a href="<?php echo $item->link; ?>">
			      		<?php echo $item->title; ?>
			      	</a>
			      	<?php else: ?>
			      	<?php echo $item->title; ?>
			      	<?php endif; ?>
			      	<?php if(!$item->published || ($item->publish_up != $this->nullDate && $item->publish_up > $this->now) || ($item->publish_down != $this->nullDate && $item->publish_down < $this->now)): ?>
			      	<span>
		      			<sup>
		      				<?php echo JText::_('K2_UNPUBLISHED'); ?>
		      			</sup>
	      			</span>
	      			<?php endif; ?>
			      </h3>
			      <?php endif; ?>
		      </div>

		      <!-- Plugins: AfterDisplayTitle -->
		      <?php echo $item->event->AfterDisplayTitle; ?>

		      <!-- K2 Plugins: K2AfterDisplayTitle -->
		      <?php echo $item->event->K2AfterDisplayTitle; ?>

		      <!-- Plugins: AfterDisplay -->
		      <?php echo $item->event->AfterDisplay; ?>

		      <!-- K2 Plugins: K2AfterDisplay -->
		      <?php echo $item->event->K2AfterDisplay; ?>

			    <div class="clr"></div>
		    </div>
		    <!-- End K2 Item Layout -->

		    <?php endforeach; ?>
	    </div>
    </div>
	<!-- Pagination -->
	<?php if(count($this->pagination->getPagesLinks())): ?>
	<div class="k2Pagination">
		<?php echo $this->pagination->getPagesLinks(); ?>
		<div class="clr"></div>
		<?php echo $this->pagination->getPagesCounter(); ?>
	</div>
	<?php endif; ?>

	<?php endif; ?>

</div>

<!-- End K2 User Layout -->
