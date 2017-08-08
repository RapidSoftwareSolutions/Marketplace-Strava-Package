<?php
$app->post('/api/Strava/getSegmentsByCoordinates', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken', 'swCoordinates', 'neCoordinates']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . 'segments/explore';
    $post_data['args']['bounds'] = $post_data['args']['swCoordinates'] . ',' . $post_data['args']['neCoordinates'];
    $params = [
        'accessToken' => 'accessToken',
        'bounds' => 'bounds',
        'activity_type' => 'activityType',
        'min_cat' => 'minCategory',
        'max_cat' => 'maxCategory'

    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str);
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});