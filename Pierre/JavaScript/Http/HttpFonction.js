var ReadyStateOk = 4;

// declaration de XMLHttpRequest
function getHTTPObject() {
  var xmlhttp;
  /*@cc_on
  @if (@_jscript_version >= 5)
    try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (e) {
      try {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
        xmlhttp = false;
        }
      }
  @else
  xmlhttp = false;
  @end @*/
  if (!xmlhttp && typeof XMLHttpRequest != C_UNDEFINED) {
    try {
      xmlhttp = new XMLHttpRequest();
      } catch (e) {
      xmlhttp = false;
      }
    }
  return xmlhttp;
  }

// Fnt de recherche  
function HttpMajData(ObjHttp, UrlFind, FntReturn) {
	ObjHttp.open("GET", UrlFind, true);
	ObjHttp.onreadystatechange = FntReturn;
	ObjHttp.send(null);
 }
  