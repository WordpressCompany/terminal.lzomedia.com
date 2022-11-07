<?php
/**
 * Register Posts API
 *
 * @package REST API ENDPOINT
 */

class RegisterCustomEndpoint
{

    public function __construct() {
        add_action( 'rest_api_init', array( $this, 'rest_posts_endpoints' ) );
    }

    function rest_posts_endpoints() {

        register_rest_route(
            'wp/v2/lzo',
            '/post/create',
            array(
                'methods' => 'POST',
                'callback' => array( $this, 'rest_create_post_endpoint_handler' ),
                'permission_callback' => function($request){
                    return is_user_logged_in();
                }
            ));
    }

    /**
     * Creat Post call back.
     *
     * @param WP_REST_Request $request
     */
    public function rest_create_post_endpoint_handler(WP_REST_Request $request ): WP_Error|WP_REST_Response
    {
        $response = array();
        $parameters = $request->get_params();

        $title = sanitize_text_field( $parameters['title'] );
        $content = sanitize_text_field( $parameters['content'] );
        $categories = sanitize_text_field( $parameters['categories_slug'] );
        $tags = sanitize_text_field( $parameters['tags_slug'] );
        $image = sanitize_text_field( $parameters['post_image'] );

        // Error Handling.
        $error = new WP_Error();

        if ( empty( $title ) ) {
            $error->add(
                400,
                __( "Title field is required", 'rest-api-endpoints' ),
                array( 'status' => 400 )
            );

            return $error;
        }

        if ( empty( $content ) ) {
            $error->add(
                400,
                __( "Content field is required", 'rest-api-endpoints' ),
                array( 'status' => 400 )
            );

            return $error;
        }

        if ( empty( $categories ) ) {
            $error->add(
                400,
                __( "Categories Slugs field is required", 'rest-api-endpoints' ),
                array( 'status' => 400 )
            );

            return $error;
        }

        if ( empty( $tags ) ) {
            $error->add(
                400,
                __( "Tags slugs field is required", 'rest-api-endpoints' ),
                array( 'status' => 400 )
            );

            return $error;
        }

        if ( empty( $image ) ) {
            $error->add(
                400,
                __( "post_image field is required", 'rest-api-endpoints' ),
                array( 'status' => 400 )
            );

            return $error;
        }

        // Check and get the category id
        $categoriesID = $this->getCategoriesID($categories);
        // Check and get the tags id
        $tagsID = $this->getTagsID($tags);

        $post = [
            'post_type' => 'post',
            'post_author' => 1,
            'post_title'   => sanitize_text_field( $title ),
            'post_status'   => 'publish',
            'post_content'   => $content,
            'post_category' => $categoriesID,
            'tags_input' => $tagsID ?? [],
            'meta_input' => array(
                'image' => $image,
            )
        ];
        // It will return the new inserted $post_id
        $post_id = wp_insert_post( $post );

        // If post found
        if ( ! is_wp_error( $post_id ) ) {
            $response['status'] = 200;
            $response['post_id'] = $post_id;
        } else {
            // If user not found
            $error->add( 500, __( 'Post creating failed', 'rest-api-endpoints' ) );
            return $error;
        }
        return new WP_REST_Response( $response );
    }

    /**
     * @param string $categories
     * @return array
     */
    private function getCategoriesID(string $categories): array
    {
        $ids = [];
        foreach ( wp_parse_list( $categories ) as $slug ) {
            if ( $category = get_category_by_slug( $slug ) ) {
                $ids[] = $category->term_id;
            }else{
                $ids[] = wp_insert_term( $slug, 'category' );
            }

        }
        return $ids;
    }

    /**
     * @param string $tags
     * @return array
     */
    private function getTagsID(string $tags): array
    {
        $ids = [];
        foreach ( wp_parse_list( $tags ) as $slug ) {
            if ( $tag = get_term_by('slug', $slug, 'post_tag')) {
                $ids[] = $tag->term_id;
            }else{
                $ids[] = wp_insert_term( $slug, 'post_tag' );
            }


        }
        return $ids;
    }
}

new RegisterCustomEndpoint();
