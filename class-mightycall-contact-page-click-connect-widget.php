<?php

class MightyCall_Contact_Page_Click_Connect_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'mightycall_click_connect_widget', // Base ID
			'MightyCall ClickConnect Widget', // Name
			array( 'description' => 'MightyCall ClickConnect Widget' ) // Args
		);
	}

	public function widget( $args, $instance ) {
		$options = MightyCall_Contact_Page_Options::get_instance();
		$tenant_id = $options->get_tenant_id();
		echo $args['before_widget'];

		$snippet = $options->get_cc_widget_code();
		if ( !isset( $snippet ) || '' == trim( $snippet ) ) {
			echo "<span>Can't render MightyCall ClickConnect Widget. Please check MightyCall Contact plugin settings</span>";
		} else {
			echo $snippet;
		}

		echo $args['after_widget'];
	}

	public function form( $instance ) {
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		return $instance;
	}
}

function mightycall_contact_page_register_c2c_widget() {
	register_widget( 'MightyCall_Contact_Page_Click_Connect_Widget' );
}