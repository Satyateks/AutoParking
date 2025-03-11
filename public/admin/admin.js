const listItems = document.querySelectorAll(".sidebar-list li");

listItems.forEach((item) => {
  item.addEventListener("click", () => {
    let isActive = item.classList.contains("active");

    listItems.forEach((el) => {
      el.classList.remove("active");
    });

    if (isActive) item.classList.remove("active");
    else item.classList.add("active");
  });
});

const toggleSidebar = document.querySelector(".toggle-sidebar");
const logo = document.querySelector(".logo-box");
const sidebar = document.querySelector(".sidebar");

toggleSidebar.addEventListener("click", () => {
  sidebar.classList.toggle("close");
});

logo.addEventListener("click", () => {
  sidebar.classList.toggle("close");
});


/* ====== logo/banner image preview ====== */

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}


/* ====== text-editor ====== */


//text modifier
$(".textmod").click(function(){
    console.log("called textmod");
    var textType = $(this).attr("id");
    console.log(textType);
    document.execCommand(textType, false, null);
    var supported = document.queryCommandSupported("fontName");
    console.log(supported);

  });
  //src modifier
  $(".textmodlink").click(function(){
    console.log("called textmodarg");
    var argText = prompt("insert link");
    var textType = $(this).attr("id");
    if(argText != null && argText != "" && argText != " "){
      document.execCommand(textType, false, argText);
    };
  });

  //alter text to heading
  $(".textmodarg").click(function(){
    console.log("textmodarg");
    var argText = $(this).attr("id");
    document.execCommand("formatBlock", false, argText);
  });
  //alter fonts
  $("#fontName li").click(function(){

  })
  //save to var and display below
  $("#save").click(function(){
    var savecontent = "<div class='article'>" + $("#cms").html(); + "</div>";
    $("#display").append(savecontent);
    console.log(savecontent);
  });
  /*
  $(".textmodsize").click(function(){
    var selection= window.getSelection();
    var size
  })
  */
  $('#cms').bind('blur keyup paste copy cut mouseup', function(e) {
    var count = $("#cms").html().length;
    $("#charcount").text(count);
    if(count > 25000){
      $("#save").attr("disabled", true);
      $("#charcount").css("color", "red");
    }
    else{
      $("#save").attr("disabled", false);
      $("#charcount").css("color", "initial");
    }
  });
  