# kw_mime

Simple library to access mime type of sent file. Just makes nice facade to mime libraries.

## PHP Installation

```
{
    "require": {
        "alex-kalanis/kw_mime": "1.0"
    }
}
```

(Refer to [Composer Documentation](https://github.com/composer/composer/blob/master/doc/00-intro.md#introduction) if you are not
familiar with composer)


## PHP Usage

1.) Use your autoloader (if not already done via Composer autoloader)

2.) Connect the "\kalanis\kw_mime\MimeType" into your app. Extends it for setting your case.

3.) Just call setting and render

## Caveats

If not speified by time of construction it uses external libraries in extension ext-fileinfo.
Be aware of that.
