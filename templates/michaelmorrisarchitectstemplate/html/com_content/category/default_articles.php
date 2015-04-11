<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

// Create some shortcuts.
$params		= &$this->item->params;
$n			= count($this->items);

$jinput = JFactory::getApplication()->input;
require_once ('/templates/michaelmorrisarchitectstemplate/library.php');
$limit = 6;
$offset = $jinput->get('offset', 0, "INT" );;




?>
<div class='article_listing'>
<?php 
$iCount = 0;
foreach ($this->items as $i => $article) 
{
	if($i >= $offset && $iCount < $limit){
		$displayArticle =& JTable::getInstance("content"); 
		$displayArticle->load($article->id); 
		$images = json_decode($displayArticle->images); 
		$displayTitle = strtoupper(trim(strip_tags($displayArticle->get("title"))));
		$displayText = trim(strip_tags($displayArticle->get("introtext")));
		
		$id = $article->id;
		$alias = $displayArticle->get('alias');
		
		
		if (isset($images->image_intro) and !empty($images->image_intro))
		{
			$displayImage = $images->image_intro;
		}	
		else
		{
			$displayImage = "images/no_image_found.jpg";
		}
		?>
		
		
		<div class='article_listing_wrapper'>
			<div class='article_listing_picture'>
			 	<div class="view view-first">
					<img src='<?php echo htmlspecialchars ("/".$displayImage); ?>' />
				 	<div class="mask">
		                <h2><?php echo $displayTitle; ?></h2>
		                <p><?php echo $displayText; ?></p>
		                <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language)); ?>" class="info">View More</a>
		            </div>	
				</div> 
				
			</div>
			<div class='article_listing_title'>
				<A href='<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language)); ?>'>
					<?php echo $displayTitle."(".$i.")"; ?>
				</A>
			</div>
			
			
		</div>
		
	
	
	
<? 		$iCount++;
		} 
	

	} ?>


	<?php if($n != 0 && $n > $limit) { ?>
	
	<div class="pagination pagination-toolbar">
		<ul class="pagination-list">
			<li class="disabled"><a><i class="icon-previous"></i></a></li>
			<li class="active hidden-phone"><a>1</a></li>
			<li class="hidden-phone"><a>2</a></li>
			<li><a class="hasTooltip" title="Next" href="#" onclick="document.adminForm.limitstart.value=10; Joomla.submitform();return false;"><i class="icon-next"></i></a></li>
		</ul>

	</div>
	
	
		<div class='article_listing_footer_wrapper'>
			<div class='article_listing_footer_content'>
				<?php 
				echo  sap_pagination($this->items, $offset, $limit, JRoute::_(ContentHelperRoute::getCategoryRoute($article->catid))); ?>
			</div>
		</div>
	<?php } ?>
	
</div>
	

