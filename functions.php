/************* HREFLANG *************/
if( !function_exists( 'adler_add_hreflang' ) ) :

/* Check multi-site and outputs hreflang tags for alt and default page URLs */ 
function adler_add_hreflang() {
global $post;
$current_site = get_current_blog_id();

// Map languages to multisite install IDs
$languages = array(
'en-US' => 1,
'es-US' => 3
);

$self_ref = get_permalink ();
$lang_url = get_field("href_lang_url", $post->ID);
$alt_slug = ltrim($lang_url, "/");
$site =  get_current_blog_id();
// Check each multisite for the language url & add the header element if hreflang custom field exists
//foreach( $languages as $site => $id )
if (is_front_page()) {
  echo "<link rel='alternate' href='https://www.adlergiersch.com/es/' hreflang='es-US' />";
  echo "<link rel='alternate' href='https://www.adlergiersch.com/' hreflang='en-US' />";
} elseif ( $site == 1 && $lang_url != NULL) {
  echo "<link rel='alternate' href='https://www.adlergiersch.com/es/$alt_slug' hreflang='es-US' />";
  echo "<link rel='alternate' href='$self_ref' hreflang='en-US' />";
} elseif ( $site == 3 && $lang_url != NULL) {
  echo "<link rel='alternate' href='https://www.adlergiersch.com/$alt_slug' hreflang='en-US' />";
  echo "<link rel='alternate' href='$self_ref' hreflang='es-US' />";
}
}
add_action( 'wp_head', 'adler_add_hreflang' );
endif;
