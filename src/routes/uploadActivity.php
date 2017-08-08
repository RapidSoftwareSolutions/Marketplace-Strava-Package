<?php
$app->post('/api/Strava/uploadActivity', function ($request, $response, $args) {
    $settings = $this->settings;
    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken', 'activityFile', 'dataType']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . 'uploads';
    $body = array();
    $body[] = [
        'name' => 'file',
        'contents' => fopen($post_data['args']['activityFile'], 'r')
    ];
    $body[] = [
        'name' => 'data_type',
        'contents' => $post_data['args']['dataType']
    ];
    if (!empty($post_data['args']['activityType'])) {
        $body[] = [
            'name' => 'activity_type',
            'contents' => $post_data['args']['activityType']
        ];
    }
    if (!empty($post_data['args']['name'])) {
        $body[] = [
            'name' => 'name',
            'contents' => $post_data['args']['name']
        ];
    }
    if (!empty($post_data['args']['description'])) {
        $body[] = [
            'name' => 'description',
            'contents' => $post_data['args']['description']
        ];
    }
    if (!empty($post_data['args']['private'])) {
        $post_data['args']['private'] = \Models\ParamsModifier::booleanToNumber($post_data['args']['private']);
        $body[] = [
            'name' => 'private',
            'contents' => $post_data['args']['private']
        ];
    }
    if (!empty($post_data['args']['trainer'])) {
        $post_data['args']['trainer'] = \Models\ParamsModifier::booleanToNumber($post_data['args']['trainer']);
        $body[] = [
            'name' => 'trainer',
            'contents' => $post_data['args']['trainer']
        ];
    }
    if (!empty($post_data['args']['commute'])) {
        $post_data['args']['commute'] = \Models\ParamsModifier::booleanToNumber($post_data['args']['commute']);
        $body[] = [
            'name' => 'commute',
            'contents' => $post_data['args']['commute']
        ];
    }
    if (!empty($post_data['args']['externalId'])) {
        $body[] = [
            'name' => 'external_id',
            'contents' => $post_data['args']['externalId']
        ];
    }
    //requesting remote API
    $client = new GuzzleHttp\Client();
    try {
        $resp = $client->request('POST', $query_str, [
            'headers' => [
                'Authorization' => 'Bearer ' . $post_data['args']['accessToken']
            ],
            'multipart' => $body
        ]);
        $responseBody = $resp->getBody()->getContents();
        $rawBody = json_decode($resp->getBody());
        $all_data[] = $rawBody;
        if ($response->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($all_data) ? $all_data : json_decode($all_data);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }
    } catch (\GuzzleHttp\Exception\ClientException $exception) {
        $responseBody = $exception->getResponse()->getReasonPhrase();
        $responseBody = $exception->getResponse()->getBody()->getContents();
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $responseBody;
    } catch (GuzzleHttp\Exception\ServerException $exception) {
        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);
    } catch (GuzzleHttp\Exception\BadResponseException $exception) {
        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);
    }
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});