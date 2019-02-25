<?php
/**
 * The header part of the template
 *
 * The file contains is included into the top of every page
 *
 * @package SWTK
 * @subpackage Funny_Colors
 * @since Funny Colors 1.0
 */
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <link rel="shortcut icon" href="#">
    <?php wp_head(); ?>
  </head>
<body <?php body_class(); ?>>
