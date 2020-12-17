$(document).ready(main);

var contador = 1;

function main(){
	$('.bt-menu').click(function(){
		// $('nav').toggle(); Otra manera de sacar menu pero sin animacion

		if(contador == 1){
			$('nav').animate({// La mejor manera de sacar menu con animacion
				left: '50%'
			});
			contador = 0;
		} else {
			contador = 1;
			$('nav').animate({
				left: '100%'
			});
		}

	});

};
