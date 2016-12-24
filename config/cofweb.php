<?php return array (
  'web_title' => 'ruan.blog',
  'seo_title' => '个人博客',
  'keywords' => 'ruan,blog',
  'description' => '不乱于心，不困于情。不畏将来，不念过往。如此，安好! 深谋若谷，深交若水。深明大义，深悉小节。已然，静舒! 善宽以怀，善感以恩。善博以浪，善精以业。这般，最佳! 勿感于时，勿伤于怀。勿耽美色，勿沉虚妄。从今，进取! 无愧于天，无愧于地。无怍于人，无惧于鬼。这样，人生!',
  'web_count' => '<script language=JavaScript>
<!--
var caution = false
function setCookie(name, value, expires, path, domain, secure) {
var curCookie = name + "=" + escape(value) +
((expires) ? "; expires=" + expires.toGMTString() : "") +
((path) ? "; path=" + path : "") +
((domain) ? "; domain=" + domain : "") +
((secure) ? "; secure" : "")
if (!caution || (name + "=" + escape(value)).length <= 4000)
document.cookie = curCookie
else
if (confirm("Cookie exceeds 4KB and will be cut!"))
document.cookie = curCookie
}
function getCookie(name) {
var prefix = name + "="
var cookieStartIndex = document.cookie.indexOf(prefix)
if (cookieStartIndex == -1)
return null
var cookieEndIndex = document.cookie.indexOf(";", cookieStartIndex + prefix.length)
if (cookieEndIndex == -1)
cookieEndIndex = document.cookie.length
return unescape(document.cookie.substring(cookieStartIndex + prefix.length, cookieEndIndex))
}
function deleteCookie(name, path, domain) {
if (getCookie(name)) {
document.cookie = name + "=" +
((path) ? "; path=" + path : "") +
((domain) ? "; domain=" + domain : "") +
"; expires=Thu, 01-Jan-70 00:00:01 GMT"
}
}
function fixDate(date) {
var base = new Date(0)
var skew = base.getTime()
if (skew > 0)
date.setTime(date.getTime() - skew)
}
var now = new Date()
fixDate(now)
now.setTime(now.getTime() + 365 * 24 * 60 * 60 * 1000)
var visits = getCookie("counter")
if (!visits)
visits = 1
else
visits = parseInt(visits) + 1
setCookie("counter", visits, now)
document.write("您是第" + visits + "位访问本网站用户！")
// -->
</script>',
  'web_status' => '0',
  'CopyRight' => 'CopyRight © 2016. Powered By <a href="http://weibo.com/u/2616644081" target="_blank"> ruan</a>',
);