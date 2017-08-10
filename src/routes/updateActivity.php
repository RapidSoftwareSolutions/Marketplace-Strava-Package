<?php
$app->post('/api/Strava/updateActivity', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken', 'activityId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $athlete = 'activities/'.$post_data['args']['activityId'];
    $query_str = $settings['api_url']. $athlete;

    $post_data['args']['trainer'] = \Models\ParamsModifier::booleanToNumber($post_data['args']['trainer']);
    $post_data['args']['private'] = \Models\ParamsModifier::booleanToNumber($post_data['args']['private']);
    $params = [
        'accessToken' => 'accessToken',
        'name' => 'activityName',
        'type' => 'activityType',
        'description' => 'description',
        'private' => 'private',
        'trainer' => 'trainer',
        'gear_id'=> 'gearId'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str, 'PUT', 'json');
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});