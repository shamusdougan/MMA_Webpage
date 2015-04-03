<?php


defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();

JLoader::import('joomla.filesystem.file');


JHtml::_('bootstrap.framework');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template .'/css/site.css');

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>


<jdoc:include type="head" />

<script> 
$(document).ready(function(){
    $("#menu_toggle").click(function(){
        $("#menu").animate({
            width: 'toggle'		
        });
        
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
				<ul>
					<li>Hello</li>
					<li>This again</li>
				</ul>
			</div>
			Hello this is the left menu 		
			
		</div>
		<div id='menu_toggle' class='left_menu_toggle'>
			<div style="height: 350px;"></div>
			<div id='nav_icon' class='left_menu_left_arrow'></div>
			
		</div>
	</div>
	<div class='content_main'>Main content goes here</div>
	
	
</div>




</body>
</html>