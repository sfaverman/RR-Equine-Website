/*eslint-env browser*/

/* learned from W3c website */

// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
		  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("bttBtn").style.display = "block";
		  } else {
			document.getElementById("bttBtn").style.display = "none";
		  }
		}

		// When the user clicks on the button, scroll to the top of the document
		//SXF but this is implemented on every html page 01/23/19

/*		function topFunction() {
		  document.body.scrollTop = 0;
		  document.documentElement.scrollTop = 0;
		}*/