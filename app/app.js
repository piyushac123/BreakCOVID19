$(document).ready(function(){
            $("#section1").show();
              $("#section2").hide();
              $("#section3").hide();
            $("#showOrg").hide();
            $("#myform2").hide(); 
        });
        $(document).ready(function(){
            $(".sec1").click(function(){
               $("#section1").show();
              $("#section2").hide();
              $("#section3").hide(); 
                $('.sec2').removeClass('active');
                $('.sec3').removeClass('active');
                $('.sec1').addClass('active');
            });
        });
        $(document).ready(function(){
            $(".sec2").click(function(){
               $("#section2").show();
              $("#section1").hide();
              $("#section3").hide(); 
                $('.sec1').removeClass('active');
                $('.sec3').removeClass('active');
                $('.sec2').addClass('active');
            });
        });
        $(document).ready(function(){
            $(".sec3").click(function(){
               $("#section3").show();
              $("#section2").hide();
              $("#section1").hide(); 
                $('.sec2').removeClass('active');
                $('.sec1').removeClass('active');
                $('.sec3').addClass('active');
            });
        });
$(document).ready(function(){
    $("#ind").click(function(){
       $("#showOrg").hide(); 
    });
});
$(document).ready(function(){
    $("#org").click(function(){
       $("#showOrg").show(); 
    });
});
$(document).ready(function(){
    $(".register").click(function(){
       $("#myform2").toggle(); 
    });
});