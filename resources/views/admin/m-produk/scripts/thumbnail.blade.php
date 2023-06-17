{{-- UPLOAD THUMBNAIL --}}
<script>
    // Thumbnail
    document.getElementById('thumbnailImageFile').addEventListener('change', function(e) {
        var file = e.target.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var formData = new FormData();
            formData.append('image', file);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/api/temp/image/upload', true);

            const toast_success = $('#toast-upload-success');
            const toast_failed = $('#toast-upload-failed');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Image uploaded successfully
                        const response = JSON.parse(xhr.response);

                        $('#thumbnail_temp_id').val(response['id_temp']);

                        if (toast_failed.hasClass('flex')) {
                            toast_failed.toggleClass(['hidden', 'flex'])
                        }
                        if (toast_success.hasClass('flex')) {
                            toast_success.toggleClass(['hidden', 'flex'])
                        }

                        $('#toast-upload-success-title').html('Berhasil mengupload gambar.')
                        toast_success.toggleClass(['hidden', 'flex'])


                        var thumbnailPreviewImage = document.getElementById('thumbnailPreviewImage');
                        thumbnailPreviewImage.src = e.target.result;

                        var previewContainer = document.getElementById('previewContainer');
                        previewContainer.classList.remove('hidden');

                        var uploadIcon = document.getElementById('uploadIcon');
                        uploadIcon.classList.add('hidden');

                    } else {
                        // Error handling
                        if (toast_success.hasClass('flex')) {
                            toast_success.toggleClass(['hidden', 'flex'])
                        }
                        if (toast_failed.hasClass('flex')) {
                            toast_failed.toggleClass(['hidden', 'flex'])
                        }

                        toast_failed.toggleClass(['hidden', 'flex'])
                    }
                }
            };

            xhr.send(formData);
        };

        reader.readAsDataURL(file);
    });

    document.getElementById('thumbnailPreviewImage').addEventListener('click', function() {
        document.getElementById('thumbnailImageFile').click();
    });
</script>
{{-- UPLOAD THUMBNAIL END --}}

{{-- PRELOAD UPLOAD THUMBNAIL --}}
@if (old('thumbnail'))
    <script>
        var xhr_single = new XMLHttpRequest();
        xhr_single.onreadystatechange = function() {
            if (xhr_single.readyState === XMLHttpRequest.DONE) {
                if (xhr_single.status === 200) {
                    // Assuming the response is a binary image file
                    var path = xhr_single.response;

                    var thumbnailPreviewImage = document.getElementById('thumbnailPreviewImage');
                    thumbnailPreviewImage.src = path['src'];

                    var previewContainer = document.getElementById('previewContainer');
                    previewContainer.classList.remove('hidden');

                    var uploadIcon = document.getElementById('uploadIcon');
                    uploadIcon.classList.add('hidden');

                } else {
                    // Error handling
                    console.log('Error loading image:', xhr_single.status);
                }
            }
        };

        const id_temp = $('#thumbnail_temp_id').val()
        // Open a GET request to fetch the image file
        xhr_single.open('GET', '/api/temp/image/path/' + id_temp, true);

        // Set the response type to 'blob'
        xhr_single.responseType = 'json';

        // Send the request
        xhr_single.send();
    </script>
@endif
{{-- PRELOAD UPLOAD THUMBNAIL END --}}
