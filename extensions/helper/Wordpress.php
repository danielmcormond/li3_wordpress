<?php

namespace li3_wordpress\extensions\helper;

use \lithium\util\Inflector;

class Wordpress extends \lithium\template\Helper {
	
	protected static $_elements;
	
	public function menu($args = array()) {
	}
	
	
	/**
	 * Archives helper
	 *
	 * @return string Rendered archives element.
	 */
	public function archives(){
		return $this->_renderView(__FUNCTION__);
	}
	
	/**
	 * Categories helper
	 *
	 * @return string Rendered categories element.
	 */
	public function categories(){
		return $this->_renderView(__FUNCTION__);
	}

	/**
	 * Search Form helper
	 *
	 * @return string Rendered search_form element.
	 */
	public function searchForm() {
		return get_search_form(false);
	}

	/**
	 * A helper which gets contents from a custom field
	 *
	 * @param string The name of custom field
	 * @return string The custom field content.
	 */
	public function field($field) {
		$content = get_post_custom_values($field, get_the_ID());
		return apply_filters('the_content', $content[0]);
	}
	
	/**
	 * Sidebar helper which contains archive and categories.
	 *
	 * @return string Rendered site element.
	 */
	public function sidebar() {
		return $this->_renderView(__FUNCTION__);
	}

	/**
	 * Comments List helper.
	 *
	 * @return string Rendered comments_list element.
	 */
	public function commentsList() {
		$comments = get_comments( array('post_id' => get_the_ID(), 'status' => 'approve'));
		$this->_renderView(__FUNCTION__, compact($comments));
	}
	
	/**
	 * Comment Form helper.
	 *
	 * @return string Rendered comment_form element.
	 */
	public function commentForm() {
		$comments = get_comments( array('post_id' => get_the_ID(), 'status' => 'approve'));
		$this->_renderView(__FUNCTION__, compact('comments'));
	}
	
	/**
	 * Comments helper which renders comments and form for each post.
	 *
	 * @return string Rendered comments element.
	 */
	public function comments() {
		$comments = get_comments( array('post_id' => get_the_ID(), 'status' => 'approve'));
		$this->_renderView(__FUNCTION__, compact($comments));
	}
	
	/**
	 * A protected method that passes function name and arguments to render.
	 *
	 * @param string $function CamelCased function name, inflects to underline element name
	 * @param args $args Array of arguments needing to be passed to element
	 * @return string Rendered view from helper method.
	 */
	protected function _renderView($function, $args = array()){
		$view = $this->_context->view();
		return $view->render(
			array('element'=>Inflector::underscore($function)),
			$args, 
			array('library' => 'li3_wordpress')
		);
	}
	
}

?>