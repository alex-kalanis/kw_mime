<?php

namespace kalanis\kw_mime;


use kalanis\kw_paths\Stuff;


/**
 * Class MimeType
 * @package kalanis\kw_mime
 * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types
 * @link https://mimetype.io/all-types/
 * @link https://www.sitepoint.com/mime-types-complete-list/
 */
class MimeType
{
    protected $localAtFirst = false;
    protected static $mimeTypes = [
        'atom' => 'application/atom+xml', // Atom XML
        'css' => 'text/css', // Cascading Style Sheets (CSS)
        'dtd' => 'application/xml-dtd',
        'htm' => 'text/html', // HyperText Markup Language (HTML)
        'html' => 'text/html', // HyperText Markup Language (HTML)
        'js' => 'text/javascript', // JavaScript
        'json' => 'application/json', // JSON format
        'jsonld' => 'application/ld+json', // JSON-LD format
        'latex' => 'application/x-latex',
        'md' => 'text/markdown',
        'mjs' => 'text/javascript', // JavaScript module
        'mkd' => 'text/markdown',
        'php' => 'application/x-httpd-php', // Hypertext Preprocessor
        'rdf' => 'application/rdf+xml',
        'rtf' => 'application/rtf', // Rich Text Format (RTF)
        'rss' => 'application/rss+xml',
        'txt' => 'text/plain', // Text, (generally ASCII or ISO 8859-n)
        'text' => 'text/plain', // Text, (generally ASCII or ISO 8859-n)
        'wml' => 'text/vnd.wap.wml',
        'wmls' => 'text/vnd.wap.wmlscript',
        'xhtm' => 'application/xhtml+xml',
        'xhtml' => 'application/xhtml+xml', // XHTML
        'xml' => 'application/xml', // XML
        // images
        'apng' => 'image/apng',
        'avif' => 'image/avif',
        'bmp' => 'image/bmp', // Windows OS/2 Bitmap Graphics
        'djv' => 'image/vnd.djvu',
        'djvu' => 'image/vnd.djvu',
        'gif' => 'image/gif', // Graphics Interchange Format (GIF)
        'ico' => 'image/vnd.microsoft.icon', // Icon format
        'jpe' => 'image/jpeg', // JPEG images
        'jpg' => 'image/jpeg', // JPEG images
        'jpeg' => 'image/jpeg', // JPEG images
        'odg' => 'application/vnd.oasis.opendocument.graphics', // OpenDocument graphics
        'odi' => 'application/vnd.oasis.opendocument.image', // OpenDocument image
        'pcx' => 'image/x-pcx',
        'png' => 'image/png', // Portable Network Graphics
        'svg' => 'image/svg+xml', // Scalable Vector Graphics (SVG)
        'svgz' => 'image/svg+xml',
        'tga' => 'image/x-tga', // Targa image
        'tif' => 'image/tiff', // Tagged Image File Format (TIFF)
        'tiff' => 'image/tiff', // Tagged Image File Format (TIFF)
        'webp' => 'image/webp', // WEBP image
        'wbmp' => 'image/vnd.wap.wbmp',
        // archives
        'arc' => 'application/x-freearc', // Archive document (multiple files embedded)
        'arj' => 'application/x-arj-compressed',
        'bz' => 'application/x-bzip', // BZip archive
        'bz2' => 'application/x-bzip2', // BZip2 archive
        'cab' => 'application/vnd.ms-cab-compressed', // Cab archives from Windows installer
        'gz' => 'application/gzip', // GZip Compressed Archive
        'lha' => 'application/x-lha',
        'lzh' => 'application/x-lzh',
        'lzx' => 'application/x-lzx',
        'rar' => 'application/vnd.rar', // RAR archive
        'tar' => 'application/x-tar', // Tape Archive (TAR)
        'tgz' => 'application/x-gzip', // GZip Compressed Archive
        'z' => 'application/x-compress',
        'zip' => 'application/zip', // ZIP archive
        '7z' => 'application/x-7z-compressed', // 7-zip archive
        // installers
        'deb' => 'application/x-debian-package',
        'msi' => 'application/x-msdownload', // Microsoft Installer
        'mpkg' => 'application/vnd.apple.installer+xml', // Apple Installer Package
        'portpkg' => 'application/vnd.macports.portpkg',
        'rpa' => 'application/x-redhat-package-manager',
        'rpm' => 'application/x-rpm',
        'udeb' => 'application/x-debian-package',
        // audio/video
        'aif' => 'audio/aiff',
        'asf' => 'video/x-ms-asf',
        'asx' => 'application/x-ms-asf',
        'au' => 'audio/basic',
        'aac' => 'audio/aac', // AAC audio
        'avi' => 'video/x-msvideo', // AVI: Audio Video Interleave
        'cda' => 'application/x-cdf', // CD audio
        'dvi' => 'application/x-dvi',
        'flv' => 'video/x-flv',
        'kar' => 'audio/midi',
        'm3u' => 'audio/x-mpegurl',
        'mid' => 'audio/x-midi', // Musical Instrument Digital Interface (MIDI)
        'midi' => 'audio/midi', // Musical Instrument Digital Interface (MIDI)
        'mkv' => 'video/x-matroska',
        'mov' => 'video/quicktime',
        'mp3' => 'audio/mpeg', // MP3 audio
        'mp4' => 'video/mp4', // MP4 video
        'mp4s' => 'application/mp4',
        'mpeg' => 'video/mpeg', // MPEG Video
        'mpg' => 'video/mpeg',
        'oga' => 'audio/ogg', // OGG audio
        'ogg' => 'video/ogg',
        'ogv' => 'video/ogg', // OGG video
        'ogx' => 'application/ogg', // OGG
        'opus' => 'audio/opus', // Opus audio
        'qt' => 'video/quicktime',
        'ra' => 'audio/x-pn-realaudio',
        'ram' => 'audio/x-pn-realaudio',
        'snd' => 'audio/basic',
        'ts' => 'video/mp2t', // MPEG transport stream
        'wav' => 'audio/wav', // Waveform Audio Format
        'weba' => 'audio/webm', // WEBM audio
        'webm' => 'video/webm', // WEBM video
        'wma' => 'audio/x-ms-wma',
        'wmv' => 'video/x-ms-wmv',
        '3gp' => 'video/3gpp', // 3GPP audio/video container
        '3g2' => 'video/3gpp2', // 3GPP2 audio/video container
        // adobe
        'ai' => 'application/postscript',
        'eps' => 'application/postscript',
        'ps' => 'application/postscript',
        'pdf' => 'application/pdf', // Adobe Portable Document Format (PDF)
        'psd' => 'image/vnd.adobe.photoshop', // Photoshop image
        'swf' => 'application/x-shockwave-flash', // Adobe Flash document
        // office
        'abw' => 'application/x-abiword', // AbiWord document
        'apr' => 'application/vnd.lotus-approach',
        'azw' => 'application/vnd.amazon.ebook', // Amazon Kindle eBook format
        'bdf' => 'application/x-font-bdf',
        'doc' => 'application/msword', // Microsoft Word
        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // Microsoft Word (OpenXML)
        'dot' => 'application/msword', // Microsoft Word
        'eot' => 'application/vnd.ms-fontobject', // MS Embedded OpenType fonts
        'epub' => 'application/epub+zip', // Electronic publication (EPUB)
        'gsf' => 'application/x-font-ghostscript',
        'ics' => 'text/calendar', // iCalendar format
        'lwp' => 'application/vnd.lotus-wordpro',
        'mobi' => 'application/x-mobipocket-ebook',
        'nsf' => 'application/vnd.lotus-notes',
        'odb' => 'application/vnd.oasis.opendocument.database', // OpenDocument database
        'odf' => 'application/vnd.oasis.opendocument.formula', // OpenDocument formula
        'odp' => 'application/vnd.oasis.opendocument.presentation', // OpenDocument presentation document
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet', // OpenDocument spreadsheet document
        'odt' => 'application/vnd.oasis.opendocument.text', // OpenDocument text document
        'onepkg' => 'application/onenote', // OneNote file
        'onetmp' => 'application/onenote', // OneNote file
        'onetoc' => 'application/onenote', // OneNote file
        'onetoc2' => 'application/onenote', // OneNote file
        'org' => 'application/vnd.lotus-organizer',
        'otf' => 'font/otf', // OpenType font
        'pcf' => 'application/x-font-pcf',
        'pot' => 'application/vnd.ms-powerpoint', // Microsoft PowerPoint
        'ppa' => 'application/mspowerpoint', // Microsoft PowerPoint
        'ppt' => 'application/vnd.ms-powerpoint', // Microsoft PowerPoint
        'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation', // Microsoft PowerPoint (OpenXML)
        'pps' => 'application/vnd.ms-powerpoint', // Microsoft PowerPoint
        'prc' => 'application/x-mobipocket-ebook',
        'pre' => 'application/vnd.lotus-freelance',
        'psf' => 'application/x-font-linux-psf',
        'scm' => 'application/vnd.lotus-screencam',
        'ttc' => 'font/ttf', // TrueType Font
        'ttf' => 'font/ttf', // TrueType Font
        'vsd' => 'application/vnd.visio', // Microsoft Visio
        'woff' => 'font/woff', // Web Open Font Format (WOFF)
        'woff2' => 'font/woff2', // Web Open Font Format (WOFF)
        'wp' => 'application/wordperfect',
        'wp6' => 'application/wordperfect',
        'wri' => 'application/mswrite',
        'xla' => 'application/x-msexcel',
        'xls' => 'application/vnd.ms-excel', // Microsoft Excel
        'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // Microsoft Excel (OpenXML)
        'xlst' => 'application/xslt+xml',
        '123' => 'application/vnd.lotus-1-2-3',
        // tech
        'chm' => 'application/vnd.ms-htmlhelp', // help file
        'dwg' => 'image/vnd.dwg', // AutoCAD drawing
        'gcode' => 'text/x.gcode', // 3D printer file format
        'hlp' => 'application/winhlp', // help file
        'kml' => 'application/vnd.google-earth.kml+xml',
        'kmz' => 'application/vnd.google-earth.kmz',
        'ma' => 'application/mathematica',
        'mathml' => 'application/mathml+xml',
        'mb' => 'application/mathematica',
        'mml' => 'application/mathml+xml',
        'nb' => 'application/mathematica',
        'skp' => 'application/vnd.koan', // Google SketchUp drawing
        'xul' => 'application/vnd.mozilla.xul+xml', // XUL
        // programming and system
        'ami' => 'application/vnd.amiga.ami',
        'application' => 'application/x-ms-application',
        'apk' => 'application/vnd.android.package-archive', // Android package archive
        'asc' => 'application/pgp-signature', // PGP key
        'bin' => 'application/octet-stream', // Any kind of binary data
        'c' => 'text/plain',
        'cer' => 'application/pkix-cert',
        'csh' => 'application/x-csh', // C-Shell script
        'csv' => 'text/csv', // Comma-separated values (CSV)
        'cpp' => 'text/x-c',
        'cpt' => 'application/mac-compactpro',
        'class' => 'application/java-vm',
        'conf' => 'text/plain',
        'crt' => 'application/x-x509-ca-cert',
        'c++' => 'text/plain',
        'exe' => 'application/octet-stream',
        'ecma' => 'application/ecmascript',
        'hqx' => 'application/mac-binhex40',
        'inf' => 'application/inf',
        'jar' => 'application/java-archive', // Java Archive (JAR)
        'java' => 'text/x-java-source',
        'list' => 'text/plain',
        'lst' => 'text/plain',
        'mdb' => 'application/x-msaccess', // Access DB
        'meta' => 'text/metadata',
        'mime' => 'www/mime',
        'pas' => 'text/pascal',
        'pl' => 'application/x-perl',
        'pm' => 'application/x-perl',
        'py' => 'text/x-script.python',
        'pyc' => 'application/x-python-code',
        'pyo' => 'application/x-python-code',
        'pfx' => 'application/x-pkcs12',
        'pgp' => 'application/pgp-encrypted', // PGP key
        'p7b' => 'application/x-pkcs7-certificates', // PKCS certificate
        'p7s' => 'application/pkcs7-signature', // PKCS signature
        'p10' => 'application/pkcs10', // PKCS key
        'p12' => 'application/x-pkcs12',
        'sh' => 'application/x-sh', // Bourne shell script
        'ser' => 'application/java-serialized-object',
        'sig' => 'application/pgp-signature', // PGP key
        'spc' => 'application/x-pkcs7-certificates', // PKCS certificate
        'sqlite' => 'application/vnd.sqlite3', // SQLite
        'sqlite3' => 'application/vnd.sqlite3', // SQLite
        'torrent' => 'application/x-bittorrent', // torrent files
        // custom
        'phpkg' => 'application/x-php-package', // php package for KWCMS
    ];

    public function __construct(bool $localAtFirst = false)
    {
        $this->localAtFirst = $localAtFirst;
    }

    /**
     * @param string $path
     * @return string
     * @codeCoverageIgnore because has access to external resources
     */
    public function mimeByPath(string $path): string
    {
        if ($this->localAtFirst) {
            return static::mimeByExt(Stuff::fileExt($path));
        }
        if (function_exists('mime_content_type')) {
            return mime_content_type($path);
        }
        if (method_exists('\finfo', 'buffer')) {
            $fi = new \finfo(FILEINFO_MIME); # file mimetype
            $mm = $fi->buffer($path);
            unset($fi);
            return $mm;
        }
        return static::mimeByExt(Stuff::fileExt($path));
    }

    public static function mimeByExt(string $ext): string
    {
        $ext = strtolower($ext);
        return isset(static::$mimeTypes[$ext]) ? static::$mimeTypes[$ext] : 'application/octet-stream';
    }
}
