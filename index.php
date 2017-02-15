<?php

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Output as HTML5
$doc->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');


$doc->addStyleSheet('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
$doc->addStyleSheet('templates/' . $this->template . '/css/style.css');
$doc->addScript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', 'text/javascript');
$doc->addScript('templates/' . $this->template . '/js/main.js');

?>
<!DOCTYPE html>
<html>
<head>
    <jdoc:include type="head" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow|Oswald|Roboto" rel="stylesheet"> 
</head>
  <body>
		<div class="container-fluid pageHead">
			<div class="row">
				<div class="page-header">
					<div class="row">
						<div class="col-xs-4 col-sm-5 col-md-5 hidden-lg"></div>
						<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
							<div class="row">
								<?php
									if ($this->params->get('logoFile')) {
										$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
									}
									else {
										$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
									}
								?>
								<a id="siteLogo" class="col-xs-12 col-sm-12" href="<?php echo $this->baseurl; ?>/"><?php echo $logo; ?></a>
							</div>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 hidden-lg"></div>
						<nav class="navbar col-xs-12 col-lg-10 ">
							<div class="row">
								<div class="navbar-header col-xs-1 hidden-sm hidden-md hidden-lg">
									<button type="button" class="navbar-toggle navbar-inverse collapsed pull-left" data-toggle="collapse" data-target="#emaya-navbar-menu" aria-expanded="false">
									  <span class="sr-only">Cambiar modo de navegación</span>
									  <span class="icon-bar"></span>
									  <span class="icon-bar"></span>
									  <span class="icon-bar"></span>
									</button>
								</div>
								<div class="searchBar col-xs-8 col-sm-4 col-md-5 pull-right">
									<jdoc:include type="modules" name="pageSearchbar" style="xhtml" />
								</div>
								<div class="collapse navbar-collapse col-xs-12 col-sm-6 col-md-7 col-lg-12" id="emaya-navbar-menu">
									<jdoc:include type="modules" name="pageMenubar" style="xhtml" />
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<jdoc:include type="modules" name="debug" style="xhtml" />
		<div class="container pageBody">
			<div class="row pageMain">
			    <div class="hidden-xs col col-sm-1"></div>
				<div class="col-xs-12 col-sm-10">
                    <jdoc:include type="message" />
					<?php
					$menu = JFactory::getApplication()->getMenu();
					if ($menu->getActive() != $menu->getDefault()) { ?>
							  <jdoc:include type="component" />
					<?php } ?>
					<jdoc:include type="modules" name="pageContent" style="xhtml" />
				</div>
				<div class="hidden-xs col col-sm-1"></div>
			</div>
		</div>
		<div class="pageBottom">
			<div class="container">
				<div class="row pageBottom">
					<jdoc:include type="modules" name="pagePromoted" style="xhtml" />
				</div>
			</div>
		</div>
		<div class="pageFooter">
			<jdoc:include type="modules" name="pageFooter" style="xhtml" />
		</div>
	</body>
</html>

