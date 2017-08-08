<?php
$app->post('/api/Strava/getSegmentLeaderboards', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken', 'segmentId']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . 'segments/' . $post_data['args']['segmentId'] . '/leaderboard';
    $params = [
        'accessToken' => 'accessToken',
        'gender'=> 'gender',
        'age_group'=> 'ageGroup',
        'weight_class'=> 'weightClass',
        'following'=> 'following',
        'club_id'=> 'clubId',
        'date_range'=> 'dateRange',
        'context_entries'=> 'contextEntries',
        'page' => 'page',
        'per_page' => 'perPage'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str);
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});