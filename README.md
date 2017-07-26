# Davao Aguilas
## Overview
Lorem ipsum dolor sit amet

1. Blablabla
1. [API Documentation](#api-documentation)
   1. [Pagination](#pagination)
   1. [News](#news)
   1. [Videos](#videos)
   1. [Partners](#partners)
   1. [Teams](#teams)
   1. [Players](#players)
   1. [Leagues](#leagues)
   1. [Ladders](#ladders)
   1. [Fixtures](#fixtures)
1. [Requirements and Dependencies](#requirements-and-dependencies)

## Requirements and Dependencies

1. PHP 5.4 or greater
1. CodeIgniter 3.0+
1. Guzzlehttp Client

## TODO
1. ~~Round stats integers~~
1. ~~Change url of images return get()~~
1. DB Comments alter table stuff
1. Do something about player_stats possible to duplicate? For ex. (1, assists, 99, 1 assists, 1212)
1. remove file every submit
1. ~~Constants array for static fields such as Type in videos, Role in players~~
1. ~~Pagination of webservice~~
1. Configure server time
1. While uploading loading
1. Flag for disabling current timestamp
1. Datetime vs Timestamp (????)
1. Player stats duplicate issue
1. Image make it just icon
1. Retain height fixture deleting
1. News featured news flag

---
## API Documentation
Development: `http://betaprojex.com/davao-aguilas/api`  
Production `http://TODO.com/api`

---

### Entity Relationship Diagram

https://www.lucidchart.com/invitations/accept/ea1b0347-04b3-4234-9b23-1b4ede980756

---

### Authentication
TODO

---

### Pagination
Requests with `?page` query string will be paginated to 10 items by default. You can also set a custom page size with the `?per_page` parameter. See examples below:

`http://example.com/api/?page=1`  
`http://example.com/api?page=1` // you can omit the trailing slash just fine  
`http://example.com/api/?page=2&per_page=30`

##### Note:
If query string `?page` is omitted, the api will return **all items** from a resource!

---

### News

#### List all news  
`GET /news/`

#### Get a news  
`GET /news/:id`

##### Response
```json
Status: 200 OK
[
  {
    "id": "3",
    "title": "Lorem Ipsum",
    "image_url": "http://localhost/davao-aguilas/uploads/news/1500017214_aDaHvdy.png",
    "body": "In April, we posted a video of Persona 5 running quite poorly on the PC via an emulator. Now, only a few months later, it’s looking fantastic.\r\n\r\nThanks to the tireless work of the team behind the RCPS3 emulator, the game—which I described in April as playable only “if you like suffering”—is now playable in the true sense of the word, with acceptable framerates throughout, fixes to some glaring visual issues and an absence of any gltiches that will kill the game. Most importantly, they’ve had users successfully complete the game, just to make sure it all works.\r\n\r\nBelow is a video the RCPS3 team put together showing the progress they’ve made since Persona 5 was first released on the PS3:",
    "created_at": "2017-07-14 15:26:54",
    "updated_at": "0000-00-00 00:00:00"
  }
]
```

### Videos
#### List all videos
`GET /videos/`

#### Get a video
`GET /videos/:id`

##### Response

```json
Status: 200 OK
[
    {
        "id": "1",
        "title": "Never gonna give you up",
        "duration": "11:11:11",
        "url": "http://example.com/",
        "image_url": "http://localhost/davao-aguilas/uploads/video_thumbnails/1500014234_7b9.png",
        "type": "Club Videos",
        "created_at": "2017-07-14 14:37:14",
        "updated_at": "0000-00-00 00:00:00"
    }
]
```

### Partners
#### List all partners
`GET /partners/`

#### Get a partner
`GET /partners/:id`

##### Response
```json
Status: 200 OK
[
    {
        "id": "1",
        "title": "Jollibee",
        "site_url": "http://twitter.com/jjjjcccjjf",
        "image_url": "http://localhost/davao-aguilas/uploads/partners/1499933983_2016-11-29.jpg",
        "created_at": "2017-07-13 16:19:43",
        "updated_at": "0000-00-00 00:00:00"
    }
]
```

### Teams
#### List all teams
`GET /teams/`

#### Get a team
`GET /teams/:id`

##### Response
```json
Status: 200 OK
[
    {
        "id": "1",
        "name": "Team Banana",
        "image_url": "http://localhost/davao-aguilas/uploads/teams/1500014304_2016-12-09.jpg",
        "created_at": "2017-07-14 09:44:12",
        "updated_at": "2017-07-14 14:38:24"
    }
]
```


#### List a squad
`GET /squad/:team_id`

#### List default squad (in our case, `Davao Aguilas`)

`GET /squad/default`

```json
Status: 200 OK
{
    "Midfielder": {
        "players": [
            {
                "id": "1",
                "fname": "Danil",
                "lname": "Ishutin",
                "team_id": "1",
                "image_url": "http://betaprojex.com/davao-aguilas/uploads/players/1500345529_2016-12-09.jpg",
                "full_body_image_url": "http://betaprojex.com/davao-aguilas/uploads/players/1500345529_aDaHvdy.png",
                "position": "Midfielder",
                "jersey_num": "13",
                "birth_date": "1994-11-29",
                "birth_place": "Denmark",
                "nationality": "Swedish",
                "height": "123cm",
                "weight": "123kg",
                "created_at": "2017-07-17 21:38:49",
                "birth_date_f": "November 29, 1994",
                "team_name": "Natus Vincere"
            }
        ]
    },
    "Defender": {
        "players": [
            {
                "id": "11",
                "fname": "Bruno",
                "lname": "Buccariati",
                "team_id": "1",
                "image_url": "http://betaprojex.com/davao-aguilas/uploads/players/1500345888_11139958_1079252412094268_8281657439582323313_n.jpg",
                "full_body_image_url": "http://betaprojex.com/davao-aguilas/uploads/players/1500345888_a2b09ed22479262cc03e3b76fc913780.png",
                "position": "Defender",
                "jersey_num": "00",
                "birth_date": "2017-07-14",
                "birth_place": "somewhere",
                "nationality": "nigga",
                "height": "99cm",
                "weight": "123kg",
                "created_at": "2017-07-17 21:44:48",
                "birth_date_f": "July 14, 2017",
                "team_name": "Natus Vincere"
            }
        ]
    }
}
```

### Players
#### List all players
`GET /players/`

#### Get a player
`GET /players/:id`

#### List all players from a team
`GET /players/team/:team_id`

#### List all Goalkeepers from a team
`GET /players/team/:team_id/goalkeepers`

#### List all Defenders from a team
`GET /players/team/:team_id/defenders`

#### List all Midfielders from a team
`GET /players/team/:team_id/midfielders`

#### List all Forwards from a team
`GET /players/team/:team_id/forwards`

#### List all Managers from a team
`GET /players/team/:team_id/managers`

##### Response
```json
Status: 200 OK
[
    {
        "id": "3",
        "fname": "Dio",
        "lname": "Brando",
        "team_id": "1",
        "image_url": "http://localhost/davao-aguilas/uploads/players/1500367032_547al.gif",
        "full_body_image_url": "http://localhost/davao-aguilas/uploads/players/1500367032_547al1.gif",
        "position": "Forward",
        "jersey_num": "11",
        "birth_date": "2017-07-14",
        "birth_place": "Spain",
        "nationality": "Spaniard",
        "height": "6'2''",
        "weight": "162kg",
        "created_at": "2017-07-13 16:37:30",
        "updated_at": "2017-07-18 16:37:12",
        "birth_date_f": "July 14, 2017",
        "team_name": "Za warudoo",
        "stats": [
            {
                "stat_key": "Shots outside penalty box",
                "stat_value": 60
            },
            {
                "stat_key": "Crosses",
                "stat_value": "22"
            },
            {
                "stat_key": "Assists",
                "stat_value": 55
            },
            {
                "stat_key": "Shot Accuracy",
                "stat_value": "13%"
            }
        ]
    }
]
```

### Leagues

#### List all leagues
`GET /leagues/`

#### Get a league
`GET /leagues/:id`

```json
Status: 200 OK
[
    {
        "id": "1",
        "name": "Hyundai A-League",
        "created_at": "2017-07-14 16:35:00",
        "updated_at": "0000-00-00 00:00:00"
    },
    {
        "id": "2",
        "name": "Asian Championship League",
        "created_at": "2017-07-14 16:35:32",
        "updated_at": "0000-00-00 00:00:00"
    },
    {
        "id": "3",
        "name": "Westfield W-League",
        "created_at": "2017-07-14 16:35:55",
        "updated_at": "2017-07-14 16:35:58"
    }
]
```

### Ladders

#### Get a ladder standings by league id
`GET /ladders/league/:league_id/standings`

#### Get home standings ladder by league id
`GET /ladders/league/:league_id/home`

#### Get away standings ladder by league id
`GET /ladders/league/:league_id/away`

```json
Status: 200 OK
{
    "standings": [
        {
            "wins": 6,
            "losses": 5,
            "draws": 4,
            "matches_played": 3,
            "goal_difference": 13,
            "points": 3,
            "team_id": "1",
            "team_name": "Za warudoo",
            "team_image_url": "http://localhost/davao-aguilas/uploads/teams/1500014304_2016-12-09.jpg"
        },
        {
            "wins": 7,
            "losses": 8,
            "draws": 6,
            "matches_played": 10,
            "goal_difference": 2,
            "points": 13,
            "team_id": "2",
            "team_name": "Davao Aguilas",
            "team_image_url": "http://localhost/davao-aguilas/uploads/teams/1500014310_2016-11-29.jpg"
        }
    ],
    "league_name": "Asian Championship League"
}
```

### Fixtures

#### Get all upcoming matches by league id
`GET /fixtures/league/:league_id/upcoming`

#### Get all final/finished  matches by league id
`GET /fixtures/league/:league_id/final`

```json
Status: 200 OK
{
    "matches": [
        {
            "id": "1",
            "home_team_id": "2",
            "away_team_id": "1",
            "league_id": "2",
            "home_score": "0",
            "away_score": "0",
            "hash_tag": "#DonaldForPresident",
            "round_num": "1",
            "match_schedule": "2017-07-19 23:11:00",
            "location": "Pangasinan, Pilipinas",
            "match_progress": "Upcoming",
            "created_at": "2017-07-19 14:44:03",
            "updated_at": "2017-07-20 11:09:00",
            "home_team_name": "Davao Aguilas",
            "away_team_name": "Za warudoo",
            "match_time": "23:11:00",
            "match_date": "2017-07-19",
            "league_name": "Asian Championship League"
        },
        {
            "id": "2",
            "home_team_id": "1",
            "away_team_id": "2",
            "league_id": "2",
            "home_score": "0",
            "away_score": "0",
            "hash_tag": "#DioForPresident",
            "round_num": "2",
            "match_schedule": "2004-11-11 15:11:00",
            "location": "Makati City, Philippines",
            "match_progress": "Upcoming",
            "created_at": "2017-07-19 15:54:13",
            "updated_at": "2017-07-20 12:01:21",
            "home_team_name": "Za warudoo",
            "away_team_name": "Davao Aguilas",
            "match_time": "15:11:00",
            "match_date": "2004-11-11",
            "league_name": "Asian Championship League"
        }
    ],
    "league_name": "Asian Championship League"
}
```
