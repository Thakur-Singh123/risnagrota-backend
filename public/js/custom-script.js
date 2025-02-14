//selcted mutliple employee fields
$(document).ready(function() {
    $('#category_id').select2({
       placeholder: "Please Select Category",
       allowClear: true 
    });
 });

//Enter phone no
document.getElementById('phone_no').addEventListener('input', function (e) {
   this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);
});


// Profile setting button script start
document.getElementById("imageUpload").addEventListener("change", function (event) {
   const input = event.target;
   const reader = new FileReader();

   reader.onload = function (e) {
       // Update the image src dynamically
       document.getElementById("imagePreview").src = e.target.result;
   };

   // Check if a file is selected
   if (input.files && input.files[0]) {
       reader.readAsDataURL(input.files[0]);
   }
});
// Profile setting button script end


