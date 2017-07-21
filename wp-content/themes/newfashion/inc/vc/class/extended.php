<?php  
require_once vc_path_dir('SHORTCODES_DIR', 'vc-posts-grid.php');
class WPBakeryShortCode_Wpo_Products extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Counter extends WPBakeryShortCode_VC_Posts_Grid {

	public function __construct( $settings ) {
		parent::__construct( $settings );
		$this->jsCssScripts();
	}

	public function jsCssScripts() {

		wp_register_style('counterup_js',NEWFASHION_WPO_THEME_URI.'/js/jquery.counterup.min.js',array(),false,true);
	 
	}
}


class WPBakeryShortCode_Wpo_slideshowpost extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Megaposts extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Megablogs extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Gridposts extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Frontpageposts extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Frontpageposts2 extends WPBakeryShortCode_VC_Posts_Grid {

}


class WPBakeryShortCode_Wpo_Frontpageposts3 extends WPBakeryShortCode_VC_Posts_Grid {

}


 class WPBakeryShortCode_Wpo_Frontpageposts4 extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Frontpageposts9 extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Frontpageposts12 extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Frontpageposts13 extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Frontpageposts14 extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Timelinepost extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Categoriespost extends WPBakeryShortCode_VC_Posts_Grid {

}


class WPBakeryShortCode_Wpo_Timeline extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Listpost extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_categorytabpost extends WPBakeryShortCode_VC_Posts_Grid {

}

if( class_exists('WPBakeryShortCode')){
	class WPBakeryShortCode_Wpo_All_Products extends WPBakeryShortCode {

		public function getListQuery($atts){
			$list_query = array();
			$types = explode(',', $atts['show_tab']);
			foreach ($types as $type) {
				$list_query[$type] = $this->getTabTitle($type);
			}
			return $list_query;
		}

		public function getTabTitle($type){
			switch ($type) {
				case 'recent':
					return array('title'=>__('Latest Products','newfashion'),'title_tab'=>__('Latest','newfashion'));
				case 'featured_product':
					return array('title'=>__('Featured Products','newfashion'),'title_tab'=>__('Featured','newfashion'));
				case 'top_rate':
					return array('title'=> __('Top Rated Products','newfashion'),'title_tab'=>__('Top Rated', 'newfashion'));
				case 'best_selling':
					return array('title'=>__('BestSeller Products','newfashion'),'title_tab'=>__('BestSeller','newfashion'));
				case 'on_sale':
					return array('title'=>__('Special Products','newfashion'),'title_tab'=>__('Special','newfashion'));
			}
		}
	}
}