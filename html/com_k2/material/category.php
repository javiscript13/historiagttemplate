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

$doc = JFactory::getDocument();
$doc->addStyleSheet( JURI::base(true).'/templates/historiagttemplate/html/com_k2/material/material_style.css');

?>
<!-- Start K2 Category Layout -->

<div id="k2Container" class="itemListView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

    <?php if($this->params->get('show_page_title')): ?>
    <!-- Page title -->
    <div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
	    <?php echo $this->escape($this->params->get('page_title')); ?>
    </div>
    <?php endif; ?>



    <?php if((isset($this->leading) || isset($this->primary) || isset($this->secondary) || isset($this->links)) && (count($this->leading) || count($this->primary) || count($this->secondary) || count($this->links))): ?>
    <!-- Item list -->
    <div class="itemList">
	    <?php if(isset($this->primary) && count($this->primary)): ?>
	    <!-- Primary items -->
	    <div id="itemListPrimary" class="row">
		    <?php foreach($this->primary as $key=>$item): ?>
			<?php
			// Define a CSS class for the last container on each row
			if( (($key+1)%($this->params->get('num_primary_columns'))==0) || count($this->primary)<$this->params->get('num_primary_columns') )
				$lastContainer= ' itemContainerLast';
			else
				$lastContainer='';
			?>
		    <div class="col-xs-12 col-sm-12 col-md-6 itemContainer<?php echo $lastContainer; ?>">
			    <?php
				    // Load category_item.php by default
				    $this->item = $item;
				    echo $this->loadTemplate('item');
			    ?>
		    </div>
		    <?php endforeach; ?>
	    </div>
	    <?php endif; ?>



	    <?php if(isset($this->links) && count($this->links)): ?>
	    <!-- Link items -->
	    <div id="itemListLinks">
		    <h4><?php echo JText::_('K2_MORE'); ?></h4>
		    <?php foreach($this->links as $key=>$item): ?>

		    <?php
		    // Define a CSS class for the last container on each row
		    if((($key+1)%($this->params->get('num_links_columns'))==0) || count($this->links)<$this->params->get('num_links_columns'))
			    $lastContainer= ' itemContainerLast';
		    else
			    $lastContainer='';
		    ?>

		    <div class="itemContainer<?php echo $lastContainer; ?>"<?php echo (count($this->links)==1) ? '' : ' style="width:'.number_format(100/$this->params->get('num_links_columns'), 1).'%;"'; ?>>
			    <?php
				    // Load category_item.php by default
				    $this->item = $item;
				    echo $this->loadTemplate('item');
			    ?>
		    </div>
		    <?php if(($key+1)%($this->params->get('num_links_columns'))==0): ?>
		    <div class="clr"></div>
		    <?php endif; ?>
		    <?php endforeach; ?>
		    <div class="clr"></div>
	    </div>
	    <?php endif; ?>

    </div>

    <!-- Pagination -->
    <?php if($this->pagination->getPagesLinks()): ?>
    <div class="k2Pagination">
	    <?php if($this->params->get('catPagination')) echo $this->pagination->getPagesLinks(); ?>
	    <div class="clr"></div>
	    <?php if($this->params->get('catPaginationResults')) echo $this->pagination->getPagesCounter(); ?>
    </div>
    <?php endif; ?>

    <?php endif; ?>
</div>

<!-- End K2 Category Layout -->
