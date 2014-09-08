<?php
/**
 * @file
 * characterunite_content_types.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function characterunite_content_types_field_group_info() {
  $export = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_file|field_collection_item|field_character_unite_sections|form';
  $field_group->group_name = 'group_file';
  $field_group->entity_type = 'field_collection_item';
  $field_group->bundle = 'field_character_unite_sections';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'File',
    'weight' => '4',
    'children' => array(
      0 => 'field_cu_section_file',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'File',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-file field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_file|field_collection_item|field_character_unite_sections|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_image|field_collection_item|field_character_unite_sections|form';
  $field_group->group_name = 'group_image';
  $field_group->entity_type = 'field_collection_item';
  $field_group->bundle = 'field_character_unite_sections';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Image',
    'weight' => '5',
    'children' => array(
      0 => 'field_cu_section_image',
      1 => 'field_cu_section_image_href',
      2 => 'field_cu_section_image_type',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Image',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-image field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_image|field_collection_item|field_character_unite_sections|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_links|field_collection_item|field_character_unite_sections|form';
  $field_group->group_name = 'group_links';
  $field_group->entity_type = 'field_collection_item';
  $field_group->bundle = 'field_character_unite_sections';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Links',
    'weight' => '3',
    'children' => array(
      0 => 'field_cu_section_link',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Links',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-links field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_links|field_collection_item|field_character_unite_sections|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_video|field_collection_item|field_character_unite_sections|form';
  $field_group->group_name = 'group_video';
  $field_group->entity_type = 'field_collection_item';
  $field_group->bundle = 'field_character_unite_sections';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Video',
    'weight' => '6',
    'children' => array(
      0 => 'field_cu_section_video_thumbnail',
      1 => 'field_cu_section_video_href',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Video',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-video field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_video|field_collection_item|field_character_unite_sections|form'] = $field_group;

  return $export;
}
