       <?php
       $routes = [
       'deleteWebhook',
       'listWebhooks',
       'webhookEvent',
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
        'getAccessToken',
        'metadata'
       ];
       foreach ($routes as $file) {
           require __DIR__ . '/../src/routes/' . $file . '.php';
       }

