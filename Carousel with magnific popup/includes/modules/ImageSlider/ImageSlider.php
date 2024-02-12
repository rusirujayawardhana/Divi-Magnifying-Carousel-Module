<?php

class SAEX_ImageSlider extends ET_Builder_Module {

	public $slug       = 'saex_image_slider';
	public $vb_support = 'on';
	public $child_slug = 'saex_image_slider_child';

	protected $module_credits = array(
		'module_uri' => 'www.sample-extension.com',
		'author'     => 'rusiru jay',
		'author_uri' => 'https://devrusiru.github.io/',
	);

	public function init() {
		$this->name = esc_html__( 'Image Slider ', 'saex-sample-extension' );
		
		$this->settings_modal_toggles = [
			//content tab
			'general' => [
				'toggles' => [
					'bar_information_parent' => esc_html__('Slider Settings', 'saex-sample-extension'),
				],
			],
		];
	}
	
	public function get_fields() {
		$fields = [];
		
		$fields['slider_count_desktop'] = [
			'label' => 'Slider Count Desktop',
			'type' => 'number',
			'toggle_slug' => 'bar_information_parent',
			'tab_slug' => 'general',
			'default' => '1'
		];
		
		$fields['slider_count_tab'] = [
			'label' => 'Slider Count Tab',
			'type' => 'number',
			'toggle_slug' => 'bar_information_parent',
			'tab_slug' => 'general',
			'default' => '1'
		];
		
		$fields['slider_count_mob'] = [
			'label' => 'Slider Count Mobile',
			'type' => 'number',
			'toggle_slug' => 'bar_information_parent',
			'tab_slug' => 'general',
			'default' => '1'
		];

		return $fields;
	}

	public function get_advanced_fields_config() {
		$advanced_fields = [];
		
		return $advanced_fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		
		$slider_count_desk = $this->props['slider_count_desktop'];
		$slider_count_tab = $this->props['slider_count_tab'];
		$slider_count_mob = $this->props['slider_count_mob'];
		$unique_class = 'parent-image-slider-' . uniqid();
		$parent_slider_output = sprintf( 
			'<div class="%1$s owl-carousel">%2$s</div>',
			esc_attr($unique_class),
			$this->props['content'],
		);
		
		$additional_output = '
			<script>
				jQuery(document).ready(function ($) {
				$(".' . esc_attr($unique_class) . '").owlCarousel({
				   	loop:false,
					margin:10,
					dots:true,
					nav:true,
					rewind:true,
					responsive:{
					  0:{
						items:' . $slider_count_mob . '
					  },
					  600:{
						items:' . $slider_count_tab . '
					  },
					  1000:{
						items:' . $slider_count_desk . '
					  }
					}
				  });
				 });
			</script>
			
			<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" 
			integrity="sha512-	IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" 
			crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<script>
			
			jQuery(document).ready(function ($) {
			  $(".' . esc_attr($unique_class) . ' .image-popup-vertical-fit").magnificPopup({
				type: "image",
				mainClass: "mfp-with-zoom",
				gallery: {
				  enabled: true,
				},

				zoom: {
				  enabled: true,

				  duration: 300, // duration of the effect, in milliseconds
				  easing: "ease-in-out", // CSS transition easing function

				  opener: function (openerElement) {
					return openerElement.is("img")
					  ? openerElement
					  : openerElement.find("img");
				  },
				},
			  });
			});
			</script>
			';
		
		$combined_output = $parent_slider_output . $additional_output;
		return $combined_output;
	}
}

new SAEX_ImageSlider;
