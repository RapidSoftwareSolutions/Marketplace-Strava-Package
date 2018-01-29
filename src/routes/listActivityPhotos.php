<?php
$app->post('/api/Strava/listActivityPhotos', function ($request, $response, $args) {
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
    $athlete = 'activities/'.$post_data['args']['activityId'].'/photos';
    $query_str = $settings['api_url']. $athlete;
    $params = [
        'accessToken' => 'accessToken',
        'page'=> 'page',
        'per_page' => 'perPage'
    ];
    $params['photo_sources'] = 'photo_sources';
    $post_data['args']['photo_sources'] = true;

    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str);
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});