$(document).ready(function() {

  $('#patientmodal').on('show.bs.modal', function (e) {
      var rowid = $(e.relatedTarget).data('id');
      $.ajax({
          type : 'post',
          url : 'fetch_record.php', //Here you will fetch records 
          data :  'rowid='+ rowid,  //Pass $id
          success : function(data){
            $('.patient-data').html(data);//Show fetched data from database
          }
      });
    });

  $('#doctorModal').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    $.ajax({
        type : 'post',
        url : 'fetch_record.php', //Here you will fetch records 
        data :  'rowid='+ rowid,  //Pass $id
        success : function(data){
          $('.doctor-data').html(data);//Show fetched data from database
        }
    });
  });

  $('#guardianmodal').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    $.ajax({
        type : 'post',
        url : 'fetch_record.php', //Here you will fetch records 
        data :  'rowid='+ rowid,  //Pass $id
        success : function(data){
          $('.guardian-data').html(data);//Show fetched data from database
        }
    });
  });



  $('#doctorModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') // Extract info from data-* attributes
    var email = button.data('email')
    var id = button.data('id')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text(''+ name)
    modal.find('.modal-body ul').text('Email: ' +email )
    modal.find('.modal-body input').val(id)

    //modal.find('.modal-body input').val(recipient)
  })

  $('#patientmodal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') // Extract info from data-* attributes
    var email = button.data('email')
    var id = button.data('id')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text(''+ name)
    modal.find('.modal-body ul').text('Email: ' +email )
    modal.find('.modal-body input').val(id)

    //modal.find('.modal-body input').val(recipient)
  })

  $('#guardianmodal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') // Extract info from data-* attributes
    var email = button.data('email')
    var id = button.data('id')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text(''+ name)
    modal.find('.modal-body ul').text('Email: ' +email )
    modal.find('.modal-body input').val(id)

    //modal.find('.modal-body input').val(recipient)
  })



  //Carousel Code
  $("#myCarousel .carousel-item").first().addClass("active");
  $("#myCarousel2 .carousel-item").first().addClass("active");
  $("#myCarousel3 .carousel-item").first().addClass("active");


  var num1 = $("#myCarousel .carousel-item").length;
  var num2 = $("#myCarousel2 .carousel-item").length;
  var num3 = $("#myCarousel3 .carousel-item").length;

    if(num1<4) {
      document.getElementsByClassName("carousel-control-next")[0].style.display = "none";
      document.getElementsByClassName("carousel-control-prev")[0].style.display = "none";
    }
    if(num2<4) {
      document.getElementsByClassName("carousel-control-next")[1].style.display = "none";
      document.getElementsByClassName("carousel-control-prev")[1].style.display = "none";
    }
    if(num3<4) {
      document.getElementsByClassName("carousel-control-next")[2].style.display = "none";
      document.getElementsByClassName("carousel-control-prev")[2].style.display = "none";
    }

  $("#myCarousel").on("slide.bs.carousel", function(e) {
    //alert("Button clicked");
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $("#myCarousel .carousel-item").length;
    
    //alert(totalItems);

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $("#myCarousel .carousel-item")
            .eq(i)
            .appendTo("#myCarousel .carousel-inner");
            //alert("Appended");
        } else {
          $("#myCarousel .carousel-item")
            .eq(0)
            .appendTo($(this).find("#myCarousel .carousel-inner"));
        }
      }
    }
  });
  $("#myCarousel2").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $("#myCarousel2 .carousel-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $("#myCarousel2 .carousel-item")
            .eq(i)
            .appendTo("#myCarousel2 .carousel-inner");
            //alert("Appended");
        } else {
          $("#myCarousel2 .carousel-item")
            .eq(0)
            .appendTo($(this).find("#myCarousel2 .carousel-inner"));
        }
      }
    }
  });
  $("#myCarousel3").on("slide.bs.carousel", function(e) {
    //alert("Button clicked");
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $("#myCarousel3 .carousel-item").length;
    
    //alert(totalItems);

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $("#myCarousel3 .carousel-item")
            .eq(i)
            .appendTo("#myCarousel3 .carousel-inner");
            //alert("Appended");
        } else {
          $("#myCarousel3 .carousel-item")
            .eq(0)
            .appendTo($(this).find("#myCarousel3 .carousel-inner"));
        }
      }
    }
  });
});