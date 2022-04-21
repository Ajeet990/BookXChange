// $(document).ready(function() {
//     $('#book_table').DataTable();
// });


function blockBook(id)
{
    var conf = confirm("Are you sure want to block this book");
    var action = "block_book";
    if (conf == true){
        $.ajax({
            // url : "bookEditHandler.php",
            url : "actions.php",
            // type : "POST",
            type : "GET",
            data : { id : id, action : action },
            success : function(data){
                // var row = document.getElementById("tr"+Num);
                // row.parentNode.removeChild(row);
                var parsed_data = jQuery.parseJSON( data );
                console.log(parsed_data);
                $(document).find('#bookListDiv').html(parsed_data.html);
            }
        })
    }
}

function unBlockBook(id)
{
    var conf = confirm("Are you sure want to Unblock this book");
    var action = "unblockBook";
    if (conf == true){
        $.ajax({
            // url : "bookEditHandler.php",
            url : "actions.php",
            // type : "POST",
            type : "GET",
            data : { id : id, action : action },
            success : function(data){
                // var row = document.getElementById("tr"+Num);
                // row.parentNode.removeChild(row);
                var parsed_data = jQuery.parseJSON( data );
                console.log(parsed_data);
                $(document).find('#bookListDiv').html(parsed_data.html);
            }
        })
    }
}



function deleteBook(id)
{
    var conf = confirm("Are you sure want to delete this book");
    var action = "delete_book";
    if (conf == true){
        $.ajax({
            url : "actions.php",
            type : "GET",
            data : { id : id, action : action },
            success : function(data){
                var parsed_data = jQuery.parseJSON( data );
                console.log(parsed_data);
                $(document).find('#bookListDiv').html(parsed_data.html);
            }
        })
    }
}


function getBookDetails(id)
{
    $('#hiddenBookId').val(id);


    $.post('bookEditHandler.php', { bookID : id }, function(data, status){
            var book = JSON.parse(data);
            $('#b_name').val(book.book_name);
            $('#b_genre').val(book.genre);
            $('#b_author').val(book.author);
            $('#b_edition').val(book.edition);
            $('#b_description').val(book.description);
            $('#b_rating').val(book.rating);

    })
    $('#editBookModal').modal('show');
}

function updateBookDetails()
{
    var bookId = $('#hiddenBookId').val();
    // console.log(bookId);
    var book_name = $('#b_name').val();
    // console.log(book_name);
    var book_genre = $('#b_genre').val();
    var book_author = $('#b_author').val();
    var book_edition = $('#b_edition').val();
    var book_description = $('#b_description').val();
    var book_rating = $('#b_rating').val();
    $.post('bookEditHandler.php', { BookId : bookId, bookName:book_name, bookGenre:book_genre, bookAuthor:book_author, bookEdition:book_edition, bookDescription:book_description, bookRating:book_rating }, function(data, status){
        var parsed_data = jQuery.parseJSON( data );
        console.log(parsed_data);
        $(document).find('#bookListDiv').html(parsed_data.html);
        
    });
    
}



