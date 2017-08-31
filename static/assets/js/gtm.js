
/**
 * Returns true or false based on whether doNotTack is enabled. It also takes into account the
 * anomalies, such as !bugzilla 887703, which effect versions of Fx 31 and lower. It also handles
 * IE versions on Windows 7, 8 and 8.1, where the DNT implementation does not honor the spec.
 * @see https://bugzilla.mozilla.org/show_bug.cgi?id=1217896 for more details
 * @params {string} [dnt] - An optional mock doNotTrack string to ease unit testing.
 * @params {string} [userAgent] - An optional mock userAgent string to ease unit testing.
 * @returns {boolean} true if enabled else false
 */
function _dntEnabled(dnt, userAgent) {

    'use strict';

    // for old version of IE we need to use the msDoNotTrack property of navigator
    // on newer versions, and newer platforms, this is doNotTrack but, on the window object
    // Safari also exposes the property on the window object.
    var dntStatus = dnt || navigator.doNotTrack || window.doNotTrack || navigator.msDoNotTrack;
    var ua = userAgent || navigator.userAgent;

    // List of Windows versions known to not implement DNT according to the standard.
    var anomalousWinVersions = ['Windows NT 6.1', 'Windows NT 6.2', 'Windows NT 6.3'];

    var fxMatch = ua.match(/Firefox\/(\d+)/);
    var ieRegEx = /MSIE|Trident/i;
    var isIE = ieRegEx.test(ua);
    // Matches from Windows up to the first occurance of ; un-greedily
    // http://www.regexr.com/3c2el
    var platform = ua.match(/Windows.+?(?=;)/g);

    // With old versions of IE, DNT did not exist so we simply return false;
    if (isIE && typeof Array.prototype.indexOf !== 'function') {
        return false;
    } else if (fxMatch && parseInt(fxMatch[1], 10) < 32) {
        // Can't say for sure if it is 1 or 0, due to Fx bug 887703
        dntStatus = 'Unspecified';
    } else if (isIE && platform && anomalousWinVersions.indexOf(platform.toString()) !== -1) {
        // default is on, which does not honor the specification
        dntStatus = 'Unspecified';
    } else {
        // sets dntStatus to Disabled or Enabled based on the value returned by the browser.
        // If dntStatus is undefined, it will be set to Unspecified
        dntStatus = { '0': 'Disabled', '1': 'Enabled' }[dntStatus] || 'Unspecified';
    }

    return dntStatus === 'Enabled' ? true : false;
}

/* Adapted from https://github.com/schalkneethling/dnt-helper */

/* First ensure that window.dataLayer is defined to avoid script errors */
window.dataLayer = window.dataLayer || [];
if (!_dntEnabled()) {
  (function(w,d,s,l,i,j,f,dl,k,q){
    w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});f=d.getElementsByTagName(s)[0];
    k=i.length;q='//www.googletagmanager.com/gtm.js?id=@&l='+(l||'dataLayer');
    while(k--){j=d.createElement(s);j.async=!0;j.src=q.replace('@',i[k]);f.parentNode.insertBefore(j,f);}
  }(window,document,'script','dataLayer',['GTM-WHZM4LT']));
}