<?php
$app->post('/api/Strava/listClubActivities', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken', 'clubId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url']. 'clubs/'.$post_data['args']['clubId']. '/activities';
    $post_data['args']['before'] = \Models\ParamsModifier::timeToUnixtime($post_data['args']['before']);
    $params = [
        'accessToken' => 'accessToken',
        'page'=> 'page',
        'per_page' => 'perPage',
        'before'=> 'before'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str);
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});