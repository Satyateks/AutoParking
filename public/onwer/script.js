// navbar JS//
const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");

hamburger.addEventListener('click', ()=>{
   //Animate Links
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });

    //Hamburger Animation
    hamburger.classList.toggle("toggle");
});

    /*** testimonial carausel js ***/
    $(".owl-carousel").owlCarousel({
        margin: 15,
        nav: true,
        navText: [
          "<div class='nav-button owl-prev'> <img src='images/left.png' /> </div>",
          "<div class='nav-button owl-next'><img src='images/Right.png' /></div>",
        ],
        responsive: {
          0: {
            items: 1,
          },
          600: {
            items: 2,
          },
          1000: {
            items: 3,
          },
          1300: {
            items: 3,
          },
        },
      });





      var TabBlock = {
        s: {
          animLen: 200
        },

        init: function() {
          TabBlock.bindUIActions();
          TabBlock.hideInactive();
        },

        bindUIActions: function() {
          $('.tabBlock-tabs').on('click', '.tabBlock-tab', function(){
            TabBlock.switchTab($(this));
          });
        },

        hideInactive: function() {
          var $tabBlocks = $('.tabBlock');

          $tabBlocks.each(function(i) {
            var
              $tabBlock = $($tabBlocks[i]),
              $panes = $tabBlock.find('.tabBlock-pane'),
              $activeTab = $tabBlock.find('.tabBlock-tab.is-active');

            $panes.hide();
            $($panes[$activeTab.index()]).show();
          });
        },

        switchTab: function($tab) {
          var $context = $tab.closest('.tabBlock');

          if (!$tab.hasClass('is-active')) {
            $tab.siblings().removeClass('is-active');
            $tab.addClass('is-active');

            TabBlock.showPane($tab.index(), $context);
          }
         },

        showPane: function(i, $context) {
          var $panes = $context.find('.tabBlock-pane');

          // Normally I'd frown at using jQuery over CSS animations, but we can't transition between unspecified variable heights, right? If you know a better way, I'd love a read it in the comments or on Twitter @johndjameson
          $panes.slideUp(TabBlock.s.animLen);
          $($panes[i]).slideDown(TabBlock.s.animLen);
        }
      };

      $(function() {
        TabBlock.init();
      });



// multistep form //
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

// function validateForm() {
//   var x, y, i, valid = true;
//   x = document.getElementsByClassName("tab");
//   y = x[currentTab].getElementsByTagName("input");
//   for (i = 0; i < y.length; i++) {
//     if (y[i].value == "") {
//       y[i].className += " invalid";
//       valid = false;
//     }
//   }
//   if (valid) {
//     document.getElementsByClassName("step")[currentTab].className += " finish";
//   }
//   return valid;
// }


function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].querySelectorAll("input","textarea");

    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty or invalid...
      if (
        y[i].value === "" ||  // Empty field
        (y[i].type === "number" && isNaN(y[i].value)) ||  // Non-numeric input for numeric fields
        (y[i].name === "zip_code" && (y[i].value.length !== 6 || isNaN(y[i].value))) ||  // Zip code validation (6 digits)
        (y[i].id === "description" && y[i].value.length > 130)  // Description field validation


        ) {
        // Add an "invalid" class to the field:
        y[i].classList.add("invalid");
        // Set the current valid status to false:
        valid = false;
      } else {
        y[i].classList.remove("invalid");
      }
    }

    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].classList.add("finish");
    }

    return valid; // Return the valid status
  }



function fixStepIndicator(n) {
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  x[n].className += " active";
}
