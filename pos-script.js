//DEFAULT VALUE
const defaultPrice = 20
const defaultMenu = 1
const defaultPay = 0

let currentPrice = defaultPrice
let currentMenu = defaultMenu
let currentPay = defaultPay

const menuList = {1:"บลูฮาวาย", 2:"แอปเปิ้ลเขียว", 3:"กีวี่", 4:"สตรอเบอร์รี่", 5:"ลิ้นจี่", 6:"บลูเลม่อน", 7:"น้ำแดง", 8:"บ๊วยเปรี้ยว", 9:"บลูเบอร์รี่"}
const payMethod = ["เงินสด", "โอนจ่าย"]
let summaryToDB = {}
let jsonDB

setTimeout(hideloading, 5000)

function doSummary() {
	let menu_span = document.getElementById("menu-span")
	let price_span = document.getElementById("price-span")
	let pay_span = document.getElementById("pay-span")
	
	menu_span.innerHTML = menuList[currentMenu]
	price_span.innerHTML = currentPrice
	pay_span.innerHTML = payMethod[currentPay]

	summaryToDB["menu"] = currentMenu
	summaryToDB["pay"] = currentPay
}

function changeMenu(inMenu) {
	currentMenu = inMenu;
	
	doSummary()
}

function changePay(inPay) {
	currentPay = inPay
	
	doSummary()
}

function resetMenu() {
	currentPrice = defaultPrice
	currentMenu = defaultMenu
	currentPay = defaultPay
	
	document.getElementById("menu-radio1").checked = true
	document.getElementById("pay-radio1").checked = true
	
	doSummary()
}

function submitMenu() {
	showloading()
	
	jsonDB = JSON.stringify(summaryToDB)
	
	let xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "ok") {
				resetMenu()
				reloadTable()
				reloadSummary()
			} else {
				window.alert("SQL Error:\n" + this.responseText)
				setTimeout(hideloading, 300)
			}
        } else {
            
        }
    }
    xhttp.open("GET", "pos-add.php?order=" + encodeURIComponent(jsonDB), true)
    xhttp.send()
}

function changeStatus() {
	let xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "ok") {
				
			} else {
				window.alert("SQL Error:\n" + this.responseText)
				//setTimeout(hideloading, 300)
			}
        } else {
            
        }
    }
    xhttp.open("GET", "pos-status.php?id=", true)
    xhttp.send()
}

function reloadTable() {
	var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("tableHere").innerHTML = xmlHttp.responseText
			
			setTimeout(hideloading, 300)
		}
    }
    xmlHttp.open("GET", "pos-table.php", true)
    xmlHttp.send()
}

function reloadSummary() {
	var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			summaryParse = JSON.parse(xmlHttp.responseText)
			document.getElementById("quantity-span").innerText = summaryParse["sell"]
			document.getElementById("money-span").innerText = summaryParse["price"]
		}
    }
    xmlHttp.open("GET", "pos-summary.php", true)
    xmlHttp.send()
}