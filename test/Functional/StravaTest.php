<?php

namespace Test\Functional;

require_once(__DIR__ . '/../../src/Models/checkRequest.php');

class StravaTest extends BaseTestCase
{

    public function testListMetrics()
    {

        $routes = [
            'deleteWebhook',
            'listWebhooks',
            'addWebhook',
            'checkUploadStatus',
            'uploadActivity',
            'getRouteStreams',
            'getSegmentStreams',
            'getEffortStreams',
            'getActivityStreams',
            'getSegmentSingleEffort',
            'getSegmentsByCoordinates',
            'getSegmentLeaderboards',
            'listSegmentEfforts',
            'unstarSingleSegment',
            'starSingleSegment',
            'listStarredSegments',
            'getSingleSegment',
            'getSingleRace',
            'listRaces',
            'listRoutes',
            'getSingleRoute',
            'getSingleGear',
            'leaveClub',
            'joinClub',
            'listClubActivities',
            'listClubAdmins',
            'listClubMembers',
            'listMyClubs',
            'getSingleClub',
            'listJoinedAthletes',
            'deleteGroupEvent',
            'leaveGroupEvent',
            'joinGroupEvent',
            'listClubGroupEvents',
            'getGroupEvent',
            'listActivityLaps',
            'listActivityZones',
            'listFriendsActivities',
            'listRelatedActivities',
            'listMyActivities',
            'updateActivity',
            'getSingleActivity',
            'createActivity',
            'listActivityPhotos',
            'listActivityKudos',
            'listActivityComments',
            'getKomsAndQoms',
            'getTotalsAndStats',
            'getZones',
            'updateCurrentAthlete',
            'getAnotherAthlete',
            'getCurrentAthlete',
            'listBothFollowing',
            'listFollowers',
            'listFriends',
            'revokeAccessToken',
            'getAccessToken'

        ];

        foreach ($routes as $file) {
            $var = '{  
                    }';
            $post_data = json_decode($var, true);

            $response = $this->runApp('POST', '/api/Strava/' . $file, $post_data);

            $this->assertEquals(200, $response->getStatusCode(), 'Error in ' . $file . ' method');
        }
    }

}
