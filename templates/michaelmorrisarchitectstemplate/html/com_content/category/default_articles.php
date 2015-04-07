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
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));


?>
<div class='article_listing_outer'>
<?php foreach ($this->items as $i => $article) 
{
	$displayArticle =& JTable::getInstance("content"); 
	$displayArticle->load($article->id); 
	$images = json_decode($displayArticle->images); 
	$displayTitle = trim(strip_tags($displayArticle->get("title")));
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
				<?php echo $displayTitle; ?>
			</A>
		</div>
	</div>
	
	
	
	
<? } ?>
</div>



