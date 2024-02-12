<?php

class SAEX_PercentageBarChild extends ET_Builder_Module {

	public $slug       = 'saex_image_slider_child';
	public $vb_support = 'on';
	public $type = 'child';
	public $child_title_var = 'title_label';

	protected $module_credits = array(
		'module_uri' => 'www.sample-extension.com',
		'author'     => 'rusiru jay',
		'author_uri' => 'https://devrusiru.github.io/',
	);

	public function init() {
		$this->name = esc_html__( 'Sliders ', 'saex-sample-extension' );

		$this->settings_modal_toggles = [
			//content tab
			'general' => [
				'toggles' => [
					'bar_information' => esc_html__('Slider Information', 'saex-sample-extension'),
				],
			],
		];
		
		 add_action('wp_enqueue_scripts', array($this, 'enqueue_styles_scripts'));
	}
	
	 public function enqueue_styles_scripts() {
        // Enqueue style.css
        wp_enqueue_style(
            'saex-image-slider-child-style',
            plugin_dir_url(__FILE__) . 'style.css',
            array(),
            '1.0.0',
            'all'
        );

        // Enqueue script.js
        wp_enqueue_script(
            'saex-image-slider-child-script',
            plugin_dir_url(__FILE__) . 'js/script.js',
            array('jquery'),
            '1.0.0',
            true
        );
    }

	
	public function get_fields() {
		$fields = [];

		$fields['title_label'] = [
			'label' => 'Title',
			'type' => 'text',
			'toggle_slug' => 'bar_information',
			'tab_slug' => 'general',
		];

		$fields['slider_image'] = [
			'label' => 'Add Slider Image',
			'type' => 'upload',
			'toggle_slug' => 'bar_information',
			'tab_slug' => 'general',
		];
		
		// $fields['label_bg_color'] = [
		// 	'label' => 'Label Color',
		// 	'type' => 'color',
		// 	'toggle_slug' => 'bar_information',
		// 	'tab_slug' => 'general',
		// ];
		
		// $fields['percantage_label'] = [
		// 	'label' => 'Percantage',
		// 	'type' => 'number',
		// 	'toggle_slug' => 'bar_information',
		// 	'tab_slug' => 'general',
		// 	'default' => '10px'
		// ];

		return $fields;
	}

	public function get_advanced_fields_config() {
		$advanced_fields = [];
		
		return $advanced_fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {

		ET_Builder_Element::set_style($render_slug, [
			// 'selector' => "%%order_class%% .magnific-img",
			// 'declaration' => "background: ".$this->props['label_bg_color'],
			
			// 'selector' => "%%order_class%% .img-gallery-magnific",
			// 'declaration' => "padding: ".$this->props['percantage_label'],
		]);

		$image_url = $this->props["slider_image"];
		
		$output = '<section class="img-gallery-magnific">
				<div class="magnific-img">
					<a class="image-popup-vertical-fit" href="' . esc_url($image_url) . '" title="' . esc_attr($this->props["title_label"]) . '">
						<img src="' . esc_url($image_url) . '" alt="' . esc_attr($this->props["title_label"]) . '">
						<i class="fa fa-search-plus" aria-hidden="true"></i>
					</a>
				</div>
			</section>';

        return $output;

	}
}

new SAEX_PercentageBarChild;
