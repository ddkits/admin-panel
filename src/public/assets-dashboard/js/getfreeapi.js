// import("bootstrap");

// Delete must confirm before

//# sourceMappingURL=getfreeapi.js.map
// refresh the dash board by time
// $(document).ready(
//     function () {
//         setInterval(function () {
//             $('#newadds').load('#newadds');
//         }, 1000); //Delay here = 5 seconds
//     });

$(function() {
  // setTimeout() function will be fired after page is loaded
  // it will wait for 5 sec. and then will fire
  // $("#successMessage").hide() function
  setTimeout(function() {
    $(".alert-dismissable").hide("slow");
  }, 5000);
});

// Delete must confirm before
(function($) {
  $(document).on("click", ".delete", function(e) {
      e.preventDefault();
    if (confirm("Are you sure? there's no revert after this step.")) {
      return true;
    }
    return false;
  });
  function deleteConfirmation() {
    this.preventDefault();
    return confirm("Are you sure you want to delete this item?");
  }
})(jQuery);

//insertnewline

// remove header
$(document).on("click", "input.submit", function(e) {
  e.preventDefault();
  var urllink = this.getAttribute("action");
  $.ajax({
    url: urllink,
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    dataType: "JSON",
    data: $("form#insertnewline").serialize(),
    type: "POST",
    success: function(result) {
      $("#insertnewline").each(function() {
        this.reset();
      });
      $("div#refreshTableAfter").load(" #refreshTableAfter #reloadinload");
      // console.log(result);
    },
    error: function(result) {
      console.log(result);
    }
  });
});
//Bind click event listener to the submit button
$(document).on("click", 'button[type="submit"]', function() {
  $(this)
    .parents("form")
    .submit();
});
// remove header
function removeThisHeader(e) {
  var id = e.getAttribute("header-id");
  var urllink = e.getAttribute("url-link");
  $.ajax({
    url: urllink,
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    dataType: "JSON",
    data: {
      id: id
    },
    type: "POST",
    success: function(result) {
      $("#headers-list").load(" #headers-list");
      console.log(result);
    },
    error: function(result) {
      console.log(result);
    }
  });
}

// remove app from the list
$(document).on("click", "#deleteapp", function(e) {
  e.preventDefault();
  var id = this.getAttribute("app-id");
  $.ajax({
    url: "/app/delete",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    dataType: "JSON",
    data: {
      id: id
    },
    type: "POST",
    success: function(result) {
      $("#apps-list").load(" #apps-list table");
      console.log(result);
    },
    error: function(result) {
      console.log(result);
    }
  });
});

(function($) {
  $("a#clicktoshow").on("click", function(e) {
    e.preventDefault();
    var show = $(this).attr("show");
    var nowShow = "#" + show;
    $(".tokens")
      .hide()
      .removeClass("showing");
    $("a#clicktoshow").attr({
      "aria-expanded": "true"
    });
    if ($(nowShow).hasClass("showing")) {
      $(".tokens")
        .hide()
        .removeClass("showing");
      $(this).attr({
        "aria-expanded": "false"
      });
    } else {
      $(nowShow)
        .show()
        .addClass("showing");
      $(this).attr({
        "aria-expanded": "true"
      });
    }
  });
})(jQuery);

// Show page for tables internal JS functions
$(document).on("click", "#remove-item-id", function(e) {
  e.preventDefault();
  var id = this.getAttribute("item-id");
  var tableis = this.getAttribute("tableis");
  var urllink = this.getAttribute("url-link");
  $.ajax({
    url: urllink,
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    dataType: "JSON",
    data: {
      id: id,
      tableis: tableis
    },
    type: "GET",
    success: function(result) {
      $("div#refreshTableAfter").load(" #refreshTableAfter #reloadinload");
      // console.log(result);
    },
    error: function(result) {
      console.log(result);
    }
  });
});

function removeThisColumn(e) {
  var path = e.getAttribute("path");
  var fieldname = e.getAttribute("fieldname");
  var urllink = e.getAttribute("url-link");
  $.ajax({
    url: urllink,
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    dataType: "JSON",
    data: {
      path: path,
      fieldname: fieldname
    },
    type: "GET",
    success: function(result) {
      $("div#refreshTableAfter").load(" #refreshTableAfter #reloadinload");
      console.log(result);
    },
    error: function(result) {
      console.log(result);
    }
  });
}

$(document).ready(function($) {
	var $title = $('#title');
	var $path = $('#path');
	var i = 0;
	$("#tags").select2({
	  tags: true
	});

	$("#categories").select2({
	  tags: true
	});
	//  opend the edit for each post
	// $("i#postedit").on("click", function () {
	//   var postid = $(this).attr("post");
	//   $("#postedit-" + postid).toggle("slow");
	// });

	// $('a#likesForm').on('click', function () {
	//   var nid = $(this).attr("nid");
	//   var type = $(this).attr("type");
	//   var uid = $(this).attr("uid");

	//   jQuery.ajax({
	//     url: '/add-like?nid=' + nid + '&uid=' + uid + '&type=' + type,
	//     type: 'GET',
	//     data: $('a#likesForm').serialize(),
	//     success: function (data) {
	//       $("#likes-" + nid).load(location.href + " #likes-" + nid);

	//     }

	//   });
	//   return false;
	// });

	$('#title')
		.change(onChange)
		.keyup(onChange);

	$("a#addfield").on("click", function() {
		var lastField = $("#buildYourFields div:last");
		var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
		var fieldWrapper = $("<div class=\"fieldwrapper well\" id=\"field" + intId + "\" />");
		fieldWrapper.data("idx", intId);
		var fName = $(
      '<label for="fieldname[]" class="col-md-12">Field Name</label>'+
      '<input name="fieldname[]" type="textfield" class="form-control" required placeholder="Field name"></input>'+
      '<label for="typeis[]" class="col-md-12">Field Type</label>'+
      '<select name="typeis[]" class="form-control select2 col-md-12" required>'+
        '<Option value="string" selected >Text</Option>'+
        '<Option value="integer">Number</Option>'+
        '<Option value="text">Text Area</Option>'+
      '</select>'+
      '<label for="fieldnull[]" class="col-md-12">Field Accept Null</label>'+
      '<select name="fieldnull[]" class="form-control select2 col-md-12" required>'+
        '<Option value="yes" selected >Yes</Option>'+
        '<Option value="no">No</Option>'+
      '</select>'+
      '<label for="fielddefault[]" class="col-md-12">Field Default</label>'+
      '<input name="fielddefault[]" type="textfield" class="form-control" required placeholder="Field Default" value="null"></input>'
    );
		i++;
		var removeButton = $("<br><a class=\"remove btn btn-danger\">Remove this field</a>");
		removeButton.on("click", function() {
			$(this).parent().remove();
			i--;
		});
		fieldWrapper.append(fName);
		fieldWrapper.append(removeButton);
		$("#buildYourFields").append(fieldWrapper);
	});


	function onChange() {
		$path.val($title.val().replace(/\s+/g, '/').toLowerCase());
		$title.val($title.val().replace(/\s+/g, '_').toLowerCase());
	};

	function showCheckNow(valIs) {
		if (valIs.value == "1") {
			document.getElementById("extLink").style.display = "block";
			document.getElementById("extLinkLabel").style.display = "block";
			document.getElementById("extLink").setAttribute("required", "true");
		} else {
			document.getElementById("extLink").style.display = "none";
			document.getElementById("extLinkLabel").style.display = "none";
			document.getElementById("extLink").removeAttribute("required");
		}
	}

});

