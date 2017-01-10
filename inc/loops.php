<?php
/**
 * Returns post objects according to post type. Used in place of WP loop.
 *
 * Used as a replacement for 'The Loop,' wp_query, etc. To display the 
 * available $post[] options for your loop, use the following:
 * 
 * <?php
 *     // Instantiates Loops() and prints each key and value per post
 *     include_once ( 'path/to/loops.php' );
 *     $blog = new Loops();
 *     $blog_posts = $blog->loopPosts($type,$args);
 *
 *		foreach ($blog_posts as $post) {
 *			 foreach ( $post as $key=>$val ) {
 *				if (gettype($val) != 'array') {
 *				echo '<strong>$post["'. $key .'"]</strong> = "'. $val . '"<br>';
 *			} else {
 *				echo '<strong>$post["'. $key .'"][0]</strong> = "'. $val[0] . '"<br>';
 *			}
 *		}
 *?>
 *
 * To implement on a page, replace the innermost foreach loop from above
 * with something like the following (actual code will vary):
 *
 * <?php
 *     // Instantiates Loops() and prints each key and value per post
 *     include_once ( 'path/to/loops.php' );
 *     $blog = new Loops();
 *     $blog_posts = $blog->loopPosts($type,$args);
 *
 *		foreach ($blog_posts as $post) {
 *				setup_postdata($post); // Necessary for wordpress
 *				$id = $post['id'];
 *				$title = $post['title'];
 *				$author = $post['author'];
 *				...
 * 				wp_reset_postdata();
 *
 * 				$output = '';
 *
 * 				//Build HTML for post item
 *     			$output .= '<div class="post-item">'; // post-item open
 *				$output .= '<div class="post-item__header">'; // post-item__header open
 *				$output .= '<h3 class="post-item__title">'. $title .'</h3>';
 *				$output .= '</div>'; // post-item__header close
 *				$output .= '<div class="post-item__main">'; // post-item__main open
 *				$output .= $content;
 *				$output .= '</div>'; // post-item__main close
 *				$output .= '</div>'; // post-item close 
 *		}
 *
 * 		echo '<div class="post-item__container">';
 * 		echo $output;
 * 		echo '<div class="post-item__container">';
 *?>
 *
 *
 * 
 * @package  WordPress
 * @subpackage Loops
 * @license https://opensource.org/licenses/MIT The MIT License
 * @author  Katie Bush Design
 * 
 * @global array  $post    Global Wordpress Variable for post object.
 * @param  string $type    Optional. One of six options for post types. Expected.
 * @param  array  $newArgs Optional. Arguments to pass to \get_posts(). Expected.
 * @return array  $posts   Array of all posts objects for CPT.
 */


class Loops {

	/**
	 * Constructor
	 *
	 * @method  __construct
	 */
	public function __construct() {
		/**
		 * Sets post type to grab post objects from in /get_posts()
		 * Passed to /get_posts() as 'post_type' value in $this->args
		 * @var  string  $this->type 
		 */
		$this->type = 'posts';

		/**
		 * 2 Legit. 2 Legit 2 quit. Hey Hey.
		 * Checks @param $type for legitimacy
		 *
		 * Add non-standard CPTs here as well.
		 * 
		 * @var  array $this->legit_types
		 */
		$this->legit_types = array( 'blog', 'post', 'news', 'events', 'press', 'team' );

		/**
		 * Initialize arguments for WP Loop.
		 * Default post type is 'post'
		 * @var  array  $this->args
		 */
		$this->args =  array( 'post_type' => 'post', 'posts_per_page' => -1, 'order' => 'DESC' );
	}



	/**
	 * Sets the arguments used by \loopPosts() by merging $newArgs
	 * with $this->args;
	 * 
	 * @method  setArgs
	 * @param   string   $type      One of six options for post types
	 * @param   array    $newArgs   Custom loop arguments for \get_posts()
	 * @return  function $this->\loopPosts()
	 */
	public function setArgs( $type='post', $newArgs=array() ) {

		// Look to see if a legit $type has been passed by user
		// Die if not.
		if ( !in_array( strtolower( $type ), $this->legit_types ) ) {
 			die('Unable to fulfill loop request. '.$type.' is not a valid post type.');
		} else {
 			$this->type = strtolower( $type );
 		}
 		

		// Merge in Arguments if passed
		if(isset($newArgs)) {
			$this->args = array_merge( $this->args, $newArgs );
		} else {
			$this->args = array_merge( $this->args, array('post_type' => $this->type) );
		}

		// If 'blog' CPT exists, use it; otherwise use 'post'
		if( $this->type === 'blog' || $this->type === 'post' ) {
			if( post_type_exists( 'blog' ) && get_posts(array('post_type'=>'blog')) ) {
				$this->args = array_merge( $this->args, array('post_type' => 'blog') );
			}
		}
		
		//return $this->loopPosts($this->args, $type);
		return $this->args;
	}



	/**
	 * Runs \get_posts() based off of arguments passed from
	 * \getPosts()
	 * 
	 * @method  loopPosts
	 * @param   array   $loopArgs  Array of arguments passed from \getPosts()
	 * @param   string  $type      Post type, passes from \getPosts()
	 * @return  array   $posts     Array of post objects
	 * @see     @method setArgs().
	 */
	public function loopPosts( $type='',$loopArgs=array() ) {

		$this->arg = $this->setArgs($type,$loopArgs);
		global $post;

		/**
		 * Empty array to store post objects. This array is 
		 * the returned value of this class.
		 * @var  array
		 */
		$posts = array();

		/**
		 * Empty array to store post values for each 
		 * individual post.
		 * @var  array
		 */
		$item = array();

		/**
		 * Gets posts based on arguments. Uses WP_Query.
		 * @var  array
		 */
		$postsArr = \get_posts($loopArgs);
	
		/**
		 * Loops through each individual post and stores post values into
		 * the $posts array. 
		 */
		foreach ( $postsArr as $post ):

			// Necessary to get Post Data outside of the WP Loop
			\setup_postdata( $post );
			

			// Universal Variables
			$id      = \get_the_id();
			$url     = \get_field('external_url') 
				? \get_field('external_url')
				: \get_permalink();
			$date    = \get_the_date();
			$time    = strtotime( $date );
			$title   = \get_the_title();
			$author  = \get_the_author();
			$image   = \has_post_thumbnail()
				? \wp_get_attachment_image_src( \get_post_thumbnail_id(),'full' )[0] 
				: null;
			$content = \get_the_content();
			$excerpt = \get_the_excerpt();
			$target  = \get_field('external_url')
				? 'target="_blank"'
				: null;
			
			// Set Variables for Specific Custom Post Types
			// Edit this list if you have CPT variables to add
			//
			// Specific CPT Variables  				// CPT
			/*--------------------------------------------------------------*/
			$order = \get_field('order')			// Team 
				? \get_field('order')
				: \strtotime(\get_the_date());       
			$position = \get_field('position'); 	// Team
			$source = \get_field('source');     	// News, Press, Events
			$twitter = \get_field('twitter');   	// Team, News, Press, Events
			$facebook = \get_field('facebook'); 	// Team, News, Press, Events
			$linkedin = \get_field('linkedin'); 	// Team, News, Press, Events

			// Store universal key/val in $item[]
			$item = array(
				'id'		=> $id,
				'title'  	=> $title,
				'author'    => $author,
				'target' 	=> $target,
				'date'   	=> $date,
				'time'   	=> $time,   
				'url'    	=> $url,
				'thumbnail' => $image,
				'excerpt'   => $excerpt,
				'content'   => $content
			);

			// Store Specific CPT Variables in $item[]
			// Add 
			switch ($type) {
				case 'blog':
				case 'post':
					// $item = array_merge($item, 
					//	array(
					// 		'key' => 'val'
					// 	)
					// );
					break;

				case 'team':
					$item = array_merge($item, array(
						'order'    => $order,
						'position' => $position,
						'twitter'  => $twitter,
						'facebook' => $facebook,
						'linkedin' => $linkedin
				 	));
				 	break;
				case 'news':
				case 'events':
				case 'press':
				 	$item = array_merge($item, array(
						'source' => $source,
						'twitter'  => $twitter,
						'facebook' => $facebook,
						'linkedin' => $linkedin
				 	));
				 	break;
			}
			
			// Push individual post to array of posts
			array_push( $posts, $item );
			

			\wp_reset_postdata();
		endforeach;
		
		// Returns array of posts
		return $posts;
	}
}