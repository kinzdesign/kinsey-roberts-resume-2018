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