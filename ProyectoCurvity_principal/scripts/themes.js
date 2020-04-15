$(document).ready(function() {

    var tema = $("#theme");

    document.getElementById('sunny').addEventListener('click', function() {
        tema.attr("href", "style/themes/sunny.css");
	})

	document.getElementById('dark').addEventListener('click', function() {
        tema.attr("href", "style/themes/dark.css");
	})
	
});

// Obtenemos el modo actual.
/*if(localStorage.getItem('dark-mode') === 'true'){
	document.body.classList.add('dark');
	btnSwitch.classList.add('active');
} else {
	document.body.classList.remove('dark');
	btnSwitch.classList.remove('active');
}*/