<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Including fallback code for the placeholder attribute in the search field.
JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', false, true);

$button_text = 'buscar';
$img = '';

?>
<div class="search<?php echo $moduleclass_sfx ?>">
	<form action="<?php echo JRoute::_('index.php');?>" method="post" class="form-inline navbar-form" role="search">
		<div id="search-group" class="form-group pull-right">
			<div class="row">
				<?php
					$output = '<input name="searchword" id="mod-search-searchword" maxlength="' . $maxlength . '"  class="inputbox search-query col-xs-10" type="search"' . $width;
					$output .= ' placeholder="' . $text . '" />';
					$btn_output = ' <button id="search-button" type="submit" alt="' . $button_text . '" class="btn glyphicon glyphicon-search col-xs-1" src="' . $img . '" role="button" onclick="this.form.searchword.focus();" aria-hidden="true" />';

					echo $output;
					echo $btn_output;
				?>
			</div>
			<input type="hidden" name="task" value="search" />
			<input type="hidden" name="option" value="com_search" />
			<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
		</div>
	</form>
</div>
