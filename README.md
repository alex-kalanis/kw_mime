# kw_mime

![Build Status](https://github.com/alex-kalanis/kw_mime/actions/workflows/code_checks.yml/badge.svg)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/alex-kalanis/kw_mime/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/alex-kalanis/kw_mime/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/alex-kalanis/kw_mime/v/stable.svg?v=1)](https://packagist.org/packages/alex-kalanis/kw_mime)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.4-8892BF.svg)](https://php.net/)
[![Downloads](https://img.shields.io/packagist/dt/alex-kalanis/kw_mime.svg?v1)](https://packagist.org/packages/alex-kalanis/kw_mime)
[![License](https://poser.pugx.org/alex-kalanis/kw_mime/license.svg?v=1)](https://packagist.org/packages/alex-kalanis/kw_mime)
[![Code Coverage](https://scrutinizer-ci.com/g/alex-kalanis/kw_mime/badges/coverage.png?b=master&v=1)](https://scrutinizer-ci.com/g/alex-kalanis/kw_mime/?branch=master)

Simple library to access mime type of sent file. Just makes nice facade to mime libraries.

## PHP Installation

```bash
composer.phar require alex-kalanis/kw_mime
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
