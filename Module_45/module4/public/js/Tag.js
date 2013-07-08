


 var Tag = {

	url : "http://localhost:82/module4/admin/tagsadmin.php", /* url to script handling ajax for tags - modify path here */
	path: "http://localhost:82/module4/admin",  /*url to tags-directory - modify path here */
	
	/**
	 * Delete the tag clicked on by sending an ajax request
	 */
	deleteTag: function(idTag, idMenu)
	{
//        alert('active del func');
		this.idTag = idTag; // the selected tag-id
		this.idMenu = idMenu; // the id of this menu
		$.ajax(
		{
			url: this.url,
			type: "POST",
			dataType: 'json',
			data: 
			{
				action: 'remove',
				idTag: this.idTag,
				idMenu: this.idMenu
			},
			success: function(data)
			{
				if(data.code == '1')
				{ // success
					Tag.remove(data.idTag);
					$("#tags-wrapper .message").html('');
					$("#tags-wrapper .message").removeClass('error');
				} else if(data.code = '2')
				{ // Unspecified error
					$("#tags-wrapper .message").html('An unspecified error occured.');
					$("#tags-wrapper .message").addClass('error');
				}
			}
		});
	},
	
	/**
	 * Remove/hide a tag from the list
	 */
	remove: function(idTag)
	{
//        alert('active remove func');
		// add option to (end of) selection list
		var templ = "\n<option value=\"" + idTag + "\">" + $("#tag"+idTag+" a:first").text() + "</option>";
		$("#taglist option:last").after(templ);
		$("#taglist option[value='0']").attr('selected','selected');
		// remove tag from tags
		$("#tag"+idTag).remove();
	},
	
	/**
	 * Save the tag from the form (selected or typed) by sending an ajax request
	 */
	save: function()
	{
		this.action = ""; // reset action
		this.newtag = $("#tagnew").val(); // the typed new tag-text
		this.selectedtag = $("#taglist option:selected").val(); // the selected available tag-id
		this.idMenu = $("#idMenu").val(); // the id of this menu

		if(this.selectedtag == 0 && this.newtag.length < 2)
		{ // inputs not ok
			$("#tag_add .message").html('Your new tag is too short or you have not selected an existing tag.');
			$("#tag_add").addClass('error');
			$("#tag_list").addClass('error');
			return false;
		} else if(this.selectedtag != 0 && this.newtag.length > 2)
		{ // too many inputs ok
			$("#tag_add .message").html('You can not select an existing tag and type a new one at the same time');
			$("#tag_add").addClass('error');
			$("#tag_list").addClass('error');
			return false;		
		} else if(this.selectedtag != 0)
		{ // add selected tag
			this.action = 'add';
			$("#tag_add .message").html('');
			$("#tag_add").removeClass('error');
			$("#tag_list").removeClass('error');
		} else if(this.newtag.length > 2)
		{ // create selected tag
			this.action = 'create';
			$("#tag_add .message").html('');
			$("#tag_add").removeClass('error');
			$("#tag_list").removeClass('error');			
		}
		$.ajax(
		{
			url: this.url,
			type: "POST",
			dataType: "json",
			data: 
			{
				action: this.action,
				idTag: this.selectedtag,
				idMenu: this.idMenu,
				content: this.newtag
			},
			success: function(data)
			{
//                alert("On save func ajax success: dump string =  \n" + data.dump_str);
				if(data.code == '1')
				{ // success
					Tag.show(data);
					$("#tagform .submit .message").html('');
					$("#tagform .message").removeClass('error');					
				} else if(data.code = '2')					
				{ // Unspecified error
					$("#tagform .submit .message").html('An unspecified error occured.');
					$("#tagform .message").addClass('error');
				}
			}
		});
	},
	
	/**
	 * Add the tag to the DOM tree (list of tags for food) and and show it
	 */
	show: function(data)
	{
//        alert('active show func');
		var templ = "\n" +
			"<div class=\"tag\" id=\"tag{idTag}\">\n" +
			"	<a href=\"" + this.path + "{tagurl}\" title=\"Show where this tag is being used\">{tag}</a>(<a href=\"#\" onclick=\"Tag.deleteTag({idTag},{idMenu}); return false;\" title=\"Remove tag on the left\">Remove</a>)\n" +
			"</div>\n";				
		templ = templ.replace(/{tag}/g, data.content);
		templ = templ.replace(/{tagurl}/g, data.contenturl);
		templ = templ.replace(/{idTag}/g, data.idTag);
		templ = templ.replace(/{idMenu}/g, data.idMenu);
//        alert(templ);
		$("#tags-wrapper .message").before(templ);

		if(this.action == 'create')
		{ // empty the textarea
			$("#tagnew").val('');
			// new tag is added to food and does not need to be added to selection list
		}
		else if(this.action == 'add')
		{ // remove tag from selection list and set selection to default
			$("#taglist option:selected").remove();
			$("#taglist option[value='0']").attr('selected','selected');
		}
	}





     /**
      * Hàm này tự code bổ sung để validate dữ liệu, // Kiểm tra Trường hợp Nhâp tags mới trùng hợp với danh sách
      * Copy đoạn $.(ajax)  từ các hàm bên trên rồi sửa một chút
      */

     , validateNewTag: function()
     {
         //___ Đoạn cần thêm ____
         // lưu ý sau khi thoát khỏi hàm ajax thì mọi biến đều quay lại giá trị cũ
         this.newtag = $("#tagnew").val();
         //___ End Đoạn cần thêm ____

         $.ajax({
             url: this.url,
             type: "POST",
             dataType: "json",
             data:
             {
                 //___ Đoạn cần thêm ____
                 action: 'validate_new_tag',
                 idTag: this.selectedtag,
                 idMenu: this.idMenu,
                 content: this.newtag,
                 result: true
                 //___ End Đoạn cần thêm ____
             },
             success: function(data)
             {
//                alert("On save func ajax success: dump string =  \n" + data.dump_str);
                 if(data.code == '1')
                 { // success
                     //___ Đoạn cần thêm ____
                     if (data.result)
                     {
                         $("#textOk").val('1');
                         //---3 dòng sau coy từ bên trên;
                         $("#tag_add .message").html('');
                         $("#tag_add").removeClass('error');
                         $("#tag_list").removeClass('error');
                     }
                     else
                     {
                         $("#textOk").val('0');
//                         alert("server bao ton tai roi || va this.textok = "+this.textOk);
                         //---3 dòng sau coy từ bên trên;   VÀ SỬA CHUỖI THÔNG BÁO LỖI  NGAY DƯỚI
                         $("#tag_add .message").html('Your new tag has already associate to this food! Please type another tag name');
                         $("#tag_add").addClass('error');
                         $("#tag_list").addClass('error');
                     }
                     //___ End Đoạn cần thêm ____

                 } else if(data.code = '2')
                 { // Unspecified error
                     $("#tagform .submit .message").html('An unspecified error occured.');
                     $("#tagform .message").addClass('error');
                 }
             }
         });


     }

};

/**
 * Bind the form-submit to these functions
 */
$(document).ready(function(){
	$("#newtagform").submit(function(){
        /*
        * Thêm code ràng buộc: Tag đã add/tồn tại rồi thì không gõ thêm vào bằng cách gõ mới được (còn trường hợp chọn từ list thì đề thi đã xử lý xong)
        */
        // Nếu validate không trùng thì mới cho submit và xử lý save
        if ($("#textOk").val() != '0')
        //____ end them ham
            Tag.save();
        return false;
	});
});


// toggleAddTagForm: code them doan sau de hien thi form them tags cho admin tag manager
 // ham nay copy tu rating.js roi sua la thoi
 function toggleAddTagForm ()
 {
     var formelement = document.getElementById('tagform');

     if (formelement.style.visibility == 'collapse')
     {
         formelement.style.visibility = 'visible';
         formelement.style.height = '170px';
     }
     else if(formelement.style.visibility == 'visible')
     {
         switchelement.style.visibility = 'collapse';
         switchelement.style.height = '0px';
     }
 }