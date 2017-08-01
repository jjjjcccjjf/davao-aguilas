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
   1. [Team statistics](#team-statistics)
   1. [Players](#players)
   1. [Leagues](#leagues)
   1. [Ladders](#ladders)
   1. [Fixtures](#fixtures)
   1. [Members](#members)
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
1. ~~Datetime vs Timestamp (????)~~ Refactor all datetime to timestamp
1. Player stats duplicate issue
1. Retain height fixture deleting
1. ~~News featured news flag~~
1. News Button name `check schedule`
1. Change all Image url on cms to icons
1. Add 404 handlers in CMS?
1. make squad positions return correct order (refer to design)

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
{
    "news": [
        {
            "id": "1",
            "title": "Persona 5 News",
            "image_url": "http://localhost/davao-aguilas/uploads/news/1501472524_600px-Natus_Vincere_(1).png",
            "body": "Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet\r\nLorem ipsum dolor sit amet\r\nLorem ipsum dolor sit amet\r\nLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet\r\nLorem ipsum dolor sit amet",
            "is_featured": "0",
            "created_at": "2017-07-31 11:42:04",
            "updated_at": "0000-00-00 00:00:00",
            "created_at_f": "July 31, 2017"
        },
        {
            "id": "2",
            "title": "Hello world",
            "image_url": "http://localhost/davao-aguilas/uploads/news/1501472536_7b9.png",
            "body": "Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet",
            "is_featured": "1",
            "created_at": "2017-07-31 11:42:16",
            "updated_at": "2017-07-31 11:42:18",
            "created_at_f": "July 31, 2017"
        }
    ],
    "featured": [
        {
            "id": "2",
            "title": "Hello world",
            "image_url": "http://localhost/davao-aguilas/uploads/news/1501472536_7b9.png",
            "body": "Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet",
            "is_featured": "1",
            "created_at": "2017-07-31 11:42:16",
            "updated_at": "2017-07-31 11:42:18",
            "created_at_f": "July 31, 2017"
        }
    ]
}
```

### Videos
#### List all videos
`GET /videos/`

#### Get a video
`GET /videos/:id`

##### Response

```json
Status: 200 OK
{
    "videos": [
        {
            "id": "1",
            "title": "haha",
            "duration": "06:11:11",
            "url": "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dQw4w9WgXcQ\" frameborder=\"0\" allowfullscreen></iframe>",
            "image_url": "http://localhost/davao-aguilas/uploads/video_thumbnails/1501471467_maxresdefault.jpg",
            "type": "News & Highlights",
            "is_featured": "1",
            "created_at": "2017-07-31 11:24:27",
            "updated_at": "2017-07-31 11:36:06",
            "embed_code": "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dQw4w9WgXcQ\" frameborder=\"0\" allowfullscreen></iframe>",
            "created_at_f": "July 31, 2017"
        },
        {
            "id": "2",
            "title": "Yo",
            "duration": "05:31:11",
            "url": "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dQw4w9WgXcQ\" frameborder=\"0\" allowfullscreen></iframe>",
            "image_url": "http://localhost/davao-aguilas/uploads/video_thumbnails/1501471526_C4MWSvsWMAAep5K.jpg",
            "type": "News & Highlights",
            "is_featured": "0",
            "created_at": "2017-07-31 11:25:26",
            "updated_at": "2017-07-31 11:36:05",
            "embed_code": "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dQw4w9WgXcQ\" frameborder=\"0\" allowfullscreen></iframe>",
            "created_at_f": "July 31, 2017"
        }
    ],
    "featured": [
        {
            "id": "1",
            "title": "haha",
            "duration": "06:11:11",
            "url": "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dQw4w9WgXcQ\" frameborder=\"0\" allowfullscreen></iframe>",
            "image_url": "http://localhost/davao-aguilas/uploads/video_thumbnails/1501471467_maxresdefault.jpg",
            "type": "News & Highlights",
            "is_featured": "1",
            "created_at": "2017-07-31 11:24:27",
            "updated_at": "2017-07-31 11:36:06",
            "embed_code": "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dQw4w9WgXcQ\" frameborder=\"0\" allowfullscreen></iframe>",
            "created_at_f": "July 31, 2017"
        }
    ]
}
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

#### List default squad (In our case, `Davao Aguilas`)
`GET /squad/default`

##### Response

```json
Status: 200 OK
{
    "Defender": {
        "players": [
            {
                "id": "1",
                "fname": "Dio",
                "lname": "Brando",
                "team_id": "4",
                "image_url": "http://localhost/davao-aguilas/uploads/players/1501472928_aDaHvdy.png",
                "full_body_image_url": "http://localhost/davao-aguilas/uploads/players/1501472928_2016-12-09.jpg",
                "position": "Defender",
                "jersey_num": "09",
                "birth_date": "1994-07-31",
                "birth_place": "Venice, Italy",
                "nationality": "Japanese",
                "height": "189cm",
                "weight": "50kg",
                "created_at": "2017-07-31 11:48:48",
                "updated_at": "2017-08-01 13:46:20",
                "birth_date_f": "July 31, 1994",
                "team_name": "Davao Aguilas",
                "age": 23,
                "stats": [
                    {
                        "stat_key": "Total Passes",
                        "stat_value": 21
                    }
                ]
            }
        ]
    },
    "Forward": {
        "players": [
            {
                "id": "2",
                "fname": "Mr.",
                "lname": "Brown",
                "team_id": "4",
                "image_url": "http://localhost/davao-aguilas/uploads/players/1501566171_avatar_22.jpg",
                "full_body_image_url": "http://localhost/davao-aguilas/uploads/players/1501566171_1sh7uw.jpg",
                "position": "Forward",
                "jersey_num": "12",
                "birth_date": "1994-08-01",
                "birth_place": "Venice, Italy",
                "nationality": "Italian",
                "height": "133cm",
                "weight": "22kg",
                "created_at": "2017-08-01 13:42:51",
                "updated_at": "2017-08-01 13:44:28",
                "birth_date_f": "August 1, 1994",
                "team_name": "Davao Aguilas",
                "age": 23,
                "stats": [
                    {
                        "stat_key": "Goals",
                        "stat_value": 22
                    }
                ]
            }
        ]
    }
}
```

### Team statistics

#### Get default team statistics (In our case, `Davao Aguilas`)
`GET /team_stats/team/default`

##### Response

```json
Status: 200 OK
[
    {
        "id": "1",
        "team_id": "4",
        "stat_key": "Yellow Cards",
        "stat_value": 3,
        "created_at": "2017-08-01 14:55:53",
        "updated_at": "2017-08-01 14:56:47"
    },
    {
        "id": "2",
        "team_id": "4",
        "stat_key": "Tackles Lost",
        "stat_value": 6,
        "created_at": "2017-08-01 14:56:49",
        "updated_at": "2017-08-01 14:57:06"
    },
    {
        "id": "3",
        "team_id": "4",
        "stat_key": "Put Through/Blocked",
        "stat_value": 1,
        "created_at": "2017-08-01 14:56:53",
        "updated_at": "2017-08-01 14:57:03"
    }
]
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

##### Response
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
`GET /ladders/leagues/:league_id/standings`

#### Get home standings ladder by league id
`GET /ladders/leagues/:league_id/home`

#### Get away standings ladder by league id
`GET /ladders/leagues/:league_id/away`

##### Response
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
`GET /fixtures/leagues/:league_id/upcoming`

#### Get all final/finished  matches by league id
`GET /fixtures/leagues/:league_id/final`

##### Response
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

#### Get fixture / match details by fixture id
`GET /fixtures/:id`

##### Response
```json
[
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
        "match_schedule_f": "Wednesday, 19 July 2017",
        "match_time": "23:11",
        "match_date": "2017-07-19",
        "home_team_image_url": "http://localhost/davao-aguilas/uploads/teams/1500014310_2016-11-29.jpg",
        "away_team_image_url": "http://localhost/davao-aguilas/uploads/teams/1500014304_2016-12-09.jpg",
        "league_name": "Asian Championship League",
        "match_stats": [
            {
                "id": "47",
                "fixture_id": "1",
                "stat_name": "Attacks",
                "home_score": "4",
                "away_score": "2",
                "created_at": "2017-07-27 14:17:23",
                "updated_at": "2017-07-27 14:17:27"
            },
            {
                "id": "48",
                "fixture_id": "1",
                "stat_name": "Corners",
                "home_score": "13",
                "away_score": "2",
                "created_at": "2017-07-27 14:17:28",
                "updated_at": "2017-07-27 14:17:32"
            },
            {
                "id": "50",
                "fixture_id": "1",
                "stat_name": "Free Kicks",
                "home_score": "31",
                "away_score": "13",
                "created_at": "2017-07-27 14:18:04",
                "updated_at": "2017-07-27 14:18:09"
            }
        ]
    }
]
```

#### Get most recent finished match / fixture
`GET /fixtures/recent`

#### Get closest upcoming finished match / fixture
`GET /fixtures/upcoming`

##### Response
```json
{
    "matches": [
        {
            "id": "9",
            "home_team_id": "2",
            "away_team_id": "3",
            "league_id": "1",
            "home_score": "3",
            "away_score": "2",
            "hash_tag": "#hohoho",
            "round_num": "2",
            "match_schedule": "2017-09-30 07:02:00",
            "match_time": "07:02",
            "location": "San Mateo",
            "match_progress": "Final",
            "created_at": "2017-07-28 16:48:04",
            "updated_at": "2017-07-28 17:08:56",
            "home_team_name": "Alliance",
            "away_team_name": "Buddha",
            "match_schedule_f": "Saturday, 30 September 2017",
            "match_date": "2017-09-30",
            "home_team_image_url": "http://localhost/davao-aguilas/uploads/teams/1501225828_H7jhECD.png",
            "away_team_image_url": "http://localhost/davao-aguilas/uploads/teams/1501225837_cb3ebb54aeaaadf8a61893d0c2ad081c.jpg",
            "league_name": "League A"
        }
    ],
    "league_name": "League A"
}
```


### Members
#### Add new member
`POST /members/`

##### Parameters
|     Name         |    Type    |    Description    |
| ---------------- | ---------- | ----------------- |
|      fname       |   string   |  No description   |
|      mname       |   string   |  No description   |
|      lname       |   string   |  No description   |
|     birthdate    |    date    |  No description   |
|      email       |   string   |  No description   |    
|     address      |   string   |  No description   |    
|      mobile      |   string   |  No description   |    
|   facebook_link  | url/string |  No description   |    
|   twitter_link   | url/string |  No description   |    

##### Response
```json
201 Created
[
    {
        "id": "1",
        "fname": "Hello",
        "mname": "my name is",
        "lname": "World",
        "birth_date": "2017-09-22",
        "email": "lsalamante@myoptimind.com",
        "address": "007 Dun dun dunnn",
        "mobile": "09451494315",
        "facebook_link": "https://facebook.com/bwrites1",
        "twitter_link": "https://twitter.com/endan1",
        "created_at": "2017-07-31 10:49:37",
        "updated_at": "0000-00-00 00:00:00"
    }
]
```
