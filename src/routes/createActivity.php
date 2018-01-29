<?php
$app->post('/api/Strava/createActivity', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken', 'activityName', 'activityType', 'startDate', 'elapsedTime']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $athlete = 'activities';
    $query_str = $settings['api_url'] . $athlete;
    $dateTime = new DateTime($post_data['args']['startDate']);
    $post_data['args']['startDate'] = $dateTime->format('Y-m-d\TH:i:s\Z');
    if (!empty($post_data['args']['trainer'])) {
        $post_data['args']['trainer'] = \Models\ParamsModifier::booleanToNumber($post_data['args']['trainer']);
    }
    if (!empty($post_data['args']['private'])) {
        $post_data['args']['private'] = \Models\ParamsModifier::booleanToNumber($post_data['args']['private']);
    }
    $params = [
        'accessToken' => 'accessToken',
        'responseCode'=> '201',
        'name' => 'activityName',
        'type' => 'activityType',
        'start_date_local' => 'startDate',
        'elapsed_time' => 'elapsedTime',
        'description' => 'description',
        'distance' => 'distance',
        'private' => 'private',
        'trainer' => 'trainer',
        'commute' => 'commute'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str, 'POST', 'json');
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});