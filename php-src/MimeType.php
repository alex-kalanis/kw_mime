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
    // todo: put this list somewhere in external resource
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
        'mpe' => 'video/mpeg', // MPEG Video
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
        // from sitepoint
        '3dm' => 'x-world/x-3dmf',
        '3dmf' => 'x-world/x-3dmf',
        'aab' => 'application/x-authorware-bin',
        'aam' => 'application/x-authorware-map',
        'aas' => 'application/x-authorware-seg',
        'abc' => 'text/vnd.abc',
        'acgi' => 'text/html',
        'afl' => 'video/animaflex',
        'aifc' => 'audio/aiff',
        'aiff' => 'audio/aiff',
        'aim' => 'application/x-aim',
        'aip' => 'text/x-audiosoft-intra',
        'ani' => 'application/x-navi-animation',
        'aos' => 'application/x-nokia-9000-communicator-add-on-software',
        'aps' => 'application/mime',
        'art' => 'image/x-jg',
        'asm' => 'text/x-asm',
        'asp' => 'text/asp',
        'avs' => 'video/avs-video',
        'bcpio' => 'application/x-bcpio',
        'bm' => 'image/bmp',
        'boo' => 'application/book',
        'book' => 'application/book',
        'boz' => 'application/x-bzip2',
        'bsh' => 'application/x-bsh',
        'cat' => 'application/vnd.ms-pki.seccat',
        'cc' => 'text/plain',
        'ccad' => 'application/clariscad',
        'cco' => 'application/x-cocoa',
        'cdf' => 'application/x-cdf',
        'cha' => 'application/x-chat',
        'chat' => 'application/x-chat',
        'cpio' => 'application/x-cpio',
        'crl' => 'application/pkcs-crl',
        'dcr' => 'application/x-director',
        'deepv' => 'application/x-deepv',
        'def' => 'text/plain',
        'der' => 'application/x-x509-ca-cert',
        'dif' => 'video/x-dv',
        'dir' => 'application/x-director',
        'dl' => 'video/dl',
        'dp' => 'application/commonground',
        'drw' => 'application/drafting',
        'dv' => 'video/x-dv',
        'dwf' => 'model/vnd.dwf',
        'dxf' => 'image/vnd.dwg',
        'dxr' => 'application/x-director',
        'el' => 'text/x-script.elisp',
        'elc' => 'application/x-elc',
        'env' => 'application/x-envoy',
        'es' => 'application/x-esrehber',
        'etx' => 'text/x-setext',
        'evy' => 'application/x-envoy',
        'f' => 'text/x-fortran',
        'f77' => 'text/x-fortran',
        'f90' => 'text/x-fortran',
        'fdf' => 'application/vnd.fdf',
        'fli' => 'video/x-fli',
        'flo' => 'image/florian',
        'flx' => 'text/vnd.fmi.flexstor',
        'fmf' => 'video/x-atomic3d-feature',
        'for' => 'text/x-fortran',
        'fpx' => 'image/vnd.fpx',
        'frl' => 'application/freeloader',
        'funk' => 'audio/make',
        'g' => 'text/plain',
        'g3' => 'image/g3fax',
        'gl' => 'video/x-gl',
        'gsd' => 'audio/x-gsm',
        'gsm' => 'audio/x-gsm',
        'gsp' => 'application/x-gsp',
        'gss' => 'application/x-gss',
        'gtar' => 'application/x-gtar',
        'h' => 'text/plain',
        'hdf' => 'application/x-hdf',
        'help' => 'application/x-helpfile',
        'hgl' => 'application/vnd.hp-hpgl',
        'hh' => 'text/plain',
        'hlb' => 'text/x-script',
        'hpg' => 'application/vnd.hp-hpgl',
        'hpgl' => 'application/vnd.hp-hpgl',
        'hta' => 'application/hta',
        'htc' => 'text/x-component',
        'htmls' => 'text/html',
        'htt' => 'text/webviewhtml',
        'htx' => 'text/html',
        'ice' => 'x-conference/x-cooltalk',
        'idc' => 'text/plain',
        'ief' => 'image/ief',
        'iefs' => 'image/ief',
        'iges' => 'model/iges',
        'igs' => 'model/iges',
        'ima' => 'application/x-ima',
        'imap' => 'application/x-httpd-imap',
        'ins' => 'application/x-internett-signup',
        'ip' => 'application/x-ip2',
        'isu' => 'video/x-isvideo',
        'it' => 'audio/it',
        'iv' => 'application/x-inventor',
        'ivr' => 'i-world/i-vrml',
        'ivy' => 'application/x-livescreen',
        'jam' => 'audio/x-jam',
        'jav' => 'text/plain',
        'jcm' => 'application/x-java-commerce',
        'jfif' => 'image/pjpeg',
        'jut' => 'image/jutvision',
        'ksh' => 'application/x-ksh',
        'la' => 'audio/x-nspaudio',
        'lam' => 'audio/x-liveaudio',
        'lma' => 'audio/x-nspaudio',
        'log' => 'text/plain',
        'lsp' => 'application/x-lisp',
        'lsx' => 'text/x-la-asf',
        'ltx' => 'application/x-latex',
        'm' => 'text/plain',
        'm1v' => 'video/mpeg',
        'm2a' => 'audio/mpeg',
        'm2v' => 'video/mpeg',
        'man' => 'application/x-troff-man',
        'map' => 'application/x-navimap',
        'mar' => 'text/plain',
        'mbd' => 'application/mbedlet',
        'mc$' => 'application/x-magic-cap-package-1.0',
        'mcd' => 'application/x-mathcad',
        'mcp' => 'application/netmc',
        'me' => 'application/x-troff-me',
        'mht' => 'message/rfc822',
        'mhtml' => 'message/rfc822',
        'mjf' => 'audio/x-vnd.audioexplosion.mjuicemediafile',
        'mjpg' => 'video/x-motion-jpeg',
        'mm' => 'application/x-meme',
        'mme' => 'application/base64',
        'moov' => 'video/quicktime',
        'movie' => 'video/x-sgi-movie',
        'mpc' => 'application/x-project',
        'mpga' => 'audio/mpeg',
        'mpp' => 'application/vnd.ms-project',
        'mpt' => 'application/x-project',
        'mpv' => 'application/x-project',
        'mpx' => 'application/x-project',
        'mrc' => 'application/marc',
        'ms' => 'application/x-troff-ms',
        'mv' => 'video/x-sgi-movie',
        'my' => 'audio/make',
        'mzz' => 'application/x-vnd.audioexplosion.mzz',
        'nap' => 'image/naplps',
        'naplps' => 'image/naplps',
        'nc' => 'application/x-netcdf',
        'ncm' => 'application/vnd.nokia.configuration-message',
        'nif' => 'image/x-niff',
        'niff' => 'image/x-niff',
        'nix' => 'application/x-mix-transfer',
        'nsc' => 'application/x-conference',
        'nvd' => 'application/x-navidoc',
        'oda' => 'application/oda',
        'omc' => 'application/x-omc',
        'omcd' => 'application/x-omcdatamaker',
        'omcr' => 'application/x-omcregerator',
        'p' => 'text/x-pascal',
        'p7a' => 'application/x-pkcs7-signature',
        'p7c' => 'application/x-pkcs7-mime',
        'p7m' => 'application/x-pkcs7-mime',
        'p7r' => 'application/x-pkcs7-certreqresp',
        'pbm' => 'image/x-portable-bitmap',
        'pcl' => 'application/x-pcl',
        'pct' => 'image/x-pict',
        'pdb' => 'chemical/x-pdb',
        'pfunk' => 'audio/make.my.funk',
        'pgm' => 'image/x-portable-greymap',
        'pic' => 'image/pict',
        'pict' => 'image/pict',
        'pkg' => 'application/x-newton-compatible-pkg',
        'pko' => 'application/vnd.ms-pki.pko',
        'plx' => 'application/x-pixclscript',
        'pm4' => 'application/x-pagemaker',
        'pm5' => 'application/x-pagemaker',
        'pnm' => 'image/x-portable-anymap',
        'pov' => 'model/x-pov',
        'ppm' => 'image/x-portable-pixmap',
        'ppz' => 'application/mspowerpoint',
        'prt' => 'application/pro_eng',
        'pvu' => 'paleovu/x-pv',
        'pwz' => 'application/vnd.ms-powerpoint',
        'qcp' => 'audio/vnd.qcelp',
        'qd3' => 'x-world/x-3dmf',
        'qd3d' => 'x-world/x-3dmf',
        'qif' => 'image/x-quicktime',
        'qtc' => 'video/x-qtc',
        'qti' => 'image/x-quicktime',
        'qtif' => 'image/x-quicktime',
        'ras' => 'image/cmu-raster',
        'rast' => 'image/cmu-raster',
        'rexx' => 'text/x-script.rexx',
        'rf' => 'image/vnd.rn-realflash',
        'rgb' => 'image/x-rgb',
        'rm' => 'audio/x-pn-realaudio',
        'rmi' => 'audio/mid',
        'rmm' => 'audio/x-pn-realaudio',
        'rmp' => 'audio/x-pn-realaudio-plugin',
        'rng' => 'application/ringing-tones',
        'rnx' => 'application/vnd.rn-realplayer',
        'roff' => 'application/x-troff',
        'rp' => 'image/vnd.rn-realpix',
        'rt' => 'text/vnd.rn-realtext',
        'rtx' => 'text/richtext',
        'rv' => 'video/vnd.rn-realvideo',
        's' => 'text/x-asm',
        's3m' => 'audio/s3m',
        'sbk' => 'application/x-tbook',
        'sdml' => 'text/plain',
        'sdp' => 'application/x-sdp',
        'sdr' => 'application/sounder',
        'sea' => 'application/x-sea',
        'set' => 'application/set',
        'sgm' => 'text/sgml',
        'sgml' => 'text/x-sgml',
        'shar' => 'application/x-shar',
        'shtml' => 'text/html',
        'sid' => 'audio/x-psid',
        'skd' => 'application/x-koan',
        'skm' => 'application/x-koan',
        'skt' => 'application/x-koan',
        'sl' => 'application/x-seelogo',
        'smi' => 'application/smil',
        'smil' => 'application/smil',
        'sol' => 'application/solids',
        'spl' => 'application/futuresplash',
        'spr' => 'application/x-sprite',
        'sprite' => 'application/x-sprite',
        'ssi' => 'text/x-server-parsed-html',
        'ssm' => 'application/streamingmedia',
        'sst' => 'application/vnd.ms-pki.certstore',
        'step' => 'application/step',
        'stp' => 'application/step',
        'sv4cpio' => 'application/x-sv4cpio',
        'sv4crc' => 'application/x-sv4crc',
        'svf' => 'image/vnd.dwg',
        't' => 'application/x-troff',
        'talk' => 'text/x-speech',
        'tbk' => 'application/toolbook',
        'tcl' => 'text/x-script.tcl',
        'tcsh' => 'text/x-script.tcsh',
        'tex' => 'application/x-tex',
        'texi' => 'application/x-texinfo',
        'texinfo' => 'application/x-texinfo',
        'tr' => 'application/x-troff',
        'tsi' => 'audio/tsp-audio',
        'tsv' => 'text/tab-separated-values',
        'turbot' => 'image/florian',
        'uil' => 'text/x-uil',
        'uni' => 'text/uri-list',
        'unis' => 'text/uri-list',
        'unv' => 'application/i-deas',
        'uri' => 'text/uri-list',
        'uris' => 'text/uri-list',
        'ustar' => 'application/x-ustar',
        'uu' => 'text/x-uuencode',
        'uue' => 'text/x-uuencode',
        'vcd' => 'application/x-cdlink',
        'vcs' => 'text/x-vcalendar',
        'vda' => 'application/vda',
        'vdo' => 'video/vdo',
        'vew' => 'application/groupwise',
        'viv' => 'video/vnd.vivo',
        'vivo' => 'video/vnd.vivo',
        'vmd' => 'application/vocaltec-media-desc',
        'vmf' => 'application/vocaltec-media-file',
        'voc' => 'audio/x-voc',
        'vos' => 'video/vosaic',
        'vox' => 'audio/voxware',
        'vqe' => 'audio/x-twinvq-plugin',
        'vqf' => 'audio/x-twinvq',
        'vql' => 'audio/x-twinvq-plugin',
        'vrml' => 'model/vrml',
        'vrt' => 'x-world/x-vrt',
        'vst' => 'application/x-visio',
        'vsw' => 'application/x-visio',
        'w60' => 'application/wordperfect6.0',
        'w61' => 'application/wordperfect6.1',
        'w6w' => 'application/msword',
        'wb1' => 'application/x-qpro',
        'web' => 'application/vnd.xara',
        'wiz' => 'application/msword',
        'wk1' => 'application/x-123',
        'wmf' => 'windows/metafile',
        'wmlc' => 'application/vnd.wap.wmlc',
        'wmlsc' => 'application/vnd.wap.wmlscriptc',
        'word' => 'application/msword',
        'wp5' => 'application/wordperfect',
        'wpd' => 'application/wordperfect',
        'wq1' => 'application/x-lotus',
        'wrz' => 'model/vrml',
        'wsc' => 'text/scriplet',
        'wsrc' => 'application/x-wais-source',
        'wtk' => 'application/x-wintalk',
        'xbm' => 'image/x-xbitmap',
        'xdr' => 'video/x-amt-demorun',
        'xgz' => 'xgl/drawing',
        'xif' => 'image/vnd.xiff',
        'xl' => 'application/excel',
        'xlb' => 'application/excel',
        'xlc' => 'application/excel',
        'xld' => 'application/excel',
        'xlk' => 'application/excel',
        'xll' => 'application/excel',
        'xlm' => 'application/excel',
        'xlt' => 'application/excel',
        'xlv' => 'application/excel',
        'xlw' => 'application/excel',
        'xm' => 'audio/xm',
        'xmz' => 'xgl/movie',
        'xpix' => 'application/x-vnd.ls-xpix',
        'xpm' => 'image/x-xpixmap',
        'xsr' => 'video/x-amt-showrun',
        'xwd' => 'image/x-xwd',
        'xyz' => 'chemical/x-pdb',
        'zoo' => 'application/octet-stream',
        'zsh' => 'text/x-script.zsh',
    ];

    public function __construct(bool $localAtFirst = false)
    {
        $this->localAtFirst = $localAtFirst;
    }

    /**
     * @param string $path
     * @return string
     */
    public function mimeByPath(string $path): string
    {
        if ($this->localAtFirst) {
            return static::mimeByExt(Stuff::fileExt($path));
        }
        if (function_exists('mime_content_type')) {
            return mime_content_type($path);
        }
        // @codeCoverageIgnoreStart
        // file_content_type and finfo are in the same package - wtf?!
        if (method_exists('\finfo', 'buffer')) {
            $fi = new \finfo(FILEINFO_MIME); # file mimetype
            $mm = $fi->buffer($path);
            unset($fi);
            return $mm;
        }
        // @codeCoverageIgnoreEnd
        // @codeCoverageIgnoreStart
        // same as in localAtFirst
        return static::mimeByExt(Stuff::fileExt($path));
    }
    // @codeCoverageIgnoreEnd

    public static function mimeByExt(string $ext): string
    {
        $ext = strtolower($ext);
        return isset(static::$mimeTypes[$ext]) ? static::$mimeTypes[$ext] : 'application/octet-stream';
    }
}
