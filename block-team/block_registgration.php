<?php
function custom_team_member_block() {
  wp_register_script(
      'teamMemberBlock-js',
      get_template_directory_uri() . '/block/block-team/block.js',
      array( 'wp-blocks', 'wp-element', 'wp-editor' )
  );

  register_block_type( 'custom/team-member', array(
      'editor_script' => 'teamMemberBlock-js',
      'style' => 'block-css',
  ));
}
add_action( 'init', 'custom_team_member_block' );
?>