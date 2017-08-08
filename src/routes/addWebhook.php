<?php
$app->post('/api/Strava/addWebhook', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['clientId', 'clientSecret', 'objectType', 'aspectType', 'webhookUrl']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API

    $query_str = 'https://api.strava.com/api/v3/push_subscriptions';
    $params = [
        'client_id' => 'clientId',
        'client_secret' => 'clientSecret',
        'object_type' => 'objectType',
        'aspect_type'=> 'aspectType',
        'callback_url'=> 'webhookUrl',
        'verify_token'=> 'verifyToken'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str, 'POST', 'json');
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});