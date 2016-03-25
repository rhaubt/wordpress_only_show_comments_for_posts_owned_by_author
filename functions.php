<?php
// Only Show Comments for Posts owned by Author
// ***** Only Show Own Comments *****

function wps_get_comment_list_by_user($clauses) {
        if (is_admin()) {
                global $user_ID, $wpdb;
                $clauses['join'] = ", ".$wpdb->base_prefix."posts";
                $clauses['where'] .= " AND ".$wpdb->base_prefix."posts.post_author = ".$user_ID." AND ".$wpdb->base_prefix."comments.comment_post_ID = ".$wpdb->base_prefix."posts.ID";
        };
        return $clauses;
};
if(!current_user_can('edit_others_posts')) {
add_filter('comments_clauses', 'wps_get_comment_list_by_user');
}
?>