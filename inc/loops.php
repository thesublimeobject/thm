<?php
/**
 * Returns post objects according to post type. Used in place of WP loop.
 *
 * Used as a replacement for 'The Loop,' wp_query, etc. In order to use
 * do the following in whatever page or template you want to display 
 * your posts:
 * 
 * <?php
 *     // Instantiates Loops() and prints each key and value per post
 *     include_once ( 'path/to/loops.php' );
 *     $blog = new Loops();
 *     $blog_posts = $blog->loopPosts($type,$args);
 *
 *     foreach ($blog_post as $post) {
 *     
 *          echo '<article>';
 *          
 *          foreach ($post as $key=>$val):
 *               if (gettype($val) != 'array'):
 *                   echo '<strong>'.$key.':</strong> '. $val . '<br>';
 *               else:
 *                   echo '<strong>'.$key.':</strong> '. $val[0] . '<br>';
 *               endif;
 *          endforeach;
 *
 *           echo '</article>';
 *              
 *     }
 *?>
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
		 * @var  array $this->legit_types
		 */
		$this->legit_types = array(
		                 'blog',
		                 'post',
		                 'news',
		                 'events',
		                 'press',
		                 'team'
		               );

		/**
		 * Initialize arguments for WP Loop.
		 * Default post type is 'post'
		 * @var  array  $this->args
		 */
		$this->args =  array( 
							'post_type' => 'post', 
							'posts_per_page' => -1, 
							'order' => 'DESC' 
						);
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
		if ( !in_array( strtolower( $type ), $this->legit_types ) ):
 			die('Unable to fulfill loop request. '.$type.' is not a valid post type.');
 		else:
 			$this->type = strtolower( $type );
 		endif;

		// Merge in Arguments if passed
		if(isset($newArgs)) {

			$this->args = array_merge(
				$this->args,
				$newArgs
			);

		} else {
			$this->args = array_merge(
			    $this->args,
				array('post_type' => $this->type)
			);
		}

		// If 'blog' CPT exists, use it; otherwise use 'post'
		if( $this->type === 'blog' || $this->type === 'post' ) {
			if( post_type_exists( 'blog' ) ):
				if (get_posts( 'post_type=blog') ) {
					$this->args = array_merge(
									$this->args,
									array('post_type' => 'blog')
								);
				}
			endif;
		}
		
		//return $this->loopPosts($this->args, $type);
		return $this->args;
	}



	/**
	 * Runs \get_posts() bases off of arguments passed from
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
			$url     = (\get_field('external_url')) ? \get_field('external_url') : \get_permalink();
			$date    = array('Nov 7, 2015','Nov 8, 2015'); 
			$time    = strtotime( (gettype($date) == 'array') ? $date[0] : $date );
			$title   = \get_the_title();
			$author  = \get_the_author();
			$image   = ( \has_post_thumbnail() ) ? \wp_get_attachment_image_src( \get_post_thumbnail_id(),'full' )[0] : null;
			$content = get_the_content();
			$target  = (\get_field('external_url')) ? 'target="_blank"' : null;
			

			// Specific CPT Variables
			$position = get_field('position'); // Team
			$source = get_field('source');     // News, Press, Events
			$twitter = get_field('twitter');   // Team, News, Press, Events
			$facebook = get_field('facebook'); // Team, News, Press, Events
			$linkedin = get_field('linkedin'); // Team, News, Press, Events

			// Store universal key/val in $item[]
			$item = array(
						'id'		=> $id,
						'title'  	=> $title,
						'author'    => $author,
						'target' 	=> $target,
						'date'   	=> $date,
						'time'   	=> $time,   
						'url'    	=> $url,
						'thumbnail' => $image
					);

			// Store Specific CPT Variables in $item[]
			switch ($type):
				case 'blog':
				case 'post':
					// $item = array_merge($item, 
					//					array(
					// 						//'key' => 'val'
					// 					)
					// );
					break;
				case 'team':
					$item = array_merge($item, array(
								'position' => $position,
								'twitter'  => $twitter,
								'facebook' => $facebook,
								'linkedin' => $linkedin
				 			)
				 	);
				 	break;
				case 'news':
				case 'events':
				case 'press':
				 	$item = array_merge($item, array(
								'source' => $source,
								'twitter'  => $twitter,
								'facebook' => $facebook,
								'linkedin' => $linkedin
				 			)
				 	);
				 	break;
			endswitch;
			
			// Push individual post to array of posts
			array_push( $posts, $item );
			

			\wp_reset_postdata();
		endforeach;
		
		// Returns array of posts
		return $posts;
	}
}