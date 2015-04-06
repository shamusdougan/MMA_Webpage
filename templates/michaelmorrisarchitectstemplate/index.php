<?php


defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();


JLoader::import('joomla.filesystem.file');


JHtml::_('bootstrap.framework');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template .'/css/site.css');
$doc->addScript($this->baseurl . '/templates/' . $this->template .'/js/jquery.cycle.lite.js');	
require_once ($this->baseurl . '/templates/' . $this->template .'/library.php');

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>


<jdoc:include type="head" />

<script> 
	jQuery(document).ready(function(){

		jQuery("#menu_toggle").click(function() {
	   		jQuery("#menu").animate({
	            width: 'toggle'		
			});
			jQuery("#nav_icon").toggleClass("left_menu_left_arrow left_menu_right_arrow");
		});

	});
	
	
	
	
	 
	jQuery(document).ready(function() {
				jQuery('#slideshow').cycle({
				fx: 'fade',
				pager: '#smallnav', 
				pause:   1, 
				speed: 5000,
				timeout:  3500 
			});			
		});
	
</script> 


</head>
<body>




<div class='body_wrapper'>
	<Div  class='left_menu'>
		<div id="menu" class='left_menu_content'>
		
		
			<div style='height: 100px;'></div>
			<div style='padding-left: 20px; font-size: 0.79em'><img src='<? echo $this->baseurl . '/templates/' . $this->template; ?>/images/MMA_Logo_notext.jpg'><br>MICHAEL MORRIS ARCHITECTS</div>
			<div style='padding-top: 50px;'>
				<jdoc:include type="modules" name="left_menu" />
					
			</div>
		</div>
		<div id='menu_toggle' class='left_menu_toggle'>
			<div style="height: 350px;"></div>
			<div id='nav_icon' class='left_menu_left_arrow'></div>
			
		</div>
	</div>
	<div class='content_main'>
		<div id="slideshow">
			<?php
			$filelist = get_backgroundlist();
			
			foreach($filelist as $filename){
				echo "<image src='/".$filename."' class='bgM'/>\n";
				}
			
			?>
		</div>
		<div style="height: 200px"></div>
		<div class='content_body'>
			<jdoc:include type="component" />
			
			
			
		</div>


	
	</div>
	
	
</div>




</body>
</html>