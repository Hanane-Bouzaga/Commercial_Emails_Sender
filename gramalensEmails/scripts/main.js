function getSavedValue(v){
  if (!localStorage.getItem(v)) {
      return "";// You can change this to your defualt value. 
  }
  return localStorage.getItem(v);
}
document.querySelectorAll('.logoutButton').forEach(button => {
    button.state = 'default'
  
    // function to transition a button from one state to the next
    let updateButtonState = (button, state) => {
      if (logoutButtonStates[state]) {
        button.state = state
        for (let key in logoutButtonStates[state]) {
          button.style.setProperty(key, logoutButtonStates[state][key])
        }
      }
    }
  
    // mouse hover listeners on button
    button.addEventListener('mouseenter', () => {
      if (button.state === 'default') {
        updateButtonState(button, 'hover')
      }
    })
    button.addEventListener('mouseleave', () => {
      if (button.state === 'hover') {
        updateButtonState(button, 'default')
      }
    })
  
    // click listener on button
    button.addEventListener('click', () => {
      if (button.state === 'default' || button.state === 'hover') {
        button.classList.add('clicked')
        updateButtonState(button, 'walking1')
        setTimeout(() => {
          button.classList.add('door-slammed')
          updateButtonState(button, 'walking2')
          setTimeout(() => {
            //YOUR CODE HERE HANANE
            window.location.replace("logout.php");

            
          }, logoutButtonStates['walking2']['--figure-duration'])
        }, logoutButtonStates['walking1']['--figure-duration'])
      }
    })
  })
  
  const logoutButtonStates = {
    'default': {
      '--figure-duration': '100',
      '--transform-figure': 'none',
      '--walking-duration': '100',
      '--transform-arm1': 'none',
      '--transform-wrist1': 'none',
      '--transform-arm2': 'none',
      '--transform-wrist2': 'none',
      '--transform-leg1': 'none',
      '--transform-calf1': 'none',
      '--transform-leg2': 'none',
      '--transform-calf2': 'none'
    },
    'hover': {
      '--figure-duration': '100',
      '--transform-figure': 'translateX(1.5px)',
      '--walking-duration': '100',
      '--transform-arm1': 'rotate(-5deg)',
      '--transform-wrist1': 'rotate(-15deg)',
      '--transform-arm2': 'rotate(5deg)',
      '--transform-wrist2': 'rotate(6deg)',
      '--transform-leg1': 'rotate(-10deg)',
      '--transform-calf1': 'rotate(5deg)',
      '--transform-leg2': 'rotate(20deg)',
      '--transform-calf2': 'rotate(-20deg)'
    },
    'walking1': {
      '--figure-duration': '300',
      '--transform-figure': 'translateX(11px)',
      '--walking-duration': '300',
      '--transform-arm1': 'translateX(-4px) translateY(-2px) rotate(120deg)',
      '--transform-wrist1': 'rotate(-5deg)',
      '--transform-arm2': 'translateX(4px) rotate(-110deg)',
      '--transform-wrist2': 'rotate(-5deg)',
      '--transform-leg1': 'translateX(-3px) rotate(80deg)',
      '--transform-calf1': 'rotate(-30deg)',
      '--transform-leg2': 'translateX(4px) rotate(-60deg)',
      '--transform-calf2': 'rotate(20deg)'
    },
    'walking2': {
      '--figure-duration': '400',
      '--transform-figure': 'translateX(17px)',
      '--walking-duration': '300',
      '--transform-arm1': 'rotate(60deg)',
      '--transform-wrist1': 'rotate(-15deg)',
      '--transform-arm2': 'rotate(-45deg)',
      '--transform-wrist2': 'rotate(6deg)',
      '--transform-leg1': 'rotate(-5deg)',
      '--transform-calf1': 'rotate(10deg)',
      '--transform-leg2': 'rotate(10deg)',
      '--transform-calf2': 'rotate(-20deg)'
    },
    
  }
  const realFileBtn = document.getElementById("real-file");
  const realFileBtn2 = document.getElementById("real-file1");
  const realFileBtn1 = document.getElementById("img-file");
  const customTxt = document.getElementById("custom-text");
  const customTxt1 = document.getElementById("custom-text1");

  
  $(document).ready(function() {
      
      $(".button a span").click(function() {
          realFileBtn.click();
      });
      $(".button1 a span").click(function() {
        realFileBtn2.click();
    });
      $("#image").click(function() {
        realFileBtn1.click();
    });
  });
  realFileBtn1.addEventListener("change", function() {
    document.getElementById("profil-form").submit();
  });
  
  
  realFileBtn.addEventListener("change", function() {
    if (realFileBtn.value) {
      customTxt.innerHTML = realFileBtn.value.match(
        /[\/\\]([\w\d\s\.\-\(\)]+)$/
      )[1];
      
              var btn = $(".button a span").parent().parent();
          var loadSVG = btn.children("a").children(".load");
          var loadBar = btn.children("div").children("span");
          var checkSVG = btn.children("a").children(".check");
          btn.children("a").children("span").fadeOut(200, function() {
          btn.children("a").animate({
              width: 56	
          }, 100, function() {
              loadSVG.fadeIn(300);
              btn.animate({
                  width: 320	
              }, 200, function() {
                  btn.children("div").fadeIn(200, function() {
                      loadBar.animate({
                          width: "100%"	
                      }, 5000, function() {
                          loadSVG.fadeOut(200, function() {
                              checkSVG.fadeIn(200, function() {
                                  setTimeout(function() {
                                      btn.children("div").fadeOut(200, function() {
                                          loadBar.width(0);
                                          checkSVG.fadeOut(200, function() {
                                              btn.children("a").animate({
                                                  width: 150	
                                              });
                                              btn.animate({
                                                  width: 150
                                              }, 300, function() {
                                                  btn.children("a").children("span").fadeIn(200);
                                    
                                                  document.getElementById("uploadMsg-form").submit();
                                                

                                                
                                              });
                                          });
                                      });
                                  }, 2000);	
                              });
                          });
                      });
                  });
              });
          });
      });
    }
    else {
      customTxt.innerHTML = "No file chosen, yet.";
    }
  });


  realFileBtn2.addEventListener("change", function() {
    if (realFileBtn2.value) {
      customTxt1.innerHTML = realFileBtn2.value.match(
        /[\/\\]([\w\d\s\.\-\(\)]+)$/
      )[1];
      
              var btn = $(".button1 a span").parent().parent();
          var loadSVG = btn.children("a").children(".load");
          var loadBar = btn.children("div").children("span");
          var checkSVG = btn.children("a").children(".check");
          btn.children("a").children("span").fadeOut(200, function() {
          btn.children("a").animate({
              width: 56	
          }, 100, function() {
              loadSVG.fadeIn(300);
              btn.animate({
                  width: 320	
              }, 200, function() {
                  btn.children("div").fadeIn(200, function() {
                      loadBar.animate({
                          width: "100%"	
                      }, 5000, function() {
                          loadSVG.fadeOut(200, function() {
                              checkSVG.fadeIn(200, function() {
                                  setTimeout(function() {
                                      btn.children("div").fadeOut(200, function() {
                                          loadBar.width(0);
                                          checkSVG.fadeOut(200, function() {
                                              btn.children("a").animate({
                                                  width: 150	
                                              });
                                              btn.animate({
                                                  width: 150
                                              }, 300, function() {
                                                  btn.children("a").children("span").fadeIn(200);
                                    
                                                  document.getElementById("uploadEmail-form").submit();
                                                

                                                
                                              });
                                          });
                                      });
                                  }, 2000);	
                              });
                          });
                      });
                  });
              });
          });
      });
    }
    else {
      customTxt1.innerHTML = "No file chosen, yet.";
    }
  });