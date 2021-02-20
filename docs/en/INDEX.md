# YouTube Database Field

A database field specifically for youtube videos.

## Usage in model

```php

    MyClass extends DataObject
    {
        private static $db = [
            "MyYouTube" => "YouTubeVideoCode"
        ];
    }
```


## usage in template:

$MyYouTube.Embed
