const year = document.getElementById('year')

const currentYear = new Date()

year.innerHTML = currentYear.getFullYear()

function reloadPage(url) {
	setTimeout(function (){
		window.location.href = url
	}, 3000)
}
