<?php

class DVPPL_HelloWorld extends ET_Builder_Module {

	public $slug       = 'dvppl_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divipeople.com',
		'author'     => 'Divi People',
		'author_uri' => 'https://divipeople.com',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'dvppl-divi-cookie-consent' );
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'dvppl-divi-cookie-consent' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dvppl-divi-cookie-consent' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new DVPPL_HelloWorld;
