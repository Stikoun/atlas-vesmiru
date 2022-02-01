<?php

namespace App\Http\RestApi;

class TestController extends RestApiController
{
	/**
	 * The base URL for route you are adding
	 *
	 * @var string
	 */
	protected $route = '/auth/';

	/**
	 * Http methods for rest
	 *
	 * @var string|array
	 */
	protected $methods = 'GET';

	/**
	 * Callback action which is performed on call
	 *
	 * @return WP_REST_Response
	 */
	public function endpointCallback()
	{
		$test = 'test';
		$res = $this->getRestResponse($test);
		return $res;
	}
}
