<?php
/**
 * @file
 * characterunite_content_types.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function characterunite_content_types_taxonomy_default_vocabularies() {
  return array(
    'image_types' => array(
      'name' => 'Image Types',
      'machine_name' => 'image_types',
      'description' => 'Type of image size',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
    'pane' => array(
      'name' => 'Pane',
      'machine_name' => 'pane',
      'description' => 'Left and Right Pane',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
    'section_background_color' => array(
      'name' => 'Section Background Color',
      'machine_name' => 'section_background_color',
      'description' => 'To select whether background color of a section is dark grey',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
  );
}
