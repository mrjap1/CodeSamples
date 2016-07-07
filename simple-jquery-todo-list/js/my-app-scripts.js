/* 
Javascripts 
Title: Simple To do list application
Scripts: jquery 3.0.0
Author: James Arthur Phillips I
Date: Sunday 06.19.16
Time: 18:30 p.m. EST
*/


// This dynamically creates a List item with a delete Button and adds to the nummeric counter

function enter_task() {
    var text = $('#enter_task').val();
    $('#todo_list').append('<li>' + text + '<input type="submit" class="done delete" value="Delete">' + '</li>');
    $("#counter").text($("#todo_list").children().length);
    $("#enter_task").val('').keyup(); // Clearing the input field after entry
};

// This will delete list item and dynamically update numeric count of all list items present.

$(function() {
    $('#todo_list').on('click', '.delete', function() {
        $(this).parent().remove();
        $("#counter").text($("#todo_list").children().length);
    });

// This will create a dynamic numeric count of all list items
    
    $('#add').click(function() {
        $("#counter").text($("#todo_list").children().length);
    });

// This disables the input feild to prevent any / all blank entries

	$("#enter_task").keyup(function(){
    	console.log($(this).val())
    	$("#add").prop("disabled", $(this).val()==="")
    }).keyup()

    $('#add').on('click', enter_task);
});


