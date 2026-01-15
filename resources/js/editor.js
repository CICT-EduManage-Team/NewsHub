// resources/js/editor.js
export function initTinyMCE(uploadUrl, csrfToken) {
    tinymce.init({
        selector: '#content',
        plugins: 'advlist autolink lists link image charmap',
        toolbar: 'undo redo | bold italic | link image',
        height: 400,
        images_upload_url: uploadUrl,
        images_upload_handler: function (blobInfo, progress) {
            return new Promise((resolve, reject) => {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', uploadUrl);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

                xhr.onload = () => {
                    if (xhr.status !== 200) { reject('Ошибка: ' + xhr.status); return; }
                    const json = JSON.parse(xhr.responseText);
                    resolve(json.location);
                };

                const formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            });
        }
    });
}
