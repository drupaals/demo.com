<?php

/**
 * @file
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $caption: The caption for this table. May be empty.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 * @ingroup views_templates
 */
$rohit="";
$version_result="";
foreach($rows as $output){
 $value = node_load($output['nid']);
	  if(!empty($value->field_module_version)){
	       foreach($value->field_module_version['und'] as $key=>$module_version){
		    $version=taxonomy_term_load($module_version['tid']);
		    $tid_name=substr($version->name, 0 , 1);
		    $version_result.=$tid_name.', ';  
	       }
	  }

	  $num = explode(',',$version_result); $j=2; $tgs='';
	  foreach($num as $nums){if($j<count($num)) $comma = ', '; else $comma = '';  $tgs .= $nums.$comma; $j++;}
          $rohit.='<tr class="even tablesorter">
                  <td>'.$output['title'].' </td>
                  <td class="views-field views-field-nid">'.$tgs.'</td>
              </tr>';
              $version_result="";
}

?>
<table <?php if ($classes) { print 'class="'. $classes . ' tablesorter " '; } ?><?php print $attributes; ?>>
   <?php if (!empty($title) || !empty($caption)) : ?>
     <caption><?php print $caption . $title; ?></caption>
  <?php endif; ?>
  <?php if (!empty($header)) : ?>
    <thead>
      <tr>
        <?php foreach ($header as $field => $label): ?>
          <th <?php if ($header_classes[$field]) { print 'class="'. $header_classes[$field] . ' headerSortUp up" '; } ?>>
            <?php print $label; ?>
          </th>
        <?php endforeach; ?>
      </tr>
    </thead>
  <?php endif; ?>
  <tbody>
    <?php print $rohit; ?>
  </tbody>
</table>

