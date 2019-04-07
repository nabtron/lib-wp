// use these in activation and deactivation hooks
// can be used anywhere though
add_role('bound360_moderator', 'Bound360 Moderator', array(
    'read' => true, // True allows that capability
    'edit_posts' => false,
	'delete_posts' => false, // Use false to explicitly deny
	'bound360_moderator' => true,
));

if( get_role('bound360_moderator') ){
	remove_role( 'bound360_moderator' );
	echo "removed";
	//die();
}

$result = add_role(
    'basic_contributor',
    __( 'Basic Contributor' ),
    array(
        'read'         => true,  // true allows this capability
        'edit_posts'   => true,
        'delete_posts' => false, // Use false to explicitly deny
    )
);
if ( null !== $result ) {
    echo 'Yay! New role created!';
}
else {
    echo 'Oh... the basic_contributor role already exists.';
}
print_r($result);

// helpful & further reading: https://kinsta.com/blog/wordpress-user-roles/
