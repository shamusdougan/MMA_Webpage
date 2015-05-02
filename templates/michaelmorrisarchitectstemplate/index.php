<?php


defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$menuID 		 = $app->getMenu()->getActive()->id;
$doc             = JFactory::getDocument();


JLoader::import('joomla.filesystem.file');


JHtml::_('bootstrap.framework');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template .'/css/site.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template .'/css/articles-display.css');
$doc->addScript($this->baseurl . '/templates/' . $this->template .'/js/jquery.cycle.lite.js');	
require_once __DIR__ . '/library.php';


//place different backgrounds for different pages
$filelist = array();
$imagePath = "images/backgrounds/";
$imagePath2 = "images/background_blackwhite/";
if($menuID == 101) // Homepage
	{
	$filelist = get_backgroundlist();	
	}
elseif($menuID == 103) //About page
	{
	
	$filelist[] = $imagePath2."merton_hero_bw.jpg";
	}
elseif($menuID == 104) //principals	
	{
	$filelist[] = $imagePath2."principals_background.JPG";
	}
elseif($menuID == 108 || $menuID == 109 || $menuID == 110 || $menuID == 106) //projects pages
	{
	$filelist[] = $imagePath2."merton_hero_bw.jpg";
	}
else
	{
	$filelist = get_backgroundlist();	
	}
			
			



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
				speed: 2000,
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
			<div class='logoTitle' ><img src='<? echo $this->baseurl . '/templates/' . $this->template; ?>/images/MMA_Logo_notext.jpg'><br>MICHAEL MORRIS ARCHITECTS</div>
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
			foreach($filelist as $filename){
				echo "<image src='/".$filename."' class='bgM'/>\n";
				}
			?>
		</div>
		


	
		<div class='content_body'>	
			<jdoc:include type="component" />
		</div>
		
			
		</div>


	
	</div>
	
	
</div>




</body>
</html>