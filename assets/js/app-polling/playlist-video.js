 $(function() {
      $("#playlist li").on("click", function() {
      $("#videoarea").attr({
          "src": $(this).attr("movieurl"),
          "autoplay": "autoplay",
          "type": "video/mp4"
        })
      })
      $("#videoarea").attr({
      "src": $("#playlist li").eq(0).attr("movieurl"),
  })
  });
        
  var no= 1;
  var max = $(".modal-body").attr("id");
  function next(){
    $("#videoarea").attr({
                "autoplay": "autoplay",
                "type": "video/mp4"
    });
    $("#videoarea").attr({"src": $(".a"+no).eq(0).attr("movieurl") }) ;
    if (no == max) {
      $("#videoarea").attr({
                "autoplay": "autoplay",
                "type": "video/mp4"
    });
    $("#videoarea").attr({"src": $(".a0").eq(0).attr("movieurl") }) ;
    no=1;
    }else{

    no++;  
    }
  }
  
  $(document).ready(function(){
  $("#videoarea").on(
    "timeupdate", 
    function(event){
      onTrackedVideoFrame(this.currentTime, this.duration);
      if (this.currentTime == this.duration) {
        next();
      }
    });
  });

  function onTrackedVideoFrame(currentTime, duration){
      $("#current").text(currentTime); //Change #current to currentTime
      $("#duration").text(duration);
  }