/*
	Browser Detect set v1.1
	-	функции определения браузера и его версии (IE6+, Opera, Firefox, Chrome, Safari )
	
			-	browserDetectNav(chrAfterPoint)					// путём анализа UA-строки
			-	browserDetectJS()								// путём анализа поддерживаемых js-свойств
			-	getBrowser()									// обоими способами
			-	isItBrowser(browserCom, browserVer, detectMethod)	// проверяет соответствие браузера заданному имени и версии, заданным способом(1 или 2)
			
	-	функция для "ненавязчивого" предложения обновить браузер
	
			checkBrowser(params = {
				     warning: [string],				// окончание шаблонной фразы "Версия Вашего браузера BBBBB (ver ХХ.ХХ) {warning}"
				     message: [string],			// основное сообщение
				     question: [string],			// сам вопрос "Не желаете ли?" (у каждого свой подход к людям) :)
			
				     chrome: [float],				// минимально-допустимые версии браузеров
				     safari: [float],			 
				     msie: [float],			 
				     opera: [float],
				     firefox: [float],
				     
				     chromeLink: [string],			// ссылки на обновление
				     safariLink: [string],
				     msieLink: [string],
				     operaLink: [string],
				     firefoxLink: [string]
			 })
		Все параметры функции checkBrowser не обязательные.
			 
	
	http://www.xiper.net/collect/js-plugins/browser-detect/browser-name-and-version.html
	Author Andrei Kosyack
*/

function checkBrowser(params){
	if (!params) params = new Object;
	if (!params.chromeLink) params.chromeLink = 'http://www.google.com/chrome/eula.html';
	if (!params.safariLink) params.safariLink = 'http://www.apple.com/ru/safari/download/';
	if (!params.msieLink) params.msieLink = 'http://www.microsoft.com/rus/windows/internet-explorer/';
	if (!params.operaLink) params.operaLink = 'http://ru.opera.com/download/';
	if (!params.firefoxLink) params.firefoxLink = 'http://www.mozilla-russia.org/products/firefox/';
	if (!params.warning) params.warning = 'устарела!\r\n\r\n'
		else params.warning += '\r\n\r\n';
	if (!params.question) params.question = 'Хотите ли обновить версию своего браузера?';
	if (!params.message) params.message = ''
		else params.message += '\r\n\r\n';
	if (!params.chrome) params.chrome = 11;
	if (!params.safari) params.safari = 5;
	if (!params.msie) params.msie = 6;	
	if (!params.opera) params.opera = 10.5;
	if (!params.firefox) params.firefox = 3.5;
	
var 	browser = getBrowser(1),
	browserName = browser[0],
	browserVer = browser[1],
	browserVerPoints = browser[2],
	browserVer = parseFloat(browserVer+"."+browserVerPoints),
	systemMessage = 'Версия Вашего браузера '+browserName+'(ver '+browserVer+') '+params.warning+params.message+params.question,
	bLink = '';

switch (browserName)
{
	case 'Chrome':
		if (browserVer >= params.chrome) return false
			else bLink = params.chromeLink; break;
	case 'Safari':
		if (browserVer >= params.safari) return false
			else bLink = params.safariLink; break;
	case 'MSIE':
		if (browserVer >= params.msie) return false
			else bLink = params.msieLink; break;
	case 'Opera':
		if (browserVer >= params.opera) return false
			else bLink = params.operaLink; break;
	case 'Firefox':
		if (browserVer >= params.firefox) return false
			else bLink = params.firefoxLink; break;
};
	

		var conf = confirm(systemMessage);
		
		if (conf == true) document.location.href = bLink
			else return false;
			
};		

function browserDetectNav(chrAfterPoint)
{
var 	UA=window.navigator.userAgent,
	OperaB = /Opera[ \/]+\w+\.\w+/i,
	OperaV = /Version[ \/]+\w+\.\w+/i,	
	FirefoxB = /Firefox\/\w+\.\w+/i,
	ChromeB = /Chrome\/\w+\.\w+/i,
	SafariB = /Version\/\w+\.\w+/i,
	IEB = /MSIE *\d+\.\w+/i,
	SafariV = /Safari\/\w+\.\w+/i,
	browser = new Array(),
	browserSplit = /[ \/\.]/i,
	OperaV = UA.match(OperaV),
	Firefox = UA.match(FirefoxB),
	Chrome = UA.match(ChromeB),
	Safari = UA.match(SafariB),
	SafariV = UA.match(SafariV),
	IE = UA.match(IEB),
	Opera = UA.match(OperaB);
		
		if ((!Opera=="")&(!OperaV=="")) browser[0]=OperaV[0].replace(/Version/, "Opera")
				else 
					if (!Opera=="")	browser[0]=Opera[0]
						else
							if (!IE=="") browser[0] = IE[0]
								else 
									if (!Firefox=="") browser[0]=Firefox[0]
										else
											if (!Chrome=="") browser[0] = Chrome[0]
												else
													if ((!Safari=="")&&(!SafariV=="")) browser[0] = Safari[0].replace("Version", "Safari");

	var outputData;
	
	if (browser[0] != null) outputData = browser[0].split(browserSplit);
	if (((chrAfterPoint == null)|(chrAfterPoint == 0))&(outputData != null)) 
		{
			chrAfterPoint=outputData[2].length;
			outputData[2] = outputData[2].substring(0, chrAfterPoint);
			return(outputData);
		}
			else
				if (chrAfterPoint != null) 
				{
					outputData[2] = outputData[2].substr(0, chrAfterPoint);
					return(outputData);					
				}
					else	return(false);
}

function browserDetectJS() {
var
	browser = new Array();
	
	if (window.opera) {
		browser[0] = "Opera";
		browser[1] = window.opera.version();
	}
		else 
		if (window.chrome) {
			browser[0] = "Chrome";
		}
			else
			if (window.sidebar) {
				browser[0] = "Firefox";
			}
				else
					if ((!window.external)&&(browser[0]!=="Opera")) {
						browser[0] = "Safari";
					}
						else
						if (window.ActiveXObject) {
							browser[0] = "MSIE";
							if (window.navigator.userProfile) browser[1] = "6"
								else 
									if (window.Storage) browser[1] = "8"
										else 
											if ((!window.Storage)&&(!window.navigator.userProfile)) browser[1] = "7"
												else browser[1] = "Unknown";
						}
	
	if (!browser) return(false)
		else return(browser);
}

function getBrowser(chrAfterPoint) {
	var
		browserNav = browserDetectNav(chrAfterPoint),
		browserJS = browserDetectJS();

	if (browserNav[0] == browserJS[0]) return(browserNav)
		else
			if (browserNav[0] != browserJS[0]) return(browserJS)
				else
					return(false);
}


function isItBrowser(browserCom, browserVer, detectMethod) {
var browser;

switch (detectMethod) {
	case 1: browser = browserDetectNav(); break;
	case 2: browser = browserDetectJS(); break;
	default: browser = getBrowser();
};

	if ((browserCom == browser[0])&(browserVer == browser[1])) return(true)
		else
			if ((browserCom == browser[0])&((browserVer == null)||(browserVer == 0))) return(true)
				else return(false);
};