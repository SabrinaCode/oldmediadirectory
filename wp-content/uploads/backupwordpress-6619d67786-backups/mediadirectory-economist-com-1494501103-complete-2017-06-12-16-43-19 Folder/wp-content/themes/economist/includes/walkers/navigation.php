<?php

	class Navigation extends Walker_Nav_Menu {

		private $_instance, $_instance_items;

		private $_total = 0;

		private $_passed = 0;

		private $_parent_item_ids = array();

		private $_child_total = array();

		private $_child_passed = array();

		public function __construct( $slug ) {
			$this->_instance = wp_get_nav_menu_object( $slug );
			$this->_instance_items = wp_get_nav_menu_items( $this->_instance );
			$this->_total = $this->count_parent_items();
			$this->create_parent_id_array();
			$this->count_child_items();
		}

		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$menu_item_parent = $item->menu_item_parent;
			$indent = $depth ? str_repeat( "\t", $depth ) : '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			if ( $menu_item_parent > 0 ) {
				if ( array_key_exists( $menu_item_parent, $this->_child_passed ) ) {
					if ( $this->_child_passed[ $menu_item_parent ] == 0 ) {
						$classes[] = 'menu-item-first';
					}

					if ( ( $this->_child_passed[ $menu_item_parent ] + 1 ) == $this->_child_total[ $menu_item_parent ] ) {
						$classes[] = 'menu-item-last';
					}

					$this->_child_passed[ $menu_item_parent ]++;
				}
			} else {
				if ( $this->_passed == 0 ) {
					$classes[] = 'menu-item-first';
				}

				if ( ( $this->_passed + 1 ) == $this->_total ) {
					$classes[] = 'menu-item-last';
				}

				$this->_passed++;
			}

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			$output .= $indent . '<li' . $id . $class_names . '>';

			$atts = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
			$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
			$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
			$attributes = '';

			foreach ( $atts as $attr => $value ) {
				if ( !empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;
			$item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

		private function count_parent_items() {
			$count = 0;

			foreach ( $this->_instance_items as $item ) {
				if ( $item->menu_item_parent == 0 ) {
					$count++;
				}
			}

			return $count;
		}

		private function create_parent_id_array() {
			$ids = array();

			foreach ( $this->_instance_items as $item ) {
				if ( $item->menu_item_parent > 0 ) {
					$ids[] = $item->menu_item_parent;
				}
			}

			if ( !empty( $ids ) ) {
				$this->_parent_item_ids = array_unique( $ids );
			}
		}

		private function count_child_items() {
			foreach ( $this->_instance_items as $item ) {
				if ( $item->menu_item_parent > 0 ) {
					if ( !array_key_exists( $item->menu_item_parent, $this->_child_total ) ) {
						$this->_child_total[ $item->menu_item_parent ] = 1;
						$this->_child_passed[ $item->menu_item_parent ] = 0;
					} else {
						$this->_child_total[ $item->menu_item_parent ]++;
					}
				}
			}
		}

	}