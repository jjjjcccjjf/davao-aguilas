# Davao Aguilas
## Overview
Lorem ipsum dolor sit amet

1. Blablabla
1. API Documentation

## Requirements

1. PHP 5.4 or greater
1. CodeIgniter 3.0+

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

#### Get a news  
`GET /news/:id`

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



<style type="text/css">
ol { list-style-type: lower-roman; }
</style>
