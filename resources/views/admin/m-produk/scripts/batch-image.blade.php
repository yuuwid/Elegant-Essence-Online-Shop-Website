{{-- BATCH IMAGE --}}
<script>
    document.getElementById('uploadImagesBatch').addEventListener('click', function() {
        var input = this.querySelector('input[type="file"]');
        input.click();
    });

    document.getElementById('uploadImagesBatch').addEventListener('change', function(e) {
        const formData = new FormData();
        const images = document.querySelector('.items-multi-upload').files;

        for (let i = 0; i < images.length; i++) {
            formData.append('images[]', images[i]);
        }

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/api/temp/image/upload/batch', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Upload successful, handle response
                const response = JSON.parse(xhr.response);
                $('#batch_images_temp').val(response['batch_id'].join('-'))

                for (let i = 0; i < images.length; i++) {
                    const file = images[i];
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        var imageContainer = document.createElement('div');
                        imageContainer.className = 'relative w-32 h-32 mr-3 mt-3';
                        var previewImage = document.createElement('img');
                        previewImage.src = e.target.result;
                        previewImage.className = 'w-full h-full object-cover';
                        var deleteButton = document.createElement('button');
                        deleteButton.innerHTML = '&times;';
                        deleteButton.className =
                            'absolute top-2 right-2 text-white bg-red-500 rounded-full w-6 h-6 flex items-center justify-center';
                        deleteButton.addEventListener('click', function() {
                            imageContainer.remove();
                        });

                        imageContainer.appendChild(previewImage);
                        imageContainer.appendChild(deleteButton);
                        document.getElementById('uploadContainer').appendChild(imageContainer);
                    };

                    reader.readAsDataURL(file);
                }
            }
        };

        xhr.send(formData);


    })


    // document.getElementById('uploadImagesBatch').addEventListener('change', function(e) {
    //     var files = Array.from(e.target.files);

    //     const toast_success = $('#toast-upload-success');
    //     const toast_failed = $('#toast-upload-failed');

    //     var formData = new FormData();

    //     formData.append('images', files);

    //     var xhr = new XMLHttpRequest();
    //     xhr.open('POST', '/api/temp/image/upload/batch', true);

    //     files.forEach(function(file) {
    //         var reader = new FileReader();

    //         reader.onload = function(e) {
    //             var imageContainer = document.createElement('div');
    //             imageContainer.className = 'relative w-32 h-32 mr-3 mt-3';
    //             var previewImage = document.createElement('img');
    //             previewImage.src = e.target.result;
    //             previewImage.className = 'w-full h-full object-cover';
    //             var deleteButton = document.createElement('button');
    //             deleteButton.innerHTML = '&times;';
    //             deleteButton.className =
    //                 'absolute top-2 right-2 text-white bg-red-500 rounded-full w-6 h-6 flex items-center justify-center';
    //             deleteButton.addEventListener('click', function() {
    //                 imageContainer.remove();
    //             });

    //             imageContainer.appendChild(previewImage);
    //             imageContainer.appendChild(deleteButton);
    //             document.getElementById('uploadContainer').appendChild(imageContainer);
    //         };

    //         reader.readAsDataURL(file);
    //     });
    // });
</script>
{{-- BATCH IMAGE --}}

{{-- PRELOAD IMAGES --}}
@if (old('batch_images'))
    <script>
        var xhr_batch = new XMLHttpRequest();
        xhr_batch.onreadystatechange = function() {
            if (xhr_batch.readyState === XMLHttpRequest.DONE) {
                if (xhr_batch.status === 200) {
                    // Assuming the response is a binary image file
                    const srcs = xhr_batch.response['src'];

                    for (let i = 0; i < srcs.length; i++) {
                        const src = srcs[i];

                        var imageContainer = document.createElement('div');
                        imageContainer.className = 'relative w-32 h-32 mr-3 mt-3';
                        var previewImage = document.createElement('img');
                        previewImage.src = src;
                        previewImage.className = 'w-full h-full object-cover';
                        var deleteButton = document.createElement('button');
                        deleteButton.innerHTML = '&times;';
                        deleteButton.className =
                            'absolute top-2 right-2 text-white bg-red-500 rounded-full w-6 h-6 flex items-center justify-center';
                        deleteButton.addEventListener('click', function() {
                            imageContainer.remove();
                        });

                        imageContainer.appendChild(previewImage);
                        imageContainer.appendChild(deleteButton);
                        document.getElementById('uploadContainer').appendChild(imageContainer);
                    }

                } else {
                    // Error handling
                    console.log('Error loading image:', xhr_batch.status);
                }
            }
        };

        const id_batchs = $('#batch_images_temp').val()

        // Open a GET request to fetch the image file
        xhr_batch.open('GET', '/api/temp/image/path/batch/' + id_batchs, true);

        // Set the response type to 'blob'
        xhr_batch.responseType = 'json';

        // Send the request
        xhr_batch.send();
    </script>
@endif

{{-- PRELOAD IMAGES END --}}
