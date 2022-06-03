<?php
/**
 * Plugin Name:       Practice Plugin
 * Plugin URI:        https://abc.com/plugins/the-basics/
 * Description:       Plugin is made for practice
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Bijit Deb
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */


 //don't call the file directly
 if ( !defined( 'ABSPATH' ) ) exit;

 if ( is_admin() ) {

    require_once dirname(__FILE__) . '/includes/admin/profile.php';

 }

 echo( 'hello world' );
/**
 * Print Seo tags in header
 * @return void
 * 
 */
 function practice_tags(){
     ?>
     <!-- paractice seo plugin-->
     <meta name="description" content="Bijit Deb | WEB Developer">
     <meta name="keyword" content="php,js,reactjs">
     <!-- paractice seo plugin-->
     <?php
 }

 add_action( 'wp_head','practice_tags' );


function practice_footer(){
    echo ' <h1>This is a footer</h1> ';
}

add_action( 'wp_footer', 'practice_footer');


function practice_author_bio( $content){

    global $post;

    $author = get_user_by( 'id', $post->post_author );
    $bio = get_user_meta( $author->ID, 'description', true );
    $twitter = get_user_meta( $author->ID, 'twitter', true );
    $facebook = get_user_meta( $author->ID, 'facebook', true );
    $linkedin = get_user_meta( $author->ID, 'linkedin', true );
    ob_start(); //Save the data in buffer
    ?>
    <div class="practice-bio-wrap">

        <div class="avatar-image">
            <?php echo get_avatar( $author->ID, 64 ); ?>
        </div>

        <div class="practice-bio-content">
            <div class="author-name"><?php echo $author->display_name; ?></div>

            <div class="practice-author-bio">
                <?php echo wpautop( wp_kses_post( $bio ) ); ?>
            </div>

            <ul class="practice-socials">
                <?php if ( $twitter ) { ?>
                    <li><a href="<?php echo esc_url( $twitter ); ?>"><?php _e( 'Twitter', 'practice' ); ?></a></li>
                <?php } ?>

                <?php if ( $facebook ) { ?>
                    <li><a href="<?php echo esc_url( $facebook ); ?>"><?php _e( 'Facebook', 'practice' ); ?></a></li>
                <?php } ?>

                <?php if ( $linkedin ) { ?>
                    <li><a href="<?php echo esc_url( $linkedin ); ?>"><?php _e( 'LinkedIn', 'practice' ); ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php
    $bio_content = ob_get_clean(); //The previous data is assigned in veriable

    return $content . $bio_content ;

}


add_filter( 'the_content', 'practice_author_bio');

function practice_enqueue_scripts() {
    wp_enqueue_style( 'wetuts-style', plugins_url( 'assets/css/style.css', __FILE__ ) );
}

add_action( 'wp_enqueue_scripts', 'practice_enqueue_scripts' );


