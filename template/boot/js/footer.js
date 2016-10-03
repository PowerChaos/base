$(document).ready(function() {

//syntax HighLighter
  $('pre').each(function(i, block) {
    hljs.highlightBlock(block);
  });
		
//summernote
	$('#summernote').summernote({
		height: 300,                 	// set editor height
		minHeight: null,             	// set minimum height of editor
		maxHeight: null,             	// set maximum height of editor
		focus: true,				 	// set focus to editable area after initializing summernote
		codemirror: {theme: 'monokai'}	//Code Mirror	
	});

//header DropDown Fix
	$('.dropdown-toggle').click(function(){
		var parent = $(this).parent();
		if(parent.hasClass('open')) { 
			parent.removeClass('open'); 
		} else {
			parent.addClass('open');
		}
	});	
	} );