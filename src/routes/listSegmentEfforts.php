<?php
$app->post('/api/Strava/listSegmentEfforts', function ($request, $response, $args) {
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
    $query_str = $settings['api_url'] . 'segments/' . $post_data['args']['segmentId'] . '/all_efforts';
    $dateTime = new DateTime($post_data['args']['startDate']);
    $post_data['args']['startDate'] = $dateTime->format('Y-m-d\TH:i:s\Z');
    $dateTimeEnd = new DateTime($post_data['args']['endDate']);
    $post_data['args']['endDate'] = $dateTimeEnd->format('Y-m-d\TH:i:s\Z');
    $params = [
        'accessToken' => 'accessToken',
        'athlete_id' => 'athleteId',
        'start_date_local' => 'startDate',
        'end_date_local' => 'endDate',
        'page' => 'page',
        'per_page' => 'perPage'
    ];
    $result = \Models\ApiRequestFacade::makeRequest($params, $post_data, $query_str);
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});