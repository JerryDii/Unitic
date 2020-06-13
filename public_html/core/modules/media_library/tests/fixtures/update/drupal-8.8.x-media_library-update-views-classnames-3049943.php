<?php
// @codingStandardsIgnoreFile
/**
 * @file
 * Contains database additions to drupal-8.4.0-media_installed.php for testing
 * the the addition of BEM classes to the media library views config.
 */

use Drupal\Core\Database\Database;

$connection = Database::getConnection();

// Set the schema version.
$connection->merge('key_value')
  ->fields([
    'value' => 'i:8000;',
    'name' => 'media_library',
    'collection' => 'system.schema',
  ])
  ->condition('collection', 'system.schema')
  ->condition('name', 'media_library')
  ->execute();

// Update core.extension.
$extensions = $connection->select('config')
  ->fields('config', ['data'])
  ->condition('collection', '')
  ->condition('name', 'core.extension')
  ->execute()
  ->fetchField();
$extensions = unserialize($extensions);
$extensions['module']['media_library'] = 0;
$connection->update('config')
  ->fields([
    'data' => serialize($extensions),
    'collection' => '',
    'name' => 'core.extension',
  ])
  ->condition('collection', '')
  ->condition('name', 'core.extension')
  ->execute();

$connection->insert('config')
  ->fields(array(
    'collection',
    'name',
    'data',
  ))
  ->values(array(
    'collection' => '',
    'name' => 'views.view.media_library',
    'data' => 'a:14:{s:4:"uuid";s:36:"f57329d9-bc3a-43c4-90a8-ace75fcc2e22";s:8:"langcode";s:2:"en";s:6:"status";b:1;s:12:"dependencies";a:3:{s:6:"config";a:2:{i:0;s:41:"core.entity_view_mode.media.media_library";i:1;s:25:"image.style.media_library";}s:8:"enforced";a:1:{s:6:"module";a:1:{i:0;s:13:"media_library";}}s:6:"module";a:4:{i:0;s:5:"image";i:1;s:5:"media";i:2;s:13:"media_library";i:3;s:4:"user";}}s:5:"_core";a:1:{s:19:"default_config_hash";s:43:"AWji7uYzNsxcFVzYkTki4iTCAT2cn2s7FLMu64brtQo";}s:2:"id";s:13:"media_library";s:5:"label";s:13:"Media library";s:6:"module";s:5:"views";s:11:"description";s:22:"Find and manage media.";s:3:"tag";s:0:"";s:10:"base_table";s:16:"media_field_data";s:10:"base_field";s:3:"mid";s:4:"core";s:3:"8.x";s:7:"display";a:4:{s:7:"default";a:6:{s:14:"display_plugin";s:7:"default";s:2:"id";s:7:"default";s:13:"display_title";s:6:"Master";s:8:"position";i:0;s:15:"display_options";a:18:{s:6:"access";a:2:{s:4:"type";s:4:"perm";s:7:"options";a:1:{s:4:"perm";s:21:"access media overview";}}s:5:"cache";a:2:{s:4:"type";s:3:"tag";s:7:"options";a:0:{}}s:5:"query";a:2:{s:4:"type";s:11:"views_query";s:7:"options";a:5:{s:19:"disable_sql_rewrite";b:0;s:8:"distinct";b:0;s:7:"replica";b:0;s:13:"query_comment";s:0:"";s:10:"query_tags";a:0:{}}}s:12:"exposed_form";a:2:{s:4:"type";s:5:"basic";s:7:"options";a:7:{s:13:"submit_button";s:13:"Apply filters";s:12:"reset_button";b:0;s:18:"reset_button_label";s:5:"Reset";s:19:"exposed_sorts_label";s:7:"Sort by";s:17:"expose_sort_order";b:0;s:14:"sort_asc_label";s:3:"Asc";s:15:"sort_desc_label";s:4:"Desc";}}s:5:"pager";a:2:{s:4:"type";s:4:"mini";s:7:"options";a:6:{s:14:"items_per_page";i:24;s:6:"offset";i:0;s:2:"id";i:0;s:11:"total_pages";N;s:6:"expose";a:7:{s:14:"items_per_page";b:0;s:20:"items_per_page_label";s:14:"Items per page";s:22:"items_per_page_options";s:13:"6, 12, 24, 48";s:26:"items_per_page_options_all";b:0;s:32:"items_per_page_options_all_label";s:7:"- All -";s:6:"offset";b:0;s:12:"offset_label";s:6:"Offset";}s:4:"tags";a:2:{s:8:"previous";s:6:"‹‹";s:4:"next";s:6:"››";}}}s:5:"style";a:2:{s:4:"type";s:7:"default";s:7:"options";a:3:{s:8:"grouping";a:0:{}s:9:"row_class";s:84:"media-library-item media-library-item--grid js-media-library-item js-click-to-select";s:17:"default_row_class";b:1;}}s:3:"row";a:2:{s:4:"type";s:6:"fields";s:7:"options";a:4:{s:22:"default_field_elements";b:1;s:6:"inline";a:0:{}s:9:"separator";s:0:"";s:10:"hide_empty";b:0;}}s:6:"fields";a:2:{s:15:"media_bulk_form";a:26:{s:2:"id";s:15:"media_bulk_form";s:5:"table";s:5:"media";s:5:"field";s:15:"media_bulk_form";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:5:"label";s:0:"";s:7:"exclude";b:0;s:5:"alter";a:26:{s:10:"alter_text";b:0;s:4:"text";s:0:"";s:9:"make_link";b:0;s:4:"path";s:0:"";s:8:"absolute";b:0;s:8:"external";b:0;s:14:"replace_spaces";b:0;s:9:"path_case";s:4:"none";s:15:"trim_whitespace";b:0;s:3:"alt";s:0:"";s:3:"rel";s:0:"";s:10:"link_class";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:6:"target";s:0:"";s:5:"nl2br";b:0;s:10:"max_length";i:0;s:13:"word_boundary";b:1;s:8:"ellipsis";b:1;s:9:"more_link";b:0;s:14:"more_link_text";s:0:"";s:14:"more_link_path";s:0:"";s:10:"strip_tags";b:0;s:4:"trim";b:0;s:13:"preserve_tags";s:0:"";s:4:"html";b:0;}s:12:"element_type";s:0:"";s:13:"element_class";s:27:"js-click-to-select-checkbox";s:18:"element_label_type";s:0:"";s:19:"element_label_class";s:0:"";s:19:"element_label_colon";b:0;s:20:"element_wrapper_type";s:0:"";s:21:"element_wrapper_class";s:0:"";s:23:"element_default_classes";b:1;s:5:"empty";s:0:"";s:10:"hide_empty";b:0;s:10:"empty_zero";b:0;s:16:"hide_alter_empty";b:1;s:12:"action_title";s:6:"Action";s:15:"include_exclude";s:7:"exclude";s:16:"selected_actions";a:0:{}s:11:"entity_type";s:5:"media";s:9:"plugin_id";s:9:"bulk_form";}s:15:"rendered_entity";a:24:{s:2:"id";s:15:"rendered_entity";s:5:"table";s:5:"media";s:5:"field";s:15:"rendered_entity";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:5:"label";s:0:"";s:7:"exclude";b:0;s:5:"alter";a:26:{s:10:"alter_text";b:0;s:4:"text";s:0:"";s:9:"make_link";b:0;s:4:"path";s:0:"";s:8:"absolute";b:0;s:8:"external";b:0;s:14:"replace_spaces";b:0;s:9:"path_case";s:4:"none";s:15:"trim_whitespace";b:0;s:3:"alt";s:0:"";s:3:"rel";s:0:"";s:10:"link_class";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:6:"target";s:0:"";s:5:"nl2br";b:0;s:10:"max_length";i:0;s:13:"word_boundary";b:1;s:8:"ellipsis";b:1;s:9:"more_link";b:0;s:14:"more_link_text";s:0:"";s:14:"more_link_path";s:0:"";s:10:"strip_tags";b:0;s:4:"trim";b:0;s:13:"preserve_tags";s:0:"";s:4:"html";b:0;}s:12:"element_type";s:0:"";s:13:"element_class";s:27:"media-library-item__content";s:18:"element_label_type";s:0:"";s:19:"element_label_class";s:0:"";s:19:"element_label_colon";b:0;s:20:"element_wrapper_type";s:0:"";s:21:"element_wrapper_class";s:0:"";s:23:"element_default_classes";b:1;s:5:"empty";s:0:"";s:10:"hide_empty";b:0;s:10:"empty_zero";b:0;s:16:"hide_alter_empty";b:1;s:9:"view_mode";s:13:"media_library";s:11:"entity_type";s:5:"media";s:9:"plugin_id";s:15:"rendered_entity";}}s:7:"filters";a:4:{s:6:"status";a:16:{s:2:"id";s:6:"status";s:5:"table";s:16:"media_field_data";s:5:"field";s:6:"status";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:8:"operator";s:1:"=";s:5:"value";s:1:"1";s:5:"group";i:1;s:7:"exposed";b:1;s:6:"expose";a:12:{s:11:"operator_id";s:0:"";s:5:"label";s:17:"Publishing status";s:11:"description";N;s:12:"use_operator";b:0;s:8:"operator";s:9:"status_op";s:10:"identifier";s:6:"status";s:8:"required";b:1;s:8:"remember";b:0;s:8:"multiple";b:0;s:14:"remember_roles";a:1:{s:13:"authenticated";s:13:"authenticated";}s:24:"operator_limit_selection";b:0;s:13:"operator_list";a:0:{}}s:10:"is_grouped";b:1;s:10:"group_info";a:10:{s:5:"label";s:9:"Published";s:11:"description";s:0:"";s:10:"identifier";s:6:"status";s:8:"optional";b:1;s:6:"widget";s:6:"select";s:8:"multiple";b:0;s:8:"remember";b:0;s:13:"default_group";s:3:"All";s:22:"default_group_multiple";a:0:{}s:11:"group_items";a:2:{i:1;a:3:{s:5:"title";s:9:"Published";s:8:"operator";s:1:"=";s:5:"value";s:1:"1";}i:2;a:3:{s:5:"title";s:11:"Unpublished";s:8:"operator";s:1:"=";s:5:"value";s:1:"0";}}}s:9:"plugin_id";s:7:"boolean";s:11:"entity_type";s:5:"media";s:12:"entity_field";s:6:"status";}s:4:"name";a:16:{s:2:"id";s:4:"name";s:5:"table";s:16:"media_field_data";s:5:"field";s:4:"name";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:8:"operator";s:8:"contains";s:5:"value";s:0:"";s:5:"group";i:1;s:7:"exposed";b:1;s:6:"expose";a:12:{s:11:"operator_id";s:7:"name_op";s:5:"label";s:4:"Name";s:11:"description";s:0:"";s:12:"use_operator";b:0;s:8:"operator";s:7:"name_op";s:10:"identifier";s:4:"name";s:8:"required";b:0;s:8:"remember";b:0;s:8:"multiple";b:0;s:14:"remember_roles";a:3:{s:13:"authenticated";s:13:"authenticated";s:9:"anonymous";s:1:"0";s:13:"administrator";s:1:"0";}s:24:"operator_limit_selection";b:0;s:13:"operator_list";a:0:{}}s:10:"is_grouped";b:0;s:10:"group_info";a:10:{s:5:"label";s:0:"";s:11:"description";s:0:"";s:10:"identifier";s:0:"";s:8:"optional";b:1;s:6:"widget";s:6:"select";s:8:"multiple";b:0;s:8:"remember";b:0;s:13:"default_group";s:3:"All";s:22:"default_group_multiple";a:0:{}s:11:"group_items";a:0:{}}s:11:"entity_type";s:5:"media";s:12:"entity_field";s:4:"name";s:9:"plugin_id";s:6:"string";}s:6:"bundle";a:16:{s:2:"id";s:6:"bundle";s:5:"table";s:16:"media_field_data";s:5:"field";s:6:"bundle";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:8:"operator";s:2:"in";s:5:"value";a:0:{}s:5:"group";i:1;s:7:"exposed";b:1;s:6:"expose";a:13:{s:11:"operator_id";s:9:"bundle_op";s:5:"label";s:10:"Media type";s:11:"description";s:0:"";s:12:"use_operator";b:0;s:8:"operator";s:9:"bundle_op";s:10:"identifier";s:4:"type";s:8:"required";b:0;s:8:"remember";b:0;s:8:"multiple";b:0;s:14:"remember_roles";a:3:{s:13:"authenticated";s:13:"authenticated";s:9:"anonymous";s:1:"0";s:13:"administrator";s:1:"0";}s:6:"reduce";b:0;s:24:"operator_limit_selection";b:0;s:13:"operator_list";a:0:{}}s:10:"is_grouped";b:0;s:10:"group_info";a:10:{s:5:"label";s:10:"Media type";s:11:"description";N;s:10:"identifier";s:6:"bundle";s:8:"optional";b:1;s:6:"widget";s:6:"select";s:8:"multiple";b:0;s:8:"remember";b:0;s:13:"default_group";s:3:"All";s:22:"default_group_multiple";a:0:{}s:11:"group_items";a:3:{i:1;a:0:{}i:2;a:0:{}i:3;a:0:{}}}s:11:"entity_type";s:5:"media";s:12:"entity_field";s:6:"bundle";s:9:"plugin_id";s:6:"bundle";}s:12:"status_extra";a:15:{s:2:"id";s:12:"status_extra";s:5:"table";s:16:"media_field_data";s:5:"field";s:12:"status_extra";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:8:"operator";s:1:"=";s:5:"value";s:0:"";s:5:"group";i:1;s:7:"exposed";b:0;s:6:"expose";a:12:{s:11:"operator_id";s:0:"";s:5:"label";s:0:"";s:11:"description";s:0:"";s:12:"use_operator";b:0;s:8:"operator";s:0:"";s:24:"operator_limit_selection";b:0;s:13:"operator_list";a:0:{}s:10:"identifier";s:0:"";s:8:"required";b:0;s:8:"remember";b:0;s:8:"multiple";b:0;s:14:"remember_roles";a:1:{s:13:"authenticated";s:13:"authenticated";}}s:10:"is_grouped";b:0;s:10:"group_info";a:10:{s:5:"label";s:0:"";s:11:"description";s:0:"";s:10:"identifier";s:0:"";s:8:"optional";b:1;s:6:"widget";s:6:"select";s:8:"multiple";b:0;s:8:"remember";b:0;s:13:"default_group";s:3:"All";s:22:"default_group_multiple";a:0:{}s:11:"group_items";a:0:{}}s:11:"entity_type";s:5:"media";s:9:"plugin_id";s:12:"media_status";}}s:5:"sorts";a:3:{s:7:"created";a:13:{s:2:"id";s:7:"created";s:5:"table";s:16:"media_field_data";s:5:"field";s:7:"created";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:5:"order";s:4:"DESC";s:7:"exposed";b:1;s:6:"expose";a:1:{s:5:"label";s:12:"Newest first";}s:11:"granularity";s:6:"second";s:11:"entity_type";s:5:"media";s:12:"entity_field";s:7:"created";s:9:"plugin_id";s:4:"date";}s:4:"name";a:12:{s:2:"id";s:4:"name";s:5:"table";s:16:"media_field_data";s:5:"field";s:4:"name";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:5:"order";s:3:"ASC";s:7:"exposed";b:1;s:6:"expose";a:1:{s:5:"label";s:10:"Name (A-Z)";}s:11:"entity_type";s:5:"media";s:12:"entity_field";s:4:"name";s:9:"plugin_id";s:8:"standard";}s:6:"name_1";a:12:{s:2:"id";s:6:"name_1";s:5:"table";s:16:"media_field_data";s:5:"field";s:4:"name";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:5:"order";s:4:"DESC";s:7:"exposed";b:1;s:6:"expose";a:1:{s:5:"label";s:10:"Name (Z-A)";}s:11:"entity_type";s:5:"media";s:12:"entity_field";s:4:"name";s:9:"plugin_id";s:8:"standard";}}s:5:"title";s:5:"Media";s:6:"header";a:0:{}s:6:"footer";a:0:{}s:5:"empty";a:1:{s:16:"area_text_custom";a:10:{s:2:"id";s:16:"area_text_custom";s:5:"table";s:5:"views";s:5:"field";s:16:"area_text_custom";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:5:"empty";b:1;s:8:"tokenize";b:0;s:7:"content";s:19:"No media available.";s:9:"plugin_id";s:11:"text_custom";}}s:13:"relationships";a:0:{}s:17:"display_extenders";a:0:{}s:8:"use_ajax";b:1;s:9:"css_class";s:40:"media-library-view js-media-library-view";}s:14:"cache_metadata";a:3:{s:7:"max-age";i:0;s:8:"contexts";a:6:{i:0;s:28:"languages:language_interface";i:1;s:3:"url";i:2;s:14:"url.query_args";i:3;s:22:"url.query_args:sort_by";i:4;s:4:"user";i:5;s:16:"user.permissions";}s:4:"tags";a:0:{}}}s:4:"page";a:6:{s:14:"display_plugin";s:4:"page";s:2:"id";s:4:"page";s:13:"display_title";s:4:"Page";s:8:"position";i:1;s:15:"display_options";a:5:{s:17:"display_extenders";a:0:{}s:4:"path";s:19:"admin/content/media";s:4:"menu";a:8:{s:4:"type";s:3:"tab";s:5:"title";s:5:"Media";s:11:"description";s:49:"Allows users to browse and administer media items";s:8:"expanded";b:0;s:6:"parent";s:20:"system.admin_content";s:6:"weight";i:5;s:7:"context";s:1:"0";s:9:"menu_name";s:5:"admin";}s:6:"fields";a:5:{s:15:"media_bulk_form";a:26:{s:2:"id";s:15:"media_bulk_form";s:5:"table";s:5:"media";s:5:"field";s:15:"media_bulk_form";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:5:"label";s:0:"";s:7:"exclude";b:0;s:5:"alter";a:26:{s:10:"alter_text";b:0;s:4:"text";s:0:"";s:9:"make_link";b:0;s:4:"path";s:0:"";s:8:"absolute";b:0;s:8:"external";b:0;s:14:"replace_spaces";b:0;s:9:"path_case";s:4:"none";s:15:"trim_whitespace";b:0;s:3:"alt";s:0:"";s:3:"rel";s:0:"";s:10:"link_class";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:6:"target";s:0:"";s:5:"nl2br";b:0;s:10:"max_length";i:0;s:13:"word_boundary";b:1;s:8:"ellipsis";b:1;s:9:"more_link";b:0;s:14:"more_link_text";s:0:"";s:14:"more_link_path";s:0:"";s:10:"strip_tags";b:0;s:4:"trim";b:0;s:13:"preserve_tags";s:0:"";s:4:"html";b:0;}s:12:"element_type";s:0:"";s:13:"element_class";s:27:"js-click-to-select-checkbox";s:18:"element_label_type";s:0:"";s:19:"element_label_class";s:0:"";s:19:"element_label_colon";b:0;s:20:"element_wrapper_type";s:0:"";s:21:"element_wrapper_class";s:0:"";s:23:"element_default_classes";b:1;s:5:"empty";s:0:"";s:10:"hide_empty";b:0;s:10:"empty_zero";b:0;s:16:"hide_alter_empty";b:1;s:12:"action_title";s:6:"Action";s:15:"include_exclude";s:7:"exclude";s:16:"selected_actions";a:0:{}s:11:"entity_type";s:5:"media";s:9:"plugin_id";s:9:"bulk_form";}s:4:"name";a:37:{s:2:"id";s:4:"name";s:5:"table";s:16:"media_field_data";s:5:"field";s:4:"name";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:5:"label";s:0:"";s:7:"exclude";b:1;s:5:"alter";a:26:{s:10:"alter_text";b:0;s:4:"text";s:0:"";s:9:"make_link";b:0;s:4:"path";s:0:"";s:8:"absolute";b:0;s:8:"external";b:0;s:14:"replace_spaces";b:0;s:9:"path_case";s:4:"none";s:15:"trim_whitespace";b:0;s:3:"alt";s:0:"";s:3:"rel";s:0:"";s:10:"link_class";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:6:"target";s:0:"";s:5:"nl2br";b:0;s:10:"max_length";i:0;s:13:"word_boundary";b:1;s:8:"ellipsis";b:1;s:9:"more_link";b:0;s:14:"more_link_text";s:0:"";s:14:"more_link_path";s:0:"";s:10:"strip_tags";b:0;s:4:"trim";b:0;s:13:"preserve_tags";s:0:"";s:4:"html";b:0;}s:12:"element_type";s:0:"";s:13:"element_class";s:0:"";s:18:"element_label_type";s:0:"";s:19:"element_label_class";s:0:"";s:19:"element_label_colon";b:0;s:20:"element_wrapper_type";s:0:"";s:21:"element_wrapper_class";s:0:"";s:23:"element_default_classes";b:1;s:5:"empty";s:0:"";s:10:"hide_empty";b:0;s:10:"empty_zero";b:0;s:16:"hide_alter_empty";b:1;s:17:"click_sort_column";s:5:"value";s:4:"type";s:6:"string";s:8:"settings";a:1:{s:14:"link_to_entity";b:0;}s:12:"group_column";s:5:"value";s:13:"group_columns";a:0:{}s:10:"group_rows";b:1;s:11:"delta_limit";i:0;s:12:"delta_offset";i:0;s:14:"delta_reversed";b:0;s:16:"delta_first_last";b:0;s:10:"multi_type";s:9:"separator";s:9:"separator";s:2:", ";s:17:"field_api_classes";b:0;s:11:"entity_type";s:5:"media";s:12:"entity_field";s:4:"name";s:9:"plugin_id";s:5:"field";}s:10:"edit_media";a:26:{s:2:"id";s:10:"edit_media";s:5:"table";s:5:"media";s:5:"field";s:10:"edit_media";s:12:"re0eh��U  0eh��U                  ��L��U          �g��U  �eh��U          Peh��U   @      Peh��U          xclude";b:0;s:5:"alter";a:26:{s:10:"alter_text";b:1;s:4:"text";s:15:"Edit {{ name }}";s:9:"make_link";b:1;s:4:"path";s:0:"";s:8:"absolute";b:0;s:8:"external";b:0;s:14:"replace_spaces";b:0;s:9:"path_case";s:4:"none";s:15:"trim_whitespace";b:0;s:3:"alt";s:15:"Edit {{ name }}";s:3:"rel";s:0:"";s:10:"link_class";s:24:"media-library-item__edit";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:6:"target";s:0:"";s:5:"nl2br";b:0;s:10:"max_length";i:0;s:13:"word_boundary";b:1;s:8:"ellipsis";b:1;s:9:"more_link";b:0;s:14:"more_link_text";s:0:"";s:14:"more_link_path";s:0:"";s:10:"strip_tags";b:0;s:4:"trim";b:0;s:13:"preserve_tags";s:0:"";s:4:"html";b:0;}s:12:"element_type";s:0:"";s:13:"element_class";s:0:"";s:18:"element_label_type";s:0:"";s:19:"element_label_class";s:0:"";s:19:"element_label_colon";b:0;s:20:"element_wrapper_type";s:1:"0";s:21:"element_wrapper_class";s:0:"";s:23:"element_default_classes";b:0;s:5:"empty";s:0:"";s:10:"hide_empty";b:0;s:10:"empty_zero";b:0;s:16:"hide_alter_empty";b:1;s:4:"text";s:4:"Edit";s:18:"output_url_as_text";b:0;s:8:"absolute";b:0;s:11:"entity_type";s:5:"media";s:9:"plugin_id";s:16:"entity_link_edit";}s:12:"delete_media";a:26:{s:2:"id";s:12:"delete_media";s:5:"table";s:5:"media";s:5:"field";s:12:"delete_media";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:5:"label";s:0:"";s:7:"exclude";b:0;s:5:"alter";a:26:{s:10:"alter_text";b:1;s:4:"text";s:17:"Delete {{ name }}";s:9:"make_link";b:1;s:4:"path";s:0:"";s:8:"absolute";b:0;s:8:"external";b:0;s:14:"replace_spaces";b:0;s:9:"path_case";s:4:"none";s:15:"trim_whitespace";b:0;s:3:"alt";s:17:"Delete {{ name }}";s:3:"rel";s:0:"";s:10:"link_class";s:26:"media-library-item__remove";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:6:"target";s:0:"";s:5:"nl2br";b:0;s:10:"max_length";i:0;s:13:"word_boundary";b:1;s:8:"ellipsis";b:1;s:9:"more_link";b:0;s:14:"more_link_text";s:0:"";s:14:"more_link_path";s:0:"";s:10:"strip_tags";b:0;s:4:"trim";b:0;s:13:"preserve_tags";s:0:"";s:4:"html";b:0;}s:12:"element_type";s:0:"";s:13:"element_class";s:0:"";s:18:"element_label_type";s:0:"";s:19:"element_label_class";s:0:"";s:19:"element_label_colon";b:0;s:20:"element_wrapper_type";s:1:"0";s:21:"element_wrapper_class";s:0:"";s:23:"element_default_classes";b:0;s:5:"empty";s:0:"";s:10:"hide_empty";b:0;s:10:"empty_zero";b:0;s:16:"hide_alter_empty";b:1;s:4:"text";s:6:"Delete";s:18:"output_url_as_text";b:0;s:8:"absolute";b:0;s:11:"entity_type";s:5:"media";s:9:"plugin_id";s:18:"entity_link_delete";}s:15:"rendered_entity";a:24:{s:2:"id";s:15:"rendered_entity";s:5:"table";s:5:"media";s:5:"field";s:15:"rendered_entity";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:5:"label";s:0:"";s:7:"exclude";b:0;s:5:"alter";a:26:{s:10:"alter_text";b:0;s:4:"text";s:0:"";s:9:"make_link";b:0;s:4:"path";s:0:"";s:8:"absolute";b:0;s:8:"external";b:0;s:14:"replace_spaces";b:0;s:9:"path_case";s:4:"none";s:15:"trim_whitespace";b:0;s:3:"alt";s:0:"";s:3:"rel";s:0:"";s:10:"link_class";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:6:"target";s:0:"";s:5:"nl2br";b:0;s:10:"max_length";i:0;s:13:"word_boundary";b:1;s:8:"ellipsis";b:1;s:9:"more_link";b:0;s:14:"more_link_text";s:0:"";s:14:"more_link_path";s:0:"";s:10:"strip_tags";b:0;s:4:"trim";b:0;s:13:"preserve_tags";s:0:"";s:4:"html";b:0;}s:12:"element_type";s:0:"";s:13:"element_class";s:27:"media-library-item__content";s:18:"element_label_type";s:0:"";s:19:"element_label_class";s:0:"";s:19:"element_label_colon";b:0;s:20:"element_wrapper_type";s:0:"";s:21:"element_wrapper_class";s:0:"";s:23:"element_default_classes";b:1;s:5:"empty";s:0:"";s:10:"hide_empty";b:0;s:10:"empty_zero";b:0;s:16:"hide_alter_empty";b:1;s:9:"view_mode";s:13:"media_library";s:11:"entity_type";s:5:"media";s:9:"plugin_id";s:15:"rendered_entity";}}s:8:"defaults";a:1:{s:6:"fields";b:0;}}s:14:"cache_metadata";a:3:{s:7:"max-age";i:0;s:8:"contexts";a:7:{i:0;s:26:"languages:language_content";i:1;s:28:"languages:language_interface";i:2;s:3:"url";i:3;s:14:"url.query_args";i:4;s:22:"url.query_args:sort_by";i:5;s:4:"user";i:6;s:16:"user.permissions";}s:4:"tags";a:0:{}}}s:6:"widget";a:6:{s:14:"display_plugin";s:4:"page";s:2:"id";s:6:"widget";s:13:"display_title";s:6:"Widget";s:8:"position";i:2;s:15:"display_options";a:11:{s:17:"display_extenders";a:0:{}s:4:"path";s:26:"admin/content/media-widget";s:6:"fields";a:2:{s:15:"rendered_entity";a:24:{s:2:"id";s:15:"rendered_entity";s:5:"table";s:5:"media";s:5:"field";s:15:"rendered_entity";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:5:"label";s:0:"";s:7:"exclude";b:0;s:5:"alter";a:26:{s:10:"alter_text";b:0;s:4:"text";s:0:"";s:9:"make_link";b:0;s:4:"path";s:0:"";s:8:"absolute";b:0;s:8:"external";b:0;s:14:"replace_spaces";b:0;s:9:"path_case";s:4:"none";s:15:"trim_whitespace";b:0;s:3:"alt";s:0:"";s:3:"rel";s:0:"";s:10:"link_class";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:6:"target";s:0:"";s:5:"nl2br";b:0;s:10:"max_length";i:0;s:13:"word_boundary";b:1;s:8:"ellipsis";b:1;s:9:"more_link";b:0;s:14:"more_link_text";s:0:"";s:14:"more_link_path";s:0:"";s:10:"strip_tags";b:0;s:4:"trim";b:0;s:13:"preserve_tags";s:0:"";s:4:"html";b:0;}s:12:"element_type";s:0:"";s:13:"element_class";s:27:"media-library-item__content";s:18:"element_label_type";s:0:"";s:19:"element_label_class";s:0:"";s:19:"element_label_colon";b:0;s:20:"element_wrapper_type";s:0:"";s:21:"element_wrapper_class";s:0:"";s:23:"element_default_classes";b:1;s:5:"empty";s:0:"";s:10:"hide_empty";b:0;s:10:"empty_zero";b:0;s:16:"hide_alter_empty";b:1;s:9:"view_mode";s:13:"media_library";s:11:"entity_type";s:5:"media";s:9:"plugin_id";s:15:"rendered_entity";}s:25:"media_library_select_form";a:23:{s:2:"id";s:25:"media_library_select_form";s:5:"table";s:5:"media";s:5:"field";s:25:"media_library_select_form";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:5:"label";s:0:"";s:7:"exclude";b:0;s:5:"alter";a:26:{s:10:"alter_text";b:0;s:4:"text";s:0:"";s:9:"make_link";b:0;s:4:"path";s:0:"";s:8:"absolute";b:0;s:8:"external";b:0;s:14:"replace_spaces";b:0;s:9:"path_case";s:4:"none";s:15:"trim_whitespace";b:0;s:3:"alt";s:0:"";s:3:"rel";s:0:"";s:10:"link_class";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:6:"target";s:0:"";s:5:"nl2br";b:0;s:10:"max_length";i:0;s:13:"word_boundary";b:1;s:8:"ellipsis";b:1;s:9:"more_link";b:0;s:14:"more_link_text";s:0:"";s:14:"more_link_path";s:0:"";s:10:"strip_tags";b:0;s:4:"trim";b:0;s:13:"preserve_tags";s:0:"";s:4:"html";b:0;}s:12:"element_type";s:0:"";s:13:"element_class";s:0:"";s:18:"element_label_type";s:0:"";s:19:"element_label_class";s:0:"";s:19:"element_label_colon";b:0;s:20:"element_wrapper_type";s:0:"";s:21:"element_wrapper_class";s:27:"js-click-to-select-checkbox";s:23:"element_default_classes";b:1;s:5:"empty";s:0:"";s:10:"hide_empty";b:0;s:10:"empty_zero";b:0;s:16:"hide_alter_empty";b:1;s:11:"entity_type";s:5:"media";s:9:"plugin_id";s:25:"media_library_select_form";}}s:8:"defaults";a:7:{s:6:"fields";b:0;s:6:"access";b:0;s:7:"filters";b:0;s:13:"filter_groups";b:0;s:9:"arguments";b:0;s:6:"header";b:0;s:9:"css_class";b:0;}s:19:"display_description";s:0:"";s:6:"access";a:2:{s:4:"type";s:4:"perm";s:7:"options";a:1:{s:4:"perm";s:10:"view media";}}s:7:"filters";a:2:{s:6:"status";a:16:{s:2:"id";s:6:"status";s:5:"table";s:16:"media_field_data";s:5:"field";s:6:"status";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:8:"operator";s:1:"=";s:5:"value";s:1:"1";s:5:"group";i:1;s:7:"exposed";b:0;s:6:"expose";a:12:{s:11:"operator_id";s:0:"";s:5:"label";s:0:"";s:11:"description";s:0:"";s:12:"use_operator";b:0;s:8:"operator";s:0:"";s:10:"identifier";s:0:"";s:8:"required";b:0;s:8:"remember";b:0;s:8:"multiple";b:0;s:14:"remember_roles";a:1:{s:13:"authenticated";s:13:"authenticated";}s:24:"operator_limit_selection";b:0;s:13:"operator_list";a:0:{}}s:10:"is_grouped";b:0;s:10:"group_info";a:10:{s:5:"label";s:0:"";s:11:"description";s:0:"";s:10:"identifier";s:0:"";s:8:"optional";b:1;s:6:"widget";s:6:"select";s:8:"multiple";b:0;s:8:"remember";b:0;s:13:"default_group";s:3:"All";s:22:"default_group_multiple";a:0:{}s:11:"group_items";a:0:{}}s:11:"entity_type";s:5:"media";s:12:"entity_field";s:6:"status";s:9:"plugin_id";s:7:"boolean";}s:4:"name";a:16:{s:2:"id";s:4:"name";s:5:"table";s:16:"media_field_data";s:5:"field";s:4:"name";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:8:"operator";s:8:"contains";s:5:"value";s:0:"";s:5:"group";i:1;s:7:"exposed";b:1;s:6:"expose";a:12:{s:11:"operator_id";s:7:"name_op";s:5:"label";s:4:"Name";s:11:"description";s:0:"";s:12:"use_operator";b:0;s:8:"operator";s:7:"name_op";s:10:"identifier";s:4:"name";s:8:"required";b:0;s:8:"remember";b:0;s:8:"multiple";b:0;s:14:"remember_roles";a:3:{s:13:"authenticated";s:13:"authenticated";s:9:"anonymous";s:1:"0";s:13:"administrator";s:1:"0";}s:24:"operator_limit_selection";b:0;s:13:"operator_list";a:0:{}}s:10:"is_grouped";b:0;s:10:"group_info";a:10:{s:5:"label";s:0:"";s:11:"description";s:0:"";s:10:"identifier";s:0:"";s:8:"optional";b:1;s:6:"widget";s:6:"select";s:8:"multiple";b:0;s:8:"remember";b:0;s:13:"default_group";s:3:"All";s:22:"default_group_multiple";a:0:{}s:11:"group_items";a:0:{}}s:11:"entity_type";s:5:"media";s:12:"entity_field";s:4:"name";s:9:"plugin_id";s:6:"string";}}s:13:"filter_groups";a:2:{s:8:"operator";s:3:"AND";s:6:"groups";a:1:{i:1;s:3:"AND";}}s:9:"arguments";a:1:{s:6:"bundle";a:27:{s:2:"id";s:6:"bundle";s:5:"table";s:16:"media_field_data";s:5:"field";s:6:"bundle";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:14:"default_action";s:6:"ignore";s:9:"exception";a:3:{s:5:"value";s:3:"all";s:12:"title_enable";b:0;s:5:"title";s:3:"All";}s:12:"title_enable";b:0;s:5:"title";s:0:"";s:21:"default_argument_type";s:5:"fixed";s:24:"default_argument_options";a:1:{s:8:"argument";s:0:"";}s:25:"default_argument_skip_url";b:0;s:15:"summary_options";a:4:{s:9:"base_path";s:0:"";s:5:"count";b:1;s:14:"items_per_page";i:24;s:8:"override";b:0;}s:7:"summary";a:3:{s:10:"sort_order";s:3:"asc";s:17:"number_of_records";i:0;s:6:"format";s:15:"default_summary";}s:18:"specify_validation";b:0;s:8:"validate";a:2:{s:4:"type";s:4:"none";s:4:"fail";s:9:"not found";}s:16:"validate_options";a:0:{}s:8:"glossary";b:0;s:5:"limit";i:0;s:4:"case";s:4:"none";s:9:"path_case";s:4:"none";s:14:"transform_dash";b:0;s:12:"break_phrase";b:0;s:11:"entity_type";s:5:"media";s:12:"entity_field";s:6:"bundle";s:9:"plugin_id";s:6:"string";}}s:6:"header";a:2:{s:17:"display_link_grid";a:7:{s:2:"id";s:17:"display_link_grid";s:5:"table";s:5:"views";s:5:"field";s:12:"display_link";s:10:"display_id";s:6:"widget";s:5:"label";s:4:"Grid";s:9:"plugin_id";s:12:"display_link";s:5:"empty";b:1;}s:18:"display_link_table";a:7:{s:2:"id";s:18:"display_link_table";s:5:"table";s:5:"views";s:5:"field";s:12:"display_link";s:10:"display_id";s:12:"widget_table";s:5:"label";s:5:"Table";s:9:"plugin_id";s:12:"display_link";s:5:"empty";b:1;}}s:9:"css_class";s:67:"media-library-view js-media-library-view media-library-view--widget";}s:14:"cache_metadata";a:3:{s:7:"max-age";i:-1;s:8:"contexts";a:5:{i:0;s:28:"languages:language_interface";i:1;s:3:"url";i:2;s:14:"url.query_args";i:3;s:22:"url.query_args:sort_by";i:4;s:16:"user.permissions";}s:4:"tags";a:0:{}}}s:12:"widget_table";a:6:{s:14:"display_plugin";s:4:"page";s:2:"id";s:12:"widget_table";s:13:"display_title";s:14:"Widget (table)";s:8:"position";i:3;s:15:"display_options";a:12:{s:17:"display_extenders";a:0:{}s:4:"path";s:32:"admin/content/media-widget-table";s:5:"style";a:2:{s:4:"type";s:5:"table";s:7:"options";a:2:{s:9:"row_class";s:85:"media-library-item media-library-item--table js-media-library-item js-click-to-select";s:17:"default_row_class";b:1;}}s:8:"defaults";a:9:{s:5:"style";b:0;s:3:"row";b:0;s:6:"fields";b:0;s:6:"access";b:0;s:7:"filters";b:0;s:13:"filter_groups";b:0;s:9:"arguments";b:0;s:6:"header";b:0;s:9:"css_class";b:0;}s:3:"row";a:1:{s:4:"type";s:6:"fields";}s:6:"fields";a:5:{s:25:"media_library_select_form";a:9:{s:2:"id";s:25:"media_library_select_form";s:5:"label";s:0:"";s:5:"table";s:5:"media";s:5:"field";s:25:"media_library_select_form";s:12:"relationship";s:4:"none";s:11:"entity_type";s:5:"media";s:9:"plugin_id";s:25:"media_library_select_form";s:21:"element_wrapper_class";s:27:"js-click-to-select-checkbox";s:13:"element_class";s:0:"";}s:20:"thumbnail__target_id";a:10:{s:2:"id";s:20:"thumbnail__target_id";s:5:"label";s:9:"Thumbnail";s:5:"table";s:16:"media_field_data";s:5:"field";s:20:"thumbnail__target_id";s:12:"relationship";s:4:"none";s:4:"type";s:5:"image";s:11:"entity_type";s:5:"media";s:12:"entity_field";s:9:"thumbnail";s:9:"plugin_id";s:5:"field";s:8:"settings";a:2:{s:11:"image_style";s:13:"media_library";s:10:"image_link";s:0:"";}}s:4:"name";a:10:{s:2:"id";s:4:"name";s:5:"label";s:4:"Name";s:5:"table";s:16:"media_field_data";s:5:"field";s:4:"name";s:12:"relationship";s:4:"none";s:4:"type";s:6:"string";s:11:"entity_type";s:5:"media";s:12:"entity_field";s:4:"name";s:9:"plugin_id";s:5:"field";s:8:"settings";a:1:{s:14:"link_to_entity";b:0;}}s:3:"uid";a:10:{s:2:"id";s:3:"uid";s:5:"label";s:6:"Author";s:5:"table";s:20:"media_field_revision";s:5:"field";s:3:"uid";s:12:"relationship";s:4:"none";s:4:"type";s:22:"entity_reference_label";s:11:"entity_type";s:5:"media";s:12:"entity_field";s:3:"uid";s:9:"plugin_id";s:5:"field";s:8:"settings";a:1:{s:4:"link";b:1;}}s:7:"changed";a:10:{s:2:"id";s:7:"changed";s:5:"label";s:7:"Updated";s:5:"table";s:16:"media_field_data";s:5:"field";s:7:"changed";s:12:"relationship";s:4:"none";s:4:"type";s:9:"timestamp";s:11:"entity_type";s:5:"media";s:12:"entity_field";s:7:"changed";s:9:"plugin_id";s:5:"field";s:8:"settings";a:3:{s:11:"date_format";s:5:"short";s:18:"custom_date_format";s:0:"";s:8:"timezone";s:0:"";}}}s:6:"access";a:2:{s:4:"type";s:4:"perm";s:7:"options";a:1:{s:4:"perm";s:10:"view media";}}s:7:"filters";a:2:{s:6:"status";a:16:{s:2:"id";s:6:"status";s:5:"table";s:16:"media_field_data";s:5:"field";s:6:"status";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:8:"operator";s:1:"=";s:5:"value";s:1:"1";s:5:"group";i:1;s:7:"exposed";b:0;s:6:"expose";a:12:{s:11:"operator_id";s:0:"";s:5:"label";s:0:"";s:11:"description";s:0:"";s:12:"use_operator";b:0;s:8:"operator";s:0:"";s:10:"identifier";s:0:"";s:8:"required";b:0;s:8:"remember";b:0;s:8:"multiple";b:0;s:14:"remember_roles";a:1:{s:13:"authenticated";s:13:"authenticated";}s:24:"operator_limit_selection";b:0;s:13:"operator_list";a:0:{}}s:10:"is_grouped";b:0;s:10:"group_info";a:10:{s:5:"label";s:0:"";s:11:"description";s:0:"";s:10:"identifier";s:0:"";s:8:"optional";b:1;s:6:"widget";s:6:"select";s:8:"multiple";b:0;s:8:"remember";b:0;s:13:"default_group";s:3:"All";s:22:"default_group_multiple";a:0:{}s:11:"group_items";a:0:{}}s:11:"entity_type";s:5:"media";s:12:"entity_field";s:6:"status";s:9:"plugin_id";s:7:"boolean";}s:4:"name";a:16:{s:2:"id";s:4:"name";s:5:"table";s:16:"media_field_data";s:5:"field";s:4:"name";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:8:"operator";s:8:"contains";s:5:"value";s:0:"";s:5:"group";i:1;s:7:"exposed";b:1;s:6:"expose";a:12:{s:11:"operator_id";s:7:"name_op";s:5:"label";s:4:"Name";s:11:"description";s:0:"";s:12:"use_operator";b:0;s:8:"operator";s:7:"name_op";s:10:"identifier";s:4:"name";s:8:"required";b:0;s:8:"remember";b:0;s:8:"multiple";b:0;s:14:"remember_roles";a:3:{s:13:"authenticated";s:13:"authenticated";s:9:"anonymous";s:1:"0";s:13:"administrator";s:1:"0";}s:24:"operator_limit_selection";b:0;s:13:"operator_list";a:0:{}}s:10:"is_grouped";b:0;s:10:"group_info";a:10:{s:5:"label";s:0:"";s:11:"description";s:0:"";s:10:"identifier";s:0:"";s:8:"optional";b:1;s:6:"widget";s:6:"select";s:8:"multiple";b:0;s:8:"remember";b:0;s:13:"default_group";s:3:"All";s:22:"default_group_multiple";a:0:{}s:11:"group_items";a:0:{}}s:11:"entity_type";s:5:"media";s:12:"entity_field";s:4:"name";s:9:"plugin_id";s:6:"string";}}s:13:"filter_groups";a:2:{s:8:"operator";s:3:"AND";s:6:"groups";a:1:{i:1;s:3:"AND";}}s:9:"arguments";a:1:{s:6:"bundle";a:27:{s:2:"id";s:6:"bundle";s:5:"table";s:16:"media_field_data";s:5:"field";s:6:"bundle";s:12:"relationship";s:4:"none";s:10:"group_type";s:5:"group";s:11:"admin_label";s:0:"";s:14:"default_action";s:6:"ignore";s:9:"exception";a:3:{s:5:"value";s:3:"all";s:12:"title_enable";b:0;s:5:"title";s:3:"All";}s:12:"title_enable";b:0;s:5:"title";s:0:"";s:21:"default_argument_type";s:5:"fixed";s:24:"default_argument_options";a:1:{s:8:"argument";s:0:"";}s:25:"default_argument_skip_url";b:0;s:15:"summary_options";a:4:{s:9:"base_path";s:0:"";s:5:"count";b:1;s:14:"items_per_page";i:24;s:8:"override";b:0;}s:7:"summary";a:3:{s:10:"sort_order";s:3:"asc";s:17:"number_of_records";i:0;s:6:"format";s:15:"default_summary";}s:18:"specify_validation";b:0;s:8:"validate";a:2:{s:4:"type";s:4:"none";s:4:"fail";s:9:"not found";}s:16:"validate_options";a:0:{}s:8:"glossary";b:0;s:5:"limit";i:0;s:4:"case";s:4:"none";s:9:"path_case";s:4:"none";s:14:"transform_dash";b:0;s:12:"break_phrase";b:0;s:11:"entity_type";s:5:"media";s:12:"entity_field";s:6:"bundle";s:9:"plugin_id";s:6:"string";}}s:6:"header";a:2:{s:17:"display_link_grid";a:7:{s:2:"id";s:17:"display_link_grid";s:5:"table";s:5:"views";s:5:"field";s:12:"display_link";s:10:"display_id";s:6:"widget";s:5:"label";s:4:"Grid";s:9:"plugin_id";s:12:"display_link";s:5:"empty";b:1;}s:18:"display_link_table";a:7:{s:2:"id";s:18:"display_link_table";s:5:"table";s:5:"views";s:5:"field";s:12:"display_link";s:10:"display_id";s:12:"widget_table";s:5:"label";s:5:"Table";s:9:"plugin_id";s:12:"display_link";s:5:"empty";b:1;}}s:9:"css_class";s:67:"media-library-view js-media-library-view media-library-view--widget";}s:14:"cache_metadata";a:3:{s:7:"max-age";i:-1;s:8:"contexts";a:6:{i:0;s:26:"languages:language_content";i:1;s:28:"languages:language_interface";i:2;s:3:"url";i:3;s:14:"url.query_args";i:4;s:22:"url.query_args:sort_by";i:5;s:16:"user.permissions";}s:4:"tags";a:0:{}}}}}',
  ))
  ->execute();
