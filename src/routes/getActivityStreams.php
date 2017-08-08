<?php
$app->post('/api/Strava/getActivityStreams', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken', 'activityId', 'types']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $paramNames = ["types"];
    $post_data = \Models\ParamsModifier::arrayToString($post_data, $paramNames);
    $query_str = $settings['api_url'] . 'activities/' . $post_data['args']['activityId'] . '/streams/' . $post_data['args']['types'];
    $params = [
        'accessToken' => 'accessToken',
        'resolution' => 'resolution',
        'series_type' => 'seriesType'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str);
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});