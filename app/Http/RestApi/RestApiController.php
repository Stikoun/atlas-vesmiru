<?php

namespace App\Http\RestApi;

class RestApiController
{
	/**
	 * The base URL for route you are adding
	 *
	 * @var string
	 */
	protected $route;

	/**
	 * Http methods for rest
	 *
	 * @var string|array
	 */
	protected $methods;

	/**
	 * Call rest_api_init action on construct with callback
	 *
	 * @return null
	 */
	public function __construct()
	{
		add_action('rest_api_init', function () {
			register_rest_route(REST_API_ENDPOINT, $this->route, [
				'methods'  => $this->methods,
				'callback' => [$this, 'endpointCallback'],
			]);
		});
	}

	/**
	 * Creats WP_Rest_Response class with custom data
	 */
	protected function getRestResponse($data, $status = 200)
	{
		$res = new \WP_REST_Response($data);
		$res->set_status(200);
		return $res;
	}
}
