$(function(){

	var QUESTION_6;
	var QUESTION_7;
	var QUESTION_10;
	var QUESTION_11_TO_15;

	// recuperation des donnees qui servirons à la realisation des graphiques
  $.ajax({
    method: 'get',
    url: 'http://final_project.com/accueil',
    dataType: 'json',
    success: function(data){
      QUESTION_6 = data.question_6;
      QUESTION_7 = data.question_7;
      QUESTION_10 = data.question_10;
      QUESTION_11_TO_15 = data.question_11_to_15;
      drowcharts();
    }
  })

  // fonction qui permet de dessiner les graphiques
  function drowcharts(){
  	var graphic_1 = document.getElementById('myChart1').getContext('2d');
		var chart = new Chart(graphic_1, {
	    type: 'pie',
	    data: {
	      labels: ['Occulus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'PSVR'],
	      datasets: [{
	        backgroundColor: ['rgb(165, 42, 42)','rgb(42, 42, 165)','rgb(42, 165, 42)','rgb(245, 245, 245)'],
	        borderColor: '#a8dadc',
	        borderWidth: 2,
	        data: QUESTION_6
	      }]
	    },
	    options: {
        title: {
          display: true,
          fontSize: 16,
          text: "Marques de casques VR"
        }
      }
		});

		var graphic_2 = document.getElementById('myChart2').getContext('2d');
		var chart = new Chart(graphic_2, {
	    type: 'pie',
	    data: {
	      labels: ['SteamVR', 'Occulus store', 'Viveport', 'Playstation VR', 'Google Play', 'Windows store'],
	      datasets: [{
	        backgroundColor: ['rgb(165, 42, 42)','rgb(42, 42, 165)','rgb(42, 165, 42)','rgb(245, 245, 245)','rgb(15, 15, 15)','rgb(130, 130, 130)'],
	        borderColor: '#a8dadc',
	        borderWidth: 2,
	        data: QUESTION_7
	      }]
	    },
	     options: {
        title: {
          display: true,
          fontSize: 16,
          text: "Magasins d’application"
        }
      }
		});

		var graphic_3 = document.getElementById('myChart3').getContext('2d');
		var chart = new Chart(graphic_3, {
	    type: 'pie',
	    data: {
	      labels: ['regarder des émissions TV en direct', 'regarder des films', 'jouer en solo', 'jouer en team'],
	      datasets: [{
	        backgroundColor: ['rgb(165, 42, 42)','rgb(42, 42, 165)','rgb(42, 165, 42)','rgb(245, 245, 245)'],
	        borderWidth: 2,
	        borderColor: '#a8dadc',
	        data: QUESTION_10
	      }]
	    },
	    options: {
        title: {
          display: true,
          fontSize: 16,
          text: 'Utilisation de Bigscreen'
        }
      }
		});

		var graphic_4 = document.getElementById('myChart4').getContext('2d');
		var chart = new Chart(graphic_4, {
		  type: 'radar',
		  data: {
		    labels: ['qualité d’image', 'confort d’utilisation', 'connection réseau', 'qualité des graphismes', 'qualité audio'],
		    datasets: [{
		      label: 'Qualité',
		      backgroundColor:  'rgb(00, 255, 00, 0.1)',
		      borderWidth: 2,
		      borderColor: '#a8dadc',
		      data: QUESTION_11_TO_15
		    }]
		  },
		  options: {
        title: {
            display: true,
            fontSize: 16,
            text: 'Qualité de service'
        },
        scale: {
            ticks: {
            beginAtZero: true,
            max: 5,
            min: 0
          }
        },
      }
		});
  }

})