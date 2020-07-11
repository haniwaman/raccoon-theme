<?php
/**
 * Raccoon template tags Functions
 */

if ( ! function_exists( 'raccoon_get_post_categories' ) ) {
	/**
	 * Get Category
	 *
	 * @param integer $id Post ID.
	 * @return array $this_categories array of ID and name, link.
	 * @codex https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/get_the_category
	 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/get_category_link
	 */
	function raccoon_get_post_categories( $id ) {
		global $post;
		$this_categories = array();
		if ( 0 === $id ) {
			$id = $post->ID;
		}
		$categories = get_the_category( $id );
		if ( ! $categories ) {
			return false;
		}
		$category_num = count( $categories );
		for ( $i = 0; $i < $category_num; $i++ ) {
			$this_categories[ $i ]['id']   = $categories[ $i ]->cat_ID;
			$this_categories[ $i ]['name'] = $categories[ $i ]->name;
			$this_categories[ $i ]['slug'] = $categories[ $i ]->slug;
			$this_categories[ $i ]['link'] = get_category_link( $categories[ $i ]->cat_ID );
		}
		return $this_categories;
	}
}

if ( ! function_exists( 'raccoon_the_post_category' ) ) {
	/**
	 * Display One Category
	 *
	 * @param boolean $anchor is Anchor Link.
	 * @param integer $id Post ID.
	 * @param string  $color Default Color.
	 * @return void
	 */
	function raccoon_the_post_category( $anchor = true, $id = 0, $color = '#666' ) {
		$this_categories = raccoon_get_post_categories( $id );

		if ( isset( $this_categories[0] ) ) {
			$color = apply_filters( 'raccoon_term_color', $color, $this_categories[0] );
			if ( $anchor ) {
				echo '<a style="' . esc_attr( 'background:' . $color ) . ';" href="' . esc_url( $this_categories[0]['link'] ) . '">' . esc_html( $this_categories[0]['name'] ) . '</a>';
			} else {
				echo '<span style="' . esc_attr( 'background:' . $color ) . ';">' . esc_html( $this_categories[0]['name'] ) . '</span>';
			}
		}
	}
}


if ( ! function_exists( 'raccoon_get_post_tags' ) ) {
	/**
	 * Get Tag
	 *
	 * @param integer $id Post ID.
	 * @return array $this_tags array of ID and name, link.
	 * @codex https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/get_the_tags
	 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/get_category_link
	 */
	function raccoon_get_post_tags( $id = 0 ) {
		global $post;
		$this_tags = array();
		if ( 0 === $id ) {
			$id = $post->ID;
		}
		$tags = get_the_tags( $id );
		if ( ! $tags ) {
			return false;
		}
		$tags_num = count( $tags );
		for ( $i = 0; $i < $tags_num; $i++ ) {
			$this_tags[ $i ]['id']   = $tags[ $i ]->term_id;
			$this_tags[ $i ]['name'] = $tags[ $i ]->name;
			$this_tags[ $i ]['slug'] = $tags[ $i ]->slug;
			$this_tags[ $i ]['link'] = get_tag_link( $tags[ $i ]->term_id );
		}
		return $this_tags;
	}
}


if ( ! function_exists( 'raccoon_the_post_tags' ) ) {
	/**
	 * Display Tag Lists
	 *
	 * @param integer $id Post ID.
	 * @return void
	 */
	function raccoon_the_post_tags( $id = 0 ) {
		$this_tags = raccoon_get_post_tags( $id );
		if ( $this_tags ) {
			$i             = 0;
			$this_tags_num = count( $this_tags );
			echo '<div class="p-page-tags">';
			for ( $i; $i < $this_tags_num; $i++ ) {
				echo '<div class="p-page-tags__link"><a href="' . esc_url( $this_tags[ $i ]['link'] ) . '">' . esc_html( $this_tags[ $i ]['name'] ) . '</a></div><!-- /p-page-tags__link -->';
			}
			echo '</div><!-- /p-page-tags -->';
		}
	}
}


if ( ! function_exists( 'raccoon_get_post_terms' ) ) {
	/**
	 * Get Term
	 *
	 * @param string $taxonomy Taxonomy Slug.
	 * @return array Term.
	 */
	function raccoon_get_post_terms( $taxonomy ) {
		$this_terms = array();
		$terms      = get_the_terms( get_the_ID(), $taxonomy );
		if ( ! $terms ) {
			return $this_terms;
		}
		$term_num = count( $terms );
		for ( $i = 0; $i < $term_num; $i++ ) {
			$this_terms[ $i ]['id']   = $terms[ $i ]->term_id;
			$this_terms[ $i ]['name'] = $terms[ $i ]->name;
			$this_terms[ $i ]['slug'] = $terms[ $i ]->slug;
			$this_terms[ $i ]['link'] = get_term_link( $terms[ $i ]->term_id, $taxonomy );
		}
		return $this_terms;
	}
}


if ( ! function_exists( 'raccoon_the_post_term' ) ) {
	/**
	 * Display One Term
	 *
	 * @param string $taxonomy Taxonomy Slug.
	 * @param string $anchor is Anchor Link.
	 */
	function raccoon_the_post_term( $taxonomy, $anchor = false ) {
		$this_terms = raccoon_get_post_terms( $taxonomy );
		if ( isset( $this_terms[0] ) ) {
			if ( $anchor ) {
				echo '<a href="' . esc_attr( $this_terms[0]['link'] ) . '" class="m-' . esc_attr( $taxonomy ) . ' m-' . esc_attr( $this_terms[0]['slug'] ) . '">' . esc_html( $this_terms[0]['name'] ) . '</a>';
			} else {
				echo '<span class="m-' . esc_attr( $taxonomy ) . ' m-' . esc_attr( $this_terms[0]['slug'] ) . '">' . esc_html( $this_terms[0]['name'] ) . '</span>';
			}
		}
	}
}
