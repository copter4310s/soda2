let reloadTimer

function changeStatus(id) {
	showloading()

	let xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "ok") {
				clearTimeout(reloadTimer)
				reloadOrder()
			} else {
				window.alert("SQL Error:\n" + this.responseText)
				//setTimeout(hideloading, 300)
			}
        } else {
            
        }
    }
    xhttp.open("GET", "order-status.php?id=" + id, true)
    xhttp.send()
}

function reloadOrder() {
	showloading()
	var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("orderhere").innerHTML = xmlHttp.responseText
			hideloading()
			
			reloadTimer = setTimeout(reloadOrder, 1250)
		}
    }
    xmlHttp.open("GET", "order-list.php", true)
    xmlHttp.send()
}