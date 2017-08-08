<?php
$app->post('/api/Strava/listFriendsActivities', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $athlete = 'activities/following';
    $query_str = $settings['api_url'] . $athlete;
    $post_data['args']['before'] = \Models\ParamsModifier::timeToUnixtime($post_data['args']['before']);
    $params = [
        'accessToken' => 'accessToken',
        'page' => 'page',
        'before' => 'before',
        'per_page' => 'perPage'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str);
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});