function loadCss(path) {
  var cssId = encodeURI(path);
  if (!document.getElementById(cssId))
  {
    var head  = document.getElementsByTagName('head')[0];
    var link  = document.createElement('link');
    link.id   = cssId;
    link.rel  = 'stylesheet';
    link.type = 'text/css';
    link.href = path;
    link.media = 'all';
    head.appendChild(link);
  }
}
loadCss('/assets/css/vendor/font-awesome/css/font-awesome.min.css');