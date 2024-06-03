<?php
/**
 * Show the excerpt.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Eca_Ecamedicine
 * @since Eca_Ecamedicine
 */

//the_excerpt();

?>
<?php
            // Custom excerpt length
            $excerpt_length = 40; // Set your desired word count
            $excerpt = get_the_excerpt();
            $excerpt_words = explode(' ', $excerpt);

            // If the excerpt is longer than the desired length, truncate it
            if (count($excerpt_words) > $excerpt_length) {
                $excerpt = implode(' ', array_slice($excerpt_words, 0, $excerpt_length)) . '...';
            }
            echo $excerpt; // Display the truncated excerpt
            ?>
            <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
</div>