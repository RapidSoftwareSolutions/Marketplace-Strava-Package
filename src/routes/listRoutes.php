<?php
$app->post('/api/Strava/listRoutes', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken', 'athleteId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $athlete = 'athletes/' . $post_data['args']['athleteId'] . '/routes';
    $query_str = $settings['api_url'] . $athlete;
    $post_data['args']['after'] = \Models\ParamsModifier::timeToUnixtime($post_data['args']['after']);

    $params = [
        'accessToken' => 'accessToken',
        'type' => 'type',
        'after' => 'after',
        'page' => 'page',
        'per_page' => 'perPage'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str);
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});