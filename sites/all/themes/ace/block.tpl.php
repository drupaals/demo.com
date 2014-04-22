<div id="<?php print $block_html_id; ?>" class="clearfix <?php print $classes; ?>"<?php print $attributes; ?>>
<?php print render($title_prefix); ?>	
<?php if (!empty($block->subject)): ?>
<div class="titlecontainer"><h4 class="widget-title" <?php print $title_attributes; ?>></div>
<?php endif;?>
<?php print render($title_suffix); ?>

  <div class="content"><?php print $content; ?></div>
</div>
