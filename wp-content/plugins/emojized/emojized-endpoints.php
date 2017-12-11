<?php
add_action( 'rest_api_init', 'emojized_routes');

function emojized_routes()
	{ register_rest_route( 'emojized/v1', '/count/(?P<id>\d+)', array(
			'methods' => 'GET',
			'callback' => 'emojized_post_id',
			'args' => array(
				'id' => array(
					'validate_callback' => function($param, $request, $key)
					{
						return is_numeric( $param );
					}

				),
			),
		) );
}

function emojized_post_id($data)
{
	$id = $data['id'];

	$count = get_post_meta($id, 'count', true);
	$counted_once = get_post_meta($id, 'counted_once', true);

	if($counted_once == 'on')
	{
		$voters = get_post_meta($id, 'voters', true);
		$ip = $_SERVER['REMOTE_ADDR'];
		$ip_hashed = substr(base_convert(md5($ip), 16, 32), 0, 12);
		$voters_array = explode(';', $voters);
		if
		(!in_array( $ip_hashed, $voters_array))
		{
			$count++;
			$voters_and_new_vote = array_merge($voters, array($ip_hashed));
			update_post_meta($id, 'voters', $voters.$ip_hashed.';');
		}
	}
	else
	{
		$count++;
	}
	update_post_meta($id, 'count', $count);

	return $count;
}

?>