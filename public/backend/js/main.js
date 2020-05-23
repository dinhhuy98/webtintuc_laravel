$(document).ready(function(){
 
  $('#theloai-input').change(function(e){
  	var _idTheLoai = $('#theloai-input option:selected').attr('value');
  	$.get('admin/getLoaiTinAjax/'+_idTheLoai,{},function(data){
  	//	alert(data);
  		$('#loaitin-input').html(data);
  	});
  });
  $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
   // if(filename.length>20){
   //   alert(filename);
     fileName = fileName.substr(fileName.length-15);
  //  }
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

  CKEDITOR.config.toolbar = [
   ['Styles','Format','Font','FontSize','Bold','Italic','Underline'],
   '/',
   [,'StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','-','Outdent','Indent','-','Print'],
   '/',
   ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
   ['Image','Table','-','Link','Flash','Smiley','TextColor','BGColor','Source']
] ;
});
