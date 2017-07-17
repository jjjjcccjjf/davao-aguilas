# Davao Aguilas
## Overview
Lorem ipsum dolor sit amet

1. Blablabla
1. [API Documentation](#api-documentation)
   1. [News](#news)
   1. [Videos](#videos)
   1. [Partners](#partners)
   1. [Teams](#teams)
   1. [Players](#players)
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
1. Pagination of webservice
1. Configure server time
1. While uploading loading

---
## API Documentation
All API access is accessed from `http://TODO.com/api`
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

### Players
#### List all players
`GET /players/`

#### Get a player
`GET /players/:id`

#### List all players from a team
`GET /players/team/:id`

##### Response
```json
Status: 200 OK
[
    {
        "id": "3",
        "fname": "Dio",
        "lname": "Brando",
        "team_id": "1",
        "image_url": "http://localhost/davao-aguilas/uploads/players/1499935050_aDaHvdy.png",
        "full_body_image_url": "http://localhost/davao-aguilas/uploads/players/1499935050_2016-12-09.jpg",
        "position": "Forward",
        "jersey_num": "11",
        "birth_date": "2017-07-14",
        "birth_place": "Spain",
        "nationality": "Spaniard",
        "height": "196cm",
        "weight": "123kg",
        "created_at": "2017-07-13 16:37:30",
        "updated_at": "2017-07-14 11:46:20",
        "birth_date_f": "July 14, 2017",
        "team_name": "Za warudo"
    }
]
```
