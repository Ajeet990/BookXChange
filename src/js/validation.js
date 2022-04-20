jQuery('#login_form').validate({
    rules:{
        uname:{
            required:true,
            minlength:4,
            
        },
        upass:{
            required:true,
            minlength:4,
        },

    }, messages:{
        uname:{
            required:"** Please enter your username**",
            minlength:"** Username cann't be less than 4 characters**"
        },
        upass:{
            required:"** Please enter your password **",
            minlength:"** Password must be at least 4 characters **"

        },

    }
})

jQuery('#edit_user').validate({
    
    rules:{
        u_name:{
            required:true,
            minlength:4,
        },
        u_mobile:{
            required:true,
            number:true,
            minlength:10,
            maxlength:10,
        },
        
       u_address:{
           required:true,
           minlength:6,

       },
        u_email:{
            required:true,
            email:true,

        },
        u_rating:{
            required:true,
            number:true,
        }

    },messages:{
        u_name:{
            required:"** Please enter your user name **",
            minlength:"** Name must be at least 4 charecters **"
        },
        u_mobile:{
            required:"** Please enter your mobile number**",
            minlength:"** contact number must be 10 digits**",
            maxlength: "** contact number cann't be more than 10 digits **"
        },
        
        u_email:{
            required: "** Please enter user email address **",
            
        },
        u_rating:{
            required:"** Please enter rating of the user here **",

        }

    }
})


jQuery('#edit_book').validate({
    
    rules:{
        e_name:{
            required:true,
            minlength:4,
        },
        e_genre:{
            required:true,
            
            minlength:5,
            
        },
        
       e_author:{
           required:true,
           minlength:5,

       },
        e_edition:{
            required:true,
            number:true,

        },
        e_feedback:{
            required:true,
            
        },
        e_rating:{
            required:true,
        }

    },messages:{
        e_name:{
            required:"** Please enter your book name **",
            minlength:"** Name must be at least 4 charecters **"
        },
        e_genre:{
            required:"** Please enter your genre type of book**",
            minlength:"** genre must be 5 digits**",
            
        },
        
        u_author:{
            required: "** Please enter author name **",
            minlength:"** author name must of 5 characters **",
            
        },
        e_edition:{
            required:"** Please enter edtion of the book **",
            

        },
        e_feedback:{
            required:"** feedback is mandatory **"
        },

        e_rating:{
            required:"** Rating must be given for this book **"
        }

    }
})

$.validator.addMethod(
    "filesize",(value, element, param) =>{
        const limit = parseInt(param) * 1024 * 1024;
        const size = element.files[0].size;
        if (size > limit){
            return false;
        } 
        return true;
    },
    "File size should be less than {0}mb"

    );
jQuery('#setting').validate({

    rules:{
        site_title:{
            required:true,
            minlength:5
        },
        mail_from:{
            required:true,
            email:true,
        },
        welcome_text:{
            required:true,
            minlength:5
        },
        logo:{

            filesize:2,
            // extension:"jpg|png|jpeg",
            accept:"image/*"
            // extension:"png|jpg|jpeg"
        }

    },
    messages:{
        site_title:{
            required:"** Please enter the website name **",
            minlength:"** site title should be at least 5 charecters**"
        },

        mail_from:{
            required:"** please enter mail address**"
        },
        welcome_text:{
            required:"** please enter welcome message **"
        },
        logo:{
            // extension:"** Only Photos are allowed **",
            filesize:"Image should be less than 2 mb",
            accept:"Only images are allowed"
        }
}
})