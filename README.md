[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Strava/functions?utm_source=RapidAPIGitHub_StravaFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Strava Package
Strava is the social network for athletes. We’re a global community of millions of runners, cyclists and triathletes, united by the camaraderie of sport. 
* Domain: [Strava](http://strava.com)
* Credentials: clientId, clientSecret

## How to get credentials: 
0. Browse to [Strava](https://www.strava.com)
1. Register or log in
2. Go to [API page](https://www.strava.com/settings/api) to get your clientId and clientSecret

## Webhook credentials
 
 You can use our service as webhookUrl: 
    ```
    https://webhooks.rapidapi.io/api/message/Strava/webhookEvent/{projectName}/{projectKey} * see credentials description below
    ```
You can add a webhook link at the [Dashboard Notifications](https://www.kite.ly/settings/notifications)
 
Please use SDK to test this feature.
 
 0. Go to [RapidAPI](http://rapidapi.io)
 1. Log in or create an account
 2. Go to [My apps](https://dashboard.rapidapi.io/projects)
 3. Add new project with projectName to get your project Key
 
 | Field      | Type       | Description
 |------------|------------|----------
 | projectName     | credentials| Your RapidAPI project name
 | projectKey | credentials     | Your RapidAPI project key
 

## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 

## Strava.getAccessToken
Get access token

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Client id from Strava
| clientSecret| credentials| Client secret from Strava
| code        | String     | Code provided by user

## Strava.revokeAccessToken
Revoke access token

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava

## Strava.listFriends
List athlete's friends

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| athleteId  | String| Id of the Strava athlete
| page       | Number| Number of the page to return
| perPage    | Number| Number of items per page to return

## Strava.listFollowers
List athlete's followers

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| athleteId  | String| Id of the Strava athlete
| page       | Number| Number of the page to return
| perPage    | Number| Number of items per page to return

## Strava.listBothFollowing
Retrieve the athletes who both the authenticated user and the indicated athlete are following.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| athleteId  | String| Id of the Strava athlete
| page       | Number| Number of the page to return
| perPage    | Number| Number of items per page to return

## Strava.getCurrentAthlete
This request is used to retrieve information about the currently authenticated athlete.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava

## Strava.getAnotherAthlete
This request is used to retrieve information about any athlete on Strava.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| athleteId  | String| Id of the Strava athlete

## Strava.updateCurrentAthlete
Update current athlete's information on Strava.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| city       | String| Athlete's city
| state      | String| Athlete's state
| country    | String| Athlete's country
| sex        | Select| Athlete's sex
| weight     | String| Athlete's weight

## Strava.getZones
Returns the heart rate and power zones of the requesting athlete.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava

## Strava.getTotalsAndStats
Returns recent (last 4 weeks), year to date and all time stats for a given athlete.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| athleteId  | String| Id of the Strava athlete. Must match the authenticated athlete

## Strava.getKomsAndQoms
Returns an array of segment efforts representing Overall KOMs/QOMs and course records held by the given athlete. Yearly KOMs are not included.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| athleteId  | String| Id of the Strava athlete
| page       | Number| Number of the page to return
| perPage    | Number| Number of items per page to return

## Strava.listActivityComments
The number of comments is included in the activity summary and detail responses.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| activityId | String| Id of the Strava activity
| page       | Number| Number of the page to return
| perPage    | Number| Number of items per page to return

## Strava.listActivityKudos
A kudos is Strava’s version of a ‘Like’ or a ‘+1’. The number of kudos on an activity is returned with the activity summary.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| activityId | String| Id of the Strava activity
| page       | Number| Number of the page to return
| perPage    | Number| Number of items per page to return

## Strava.listActivityPhotos
The number of photos is included in the activity summary and detail responses. Use this endpoint to retrieve a list of photos associated with this activity. This endpoint can only be accessed by the owner of the activity.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| activityId | String| Id of the Strava activity
| page       | Number| Number of the page to return
| perPage    | Number| Number of items per page to return

## Strava.createActivity
Create new activity

| Field       | Type      | Description
|-------------|-----------|----------
| accessToken | String    | Access token provided received from Strava
| activityName| String    | Name of the Strava activity
| activityType| Select    | Type of the Strava activity
| startDate   | DatePicker| Start date of the Strava activity
| elapsedTime | Number    | Elapsed time in seconds of the Strava activity
| description | String    | Description of the Strava activity
| distance    | Number    | Distance of the Strava activity
| private     | Boolean   | Whether this is private activity
| trainer     | Boolean   | Whether this is trainer activity

## Strava.getSingleActivity
Returns a detailed representation if the activity is owned by the requesting athlete. 

| Field            | Type   | Description
|------------------|--------|----------
| accessToken      | String | Access token provided received from Strava
| activityId       | String | Id of the Strava activity
| includeAllEfforts| Boolean| Used to include all segment efforts in the Result

## Strava.updateActivity
Update existing activity

| Field       | Type   | Description
|-------------|--------|----------
| accessToken | String | Access token provided received from Strava
| activityId  | String | Id of the Strava activity
| activityName| String | Name of the Strava activity
| activityType| Select | Type of the Strava activity
| description | String | Description of the Strava activity
| gearId      | String | Gear ID of the Strava activity
| private     | Boolean| Whether this is private activity
| trainer     | Boolean| Whether this is trainer activity

## Strava.listMyActivities
This endpoint returns a list of activities for the authenticated user.

| Field      | Type      | Description
|------------|-----------|----------
| accessToken| String    | Access token provided received from Strava
| before     | DatePicker| Result will start with activities whose startDate is before this value
| after      | DatePicker| Result will start with activities whose startDate is after this value
| page       | Number    | Number of the page to return
| perPage    | Number    | Number of items per page to return

## Strava.listRelatedActivities
Returns the activities that were matched as “with this group”.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| activityId | String| Id of the Strava activity
| page       | Number| Number of the page to return
| perPage    | Number| Number of items per page to return

## Strava.listFriendsActivities
List the recent activities performed by the current athlete and those they are following

| Field      | Type      | Description
|------------|-----------|----------
| accessToken| String    | Access token provided received from Strava
| before     | DatePicker| Result will start with activities whose startDate is before this value. before and page can not be used in combination. They are independent ways of indicating where in the list of activities to begin the results.
| page       | Number    | Number of the page to return. before and page can not be used in combination. They are independent ways of indicating where in the list of activities to begin the results.
| perPage    | Number    | Number of items per page to return

## Strava.listActivityZones
Heartrate and power zones are set by the athlete. This endpoint returns the time (seconds) in each zone.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| activityId | String| Id of the Strava activity

## Strava.listActivityLaps
This resource will return all laps for an activity. Laps are triggered by athletes using their respective devices, such as Garmin watches.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| activityId | String| Id of the Strava activity

## Strava.getGroupEvent
Retrieve group event

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token provided received from Strava
| groupEventId| String| Id of the Strava group event

## Strava.listClubGroupEvents
Returns an array of club group event summary representations ordered by occurrence time.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| clubId     | String| Id of the Strava club
| upcoming   | String| Only include future events if true

## Strava.joinGroupEvent
Join group event

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token provided received from Strava
| groupEventId| String| Id of the Strava group event

## Strava.leaveGroupEvent
Leave group event

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token provided received from Strava
| groupEventId| String| Id of the Strava group event

## Strava.deleteGroupEvent
Delete group event

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token provided received from Strava
| groupEventId| String| Id of the Strava group event

## Strava.listJoinedAthletes
Retrieve summary information about athletes joined a specific group event, or the upcoming occurrence for recurring events.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Access token provided received from Strava
| groupEventId| String| Id of the Strava group event
| page        | Number| Number of the page to return
| perPage     | Number| Number of items per page to return

## Strava.getSingleClub
Retrieve details about a specific club.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| clubId     | String| Id of the Strava club

## Strava.listMyClubs
Fetch an array of clubs that the currently authenticated athlete is a member of.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava

## Strava.listClubMembers
Retrieve summary information about members of a specific club.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| clubId     | String| Id of the Strava club
| page       | Number| Number of the page to return
| perPage    | Number| Number of items per page to return

## Strava.listClubAdmins
Retrieve summary information about admins of a specific club.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| clubId     | String| Id of the Strava club
| page       | Number| Number of the page to return
| perPage    | Number| Number of items per page to return

## Strava.listClubActivities
Retrieve summary information about activities of a specific club.

| Field      | Type      | Description
|------------|-----------|----------
| accessToken| String    | Access token provided received from Strava
| clubId     | String    | Id of the Strava club
| page       | Number    | Number of the page to return
| perPage    | Number    | Number of items per page to return
| before     | DatePicker| Result will start with activities whose startDate is before this value

## Strava.joinClub
Join a club on behalf of the authenticated athlete. If the club is private the join will need to be approved by a club admin unless the authenticated athlete had previously been invited to the club.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| clubId     | String| Id of the Strava club

## Strava.leaveClub
Leave a club on behalf of the authenticated user. 

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| clubId     | String| Id of the Strava club

## Strava.getSingleGear
Retrieve details about a specific item of gear. The requesting athlete must own the gear. At this time it is not possible to view just anyone’s gear type and usage.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| gearId     | String| Id of the Strava gear

## Strava.getSingleRoute
Retrieve details about a specific item of gear. The requesting athlete must own the gear. At this time it is not possible to view just anyone’s gear type and usage.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| routeId    | String| Id of the Strava route

## Strava.listRoutes
Lists a specific athlete’s routes. Private routes will only be included if the authenticating user is viewing their own routes and the token has view_private permissions.

| Field      | Type      | Description
|------------|-----------|----------
| accessToken| String    | Access token provided received from Strava
| athleteId  | String    | Id of the Strava athlete
| after      | DatePicker| Result will start with activities whose startDate is after this value
| page       | Number    | Number of the page to return
| perPage    | Number    | Number of items per page to return
| type       | Select    | Route type

## Strava.listRaces
This request is used to retrieve a list of races occurring in a year, ordered by occurrence date from oldest to most recent.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| year       | Number| Defaults to the current year

## Strava.getSingleRace
This request is used to retrieve details about a running race.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| raceId     | String| Id of the Strava race

## Strava.getSingleSegment
This request is used to retrieve details about a single segment

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| segmentId  | String| Id of the Strava segment

## Strava.listStarredSegments
Returns a summary representation of the segments starred by the authenticated user.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| page       | Number| Number of the page to return
| perPage    | Number| Number of items per page to return

## Strava.starSingleSegment
This request is used to star single segment

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| segmentId  | String| Id of the Strava segment

## Strava.unstarSingleSegment
This request is used to unstar single segment

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| segmentId  | String| Id of the Strava segment

## Strava.listSegmentEfforts
Retrieve an array of segment efforts, for a given segment, filtered by athlete and/or a date range.

| Field      | Type      | Description
|------------|-----------|----------
| accessToken| String    | Access token provided received from Strava
| segmentId  | String    | Id of the Strava segment
| athleteId  | String    | Id of the Strava athlete
| startDate  | DatePicker| Date range filtering is accomplished using an inclusive start and end time, thus startDate and endDate must be sent together. 
| endDate    | DatePicker| Date range filtering is accomplished using an inclusive start and end time, thus startDate and endDate must be sent together. 
| page       | Number    | Number of the page to return
| perPage    | Number    | Number of items per page to return

## Strava.getSegmentLeaderboards
Leaderboards represent the ranking of athletes on specific segments.

| Field         | Type   | Description
|---------------|--------|----------
| accessToken   | String | Access token provided received from Strava
| segmentId     | String | Id of the Strava segment
| ageGroup      | Select | Age group of athletes
| weightClass   | Select | Weight class of athletes in kg
| following     | Boolean| Include athletes which are followed
| clubId        | String | Id of the Strava club
| dateRange     | Select | Date range of results
| contextEntries| Number | Default is 2, max of 15
| page          | Number | Number of the page to return
| perPage       | Number | Number of items per page to return

## Strava.getSegmentsByCoordinates
This endpoint can be used to find popular segments within a given area.

| Field        | Type  | Description
|--------------|-------|----------
| accessToken  | String| Access token provided received from Strava
| swCoordinates| Map   | South west corner coordinates of the area
| neCoordinates| Map   | North east corner coordinates of the area
| activityType | Select| Type of activity. Default is riding
| minCategory  | Number| Minimum climb category filter
| maxCategory  | Number| Maximum climb category filter

## Strava.getSegmentSingleEffort
Retrieve details about a specific segment effort. The effort must be public or it must correspond to the current athlete.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| effortId   | String| Id of the segment effort

## Strava.getActivityStreams
Retrieve details about a specific segment effort. The effort must be public or it must correspond to the current athlete.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| activityId | String| Id of the Strava activity
| types      | List  | :List of types, if the activity does not have that stream it will not be included in the response
| resolution | Select| Default is all, indicates desired number of data points, streams will only be down sampled
| seriesType | Select| Relevant only if using resolution, used to index the streams if the stream is being reduced

## Strava.getEffortStreams
A segment effort represents an attempt on a segment. This resource returns a subset of the activity streams that correspond to that effort.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| effortId   | String| Id of the Strava effort
| types      | List  | :List of types, if the activity does not have that stream it will not be included in the response
| resolution | Select| Default is all, indicates desired number of data points, streams will only be down sampled
| seriesType | Select| Relevant only if using resolution, used to index the streams if the stream is being reduced

## Strava.getSegmentStreams
This resource returns a subset of the activity streams that correspond to segment. Only distance, altitude and latlng stream types are available.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| segmentId   | String| Id of the Strava segment
| types      | List  | :List of types, if the activity does not have that stream it will not be included in the response
| resolution | Select| Default is all, indicates desired number of data points, streams will only be down sampled
| seriesType | Select| Relevant only if using resolution, used to index the streams if the stream is being reduced

## Strava.getRouteStreams
This resource returns a subset of the activity streams that correspond to route. Distance, altitude and latlng stream types are always returned.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| routeId    | String| Id of the Strava route

## Strava.uploadActivity
Posting a file for upload will enqueue it for processing. Initial checks will be done for malformed data and duplicates.

| Field       | Type   | Description
|-------------|--------|----------
| accessToken | String | Access token provided received from Strava
| activityFile| File   | The actual activity data, if gzipped the data_type must end with .gz
| dataType    | Select | Data type of the file
| activityType| Select | Type of the Strava activity
| name        | String | Activity name. If not provided, will be populated using start date and location, if available
| description | String | Activity description.
| private     | Boolean| Whether this is private activity
| trainer     | Boolean| Whether this is trainer activity. activities without lat/lng info in the file are auto marked as stationary, set to true to force
| externalId  | String | Data filename will be used by default but should be a unique identifie

## Strava.checkUploadStatus
Upon upload, Strava will respond with an upload ID. You may use this ID to poll the status of your upload.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access token provided received from Strava
| uploadId   | String| Id of the upload

## Strava.addWebhook
Add new webhook

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Client id from Strava
| clientSecret| credentials| Client secret from Strava
| objectType  | String     | Must match one of the supported object types. E.g. : activity
| aspectType  | String     | Must match one of the supported aspect types. E.g.: create
| webhookUrl  | String     | You can use our service as webhookUrl. https://webhooks.rapidapi.io/api/message/Strava/webhookEvent/{projectName}/{projectKey}. See details above
| verifyToken | String     | User state specified by the user

## Strava.listWebhooks
This request is used to retrieve the summary representations of the push subscriptions in place for the current application.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Client id from Strava
| clientSecret| credentials| Client secret from Strava

## Strava.deleteWebhook
Delete existing webhook

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Client id from Strava
| clientSecret| credentials| Client secret from Strava
| webhookId   | String     | Id of the webhook

