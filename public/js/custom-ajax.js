//Student Admission delete
$(document).ready(function() {
    //Delete student record
    $('body').on('click', '.delete_student_record', function(event) {
        event.preventDefault();
        //Get data attribute
        var student_id = $(this).data('student_id');    
        //Delete through sweet alert
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this student!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                //Call ajax
                $.ajax({
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url+'/admin/delete-student',  
                    data: { student_id: student_id },
                    //Show success message
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Student record deleted successfully.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                });
            }
        });
    });
}); 

//Event category delete
$(document).ready(function() {
    //Delete event categry record
    $('body').on('click', '.delete_category_record', function(event) {
        event.preventDefault();
        //Get data attribute
        var category_id = $(this).data('category_id');    
        //Delete through sweet alert
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this event category!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                //Call ajax
                $.ajax({
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url+'/admin/delete-category',  
                    data: { category_id: category_id },
                    //Show success message
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Event category record deleted successfully.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                });
            }
        });
    });
});

//Event delete
$(document).ready(function() {
    //Delete event record
    $('body').on('click', '.delete_event_record', function(event) {
        event.preventDefault();
        //Get data attribute
        var event_id = $(this).data('event_id');    
        //Delete through sweet alert
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this event!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                //Call ajax
                $.ajax({
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url+'/admin/delete-event',  
                    data: { event_id: event_id },
                    //Show success message
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Event record deleted successfully.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                });
            }
        });
    });
});

//Post delete
$(document).ready(function() {
    //Delete post record
    $('body').on('click', '.delete_post_record', function(event) {
        event.preventDefault();
        //Get data attribute
        var post_id= $(this).data('post_id');    
        //Delete through sweet alert
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this post!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                //Call ajax
                $.ajax({
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url+'/admin/delete-post',  
                    data: { post_id: post_id },
                    //Show success message
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Post deleted successfully.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                });
            }
        });
    });
 });

//Notification delete
$(document).ready(function() {
   //Delete product record
    $('body').on('click', '.delete_notification_record', function(event) {
        event.preventDefault();
        //Get data attribute
        var notification_id= $(this).data('notification_id');    
        //Delete through sweet alert
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this notification!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                //Call ajax
                $.ajax({
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url+'/admin/delete-notification',  
                    data: { notification_id: notification_id },
                    //Show success message
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Notification deleted successfully.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                });
            }
        });
    });
});

//Testimonial delete
$(document).ready(function() {
    //Delete inquery record
    $('body').on('click', '.delete_testimonial_record', function(event) {
        event.preventDefault();
        //Get data attribute
        var testimonial_id= $(this).data('testimonial_id');    
        //Delete through sweet alert
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this testimonial!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                //Call ajax
                $.ajax({
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url+'/admin/delete-testimonial',  
                    data: { testimonial_id: testimonial_id },
                    //Show success message
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Testimonial record deleted successfully.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                });
            }
        });
    });
});

//Inquery delete
$(document).ready(function() {
    //Delete inquery record
    $('body').on('click', '.delete_contact_record', function(event) {
        event.preventDefault();
        //Get data attribute
        var contact_id = $(this).data('contact_id');    
        //Delete through sweet alert
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this inquery!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                //Call ajax
                $.ajax({
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url+'/admin/delete-contact',  
                    data: { contact_id: contact_id },
                    //Show success message
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Inquery record deleted successfully.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                });
            }
        });
    });
});